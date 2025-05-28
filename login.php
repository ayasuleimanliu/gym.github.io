<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
       
        $sql = "SELECT * FROM members WHERE email = '$email' LIMIT 1";
        $result = $conn->query($sql);

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();

          
            if (password_verify($password, $user['password'])) {
            
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];
                header("Location: about.html");
                exit();
            } else {
                header("Location: login.html?error=1");
                exit();
            }
        } else {
            header("Location: login.html?error=1");
            exit();
        }
    } else {
     
        header("Location: login.html?error=2");
        exit();
    }

    $conn->close();
} else {
    
    header("Location: login.html");
    exit();
}
?>
