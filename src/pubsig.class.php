<?php
/*
 * PubSig Class
 * Ensure the following php.ini settings are set to 'On':
 * allow_call_time_pass_reference=On (See http://bugs.php.net/bug.php?id=19699)
 * zlib.output_compression = On
 *
 */
class JCert {
  var $json_cert;

  static function concat_walk($val, $key, &$params) {
      $path = "";
      $res = "";
      if (isset($params)) {
          @list($path, $res) = $params;
      }
      if (!is_array($val)) {
        $res = $res . ($path ? "$path" : "") . "[$key] = $val\n";
        $params[1] = $res;
      }
      if (is_array($val)) {
          $params[0] = ($path ? "$path" : "") . "[$key]";
          array_walk($val, "JCert::concat_walk", &$params);
      }
  }
  function load_array($a) {
    $this->json_cert = $a;
  }
  function save_to_file($fn) {
    $data = gzencode(trim(json_encode($this->json_cert)),9);
    if (file_put_contents($fn, $data)) return true;
    else return false;
  }
  function load_from_file($fn) {
    $data = gzdecode(file_get_contents($fn));
    if ($this->json_cert = json_decode($data)) return $this->json_cert;
    else return false;
  }
  function fingerprint() {
    if (!isset($this->json_cert['jcert']['certificate'])) return false;
    else return $this->calculate_fingerprint(array("certificate" => $this->json_cert['jcert']['certificate']));
  }
  function calculate_fingerprint($k) {
      $params = array();
      @array_walk($k, "JCert::concat_walk", &$params);
      if (count($params) > 1) return sha1(trim($params[1]));
      else return false;
  }
}

class PubSig {
    var $public_key;
    var $key_handle;
    var $key_details;

    function generate_keys($bits) {
        // Generate a $bits length RSA private key
        if ($this->key_handle) openssl_pkey_free ($this->key_handle);
        $this->key_handle = openssl_pkey_new(array(
            'private_key_bits' => $bits,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        ));
        // Get the public key from the private key
        $this->key_details = openssl_pkey_get_details($this->key_handle);
        $this->public_key = $this->key_details['key'];
    }
    function save_private_key_to_file($private_key_filename, $private_key_passphrase) {
        return openssl_pkey_export_to_file($this->key_handle, $private_key_filename, $private_key_passphrase);
    }
    function public_key() {
        return $this->public_key;
    }
    function load_private_key_file($private_key_filename, $private_key_passphrase) {
        // Load private key
        if ($this->key_handle) openssl_pkey_free ($this->key_handle);
        $this->key_handle = openssl_pkey_get_private("file://$private_key_filename", $private_key_passphrase);
        // Get the public key from the private key
        $this->key_details = openssl_pkey_get_details($this->key_handle);
        $this->public_key = $this->key_details['key'];

        return $this->key_handle;
    }
}
?>