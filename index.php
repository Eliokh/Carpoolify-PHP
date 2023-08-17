<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['userID']) || ($_SESSION['userID'] == '')) {
    header("Location: ./login pages/login.html");
    exit();
} 

// Karim
if (isset($_GET['postride'])){
  if ($_GET['postride'] == "success"){
    echo "<script>alert('Ride was posted successfully');</script>";
  }
  else
  {
    echo "<script>alert('Something went wrong');</script>";
  }
}
// end
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Campus Ride</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link rel="icon" type="image/png" href="/Uni-project/assets/img/carpoolify white.ico" />

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon" /> -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <!-- all links added manually -->

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- JQuery -->
    <script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script>

    <!-- Select2 -->
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   -->
   <link rel="shortcut icon" type="image/x-icon" href="/Uni-project/assets/img/carpoolify white.ico">

  </head>

  <body>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
      <div
        class="container d-flex justify-content-center justify-content-md-between"
      >
        <div class="contact-info d-flex align-items-center">
          <i
            class="bi bi-envelope d-flex align-items-center"
            style="margin-right: 50px"
            ><a href="mailto:elio.khawand@st.ul.edu.lb"
              >elio.khawand@st.ul.edu.lb</a
            ></i
          >
          <i
            class="bi bi-envelope d-flex align-items-center"
            style="margin-right: 50px"
            ><a href="mailto:karim.yazbek@st.ul.edu.lb"
              >karim.yazbek@st.ul.edu.lb</a
            ></i
          >
          <i
            class="bi bi-envelope d-flex align-items-center"
            style="margin-right: 50px"
            ><a href="mailto:george.haddad.6@st.ul.edu.lb"
              >george.haddad.6@st.ul.edu.lb</a
            ></i
          >
        </div>
      </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo">
          <a href="index.html">CARPOOLIFY<span>.</span></a>
        </h1>
        <!-- HERE FOR LATER TO ADD AN IMAGE LOGO -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#drive">Passenger</a></li>
            <li><a class="nav-link scrollto" href="#ride">Driver</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li>
              <a class="nav-link scrollto" href="#contact">Contact</a>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        <div class="header-cta">
          <a href="login pages/login.html" class="btn btn-outline-primary">Login</a>
          <a href="login pages/signup.html" class="btn btn-primary">Sign Up</a>
          <a href="login pages/logout.php" onclick="return confirm('Are you sure you want to log out?');" class="btn btn-outline-primary">Logout</a>

        </div>
      </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Experience Effortless Rides with <span>CARPOOLIFY</span></h1>
        <h2>
          We are university students helping each other to reach our
          destination.
        </h2>
        <div class="d-flex">

        <div class="row justify-content-center my-4">
  <div class="col-md-6 col-lg-4 col-sm-12 mb-3 mb-md-0">
    <a href="./login pages/myReviews.php" class="btn btn-primary btn-lg btn-block">My Reviews</a>
  </div>
  <div class="col-md-6 col-lg-4 col-sm-12">
    <a href="#ride" class="btn btn-primary btn-lg btn-block">Publish a ride</a>
  </div>
</div>



          <a
            href="https://youtu.be/61FtkopDfjc"
            class="glightbox btn-watch-video"
            ><i class="bi bi-play-circle"></i><span>Watch Video</span></a
          >

        </div>

        <!-- SEARCH BAR -->
        <form method="POST" action="./login pages/searchRide.php">

        <div class="row search-bar">
          <input
            class="col-lg-3 col-6 source-location-select"
            type="text"
            name="src"
            placeholder="Pick-up Location"
            spellcheck="false"
            required
          />
          <input
            class="col-lg-3 col-6 destination-select"
            type="text"
            name="dest"
            placeholder="Destination"
            spellcheck="false"
            required
          
          />
          <input
            class="col-lg-2 col-4 date-input"
            type="date"
            value="2023-03-23"
            name="date"
            required
          />
          <input
            class="col-lg-2 col-4 nb-passengers-input"
            type="number"
            name="nbPassengers"
            placeholder="Passengers"
            required
          />
          <input
            class="col-lg-2 col-4 search-btn"
            id="search-btn"
            type="submit" 
            value="Find a Ride"
          />
        </div>

        <!-- <ul class="search-list search-list-source">
          <li data-name="beirut">Beirut</li>
          <li data-name="jdeideh">Jdeideh</li>
          <li data-name="tripoli">Tripoli</li>
          <li data-name="saida">Saida</li>
          <li data-name="fanar">Fanar</li>
          <li data-name="zalka">Zalka</li>
          <li data-name="burj hammoud">Burj Hammoud</li>
          <li data-name="zouk">Zouk</li>
          <li data-name="jounieh">Jounieh</li>
          <li data-name="dbayeh">Dbayeh</li>
          <li data-name="byblos">Byblos</li>
          <li data-name="dora">Dora</li>
          <li data-name="dekwaneh">Dekwaneh</li>
          <li data-name="lebanese university">Lebanese University</li>
        </ul> -->

        <ul class="search-list search-list-source">
        <?php include 'locationList.php'; ?>
        </ul>

        <ul class="search-list search-list-destination">
        <?php include 'locationList.php'; ?>
        </ul>
        </div>
