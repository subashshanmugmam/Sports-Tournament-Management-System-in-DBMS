<?php
session_start();
require_once 'config.php';

$error = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'invalid_credentials':
            $error = 'Invalid username or password';
            break;
        case 'email_exists':
            $error = 'Email already registered';
            break;
        case 'database_error':
            $error = 'Database error, please try again';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .auth-container {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .tabs {
            display: flex;
            margin-bottom: 1rem;
        }
        .tab {
            flex: 1;
            padding: 0.5rem;
            text-align: center;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }
        .tab.active {
            border-color: #007bff;
        }
        .form-container {
            position: relative;
        }
        .form {
            position: absolute;
            width: 100%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .form.active {
            position: relative;
            opacity: 1;
        }
        .error {
            color: #dc3545;
            margin-bottom: 1rem;
        }
        .social-login {
            margin-top: 1rem;
            text-align: center;
        }
        .social-login button {
            margin: 0.25rem;
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="tabs">
            <div class="tab active" data-tab="login">Login</div>
            <div class="tab" data-tab="register">Register</div>
        </div>
        
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="form-container">
            <form class="form active" id="login-form" action="process_login.php" method="post">
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>

            <form class="form" id="register-form" action="process_register.php" method="post">
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" name="password" required>
                    <div class="password-strength"></div>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm_password" required>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>

        <div class="social-login">
            <p>Or continue with:</p>
            <button type="button" onclick="socialLogin('google')">
                <img src="assets/images/google.svg" alt="Google" width="20"> Google
            </button>
            <button type="button" onclick="socialLogin('facebook')">
                <img src="assets/images/facebook.svg" alt="Facebook" width="20"> Facebook
            </button>
        </div>
    </div>

    <script>
        // Tab switching
        const tabs = document.querySelectorAll('.tab');
        const forms = document.querySelectorAll('.form');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                forms.forEach(form => form.classList.remove('active'));
                document.getElementById(`${tab.dataset.tab}-form`).classList.add('active');
            });
        });

        // Password strength
        const passwordInput = document.getElementById('register-password');
        const strengthMeter = document.querySelector('.password-strength');
        
        passwordInput.addEventListener('input', () => {
            const strength = checkPasswordStrength(passwordInput.value);
            strengthMeter.style.width = `${strength}%`;
            strengthMeter.style.backgroundColor = getStrengthColor(strength);
        });

        function checkPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            return strength;
        }

        function getStrengthColor(strength) {
            if (strength < 50) return '#dc3545';
            if (strength < 75) return '#ffc107';
            return '#28a745';
        }

        function socialLogin(provider) {
            window.location.href = `process_social_login.php?provider=${provider}`;
        }
    </script>
</body>
</html>