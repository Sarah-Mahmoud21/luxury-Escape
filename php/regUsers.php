<?php 
    session_start();
    if(isset($_SESSION['email']) && ($_SESSION['userRole']==1)){
        $fname=$_SESSION['firstname'];
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

            <div class="user-container" style="height: 200px;">
                <div class="user-menu-content">
                    <?php echo "Welcome, ".$fname ?>
                </div>
                <div class="user-menu-content">
                    <a href="tours2.php">Booked Tours</a>
                </div>
                <div class="user-menu-content">
                    <a href="packages2.php">Booked Packages</a>
                </div>
                <div class="user-menu-content">
                    <a href="regUsers.php">Registered Users</a>
                </div>
                <div class="user-menu-content">
                    <a href="php/logout.php">Logout</a>
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
                Registered Users
            </h2>
        </div>
        
        <?php
        
        $UserIDHolder = $_SESSION['userID'];

        $connect = new mysqli('localhost','root','','LuxuryEscape') or die("couldn't connect");

        $sqlSearch =  mysqli_query($connect,"select * FROM users
         WHERE 1");

        // SELECT `idUser`, `idPackage`, `numberOfGuests`, `BookingPrice`, `idBookPackage` FROM `bookpackages` WHERE 1
        // SELECT `Country`, `NaturalPrice`, `FinalPrice`, `idPackage` FROM `packages` WHERE 1
        // SELECT `id`, `name`, `password`, `email`, `address`, `date` FROM `users` WHERE 1
          
          if(mysqli_num_rows($sqlSearch) > 0){
              echo "<table>
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Date Of Birth</th>
                </tr>
              </thead>
              <tbody>";
              
                while($row = $sqlSearch->fetch_assoc()){
                    echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['address']."</td>
                    </tr>";
                }


              echo "</tbody>
              </table>";
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