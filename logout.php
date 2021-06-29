<?php
session_start();

setcookie("id", "", time() - 3600);
setcookie("key", "", time() - 3600);

session_destroy();
header("Location: login.php");
