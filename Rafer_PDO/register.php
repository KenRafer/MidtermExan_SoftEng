<?php
require 'core/dbConfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $email, $password]);

    echo "Registration successful. <a href='login.php'>Login here</a>.";
}
?>

<form method="POST" action="">
    <label>First Name: <input type="text" name="first_name" required></label>
    <label>Last Name: <input type="text" name="last_name" required></label>
    <label>Email: <input type="email" name="email" required></label>
    <label>Password: <input type="password" name="password" required></label>
    <button type="submit">Register</button>
</form>
