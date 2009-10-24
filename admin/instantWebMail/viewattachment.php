<?php
require("functions.php");



if (!$content) exit;



if ($charSet[$attachmentNumber]) $contentType[$attachmentNumber] .= ";\r\n\tcharset=\"$charSet[$attachmentNumber]\"";
if (isset($name[$attachmentNumber])) $contentType[$attachmentNumber] .= ";\r\n\tname=\"$name[$attachmentNumber]\"";

if ($contentTransferEncoding[$attachmentNumber] == "quoted-printable") $content[$attachmentNumber] = quoted_printable_decode($content[$attachmentNumber]);
if ($contentTransferEncoding[$attachmentNumber] == "base64") $content[$attachmentNumber] = base64_decode($content[$attachmentNumber]);

$contentDisposition = ($inLine[$attachmentNumber] == "true") ? "inline" : "attachment";
if (isset($fileName[$attachmentNumber])) $contentDisposition .= "; filename=\"$fileName[$attachmentNumber]\"";

header("MIME-Version: 1.0");
header("Content-Type: $contentType[$attachmentNumber]");
header("Content-Transfer-Encoding: 8bit");
header("Content-Disposition: $contentDisposition");

echo $content[$attachmentNumber];
?>