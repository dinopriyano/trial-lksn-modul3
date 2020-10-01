<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>
    <form method="POST" id="form">
        <table cellpadding="10">
            <tr>
                <td>Username</td>
                <td>: <input type="text" id="txtUsername" value=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>: <input type="password" id="txtPass" value=""></td>
            </tr>
            <tr>
                <td><button type="submit">Login</button></td>
                <td>&nbsp;&nbsp;<button id="btnRegister">Register</button></td>
            </tr>
        </table>
    </form>
</body>
<script src="javascript/login.js"></script>
</html>