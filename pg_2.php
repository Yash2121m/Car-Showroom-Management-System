<?php 
    require('connection.php');
    require('login_reg.php');

    $username=$_SESSION['username'];
    $getData=mysqli_query($con,"SELECT * FROM `users` WHERE `username`='$username'");
    
    $row=mysqli_fetch_assoc($getData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>CAR MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section class="profile_pg">
		
		<nav>
            <a href="pg_2.php"><img src='WbsiteLogo.gif'></a>
            <div class="nav-links_2" id="navLinks">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#about">ABOUT US</a></li>
                    <li><a href="#car">CAR TYPES<i style="margin-left: 10px;" class="fa fa-angle-down" aria-hidden="true"></i></a>
                    	<div class="user_profile">
                    		<ul>
                    			<li><a href="sedan.php">SEDAN</a></li>
                    			<li><a href="suv.php">SUV</a></li>
                                <li><a href="off_road_car.php">OFF-ROAD CAR</a></li>
                                <li><a href="luxury_car.php">LUXURY CAR</a></li>
                                <li><a href="sports_car.php">SPORTS CAR</a></li>
                    		</ul>
                    	</div>
                    </li>
                    <li><a href="#contact">CONTACT US</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>  
        </nav>

    </section>
<!------------------------------------------------------About us------------------------------------------------->

    <section class="abt" id="about">
        <h1 style="padding-top: 50px;">ABOUT US</h1>
        <div class="about_details">
            <div>
                <img src="about.jpg" alt="about">
            </div>
            <div>
                <p>We are a team of automotive enthusiasts, technology experts, and customer service professionals who came together to bridge the gap between traditional car buying and modern convenience. Our mission is to provide a seamless and enjoyable journey for both car dealerships and customers, offering a one-stop solution for all showroom management needs. Our platform brings innovation to the world of car dealerships by providing a range of powerful tools and features that enhance efficiency, streamline processes, and elevate customer satisfaction.Our intuitive interface is designed to empower car dealers to focus on what they do best connecting customers with their dream vehicles.</p>
            </div>
        </div>
    </section>

<!------------------------------------------------------Car Types---------------------------------------------->

    <section class="c_types" id="car">
        <h1 style="padding-top: 50px;">CAR TYPES</h1>
        <div class="car__container">
            <div class="car_types">
                <a style="text-decoration: none; color: black;" href="sedan.php">
                    <img src="sedan2.jpg" alt="sedan">
                    <h3>SEDAN</h3>
                </a>
            </div>
            <div class="car_types">
                <a style="text-decoration: none; color: black;" href="suv.php">
                    <img src="suv.jpg" alt="suv">
                    <h3>SUV</h3>
                </a>
            </div>
            <div class="car_types">
                <a style="text-decoration: none; color: black;" href="off_road_car.php">
                    <img src="exterior1.jpg" alt="electric car">
                    <h3>OFF-ROAD CAR</h3>
                </a>
            </div>
            <div class="car_types" style="margin-left: 400px;">
                <a style="text-decoration: none; color: black;" href="luxury_car.php">
                    <img src="Luxury_Cars81.jpg" alt="luxury car">
                    <h3>LUXURY CAR</h3>
                </a>
            </div>
            <div class="car_types">
                <a style="text-decoration: none; color: black;" href="sports_car.php">
                    <img src="sporty_car.jpg" alt="sports car">
                    <h3>SPORTS CAR</h3>
                </a>
            </div>
        </div>
    </section>

<!------------------------------------------------------Contact us--------------------------------------------->

    <section class="con" id="contact">
        <h1>CONTACT US</h1>
        <div class="con_form">
            <form class="form" method="POST" action="contact.php">
                <input type="text" placeholder="Name" name="name" required />
                <input type="email" placeholder="Email" name="email" required/>
                <textarea placeholder="Message" name="message" rows="15" cols="50" required></textarea> 
                <button type="submit" class="con_btn" name="contact">SUBMIT</button>
            </form>
        </div>
        <div class="add">
            <b>Address: </b><p>1/A Sham Complex, Mira Road </p>
            <i class="fa fa-linkedin" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </div>
    </section>


</body>
</html>