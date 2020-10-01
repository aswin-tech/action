<?php
session_start();
if(!isset($_SESSION['username'])) die(header('Location: ../page/masuk.php'));
if(isset($_SESSION['username'])) die(header('Location: ../dashboard/'));