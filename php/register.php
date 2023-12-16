<?php
    $userName = $_POST['regFName'].' '.$_POST['regLName'];
    $Email = $_POST['regEmail'];
    $Password = $_POST['regPass'];
    $Password_2 = $_POST['regPassCon'];
    $Address = $_POST['regAddress'];
    $BD = $_POST['regDate'];

    $connect = new mysqli('localhost','root','','LuxuryEscape') or die ("Couldn't connect to database");

    $duplicate=mysqli_query($connect,"select * from users where email='$Email'");

    if (mysqli_num_rows($duplicate) > 0)
    {
        header("Location: ../html/register.html?AlreadyExist");
    } else{
        $sqlAdd = "INSERT INTO `users`(`id`, `name`, `password`, `email`, `address`, `date`) VALUES ('','$userName','$Password','$Email','$Address','$BD')";
        if ($connect->query($sqlAdd) === TRUE) {
            echo "Registered Successfully";
            ob_start();
            header('Location: ../index.php?message=Registered Successfully.');
            ob_end_flush();
            die();
          } else {
            echo "Error: " . $sqlAdd . "<br>" . $connect->error;
          }
    }
?>