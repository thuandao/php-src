--TEST--
Bug #47828 (segfault with openssl_x509_parse())
--SKIPIF--
<?php if (!extension_loaded("openssl")) die("skip"); ?>
--FILE--
<?php
$certnl = '-----BEGIN CERTIFICATE-----\nMIIEKzCCAxOgAwIBAgICAtUwDQYJKoZIhvcNAQEFBQAwgewxFjAUBgNVBC0DDQBT\nUFI5NjEyMTdOSzkxETAPBgNVBAcTCENveW9hY+FuMQswCQYDVQQIEwJERjELMAkG\nA1UEBhMCTVgxDjAMBgNVBBETBTA0MDAwMR8wHQYDVQQJExZQYW56YWNvbGEgIzYy\nIDFlciBwaXNvMSgwJgYDVQQDEx9BdXRvcmlkYWQgY2VydGlmaWNhZG9yYSBJbnRl\ncm5hMRMwEQYDVQQLEwpUZWNub2xvZ+1hMRMwEQYDVQQKEwpTZWd1cmlEYXRhMSAw\nHgYJKoZIhvcNAQkBFhFhY0BzZWd1cmlkYXRhLmNvbTAeFw0wNzAyMTIwMDAwMDBa\nFw0xMjAyMjkwMDAwMDBaMIIBDDEWMBQGA1UELQMNAFNQUjk2MTIxN05LOTEXMBUG\nA1UEBxMOQWx2YXJvIE9icmVnb24xDTALBgNVBAgTBEQuRi4xCzAJBgNVBAYTAk1Y\nMQ4wDAYDVQQREwUwMTAwMDEoMCYGA1UECRMfSW5zdXJnZW50ZXMgU3VyIDIzNzUs\nIDNlci4gUGlzbzEbMBkGA1UEAxMSd3d3LnNlZ3VyaWRhdGEuY29tMREwDwYDVQQL\nEwhJbnRlcm5ldDEpMCcGA1UEChMgU2VndXJpRGF0YSBQcml2YWRhLCBTLkEuIGRl\nIEMuVi4xKDAmBgkqhkiG9w0BCQEWGXBvc3RtYXN0ZXJAc2VndXJpZGF0YS5jb20w\ngZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBANG/rb52Ou//dnkHysR5m7T4r8QM\nKOM/CP0OEXTOC+a+47RsZjqNiZsBkSeR92OFPpkw5bJ85IAD/Tgx7Tli3ryJfrdk\nWMfkXpzWW0YmeTrghL0DMNd8nYc9voVv+OGnIZ0W4Mhz31eiThmyy7Fs8ZlFyfkR\nREj5OQvq+z+NP/n/AgMBAAGjODA2MBMGA1UdJQQMMAoGCCsGAQUFBwMBMAwGA1Ud\nDwQFAwMH6AAwEQYJYIZIAYb4QgEBBAQDAgBAMA0GCSqGSIb3DQEBBQUAA4IBAQCq\nnBqQEb7H6Gxi4KXBn1lrPd5KWO40iSD7BREU8e0eI1ZLZvi4IEAlmyG81Le037jo\nirMUDS2Ue5WI61QnGw4LhnYlCIuffU7fTs+UbrOE4qNU67G+XBfjk0gHkXHmEYbb\nEOR9OHeDcYFgcl3j4SLg/ff6oRYbMkQRCrgQzrl/MNkuqDWJrcigS9OD6OTgRyEo\n7Zvf7/ofWIzTIvINbfjQzSTr8AbI4SbuU9iKgVGDQQF6cfpBmOYgnr3QPuoTQCoU\npz9H9wBlz/Nmw12YtfCmGqpIFAxpRGFQTGPNJWr4FdZkUM792lm7Sf3zzSvi8Ruz\nM3dwifRsZyZyruy4tMsu\n-----END CERTIFICATE-----\n';
$cert = (binary)str_replace("\\n", "\n", $certnl);
$arr = openssl_x509_parse($cert);
var_dump($arr['hash']);
echo "Done";
?>
--EXPECT--
string(8) "9337ed77"
Done
