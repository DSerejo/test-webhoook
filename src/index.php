<?php
require_once(__DIR__ . '/config.php');

global $DB;
print_r($DB);
$connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
    "host" => $DB->host,
    "username" => $DB->user,
    "password" => $DB->password,
    "dbname" => $DB->database,
    "port" => '3306'
));

echo print_r($connection->query('SELECT * FROM test')->fetchAll());

