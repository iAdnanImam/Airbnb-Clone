<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background: #FFFCF8;
            color: #484848;
            margin: 0;
            padding-top: 80px;
            line-height: 1.6;
            transition: all 0.3s ease-in-out;
        }

        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #FF385C;
            padding: 15px 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease-in-out;
        }

        .navbar-custom.scrolled {
            background: #E12D50;
        }

        .navbar-logo {
            height: 50px;
            margin-left: 20px;
            border-radius: 8px;
        }

        .navbar-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-nav li {
            margin: 0 15px;
        }

        .navbar-nav li a {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            padding: 10px 15px;
            display: block;
        }

        .navbar-nav li a:hover {
            color: #FF385C;
            background: #fff;
            border-radius: 5px;
        }

        .navbar-icons {
            margin-right: 20px;
            display: flex;
        }

        .navbar-icons a img {
            width: 35px;
            height: 35px;
            transition: 0.3s;
            margin: 0 5px;
        }

        .navbar-icons a img:hover {
            transform: scale(1.2);
        }

        .navbar-nav .active a {
            color: white;
            border-bottom: 2px solid white;
        }

        .login-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .login-btn,
        .social-login {
            background: white;
            color: #FF385C;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .login-btn:hover,
        .social-login:hover {
            background: #fff;
            color: #FF385C;
            transform: scale(1.05);
        }

        .social-login {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social-login img {
            width: 20px;
            height: 20px;
        }

        .jumbotron {
            width: 85%;
            max-width: 1200px;
            height: 400px;
            background: #FF385C;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 80px auto;
            border-radius: 15px;
            text-align: center;
            padding: 40px;
            transition: all 0.3s ease-in-out;
        }

        .jumbotron:hover {
            transform: scale(1.02);
        }

        .search-container {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }

        .search-bar {
            width: 30vw;
            display: flex;
            background: white;
            padding: 10px 20px;
            border-radius: 30px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
            gap: 20px;
            align-items: center;
            transition: all 0.3s ease-in-out;
        }

        .search-bar:hover {
            transform: scale(1.05);
        }

        .search-bar input {
            border: none;
            outline: none;
            font-size: 18px;
            padding: 10px 15px;
            border-radius: 25px;
            width: 25vw;
            background: #F7F7F7;
        }

        .search-bar button {
            /* background-color: #ddd; */
            color: #ddd;
            background: #FF385C;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .search-bar button:hover {
            background: #E02749;
            transform: scale(1.1);
        }

        .listings {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .listing {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .listing:hover {
            transform: scale(1.05);
        }

        .image-container img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .details {
            padding: 15px;
            color: rgb(50, 42, 42);
        }

        .details h3 {
            margin: 0;
            font-size: 18px;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }

        .foot {
            margin: auto;
            margin-bottom: 100px;
            width: 80%;
            display: flex;
            justify-content: space-between;
            padding: 20px 0;
            border-top: 1px solid #ddd;
        }

        .footer-section h4 {
            margin-bottom: 10px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 5px;
            color: #717171;
        }

        .footer {
            width: 100vw;
            position: fixed;
            bottom:0;
            text-align: center;
            padding: 10px;
            background: #FF385C;
            color: white;
        }
        

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar-custom">
        <a href="index.php">
            <img src="images/airbnb_logo.png" class="navbar-logo" alt="Logo">
        </a>

        <ul class="navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="room.php">Room &amp; Facilities</a></li>
            <li><a href="reservation.php">Online Reservation</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>

        <div class="navbar-icons">
            <a href="https://www.instagram.com/airbnb/">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAg5JREFUSEvFlU+IjlEUxn+PP0lKJCkLGyQx/jRjaawsaRZDKTaWJoqFLKRkYaFEjZXtaFhMYiUbyUZsxiQpzWLKymzUUGJmHvfo/b7u3Hnf+r70NWf1vvec8zz3/L2ix6Ie47MyBLZ3AleAo8B+aLyIgY/AG+CepC9lRpZFYPtCGANru0zfH2BE0sPcbwmB7X7gHbCqS/CW+TwwIOlD66AkeAoMdQH+DegDTgGjld+EpOEmghlgRw3BV+A28AnYAuwBrgEzkvpsDwDvK79pSbuaCH4AGwqCl6mQw5LmbG8NnaRZ2/uAF8DPVLNNwLbKb07SxmUEtiPvCwX4LLAbCLCzwDEgOuc1MAasrjood5uX1G6Qdg1sx+HvguCOpKvp5g+A6K5cRiVdtP0cOJEpFiStqYsgDqPVcjkPPKtuHPOQy5Skg7ZvpKzdzBSLkiKyf5JHEN+LBcgI8Dil5hVwoNBNSjps+3pK1a1cJ6mNW7Zp5DeXMUnnbN8HLhW6mNzLtiPCk5muvgZhYLskiIgOAeuBM8BgBRRFHk+tu66myL8khf3SFFUEdW0aszEkaTKPwHbsqUjf9iKy75I2NxHEsmoPSV64NLETxaAdL4Bbv58l7W0ieJJATjc4dnr8SFLMTG2KjgBv/3PZ9UuaqiWo6tC7dd1iLR6c2JZNkj84d1NLT5eGK/NkdlrNTux6HsFfblmsGZDoHZYAAAAASUVORK5CYII=" alt="Instagram logo"/>
            </a>
            <a href="https://www.facebook.com/airbnb/">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPtJREFUSEvtlT1OgkEURc/tbHAFlMaKioLSYCFswB1gSaByA65AYq17sFUSbE2ooDIkVCRswMTyGsh85AOJIc6MsXD6d8/7mfueyPyUWZ/fBdgeAc3Iql4knRcaWxXYdqT4OlzSRjcGsEpmDixCUnWgkgowAS4lzYqKbb8CjRSAd+BU0rLczpSAZ0mtlbjtM+AmdYseJHUC4Bbo736M2CGXAXdANxXgGhgDS0lvoYIToBoAj8BxzJDbkp72+cT2EfCxMdcPffAdoAZMYwFFfLYZ/APWzjxkm/7tGRxycO4lXQWjDYDejjeGki72HpwUx+bL2sghWtbMfvQ/AXhNnBlwviRnAAAAAElFTkSuQmCC" alt="Facebook logo"/>
            </a>
            <a href="https://x.com/Airbnb?">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAbNJREFUSEvd1c2LjXEUB/DPF0WNrFgo8lKSQpIVS1KkvKSJpixYSPZE5A9gY0E2mpSNzSyUsrCRbEQRCysTJUpWUt7q5/7qXl137n1m7tRs5uye55zz/T7ne16emGPLHOObZwSllJEk35tkK6UswxUcwDr8xg1cxEocrM9JSsX5J1EpZSHeYDTJ60EkpZRH2N3H/wGrcTzJvY6/m2AtJvEFh5M87QUppWzHi4YKn+Mx7iZ52VvBEnzDojbAbVxO8qkDWEoZq8kNBFXes0nuTKmgviil1K/e2QPwBPfxDNtwvYFgPMnJbn+3REuxEQ+xfJb7cTXJuUEEq/AeX1tTsGKWBFWem4MIFuAd1swSvKZtSvK2L0G7B0daQXXEOo0ehmsyyfrehCmnopQyikvYMgw6ziS5NROC/XgwJHhdsg1Jfk1L0JaqzvGJGZL8wa4kdYynWN9rWkqpDd+MCzjWQFTvzakk44Ni+vVgBDtwHvsawH9gLMlEU6Xdi7YH17C1+wgOSK7LeLq1tVX7RvuvgvYpPopD2IvFLZl+4jM+ol7SiSSvpgPu+OfZH22mZQ8TN+cS/QWHhHkZrTvZMgAAAABJRU5ErkJggg==" alt="Twitter logo">
            </a>
        </div>
    </nav>
    <div class="search-container">
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Find your dream location" onkeyup="filterListings()">
            <button onclick="filterListings()"><img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAglJREFUSEu1lcurTWEYh58nMtBBUS4TIWHgFiUDR3GKUKYuxYAUhQFl4A8gEzodwoBCUv4AGSmETJASUUpkQA6R++W13qyjfS57r11n73e41rfe53svv9+SNodtzk9dQERMBTYBa4EF5UXuA1eAS+qrZi43CBARY4ELwPoGCQK4DGxTvzQC9QNExGjgLjAX+A6cBrrV55kkImYA+4AdwKjybKf6sx5kIOA8sAV4CaxWHw/1YUTMB64WF5gCHFX3VwIiYh7wEPhV9HmJmv2uGxGxHLgO/ACmq6+HOvy/gojoAXYDx9U9zQwwIi4CmwvIQfVwFeAZMDP7rz5qErACuAbcVLOiQVFbwWcghzxC/dMkYDzwDuhVJ1QBPgJjgA41YZURER3AJ+CtOrEK8KAU1GL1XmX2f2u7tNi2O9kmtasKcAQ4AJxSdzUJOAdsBXrUvVWAWcAT4HeTa9oJ3CiT1q16oNDOpPyBF8Aq9WkdoS0shTYp1a7urBRaaQW1VvENOAkcU1PZ2fOsMq1iOzCyTJozSNXnsOuvad+biBgHpIDWNZjDh8KLDhUt3QgsAlL1K9V83i8a2fW0UqVrgPSer4XD5nbdBk6o7yMidZBCSzvPLewqht1bSxj2D6eE3ALmAOkGy9Q3fZBhA8rZpMhyo2bnfNSzLQWUkMnABrW7pS2qEmRLWtQI0nbAX/OZthnpLYPRAAAAAElFTkSuQmCC" />
            </button>
        </div>
    </div>
    <div class="listings" id="listings-container">
    <div class="listing" data-location="udaipur">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/udaipur.jpg" alt="Udaipur Lake View">
                </div>
                <div class="details">
                    <h3>Udaipur, India</h3>
                    <p>Luxury Lake View Resort</p>
                    <p>Starts at: ₹12,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="manali">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/manali.jpg" alt="Manali Cottage">
                </div>
                <div class="details">
                    <h3>Manali, India</h3>
                    <p>Cozy Wooden Cottage</p>
                    <p>Starts at: ₹5,800/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="goa">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/goa.jpg" alt="Goa Beach House">
                </div>
                <div class="details">
                    <h3>Goa, India</h3>
                    <p>Beachfront Villa</p>
                    <p>Starts at: ₹9,999/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="alleppey">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kerala.jpg" alt="Kerala Backwater Houseboat">
                </div>
                <div class="details">
                    <h3>Alleppey, India</h3>
                    <p>Backwater Houseboat</p>
                    <p>Starts at: ₹7,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="rishikesh">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/rishikesh.jpg" alt="Rishikesh Riverside Cottage">
                </div>
                <div class="details">
                    <h3>Rishikesh, India</h3>
                    <p>Riverside Cottage</p>
                    <p>Starts at: ₹6,000/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="jaipur">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/jaipur.jpg" alt="Jaipur Heritage Haveli">
                </div>
                <div class="details">
                    <h3>Jaipur, India</h3>
                    <p>Heritage Haveli</p>
                    <p>Starts at: ₹8,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="shimla">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/shimla.jpg" alt="Shimla Hilltop Cabin">
                </div>
                <div class="details">
                    <h3>Shimla, India</h3>
                    <p>Hilltop Wooden Cabin</p>
                    <p>Starts at: ₹7,200/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="mumbai">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/mumbai.jpg" alt="Mumbai Skyline Apartment">
                </div>
                <div class="details">
                    <h3>Mumbai, India</h3>
                    <p>Luxury Skyline Apartment</p>
                    <p>Starts at: ₹15,000/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="darjeeling">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/darjeeling.jpg" alt="Darjeeling Tea Estate Bungalow">
                </div>
                <div class="details">
                    <h3>Darjeeling, India</h3>
                    <p>Tea Estate Bungalow</p>
                    <p>Starts at: ₹6,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="pondicherry">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/pondicherry.jpg" alt="Pondicherry French Villa">
                </div>
                <div class="details">
                    <h3>Pondicherry, India</h3>
                    <p>French Heritage Villa</p>
                    <p>Starts at: ₹9,200/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="kodaikanal">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kodaikanal.jpg" alt="Kodaikanal Mountain Retreat">
                </div>
                <div class="details">
                    <h3>Kodaikanal, India</h3>
                    <p>Mountain Retreat</p>
                    <p>Starts at: ₹7,800/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="andaman">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/andaman.jpg" alt="Andaman Beachfront Cottage">
                </div>
                <div class="details">
                    <h3>Andaman and Nicobar Islands, India</h3>
                    <p>Beachfront Wooden Cottage</p>
                    <p>Starts at: ₹11,000/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="nainital">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/nainital.jpg" alt="Nainital Lakeview Bungalow">
                </div>
                <div class="details">
                    <h3>Nainital, India</h3>
                    <p>Lakeview Bungalow</p>
                    <p>₹8,400/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="jaisalmer">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/jaisalmer.jpg" alt="Jaisalmer Desert Camp">
                </div>
                <div class="details">
                    <h3>Jaisalmer, India</h3>
                    <p>Luxury Desert Camp</p>
                    <p>₹10,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="mountabu">
            <a href="room.php">
                <div class="image-container">
                        <img src="images/mountabu.jpg" alt="Mount Abu Hill Retreat">
                </div>
                <div class="details">
                    <h3>Mount Abu, India</h3>
                    <p>Scenic Hill Retreat</p>
                    <p>₹6,900/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="munnar">
            <a href="room.php">
                <div class="image-container">
                        <img src="images/munnar.jpg" alt="Munnar Tea Garden Villa">
                </div>
                <div class="details">
                    <h3>Munnar, India</h3>
                    <p>Tea Garden View Villa</p>
                    <p>₹7,400/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="leh-ladakh">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/leh.jpg" alt="Leh Ladakh Eco Resort">
                </div>
                <div class="details">
                    <h3>Leh-Ladakh, India</h3>
                    <p>Eco-Friendly Mountain Resort</p>
                    <p>Starts at: ₹12,000/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="ooty">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/ooty.jpg" alt="Ooty Colonial Bungalow">
                </div>
                <div class="details">
                    <h3>Ooty, India</h3>
                    <p>Colonial Heritage Bungalow</p>
                    <p>Starts at: ₹9,800/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="srinagar">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kashmir.jpg" alt="Kashmir Houseboat">
                </div>
                <div class="details">
                    <h3>Srinagar, India</h3>
                    <p>Luxury Dal Lake Houseboat</p>
                    <p>Starts at: ₹10,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="mahabaleshwar">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/mahabaleshwar.jpg" alt="Mahabaleshwar Cliffside Retreat">
                </div>
                <div class="details">
                    <h3>Mahabaleshwar, India</h3>
                    <p>Cliffside Retreat with Valley View</p>
                    <p>Starts at: ₹7,900/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="rann-of-kutch">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/rann.jpg" alt="Rann of Kutch Desert Resort">
                </div>
                <div class="details">
                    <h3>Rann of Kutch, India</h3>
                    <p>Traditional Desert Bhunga</p>
                    <p>Starts at: ₹8,600/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="kolkata">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kolkata.jpg" alt="Kolkata Heritage Apartment">
                </div>
                <div class="details">
                    <h3>Kolkata, India</h3>
                    <p>Vintage Heritage Apartment</p>
                    <p>Starts at: ₹6,300/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="spiti-valley">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/spiti.jpg" alt="Spiti Valley Monastery Stay">
                </div>
                <div class="details">
                    <h3>Spiti Valley, India</h3>
                    <p>Traditional Monastery Stay</p>
                    <p>Starts at: ₹9,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="andaman-overwater">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/nicobar.jpg" alt="Andaman Overwater Villa">
                </div>
                <div class="details">
                    <h3>Andaman and Nicobar Islands, India</h3>
                    <p>Luxury Overwater Villa</p>
                    <p>Starts at: ₹15,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="chennai">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/chennai.jpg" alt="Chennai Beach House">
                </div>
                <div class="details">
                    <h3>Chennai, India</h3>
                    <p>Luxury Beach House</p>
                    <p>Starts at: ₹13,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="udaipur">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/udaipur_palace.jpg" alt="Udaipur Palace View Suite">
                </div>
                <div class="details">
                    <h3>Udaipur, India</h3>
                    <p>Royal Palace View Suite</p>
                    <p>Starts at: ₹14,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="manali">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/manali_ski.jpg" alt="Manali Ski Resort">
                </div>
                <div class="details">
                    <h3>Manali, India</h3>
                    <p>Luxury Ski Resort</p>
                    <p>Starts at: ₹9,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="delhi">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/delhi-luxury-apartment.jpg" alt="Delhi Luxury Apartment">
                </div>
                <div class="details">
                    <h3>Delhi, India</h3>
                    <p>High-Rise Luxury Apartment with City View</p>
                    <p>Starts at: ₹13,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="kanyakumari">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kanyakumari-beach-resort.jpg" alt="Kanyakumari Beachfront Resort">
                </div>
                <div class="details">
                    <h3>Kanyakumari, India</h3>
                    <p>Beachfront Resort with Private Balcony</p>
                    <p>Starts at: ₹9,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="kolkata">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kolkata-vintage-villa.jpg" alt="Kolkata Vintage Villa">
                </div>
                <div class="details">
                    <h3>Kolkata, India</h3>
                    <p>Colonial Vintage Villa in Old Town</p>
                    <p>Starts at: ₹7,800/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="rann-of-kutch">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/rann-luxury-tent.jpg" alt="Rann of Kutch Luxury Tent">
                </div>
                <div class="details">
                    <h3>Rann of Kutch, India</h3>
                    <p>Luxury Tent Stay in the White Desert</p>
                    <p>Starts at: ₹10,000/night</p>
                </div>
            </a>
        </div>


        <div class="listing" data-location="goa">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/goa_villa.jpg" alt="Goa Private Pool Villa">
                </div>
                <div class="details">
                    <h3>Goa, India</h3>
                    <p>Private Pool Villa</p>
                    <p>Starts at: ₹12,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="shimla">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/shimla_heritage.jpg" alt="Shimla Colonial Lodge">
                </div>
                <div class="details">
                    <h3>Shimla, India</h3>
                    <p>Heritage Colonial Lodge</p>
                    <p>Starts at: ₹8,700/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="darjeeling">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/darjeeling_luxury.jpg" alt="Darjeeling Luxury Cottage">
                </div>
                <div class="details">
                    <h3>Darjeeling, India</h3>
                    <p>Luxury Tea Garden Cottage</p>
                    <p>Starts at: ₹7,800/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="rishikesh">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/rishikesh_glamping.jpg" alt="Rishikesh Riverside Glamping">
                </div>
                <div class="details">
                    <h3>Rishikesh, India</h3>
                    <p>Riverside Glamping Retreat</p>
                    <p>Starts at: ₹6,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="mumbai">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/mumbai_penthouse.jpg" alt="Mumbai Sea View Penthouse">
                </div>
                <div class="details">
                    <h3>Mumbai, India</h3>
                    <p>Luxury Sea View Penthouse</p>
                    <p>Starts at: ₹18,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="coorg">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/coorg_coffee.jpg" alt="Coorg Coffee Estate Bungalow">
                </div>
                <div class="details">
                    <h3>Coorg, India</h3>
                    <p>Luxury Coffee Estate Bungalow</p>
                    <p>Starts at: ₹16,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="pondicherry">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/pondicherry_cottage.jpg" alt="Pondicherry Seaside Cottage">
                </div>
                <div class="details">
                    <h3>Pondicherry, India</h3>
                    <p>Seaside Heritage Cottage</p>
                    <p>Starts at: ₹9,800/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="leh-ladakh">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/leh_ladakh_camp.jpg" alt="Leh Ladakh Adventure Camp">
                </div>
                <div class="details">
                    <h3>Leh-Ladakh, India</h3>
                    <p>Mountain Adventure Camp</p>
                    <p>Starts at: ₹13,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="kodaikanal">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kodaikanal_farm.jpg" alt="Kodaikanal Organic Farmstay">
                </div>
                <div class="details">
                    <h3>Kodaikanal, India</h3>
                    <p>Organic Farm Retreat</p>
                    <p>Starts at: ₹8,200/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="andaman">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/nicobar_glass.jpg" alt="Andaman Glass House Villa">
                </div>
                <div class="details">
                    <h3>Andaman and Nicobar Islands, India</h3>
                    <p>Glass House Overlooking Ocean</p>
                    <p>Starts at: ₹14,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="nainital">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/nainital_log.jpg" alt="Nainital Log Cabin">
                </div>
                <div class="details">
                    <h3>Nainital, India</h3>
                    <p>Cozy Log Cabin by the Lake</p>
                    <p>Starts at: ₹7,600/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="jaisalmer">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/jaisalmer_palace.jpg" alt="Jaisalmer Boutique Haveli">
                </div>
                <div class="details">
                    <h3>Jaisalmer, India</h3>
                    <p>Traditional Boutique Haveli</p>
                    <p>Starts at: ₹9,900/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="munnar">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/munnar_mountain.jpg" alt="Munnar Luxury Tea Resort">
                </div>
                <div class="details">
                    <h3>Munnar, India</h3>
                    <p>Luxury Tea Resort</p>
                    <p>Starts at: ₹10,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="spiti-valley">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/spiti_lodge.jpg" alt="Spiti Valley Adventure Lodge">
                </div>
                <div class="details">
                    <h3>Spiti Valley, India</h3>
                    <p>Mountain Adventure Lodge</p>
                    <p>Starts at: ₹9,200/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="chennai">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/chennai_skyline.jpg" alt="Chennai High-Rise Suite">
                </div>
                <div class="details">
                    <h3>Chennai, India</h3>
                    <p>Luxury High-Rise Suite</p>
                    <p>Starts at: ₹12,500/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="gokarna">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/gokarna.jpg" alt="Gokarna Cliffside Beach Shack">
                </div>
                <div class="details">
                    <h3>Gokarna, India</h3>
                    <p>Cliffside Beach Shack</p>
                    <p>Starts at: ₹6,700/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="bhimtal">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/bhimtal.jpg" alt="Bhimtal Lakeview Glasshouse">
                </div>
                <div class="details">
                    <h3>Bhimtal, India</h3>
                    <p>Lakeview Glasshouse</p>
                    <p>Starts at: ₹9,200/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="kanatal">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kanatal.jpg" alt="Kanatal Himalayan Dome Stay">
                </div>
                <div class="details">
                    <h3>Kanatal, India</h3>
                    <p>Himalayan Dome Stay</p>
                    <p>Starts at: ₹7,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="chopta">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/chopta.jpg" alt="Chopta Eco-Friendly Cabin">
                </div>
                <div class="details">
                    <h3>Chopta, India</h3>
                    <p>Eco-Friendly Mountain Cabin</p>
                    <p>Starts at: ₹8,400/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="zanskar">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/zanskar.jpg" alt="Zanskar River Camp">
                </div>
                <div class="details">
                    <h3>Zanskar, India</h3>
                    <p>Riverside Adventure Camp</p>
                    <p>Starts at: ₹6,900/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="kargil">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kargil.jpg" alt="Kargil Mountain Retreat">
                </div>
                <div class="details">
                    <h3>Kargil, India</h3>
                    <p>Scenic Mountain Retreat</p>
                    <p>Starts at: ₹7,800/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="pali">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/pali.jpg" alt="Pali Royal Heritage Haveli">
                </div>
                <div class="details">
                    <h3>Pali, India</h3>
                    <p>Royal Heritage Haveli</p>
                    <p>Starts at: ₹9,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="gangtok">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/gangtok.jpg" alt="Gangtok Valley View Penthouse">
                </div>
                <div class="details">
                    <h3>Gangtok, India</h3>
                    <p>Valley View Penthouse</p>
                    <p>Starts at: ₹10,200/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="madurai">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/madurai.jpg" alt="Madurai Heritage Mansion">
                </div>
                <div class="details">
                    <h3>Madurai, India</h3>
                    <p>Traditional Heritage Mansion</p>
                    <p>Starts at: ₹8,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="lavasa">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/lavasa.jpg" alt="Lavasa Lakefront Studio">
                </div>
                <div class="details">
                    <h3>Lavasa, India</h3>
                    <p>Lakefront Modern Studio</p>
                    <p>Starts at: ₹7,400/night</p>
                </div>
            </a>
        </div>
        <div class="listing" data-location="goa">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/goa-bamboo-cottage.jpg" alt="Goa Bamboo Beach Cottage">
                </div>
                <div class="details">
                    <h3>Goa, India</h3>
                    <p>Secluded Bamboo Beach Cottage</p>
                    <p>Starts at: ₹8,200/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="goa">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/goa-treehouse.jpg" alt="Goa Beach Treehouse">
                </div>
                <div class="details">
                    <h3>Goa, India</h3>
                    <p>Beachfront Treehouse</p>
                    <p>Starts at: ₹9,500/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="delhi">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/delhi.jpg" alt="Delhi Urban Loft">
                </div>
                <div class="details">
                    <h3>Delhi, India</h3>
                    <p>Modern Urban Loft in Central Delhi</p>
                    <p>Starts at: ₹12,000/night</p>
                </div>
            </a>
        </div>

        <div class="listing" data-location="kanyakumari">
            <a href="room.php">
                <div class="image-container">
                    <img src="images/kanyakumari.jpg" alt="Kanyakumari Ocean View Cottage">
                </div>
                <div class="details">
                    <h3>Kanyakumari, India</h3>
                    <p>Ocean View Cottage with Sunrise Deck</p>
                    <p>Starts at: ₹7,800/night</p>
                </div>
            </a>
        </div>


        </div>
    </div>

    <div class="foot">
        <div class="footer-section">
            <h4>Support</h4>
            <ul>
                <li>Help Centre</li>
                <li>AirCover</li>
                <li>Anti-discrimination</li>
                <li>Disability support</li>
                <li>Cancellation options</li>
                <li>Report neighbourhood concern</li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Hosting</h4>
            <ul>
                <li>Airbnb your home</li>
                <li>AirCover for Hosts</li>
                <li>Hosting resources</li>
                <li>Community forum</li>
                <li>Hosting responsibly</li>
                <li>Join a free Hosting class</li>
                <li>Find a co-host</li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Airbnb</h4>
            <ul>
                <li>Newsroom</li>
                <li>New features</li>
                <li>Careers</li>
                <li>Investors</li>
                <li>Airbnb.org emergency stays</li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <p>Developed by:<br>Ananya Singh(2205790) | Adnan Imam(22051225) | Krishna Agrawal(22051258) | Shrestha Srivastava(22051281)</p>
    </div>

    <script>
        function filterListings() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const listings = document.querySelectorAll('.listing');

            listings.forEach(listing => {
                const location = listing.getAttribute('data-location').toLowerCase();
                listing.style.display = location.includes(searchInput) ? "block" : "none";
            });
        }
    </script>
</body>
</html>