</form>
        <!-- END SEARCH BAR -->
    </section>
    <!-- End Hero -->

    <main id="main">
      <!-- ======= Featured Services Section ======= -->
      <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4 class="title"><a href="#about">Why CARPOOLIFY</a></h4>
                <p class="description">
                  So, why use CARPOOLIFY? Well, first of all, it's free! No more
                  spending money on gas or public transportation, CARPOOLIFY
                  connects you with other university students who are heading to
                  the same destination, so you can carpool together.
                </p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4 class="title"><a href="">Why CARPOOLING?</a></h4>
                <p class="description">
                  Not only is it cost-effective, but it's also eco-friendly. By
                  carpooling, you're reducing the number of cars on the road,
                  which helps lower carbon emissions and makes a positive impact
                  on the environment.
                </p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4 class="title"><a href="">Save Time!</a></h4>
                <p class="description">
                  CARPOOLIFY is also convenient and flexible. You can use the
                  app to find carpools for your daily commute to university, or
                  for weekend trips and special events. It's a great way to save
                  time and avoid the hassle of finding parking on campus.
                </p>
              </div>
            </div>

            <div
              class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0"
            >
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="">Sharing!</a></h4>
                <p class="description">
                  Another great feature of CARPOOLIFY is that it allows you to
                  connect with other university students and make new friends,
                  and have someone to talk to on the way to campus. Gas costs
                  can be shared if only the rider volunteer, it is always an
                  option.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Featured Services Section -->

      <!-- ======= About Section ======= -->
      <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>About</h2>
            <h3>
              Discover The University Drivers And Riders Of <span>Today</span>
            </h3>
            <p>
              CARPOOLIFY is a free, eco-friendly, convenient, and social app for
              university students. Give it a try today and start saving money
              and making new friends!
            </p>
          </div>

          <div class="row">
          <div class="col-lg-6 d-flex align-items-center justify-content-center" 
          data-aos="fade-right" data-aos-delay="100">
  <div style="position:relative; text-align:center;">
    <img src="assets/img/car.jpg" class="img-fluid" alt="" style="max-width: 60%" />
    <h4 style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); 
    font-size: 4rem; font-weight: bold; color: #ffffff; text-shadow: 2px 2px #000000">
    A quick pic of our delighted and trendsetting students</h4>
  </div>
