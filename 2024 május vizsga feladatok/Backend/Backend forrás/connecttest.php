<?php
require_once("connect.php");

if ($dbconn->connect_error) {
    die("A csatlakozás sikertelen volt!". $dbconn->connect_error);
}
echo "A csatlakozás sikeres!";

?>