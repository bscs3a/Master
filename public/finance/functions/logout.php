<?php 
$audit_activity = "Logged out";

session_start();
session_destroy();

header("Location: /Master/index.php")
// <script src="./../src/route.js"></script>

?>