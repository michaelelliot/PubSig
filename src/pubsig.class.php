<?php


class JCert {

  var $json_cert;

  function load_array($a) {
    $this->json_cert = json_encode($a);
  }

  function save_to_file($fn) {
    $data = trim($this->json_cert);
    // TODO: gzip $data
    // $data = gzip_compress($data)
    if (file_put_contents($fn, $data)) return true;
    return false;
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

//file_put_contents('publickey', $keyDetails['key']);
}

?>
