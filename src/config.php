<?php
global $DB;
$DB = new \stdClass;
$DB->host = $_ENV['DB_HOST'];
$DB->user = $_ENV['DB_USER'];
$DB->password = $_ENV['DB_PASSWORD'];
$DB->database = $_ENV['DB_DATABASE'];