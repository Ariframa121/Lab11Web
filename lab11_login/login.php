<?php
session_start();
$title ='Data Barang';
include_once 'koneksi.php';

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '{$username}' AND password = md5 ('{$password}')";

    $result = mysqli_query($koneksi, $sql);
    if ($result && mysqli_affected_rows($koneksi) !=0){
        $_SESSION['login'] = true;
        $_SESSION['username'] = mysqli_fetch_array($result);

        header('location: index.php');
    }else
    $errorMsg = "<p style=\"color:red;\">Gagal Login,
    silakan ulangi lagi.</p>";
}
include_once "header.php";
if (isset($errorMsg)) echo $errorMsg;
?>

<h2>LOGIN</h2>
<form method="POST">
    <div class="input">
        <label for="">USERNAME</label>
        <input type="text" name="username">
    </div>
    <div class="input">
        <label>PASSWORD</label>
        <input type="password" name="password">
    </div>
    <div class="submit">
        <input type="submit" name="submit" value="login">
    </div>
</form>
<?php
include_once 'footer.php';
?>