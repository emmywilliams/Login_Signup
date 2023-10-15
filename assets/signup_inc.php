<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if 'name' key exists in $_POST
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $errors["missing_name"] = "Name is required.";
    }

    // Check if 'password' key exists in $_POST
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors["missing_password"] = "Password is required.";
    }

    // Check if 'email' key exists in $_POST
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $errors["missing_email"] = "Email is required.";
    }

    if (isset($errors["missing_name"]) || isset($errors["missing_password"]) || isset($errors["missing_email"])) {
        $errors["missing_fields"] = "Please fill in all required fields.";
    }

    // Continue with the rest of the code
    try {
        require_once 'connection.php';
        require_once 'signup_contr.php';
        require_once 'signup_model.php';

        /******************* Error Handlers ********************/
        $errors = $errors ?? [];

        // Are all fields filled?
        if (is_input_empty($name, $password, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        // Is email valid?
        if (is_email_valid($email)) {
            $errors["invalid_email"] = "Invalid email!";
        }

        // Is email taken
        if (is_email_taken($pdo, $email)) {
            $errors["email_take"] = "Email already taken!";
        }

        // Is name taken
        if (is_name_taken($pdo, $name)) {
            $errors["name_taken"] = "Name already taken!";
        }

        require_once 'session.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;
            header('Location: ../index.php');
            die();
        }
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
    die();
}
