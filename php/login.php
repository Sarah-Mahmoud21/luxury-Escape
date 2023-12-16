<?php
    $Email = $_POST['LoginEmail'];
    $Password = $_POST['LoginPass'];

    $connect = new mysqli('localhost','root','','LuxuryEscape') or die ("Couldn't connect to database");

    $duplicate=mysqli_query($connect,"select * from users where email='$Email'");
    // and password='$Password'
    if (mysqli_num_rows($duplicate) == 0)
    {
        header("Location: ../html/register.html?NotRegistered");
    } else{
        $row = $duplicate->fetch_assoc();
        if($row['password'] == $Password){
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['name'];
            $_SESSION['userRole'] = $row['userRole'];
            $_SESSION['userID'] = $row['id'];
            header('Location: ../index2.php');
        } else {
            header('Location: ../index.php?InvalidPassword');
        }
    
    }
?>