</div>

            <div
              class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <h3>
              CARPOOLIFY is a free carpool app exclusively for university students, 
              providing them with a convenient and cost-effective mode of transportation.
              </h3>
              <p class="fst-italic">
              The app allows users to easily connect with fellow students who are also commuting to the same destination,
               thereby reducing traffic congestion and carbon footprint.
              </p>
              <ul>
                <li>
                  <i class="bx bx-store-alt"></i>
                  <div>
                    <h5>Using CARPOOLIFY is hassle-free and straightforward.</h5>
                    <p>
                    Students simply need to sign up with their university email address and input their travel details,
                     including pickup and drop-off locations and time preferences.
                    </p>
                  </div>
                </li>
                <li>
                  <i class="bx bx-images"></i>
                  <div>
                    <h5>Joining CARPOOLIFY is a great way for university students to 
                      socialize and build a sense of community.</h5>
                    <p>
                
                    </p>
                  </div>
                </li>
              </ul>
              <p>
              In conclusion, CARPOOLIFY is the perfect carpool app for university students who want to save money,
               reduce their carbon footprint, and build a sense of community.
                With its user-friendly interface and mission to promote sustainable transportation, 
                CARPOOLIFY is a must-have app for any student looking for an affordable and eco-friendly 
                way to commute to university.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- End About Section -->

      <!-- ======= Skills Section ======= -->
      <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">
          <div class="row skills-content">
            <div class="col-lg-6">
              <div class="progress">
                <span class="skill">Carpool safety <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    aria-valuenow="100"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill"
                  >Carpool network <i class="val">90%</i></span
                >
                <div class="progress-bar-wrap">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    aria-valuenow="90"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Route-planning <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    aria-valuenow="75"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="progress">
                <span class="skill">Eco-friendly <i class="val">80%</i></span>
                <div class="progress-bar-wrap">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    aria-valuenow="80"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill"
                  >Carpool service <i class="val">90%</i></span
                >
                <div class="progress-bar-wrap">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    aria-valuenow="90"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Carpool matching <i class="val">55%</i></span>
                <div class="progress-bar-wrap">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    aria-valuenow="55"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Skills Section -->

      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="232"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>Happy Users</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                <i class="bi bi-journal-richtext"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="521"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>Rides Published Per Week</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-headset"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="1463"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>High Rates</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-people"></i>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="15"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p>Low Rates</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Counts Section -->

      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients section-bg">
        <div class="container" data-aos="zoom-in">
          <div class="row">
            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-1.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-2.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-3.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-4.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-5.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-6.png"
                class="img-fluid"
                alt=""
              />
            </div>
          </div>
        </div>
      </section>
      <!-- End Clients Section -->

      <!-- ======= Services Section ======= -->
      <section id="drive" class="services">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Welcome Passengers</h2>
            <h3>Check All <span>the rides</span></h3>
            <p>
            Students can get to know their peers and share their travel experiences while helping each other out.
             CARPOOLIFY is not only a transportation app but also a platform for students to connect and make new friends.
            </p>
          </div>

          <div class="row">
            
              

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4><a href="">JOIN THE COMMUNITY</a></h4>
                <p>
                CARPOOLIFY is not only a transportation app but also a platform for students to
                 connect and make new friends.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="zoom-in"
              data-aos-delay="200"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-slideshow"></i></div>
                <h4><a href="">CARPOOLIFY is a must-have app</a></h4>
                <p>
                CARPOOLIFY is the perfect carpool app for university students who want to save money,
                reduce their carbon footprint, and build a sense of community. 
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="zoom-in"
              data-aos-delay="300"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-arch"></i></div>
                <h4><a href="">What It Allows</a></h4>
                <p>
                The app allows users to easily connect with fellow students who are also commuting to the same destination,
                 thereby reducing traffic congestion and carbon footprint.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Services Section -->



      <!-- ======= Passenegr Section ======= -->
      <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">
          <!-- SEARCH BAR -->
          <form method="POST" action="./login pages/searchRide.php">

<div class="row search-bar">
  <input
    class="col-lg-3 col-6 source-location-select"
    type="text"
    name="src"
    placeholder="Pick-up Location"
    spellcheck="false"
    required
  />
  <input
    class="col-lg-3 col-6 destination-select"
    type="text"
    name="dest"
    placeholder="Destination"
    spellcheck="false"
    required
  />
  <input
    class="col-lg-2 col-4 date-input"
    type="date"
    value="2023-03-23"
    name="date"
    required
  />
  <input
    class="col-lg-2 col-4 nb-passengers-input"
    type="number"
    name="nbPassengers"
    placeholder="Passengers"
    required
  />
  <input
    class="col-lg-2 col-4 search-btn"
    id="search-btn"
    type="submit" 
    value="Find a Ride"
  />
</div>

<ul class="search-list search-list-source">
<?php include 'locationList.php'; ?>
</ul>

<ul class="search-list search-list-destination">
<?php include 'locationList.php'; ?>
</ul>
</div>
</form>
<!-- END SEARCH BAR -->
        </div>
      </section>
      <!-- End passenger Section -->



      <!-- ======= Driver Section ======= -->
      <section id="ride" class="portfolio">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Post Your Ride!</h2>
            <h3>Posting a ride is <span>important!</span></h3>
            <p>
            Post a ride with CARPOOLIFY and help make a positive impact on the environment by reducing traffic 
            congestion and promoting sustainable transportation. Plus, by offering a ride, you can earn extra 
            money and help fellow students who may not have transportation options. It's quick and easy to post
            a ride in our app, and you'll be helping to create a more connected and sustainable community on campus. 
            Join the CARPOOLIFY community today and start making a difference!
            </p>
          </div>

          <form action="./login pages/postRide.php" method="post">
  <div class="form-group">
    <label for="source">Source</label>
    <input type="text" class="form-control" id="source" name="source" required>
  </div>
  <div class="form-group">
    <label for="destination">Destination</label>
    <input type="text" class="form-control" id="destination" name="destination" required>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" required>
  </div>
  <div class="form-group">
    <label for="time">Time</label>
    <input type="time" class="form-control" id="time" name="time" required>
  </div>
  <div class="form-group">
    <label for="seats">Available seats</label>
    <input type="number" class="form-control" id="seats" name="seats" min="1" max="10" required>
  </div>
  <div class="form-group">
    <label for="notes">Notes (optional)</label>
    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
  </div>
  <input type="hidden" name="userId" value="<?php echo $_SESSION['userID']; ?>">
  <div class="form-group mt-3">
    <button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="submit">Post Ride</button>
  </div>
