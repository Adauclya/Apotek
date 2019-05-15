<?php

session_start();

unset($_SESSION["level"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);
session_destroy();
echo "<script>document.location.href='../index.php'</script>";
?>