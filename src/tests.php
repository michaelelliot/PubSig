<?php
include("pubsig.class.php");
//if (!extension_loaded('openssl')) die("OpenSSL extension not loaded");
//zlib1.dll

set_time_limit(0);

$jcert_ca = array("jcert" =>

              array(

              "certificate" =>
                array("name" => "Torrentula Torrents",
                      "domain" => "torrentula.com",
                      "website" => "http://www.torrentula.eu/",
                      "repository_url" => "http://www.torrentula.eu/pubsig/certs/",
                      "json_rpc_url" => "http://www.torrentula.eu/json-rpc",
                      "avatar" => "iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhJREFUeF4FwTEBAAAAgjD7FzESWfjYdgwEoAJ4lTsaxgAAAABJRU5ErkJggg==",
                      "timestamp" => "1298996666"),

              "certificate_signature" => "<signature of the certificate key>",

              "trusted_certificates" =>
                array(
                  array("fingerprint" => sha1("<public key of certificate abc>"),
                        "timestamp" => "1298996666"),

                  array("fingerprint" => sha1("<public key of certificate def>"),
                        "timestamp" => "1298996666")),

              "trusted_certificates_signature" => "<signature of the trusted_certificates key>",

              "signatures" =>
                array(
                  array("fingerprint" => sha1("<public key of certificate abc>"),
                        "timestamp" => "1298996666",
                        "signature" => sha1("<serialisation of signatures hij>")),
                  array("fingerprint" => sha1("<public key of certificate abc>"),
                        "timestamp" => "1298996666",
                        "signature" => sha1("<serialisation of signatures hij>"))),

              "signatures_signature" => "<signature of the signatures key>"
              ));


// Save to jcert file
$jc = new JCert();
$jc->load_array($jcert_ca);
$jc->save_to_file("certs/" . $jc->fingerprint() . ".jcert");
print "Saved certificate to " . "certs/" . $jc->fingerprint() . ".jcert";
exit;

// Load from jcert file
$jc = new JCert();
$jcert_ca_test = $jc->load_from_file($fn = "certs/e39a897c180d7cb1e64f7b9e8e0a48944d65b2aa.jcert");
print "Loaded certificate $fn\n";
print_r($jcert_ca_test);
exit;

exit;

$private_key_filename = str_replace("\\", "/", dirname(__FILE__)) . "/keys/private_key.pem";
$private_key_passphrase = "abc123";
/*
$ps = new PubSig();
$ps->generate_keys(4096);
$ps->save_private_key_to_file($private_key_filename, $private_key_passphrase);
exit;
*/

//if (!$ps->load_private_key_file($private_key_filename, $private_key_passphrase)) die("Error loading private key from file");


/*
function load_certificate($p) {


}
function create_certificate($p) {
    $cert = array(
        "version" => "0.1",
        "content-type" => "application/jcert",
        "certificate" => array(
            "name" => "Torrentula",
            "description" => "All your torrent are belong to us.",
            "url" => "http://www.torrentula.com",
            "public_key" => $p['public_key']
            ),
        "signatures" => array(

            )
        );

    return json_encode($cert);
}

$ps = new PubSig();
if (!$ps->load_private_key_file($private_key_filename, $private_key_passphrase)) die("Error loading private key from file");


create_certificate(array(
    "public_key" => $ps->public_key)
);


print "-----------\n";
$test = $ps->public_key();
//$test = base64_decode(preg_replace('/^\-+.*\-+$|\n/m', '', $test));
//file_put_contents("test.txt", $test);
//print base64_decode($test);
//print $test;
//exit;
function hex2bin($hex) {
    return preg_replace('#(\w)(\w)#e', "chr(hexdec('$1$2'))", $hex);
}

$test = base64_decode("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");
print strlen($test);
print $test;

//print hex2bin("B7AA8A4EF769666E");
//exit;
$test = file_get_contents("keys/private_key.pem");
print "\n";
print strlen(openssl_decrypt($test, "des-ede3-cbc", "abc123"));//,  TRUE, hex2bin("B7AA8A4EF769666E")));
//print $ps->public_key();

exit;

$private_key_filename = str_replace("\\", "/", dirname(__FILE__)) . "/keys/private_key.pem";
$private_key_passphrase = "abc123";

$ps = new PubSig();
//$ps->generate_keys(4096);
//$ps->save_private_key_to_file($private_key_filename, $private_key_passphrase);
if (!$ps->load_private_key_file($private_key_filename, $private_key_passphrase)) die("Error loading private key from file");
//sdssdasdas
//$cert = new JCert();
*/
?>