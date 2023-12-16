<?php 
    session_start();
    if($_SESSION['email']){
        $fname=$_SESSION['firstname'];
        if($_SESSION['userRole'] == 1)
            header("Location:../index3.php");
    }
    else
        header("Location:index.php");
?>


<!DOCTYPE html>

<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveling Agency</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    >
    <link rel ="stylesheet" href ="../css/style.css" >
    <link rel="stylesheet" href="../css/logged.css">
    <link rel="stylesheet" href="../css/tables.css">
</head>


<body>
    
 <!-- header sction statrs -->   

 <header>

    <div id="menu-bar" class="fas fa-bars"></div>
      
    <a href="../index.php" class= "logo"> <span>L</span>uxury <span>E</span>scape</a>
        <nav class="navbar">
            <a href ="../index.php#home"> home</a>
            <a href ="../index.php#book"> book</a>
            <a href ="../index.php#packages"> packages</a>
            <a href ="../index.php#services"> services</a>
            <a href ="../index.php#gallery"> gallery</a>
            <a href ="../index.php#review"> review</a>
            <a href ="../index.php#contact"> contact</a>
    </nav>

    <div class ="icons">
        <i class ="fas fa-search" id ="search-btn"></i>
        <i class ="fas fa-user" id ="user-btn"></i>
    
                <!-- User menu -->

            <div class="user-container">
                <div class="user-menu-content">
                    <?php echo "Welcome, ".$fname ?>
                </div>
                <div class="user-menu-content">
                    <a href="tours.php">Booked Tours</a>
                </div>
                <div class="user-menu-content">
                    <a href="packages.php">Booked Packages</a>
                </div>
                <div class="user-menu-content">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
    </div>

    <form action ="" class= "search-bar-container">
        <input type ="search" id ="search-bar" placeholder="search here ..">
        <label for ="search-bar" class ="fas fa-search"></label>
    </form>
 </header>

<!-- User's Booked Tours Table -->
    
    
    <div class="booked-container">
        <div class="booked-container-title">
            <h2>
            <?php echo $fname."'s " ?>Booked Tours
            </h2>
        </div>
        
        <?php
        
        $UserIDHolder = $_SESSION['userID'];

        $connect = new mysqli('localhost','root','','LuxuryEscape') or die("couldn't connect");

        $sqlSearch =  mysqli_query($connect,"select * FROM booktours WHERE idUser= '$UserIDHolder'");
        //  $sqlSearch=mysqli_query($connect,"select * from booktours where idUser='$UserIDHolder'");

          
          if(mysqli_num_rows($sqlSearch) > 0){
              echo "<table>
              <thead>
                <tr>
                  <th>Country</th>
                  <th>Number of Guests</th>
                  <th>Arrival Date</th>
                  <th>Leaving Date</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>";
              
                while($row = $sqlSearch->fetch_assoc()){
                    echo "<tr>
                        <td>".$row['nameCountry']."</td>
                        <td>".$row['numberOfGuests']."</td>
                        <td>".$row['ArrivalDate']."</td>
                        <td>".$row['LeavingDate']."</td>
                        <td>".$row['Price']."</td>
                    </tr>";
                }


              echo "</tbody>
              </table>";
          } else {
                echo "
                <p>No Booked Tours to show, book one? <a href ='../index2.php#book'>booknow </a></p>";
          }
        ?>
        
    </div>

<!-- footer section-->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3> About us</h3>
            <p>If we’re taking you somewhere,
                 we’ll show you a side of the place that nobody else gets to see 
                 and that you’d never have imagined before you came.
                 We know the unforgettable wonder is always in those remarkable details,
                  so we craft our tours around them.</p>
        </div>

        
        <div class="box">
            <h3> Branch Locations</h3>
            <a href="#"> Jordan</a>
            <a href="#"> Turkey</a>
            <a href="#"> Italy</a>
            <a href="#"> France</a>
        </div>

        <div class="box">
            <h3> Quick Links</h3>
            <a href="#">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </div>

        <div class="box">
            <h3> Follow us</h3>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
        </div>

    </div>
 
</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


   <script src = "../js/script.js"></script>
   <!-- <script src="./js/country.js"></script> -->
</body>
</html>