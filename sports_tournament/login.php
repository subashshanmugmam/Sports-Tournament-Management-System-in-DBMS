<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .password-toggle {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .password-toggle input[type="password"] {
            width: 80%;
        }

        .password-toggle label {
            margin-left: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="auth.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <div class="password-toggle">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <label for="show-password">Show</label>
            <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">
        </div>

        <a href="#">Forgot Password?</a>
        <br><br>
        <input type="submit" value="Login">
    </form>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var showPasswordCheckbox = document.getElementById("show-password");

            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>