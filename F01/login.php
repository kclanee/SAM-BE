<?php
require 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

  
    if (empty($email) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.history.back();</script>";
        exit;
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            echo "<script>
                    alert('Login successful! Redirecting to the dashboard.');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            
            echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Olympic Login</title>
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
    .login-container {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .login-container h1 {
      font-size: 2rem;
      color: #0044cc;
    }
    .login-container form {
      width: 100%;
      max-width: 400px;
      display: flex;
      flex-direction: column;
    }
    .login-container input {
      margin: 10px 0;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .login-container button {
      padding: 10px;
      background: #0044cc;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }
    .login-container button:hover {
      background: #002a80;
    }
    .login-container a {
      color: #0044cc;
      text-decoration: none;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="image-container"></div>
    <div class="login-container">
      <h1>Login</h1>
      <form action="login.php" method="POST">
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
  <p>Don't have an account? <a href="register.php">Register here</a></p>
</form>


    </div>
  </div>
</body>
</html>
