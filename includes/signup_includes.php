<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are set
    if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        try {
            require_once 'connection.php';
            require_once 'signup_model.php';
            require_once 'signup_contr.php';


            /******************* Error Handlers ********************/
            $errors = [];

            // Are all fields filled ?
            // if (is_input_empty($name, $password, $email)) {
            //     $errors["empty_input"] = "Fill in all fields!";
            // }

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

                $signup_data = [
                    "name" => $name,
                    "email" => $email,
                ];
                $_SESSION['signup_data'] = $signup_data;

                header('Location: ../index.php');
                die();
            }

            create_user($pdo, $name, $email, $password);
            header('Location: ../index.php?signup=success');

            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die('Query failed: ' . $e->getMessage());
        }
    }
} else {
    header('Location: ../index.php');
    die();
}
