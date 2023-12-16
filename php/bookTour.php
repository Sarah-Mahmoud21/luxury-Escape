<?php
    session_start();

    $CountryName = $_POST['bookTourName'];
    $Guests = $_POST['bookTourGuests'];
    $Price = $Guests * 150;
    $ArriveDate = $_POST['bookTourArrDate'];
    $LeaveDate = $_POST['bookTourLeaveDate'];
    $UserID = $_SESSION['userID'];

    $connect = new mysqli('localhost','root','','LuxuryEscape') or die ("Couldn't connect to database!");

    $sqlBook = "
    INSERT INTO `booktours`(`idUser`, `nameCountry`, `numberOfGuests`,
     `ArrivalDate`, `LeavingDate`, `Price`)
     VALUES ('$UserID','$CountryName','$Guests','$ArriveDate'
     ,'$LeaveDate','$Price')";
     $connect->query($sqlBook);
    header("Location: ../index2.php?SuccessfullyBooked");

?>