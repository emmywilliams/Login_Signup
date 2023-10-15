<?php
require_once './includes/session.php';
require_once './includes/signup_view.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Sign Up</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Center the form */
        .center-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 90vh;
            background-color: #f5f5f5;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        /* Form container styles */
        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Form header styles */
        .form-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form input styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Form button styles */
        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        /* Form links styles */
        .form-links {
            text-align: center;
        }

        .form-links a {
            text-decoration: none;
            color: #007bff;
        }

        .form-links a:hover {
            text-decoration: underline;
        }

        /* Logo image styling */
        .logo {
            max-width: 50%;
            height: auto;
            object-fit: cover;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto center-form form-container">
                <a href="index.php" class="text-center justify-content-center"><img src="/assets/images/ai3.png" alt="Your Logo" class="logo"></a>
                <div id="login-form">
                    <h2 class="form-header">Login</h2>
                    <form>
                        <div class="form-group">
                            <label for="loginEmail">Email address</label>
                            <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <p class="mt-3 form-links">
                        <a href="#" id="show-signup">Sign Up</a> | <a href="#" id="show-password-recovery">Forgot Password</a>
                    </p>
                </div>
                <div id="signup-form" style="display: none;">
                    <h2 class="form-header">Sign Up</h2>
                    <form action="./includes/signup_includes.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Sign Up</button>
                    </form>
                    <p class="mt-3 form-links">
                        <a href="#" id="show-login">Login</a>
                    </p>
                </div>
                <div id="password-recovery-form" style="display: none;">
                    <h2 class="form-header">Forgot Password</h2>
                    <form>
                        <div class="form-group">
                            <label for="recoveryEmail">Email address</label>
                            <input type="email" class="form-control" id="recoveryEmail" name="recoveryEmail" placeholder="Enter email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Recover Password</button>
                    </form>
                    <p class="mt-3 form-links">
                        <a href="#" id="show-login-password">Login</a> | <a href="#" id="show-signup-password">Sign Up</a>
                    </p>
                </div>

                <?php check_signup_errors(); ?>

            </div>
        </div>
    </div>

    <script>
        function toggleForm(targetFormId) {
            const forms = ["login-form", "signup-form", "password-recovery-form"];

            forms.forEach(formId => {
                const form = document.getElementById(formId);
                form.style.display = formId === targetFormId ? "block" : "none";
            });
        }

        document.getElementById("show-signup").addEventListener("click", function(event) {
            event.preventDefault();
            toggleForm("signup-form");
        });

        document.getElementById("show-login").addEventListener("click", function(event) {
            event.preventDefault();
            toggleForm("login-form");
        });

        document.getElementById("show-password-recovery").addEventListener("click", function(event) {
            event.preventDefault();
            toggleForm("password-recovery-form");
        });

        document.getElementById("show-login-password").addEventListener("click", function(event) {
            event.preventDefault();
            toggleForm("login-form");
        });

        document.getElementById("show-signup-password").addEventListener("click", function(event) {
            event.preventDefault();
            toggleForm("signup-form");
        });
    </script>

</body>

</html>