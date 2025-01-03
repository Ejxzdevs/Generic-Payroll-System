<?php
include "connection/connection.php";

$select = "SELECT COUNT(*) FROM tbl_accounts";
$query = mysqli_query($conn, $select);

if (!$query) {
    die("Query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_array($query);

switch ($row[0]) {
    case 0:
        header("Location: user-entry/configure_company.php");
        exit();
    default:
        header("Location: user-entry/login.php");
        exit();
}