<?php
session_destroy();
header("Location: index.php"); // Redirect to login page after logging out
exit();
?>
