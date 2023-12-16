<?php 
    session_start();
    if($_SESSION['email'])
        $fname=$_SESSION['firstname'];
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
    <link rel ="stylesheet" href ="./css/style.css" >
    <link rel="stylesheet" href="./css/logged.css">
    <link rel="stylesheet" href="./css/indexStyle.css">
</head>
<body>
    
 <!-- header sction statrs -->   

 <header>

    <div id="menu-bar" class="fas fa-bars"></div>
      
    <a href="#" class= "logo"> <span>L</span>uxury <span>E</span>scape</a>
    <nav class="navbar">
        <a href ="#home">home</a>
        <a href ="#book">book</a>
        <a href ="#packages">packages</a>
        <a href ="#services">services</a>
        <a href ="#gallery">gallery</a>
        <a href ="#review">review</a>
        <a href ="#contact">contact</a>
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
                    <a href="php/tours2.php">Booked Tours</a>
                </div>
                <div class="user-menu-content">
                    <a href="php/packages2.php">Booked Packages</a>
                </div>
                <div class="user-menu-content">
                    <a href="php/regUsers.php">Registered Users</a>
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


<!--login form-->
<div class ="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="php/login.php" method="post">
        <h3>login</h3>
        <input type ="email" class="box" name="LoginEmail" placeholder="enter your email">
        <input type ="password" class= "box" name="LoginPass" placeholder="enter your password">
        <input type ="submit" value= "login now" class="btn">
        <input type ="checkbox" id="remember">
        <label for="remeber"> remember me</label>
        <p> forgot password? <a href ="#"> click here</a></p>
        <p>don't have an account? <a href="./html/register.html"> register now</a></p>
    </form>

</div>


<!-- HOME SECTION STARTS HERE-->
<section class ="home" id ="home">

    <div class= "content">
        <h3>The great outdoors </h3>
        <p> Wonder often, wonder always, adventure awaits</p>
        <a href="#packages"  class="btn"> discover more</a>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src ="images/site/video (2).mp4"></span>
        <span class="vid-btn" data-src ="images/site/video (1).mp4"></span>
        <span class="vid-btn" data-src ="images/site/pexels-bert-christiaens-5595130.mp4"></span>
        <span class="vid-btn" data-src ="images/site/video (3).mp4"></span>
        <span class="vid-btn" data-src ="images/site/video(4).mp4"></span>
    </div>

    <div class="vedio-container">
        <video src ="images/site/video (2).mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- HOME SECTION ENDS HERE-->

<!-- book section starts here-->
<section class="book" id="book">
    <h1 class="heading">
        <span>b</span>
        <span>o</span>
        <span>o</span>
        <span>k</span>
        <span class="space"></span>
        <span>n</span>
        <span>o</span>
        <span>w</span>
    </h1>

    <div class="row">
        <div class="image">
            <img src="images/site/booking.jpg" alt="">
        </div>

        <form action="php/bookTour.php" method="post">
            <div class="inputBox">
                <h3> Where To</h3>
                <input type="text" placeholder="Country name" name="bookTourName" required>
            </div>
            <div class="inputBox">
                <h3> How Many</h3>
                <input type="text" placeholder="Number of Guests" name="bookTourGuests" required>
            </div>
            <div class="inputBox">
                <h3> Arrivals</h3>
                <input type="date" name="bookTourArrDate" required>
            </div>
            <div class="inputBox">
                <h3> Leaving</h3>
                <input type="date" name="bookTourLeaveDate" required>
            </div>
            <input type="submit" class="btn" value="book now">
        </form>
    </div>
</section>

<!-- book section ends here-->

<!-- Book Package Form starts -->

<div class ="BookP-form-container">

    <i class="fas fa-times" id="form1-close"></i>

    <form action="php/bookPackage.php" method="post">
        <h3>Book Package</h3>
        <input type ="number" class="box" placeholder="enter how many guests" name="bookPackageGuests">
        <input type="text" name="bookPackageID" id="field" style="display:none;">
        <input type ="submit" value= "Pay now" class="btn">
    </form>
</div>

<!-- Book Package Form ends -->

