<?php

declare(static_type=1);

// Check if all the fields were filled
// function is_input_empty(string $name, string $password, string $email)
// {
//     if (empty($name) || empty($password) || empty($email)) {
//         return true;
//     } else {
//         return false;
//     }
// }

// Check if email is valid
function is_email_valid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Is email taken
function is_email_taken(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

// Check if name is already exist in the database
function is_name_taken(object $pdo, string $name)
{
    if (get_name($pdo, $name)) {
        return true;
    } else {
        return false;
    }
}

// create user
function create_user(object $pdo, string $name, string $email, string $password)
{
    set_user($pdo, $name, $email, $password);
}
