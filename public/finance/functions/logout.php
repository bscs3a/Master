<?php 
$audit_activity = "Logged out";

session_start();
session_destroy();

header("Location: /Master/")

?>
<!-- <script src="./../src/route.js"></script> -->