<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = $conn->real_escape_string(trim($_POST['fullname']));
    $password = trim($_POST['password']);
    $email = $conn->real_escape_string(trim($_POST['email']));
    $phone = $conn->real_escape_string(trim($_POST['phone']));
    $membership_type = $conn->real_escape_string(trim($_POST['membership_type']));
    $registration_date = date("Y-m-d");

  
    if (!empty($fullname) && !empty($password) && !empty($email) && !empty($phone) && !empty($membership_type)) {
 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO members (fullname, password, email, phone, membership_type, registration_date)
                VALUES ('$fullname', '$hashed_password', '$email', '$phone', '$membership_type', '$registration_date')";

        if ($conn->query($sql) === TRUE) {
            header("Location: thankyou.html");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }

    $conn->close();
}
?>
