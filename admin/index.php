<?php
session_start();

if ($_SESSION) {
    if ($_SESSION['level'] == "Administrator") {
        header("Location: haladmin.php");
    } else if ($_SESSION['level'] == "Pegawai") {
        header("Location: halpegawai.php");
    }
}

include('login.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h3>Login</h3>

    <form method="POST" action="">
        <table border="1">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="level" required>
                        <option value="0">Pilih Level User</option>
                        <option value="1">Administrator</option>
                        <option value="2">Pegawai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="login">Sign in!</button></td>
            </tr>
        </table>
    </form>

    <h2><?php echo $error; ?></h2>
</body>

</html>