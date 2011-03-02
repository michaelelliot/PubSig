<?php

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

$example = htmlentities(print_r($jcert_ca, true));
$example = preg_replace("/</ims", '&lt;', $example);
$example = preg_replace("/>/ims", '&gt;', $example);
$example = preg_replace("/&lt;([a-z_\.0-9 \/\\\:\[\]'&;]+)&gt;/ims", '&lt;<insrt>$1</insrt>&gt;', $example);
$example = preg_replace("/\"([a-z_\.0-9 \/\\\:\[\]'&;]+)\"/ims", '<str>"$1"</str>', $example);
$example = preg_replace("/^( *\[)([a-z_\.0-9]+)(\] *)/im", '$1<key>$2</key>$3', $example);

$spec = <<<EOD
'
File Format
-----------
A .jcert file is serialized in JSON and then gzipped.
The MIME type is: application/jcert

Keys
----
[jcert]
This is the certificate root key.

[jcert][certificate]
This contains all critical certificate fields and is signed when the certificate is first created.

[jcert][certificate][repository_url]
The URL prefix of the location where the certificate holder stores their certificates.
Suffixing this with a certificate fingerprint should be a URL where the certificate can be downloaded.
This is limited to the certificates that the owner trusts or that trust the owner (and the owner approves,
as evidenced by the inclusion of these signatures that are in turn signed by the owner in the [signatures] key)

[jcert][certificate][json_rpc_url]
The URL of the JSON RPC interface used for communicating with the certificate holder.
e.g.: https://host.com/pubsig/certs/

Callable functions include:

func1()
func2()

Signatures
-----------
Keys in the format (.*)_signature means that it is the signature of the $1 key.

[jcert][certificate_signature]
Signature of the [jcert][certificate] key.

[jcert][trusted_certificates_signature]
Signature of the [jcert][trusted_certificates] key.

[jcert][certificate_signature]
Signature of the [jcert][signatures] key.

A signature is calculated thusly:
1) The key is \'flattened out\' with each key\'s path and value (separated by space equals sign space) on each line
   If a key value is a numerical array (list) then numbers are used for the keys of that value ([0] [1] [2] etc.).
   e.g. To calculate the signature of the [certificate] key:
   [certificate][name] = ...
   [certificate][domain] = ...
   [certificate][website] = ...
   [certificate][repository_url] = ...
   [certificate][json_rpc_url] = ...
   [certificate][avatar] = ...
   [certificate][timestamp] = ...

2) This is then sorted alphabetically.
   e.g.
   [certificate][avatar] = ...
   [certificate][domain] = ...
   [certificate][json_rpc_url] =...
   [certificate][name] = ...
   [certificate][repository_url] = ...
   [certificate][timestamp] = ...
   [certificate][website] = ...

3) This is then joined with the line feed character (\\n) and a SHA1 hash is calculated from this.

4) The SHA1 hash is then encrypted resulting in the final signature.


'
EOD;


$spec = (
  preg_replace("/(\[)([a-z_\.0-9]+)(\])/im", '$1<key>$2</key>$3',
    preg_replace("/&quot;([a-z_\.0-9 \/\\\:\[\]'&;]+)&quot;/im", '<str>"$1"</str>',
      preg_replace("/\\\'/ims", '\'',
        htmlentities(
          preg_replace("/^.(.*).$/ims", '$1', $spec)
        )
      )  
    )
  )
);

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>PubSig Specification</title>
    <style type="text/css">
    body {
      font: 9pt 'Courier New';
    }
    pre {
      white-space: pre;
    }
    h1 {
      display: inline;
      margin: 0;
      padding: 0;
      font-size: 15pt;
      line-height: inherit;
    }
    h2 {
      display: inline;
      margin: 0;
      padding: 0;
      font-size: 12pt;
      line-height: inherit;
      text-transform: uppercase;
    }
    h3 {
      display: inline;
      margin: 0;
      padding: 0;
      font-size: 11pt;
      font-weight: normal;
      line-height: inherit;
    }
    hr {
      border-color: rgb(128,128,256);
      border-width: 1px;
    }

    kw {
      font-weight: bold;
    }
    var {
      color: rgb(0,128,128);
      font-style: italic;
    }
    var2 {
      color: rgb(128,128,128);
      font-style: italic;
    }
    func {
      color: rgb(128,0,0);
    }
    str {
      color: rgb(255,0,255);
    }
    comment {
      color: rgb(0,128,0);
    }
    key {
        color: rgb(0,128,128)
    }
    insrt {
        color: rgb(128,0,0)
    }
    </style>
</head>
<body><pre><h1>JCert Certificate Structure</h1>

<h2>Certificate example</h2>
<hr />
<?php print $example ?>
<hr />
<h2>Brief explanation</h2>
<hr />
<?php print $spec ?>
<hr />

 

</pre>
</html>