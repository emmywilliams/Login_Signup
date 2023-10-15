<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

// function signup_inputs()
// {

//     if (isset($_SESSION["signup_data"]["name"]) && !isset($_SESSION["errors_signup"]["name_taken"])) {
//         echo '<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="' . $_SESSION["signup_data"]["name"] . '">';
//     } else {
//         echo '<input type="text" name="name" placeholder="Your Name">';
//     }

//     echo '<input type="password" class="form-control" id="password" name="password" placeholder="Password">';

//     if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
//         echo '<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>' . $_SESSION["signup_data"]["email"] . '">';
//     } else {
//         echo '<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">';
//     }
// }


function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br';
        echo '<p class="form-success">Signup successful</p>';
    }
}
