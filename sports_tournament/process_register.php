<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .success-animation {
            animation: kingAnimation 1s ease-in-out;
        }

        @keyframes kingAnimation {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .success-animation.football {
            animation: footballAnimation 1s ease-in-out;
        }

        @keyframes footballAnimation {
            0% { transform: translateX(0); }
            50% { transform: translateX(100px); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <h1>Registration Processed</h1>
    <p>Thank you for registering!</p>
    <div class="success-animation">
        <img src="chess_king.png" alt="Chess King">
    </div>
    <div class="success-animation football">
        <img src="football.png" alt="Football">
    </div>
</body>
</html>