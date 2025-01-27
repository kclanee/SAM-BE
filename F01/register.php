<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $fullName = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.history.back();</script>";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (:full_name, :email, :password_hash)");
        $stmt->bindParam(':full_name', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_hash', $passwordHash);
        $stmt->execute();
        echo "<script>
                alert('Registration successful! You can now Login.');
                window.location.href = 'login.php';
              </script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { 
            echo "<script>alert('Email already registered.'); window.history.back();</script>";
        } else {
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.history.back();</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Olympic Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(to right, #d1e7ff, #0044cc);
    }
    .container {
      display: flex;
      width: 80%;
      max-width: 1200px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }
    .image-container {
      flex: 1;
      background: url('https://npr.brightspotcdn.com/dims3/default/strip/false/crop/4691x3127+0+0/resize/4691x3127!/?url=http%3A%2F%2Fnpr-brightspot.s3.amazonaws.com%2F09%2Fa7%2Fad789e51470aa19841c45247c849%2Fgettyimages-2164492377-1.jpg') no-repeat center center;
      background-size: cover;
    }
    .registration-container {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .registration-container h1 {
      font-size: 2rem;
      color: #0044cc;
    }
    .registration-container form {
      width: 100%;
      max-width: 400px;
      display: flex;
      flex-direction: column;
    }
    .registration-container input {
      margin: 10px 0;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .registration-container button {
      padding: 10px;
      background: #0044cc;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }
    .registration-container button:hover {
      background: #002a80;
    }
    .registration-container a {
      color: #0044cc;
      text-decoration: none;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="image-container"></div>
    <div class="registration-container">
      <h1>Register</h1>
      <form action="register.php" method="POST">
    <input type="text" name="full_name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</form>

    </div>
  </div>
</body>
</html>
