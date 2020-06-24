<?php
$to = "anirbanmukherjee602@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: holo@gtmail.com" . "\r\n" .
"CC: ss@example.com";

mail($to,$subject,$txt,$headers);
?>