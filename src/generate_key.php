<?php



include("pubsig.class.php");








$private_key_filename = str_replace("\\", "/", dirname(__FILE__)) . "/keys/private_key.pem";
$private_key_passphrase = "abc123";

$ps = new PubSig();
//$ps->generate_keys(4096);
//$ps->save_private_key_to_file($private_key_filename, $private_key_passphrase);
if (!$ps->load_private_key_file($private_key_filename, $private_key_passphrase)) die("Error loading private key from file");
//sdssdasdas
//$cert = new JCert();

?>