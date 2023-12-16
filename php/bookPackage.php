<?php
    session_start();

    $Guests = $_POST['bookPackageGuests'];
    $UserID = $_SESSION['userID'];
    $packageID = $_POST['bookPackageID'];

    $connect = new mysqli('localhost','root','','LuxuryEscape') or die ("Couldn't connect to database!");

    $sqlSearch =  mysqli_query($connect,"select * FROM packages
         WHERE '$packageID'=idPackage");

    if(mysqli_num_rows($sqlSearch) > 0){
        $row = $sqlSearch->fetch_assoc();

        $Price = $row['FinalPrice'] * $Guests;

        $sqlBook = "
        INSERT INTO `bookpackages`(`idUser`, `idPackage`, `numberOfGuests`,
         `BookingPrice`)
         VALUES ('$UserID','$packageID','$Guests','$Price')";
    
        //INSERT INTO `bookpackages`(`idUser`, `idPackage`, `numberOfGuests`, `BookingPrice`, `idBookPackage`)
        //  VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    
         $connect->query($sqlBook);
        header("Location: ../index2.php?SuccessfullyBooked");
    }

?>