</form>



  
        
        </div>
      </section>
      <!-- End driver Section -->


      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Team</h2>
            <h3>Our Hardworking <span>Team</span></h3>
            <p>
            We are three partners working hard to bring you the best service possible.
            </p>
          </div>

          <div class="row">

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div class="member">
                <div class="member-img">
                  <img
                    src="assets/img/team/franceSuit.jpg"
                    class="img-fluid"
                    alt=""
                  />
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Elio Khawand</h4>
                  <span> I enjoy using mathematical concepts to tackle complex problems,
                     draw meaningful conclusions from data, and gain new insights that can inform decision-making.</span>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="member">
                <div class="member-img">
                  <img
                    src="assets/img/team/George.jpeg"
                    class="img-fluid"
                    alt=""
                  />
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>George Haddad</h4>
                  <span>As someone who loves full stack and software development,
                     I have a talent for creating intuitive and efficient applications
                      by seamlessly integrating front-end and back-end functionality.</span>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="member">
                <div class="member-img">
                  <img
                    src="assets/img/team/Karim (2).jpeg"
                    class="img-fluid"
                    alt=""
                  />
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Karim Yazbeck</h4>
                  <span>As a CEO with a passion for AI, I strive to leverage the power of artificial intelligence 
                    to drive innovation and create impactful solutions that
                     revolutionize the way businesses operate.</span>
                </div>
              </div>
            </div>

           
          </div>
        </div>
      </section>
      <!-- End Team Section -->

     

     

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Contact</h2>
            <h3><span>Contact Us</span></h3>
            <p>
            Our dedicated team of professionals is available to assist you with anything you need, 
            from answering questions about admissions to providing academic advising. We also have
             various online resources, such as our website and online chat, to make it easy for you to reach us.
              Contact us today to learn more about how we can support you in achieving your goals.
            </p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
                <i class="bx bx-map"></i>
                <h3>Our Uni Address</h3>
                <p>VHH9+P3J Lebanese University - Faculty Of Sciences II</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box mb-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>lebanese.university@ul.edu.lb</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box mb-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>01 680 248</p>
              </div>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <iframe
                class="mb-4 mb-lg-0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.3999453011056!2d35.565451750986725!3d33.87935213417343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f3d87d88611ed%3A0x2850906ca23046bb!2sLebanese%20University%20-%20Faculty%20Of%20Sciences%20II!5e0!3m2!1sen!2slb!4v1677281820036!5m2!1sen!2slb"
                frameborder="0"
                style="border: 0; width: 100%; height: 384px"
                allowfullscreen>
              </iframe>
            </div>

            <div class="col-lg-6">
              <form
                action="./login pages/contact.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row">
                  <div class="col form-group">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required
                    />
                  </div>
                  <div class="col form-group">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    required
                  />
                </div>
                <div class="form-group">
                  <textarea
                    class="form-control"
                    name="message"
                    rows="5"
                    placeholder="Message"
                    required
                  ></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Your message has been sent. Thank you!
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-newsletter">
        <div class="container">
          


     
     
      <div class="container py-4">
        <div class="copyright">
          &copy; it took us a long <strong><span>TIME</span></strong
          >. to complete it.
        </div>
        <div class="credits bg-light p-1">
    Check this link to see All your RIDES <a href="./login pages/displayRides.php">All My Rides</a>
</div>

      </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
      $(document).ready(function () {
        $(".search-list").hide();
      });

      $(".source-location-select").on("input", function () {
        source = $(".source-location-select").val().toLowerCase();

        $(".search-list-source").show();

        queryResult = $(".search-list-source").children();
        queryResult.hide();

        queryResult = queryResult.filter("[data-name*='" + source + "']");
        queryResult = queryResult.slice(0, 5);

        queryResult.show();
      });

      $(".destination-select").on("input", function () {
        source = $(".destination-select").val().toLowerCase();

        $(".search-list-destination").show();

        queryResult = $(".search-list-destination").children();
        queryResult.hide();

        queryResult = queryResult.filter("[data-name*='" + source + "']");
        queryResult = queryResult.slice(0, 5);

        queryResult.show();
      });

      $(".search-list-source li").on("click", function () {
        $(".source-location-select").val($(this).text());
        $(".search-list").hide();
      });

      $(".search-list-destination li").on("click", function () {
        $(".destination-select").val($(this).text());
        $(".search-list").hide();
      });

      $(".search-list li").mousedown(function (e) {
        e.preventDefault();
      });

      $(".source-location-select").on("blur", function () {
        $(".search-list").hide();
      });

      $(".destination-select").on("blur", function () {
        $(".search-list").hide();
      });
    </script>
  </body>
</html>