<!--packages section starts-->
<section class="packages" id="packages">
    <h1 class="heading">
        <span>p</span>
        <span>a</span>
        <span>c</span>
        <span>k</span>
        <span>a</span>
        <span>g</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

    <?php
            $connect = new mysqli('localhost','root','','LuxuryEscape') or die("Couldn't connect to database!");

            $sqlSearch = mysqli_query($connect,"SELECT `Country`, `NaturalPrice`, `FinalPrice`,
             `idPackage`,`url`,`srcPath`,`Paragraph` FROM `packages`,`packagespaths` WHERE idPackage=PackID");
            
            if(mysqli_num_rows($sqlSearch) > 0){
                while($row = $sqlSearch->fetch_assoc()){
                    echo '<div class="box">
                    <img src="'.$row['srcPath'].'" alt="">
                    <div class="content">
                        <h3> <i class="fas fa-map-marker-alt"></i>'. $row['Country']. '</h3>
                        <p> '. $row['Paragraph'] .'</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$' .$row['FinalPrice'].'.00 <span>$'.$row['NaturalPrice'].'.00 </span> </div>
                        <div class="btn bookTourBtn" onclick="bookNow('.$row['idPackage'].')">Book Now</div>
                        <a href="'. $row['url']. '" target="_blank" class="btn">See more</a>
                    </div>
                </div>';
                }
            }

        ?>

        

        <!-- <div class="box">
            <img src="images/site/p-japan.jpg" alt="">
            <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i> Japan</h3>
                <p> You'll see why we love it</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price">$80.00 <span>$110.00 </span> </div>
                <i class="btn bookTourBtn">Book Now</i>
                <a href="html/japan.html" target="_blank" class="btn">See more</a>
            </div>
        </div>

        <div class="box">
            <img src="images/site/p-jordan.jpg" alt="">
            <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i> Jordan</h3>
                <p> Land of Wonders</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price">$70.00 <span>$100.00 </span> </div>
                <i class="btn bookTourBtn">Book Now</i>
                <a href="html/jordan.html" target="_blank" class="btn">See more</a>
            </div>
        </div>

        <div class="box">
            <img src="images/Antarctica/main-pic.jpg" alt="">
            <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i> Antarctica</h3>
                <p> Awesome adventure</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price">$90.00 <span>$120.00 </span> </div>
                <i class="btn bookTourBtn">Book Now</i>
                <a href="html/Antarctica.html" target="_blank" class="btn">See more</a>
            </div>
        </div>

        <div class="box">
            <img src="images/site/p-tanzania.jpg" alt="">
            <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i> Tanzania</h3>
                <p> Safari season</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price">$50.00 <span>$90.00 </span> </div>
                <i class="btn bookTourBtn">Book Now</i>
                <a href="html/tanzania.html" target="_blank" class="btn">See more</a>
            </div>
        </div>

        <div class="box">
            <img src="images/site/p-france.jpeg" alt="">
            <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i> France</h3>
                <p> not a country, it's the world</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price">$100.00 <span>$140.00 </span> </div>
                <i class="btn bookTourBtn">Book Now</i>
                <a href="html/france.html" target="_blank" class="btn">See more</a>
            </div>
        </div> -->

    </div>

</section>

<!--packages section ends-->

<!-- services section starts-->
<section class="services" id="services">
    <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

      <!--
        <div class="box">
            <i class="fas fa-hotel"> </i>
            <h3> affordable hotels</h3>
        </div>

        <div class="box">
            <i class="fas fa-utensils"> </i>
            <h3> foods and drinks</h3>
        </div>

        <div class="box">
            <i class="fas fa-bullhorn"> </i>
            <h3> safety guide</h3>
        </div> -->

        <div class="box">
            <i class="fas fa-globe-asia"> </i>
            <h3> around the world</h3>
        </div>

        <div class="box">
            <i class="fas fa-plane"> </i>
            <h3> fastest travel</h3>
        </div>

        <div class="box">
            <i class="fas fa-hiking"> </i>
            <h3> adventure</h3>
        </div>

    </div>

</section>
<!-- services section ends-->

<!-- gallery section starts-->

<section class="gallery" id="gallery">
    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span> 
    </h1>
    <div class="box-container">
        <div class="box">
            <img src="images/site/g-rome.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> Rome</p>
                <a href="php/gallery.php?country=Rome" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-newyork.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> NewYork</p>
                <a href="php/gallery.php?country=NewYork" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-maldives.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> Maldives</p>
                <a href="php/gallery.php?country=Maldives" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-london.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> London</p>
                <a href="php/gallery.php?country=London" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-istanbul.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> Istanbul</p>
                <a href="php/gallery.php?country=Istanbul" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-hawaii.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> Hawaii</p>
                <a href="php/gallery.php?country=Hawaii" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-egypt.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> Egypt</p>
                <a href="php/gallery.php?country=Egypt" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-dubai.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> Dubai</p>
                <a href="php/gallery.php?country=Dubai" class="btn">see more</a>
             </div>
        </div>

        <div class="box">
            <img src="images/site/g-bali.jpg" targer="_blank" alt="">
            <div class="content">
                <h3> Amazing Places</h3>
                <p> Bali</p>
                <a href="php/gallery.php?country=Bali" class="btn">see more</a>
             </div>
        </div>


    </div>
</section>
<!-- gallery section ends-->

<!-- review section starts-->
<section class="review" id="review">
    <h1 class="heading">
        <span>r</span>
        <span>e</span>
        <span>v</span>
        <span>i</span>
        <span>e</span>
        <span>w</span>
    </h1>

    <div class="swiper mySwiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/site/r-1 (1).jpg" alt="">
                    <h3> Mohammed Ali</h3>
                    <p> Fun, educational, inspiring, adventurous and life-changing… just a few of the words I’d use to describe how incredible my experience was</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/site/r-1 (2).jpg" alt="">
                    <h3> Roz Smith</h3>
                    <p> Getting to Italy was a dream come true and it was such a treat to have the opportunity to explore it</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/site/r-1 (3).jpg" alt="">
                    <h3> Liam </h3>
                    <p>Thank you for a wonderful experience, thank you for all the planning and preparation </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

          <!--  <div class="swiper-slider">
                <div class="box">
                    <img src="site/r-1 (4).jpg" alt="">
                    <h3> Emma </h3>
                    <p> It was a wonderful experience</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>-->

        </div>
    </div>

</section>
<!-- review section ends-->

<!-- contact section starts-->

<section class="contact" id="contact">
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="images/site/contact.jpg" alt="">
        </div>

        <form action="">

            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>

            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="subject">
            </div>

            <textarea placeholder="message" name="" id=""  cols="30" rows="10"></textarea>
            <input type="submit" class="btn"  value="send message">
        </form>
    </div>
</section>
<!--contact section ends-->

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


   <script src = "./js/script.js"></script>
   <script src="./js/country.js"></script>
   <script src="./js/indexScript.js" async></script>
</body>
</html>
