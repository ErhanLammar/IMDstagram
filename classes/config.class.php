<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 14/05/16
 * Time: 10:09
 */
$mysqli = new mysqli("localhost", "root", "", "IMDstagram");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";

$mysqli = new mysqli("127.0.0.1", "root", "", "IMDstagram");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
