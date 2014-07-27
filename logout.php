<?php

unset($_SESSION['id']);
session_destroy();
header("Location: http://ec2-54-254-226-79.ap-southeast-1.compute.amazonaws.com");

?>

