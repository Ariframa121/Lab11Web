<?php
session_start();
if (!isset($_SESSION['login']))
    header('location: login.php');
    $tampilPeg =mysqli_query($koneksi, "SELECT * FROM latihan1 WHERE uname='$_SESSION[uname]'");
    $peg = mysqli_fetch_array($tampilPeg);

?>