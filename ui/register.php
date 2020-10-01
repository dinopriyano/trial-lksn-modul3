<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register Page</h1>
    <form method="POST" id="form">
        <table cellpadding="10">
            <tr>
                <td>First Name</td>
                <td>: <input type="text" id="txtFName" value=""></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>: <input type="text" id="txtLName" value=""></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>: <input type="text" id="txtUsername" value=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>: <input type="password" id="txtPass" value=""></td>
            </tr>
            <tr>
                <td><button type="submit">Register</button></td>
                <td>&nbsp;&nbsp;<button id="btnLogin">Login</button></td>
            </tr>
        </table>
    </form>
</body>
<script src="javascript/register.js"></script>
</html>