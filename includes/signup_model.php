<?php

declare(strict_types=1);


error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_name(object $pdo, string $name)
{
    $query = "SELECT name FROM users WHERE name = :name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $name, string $email, string $password)
{
    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

    $stmt = $pdo->prepare($query);

    $options = ['cost' => 12];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
