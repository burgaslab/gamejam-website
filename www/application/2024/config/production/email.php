<?php

$config["email"]["useragent"] = "BurgasGameJam";
$config["email"]["protocol"] = "sendmail";
$config["email"]["mailpath"] = "/usr/sbin/sendmail";
$config["email"]["smtp_host"] = "localhost";
$config["email"]["smtp_user"] = "";
$config["email"]["smtp_pass"] = "";
$config["email"]["smtp_port"] = 25;
$config["email"]["smtp_timeout"] = 5;
$config["email"]["wordwrap"] = true;
$config["email"]["wrapchars"] = 120;
$config["email"]["mailtype"] = "html";
$config["email"]["charset"] = "utf-8";
$config["email"]["validate"] = true;
$config["email"]["priority"] = 2;
$config["email"]["crlf"] = "\r\n";
$config["email"]["newline"] = "\r\n";
$config["email"]["default_sender"] = "gamejam@burgaslab.org";
$config["email"]["multipart"] = "related";

merge_env(__FILE__, $config);