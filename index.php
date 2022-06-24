<?php
    $dbhost = "148.66.138.145";
    $dbuser = "portfolioSh";
    $dbpass = "portShUsr21!";
    $dbname = "portfolioSh";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(mysqli_connect_errno()) die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
?>
<?php
    $query = "SELECT * FROM  portfolio_AsafBaibekov";
    $result = mysqli_query($connection, $query);
    if (!$result) die("DB query failed.");
?>
<?php
    $queryPopUp = "SELECT * FROM  portfolio_AsafBaibekov";
    $resultPopUp = mysqli_query($connection, $query);
    if (!$resultPopUp) die("DB query failed.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaf Baibekov</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">Asaf <span>Baibekov</span></a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#services" class="menu-btn">Services</a></li>
                <li><a href="#myworks" class="menu-btn">My Work</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    <section class="home" id="home">
        <div class="max-width">
            <div class="row">
                <div class="home-content">
                    <div class="text-1">Hello, my name is</div>
                    <div class="text-2">Asaf Baibekov</div>
                    <div class="text-3">And I'm a <span class="typing"></span></div>
                    <a href="#contact">Contact me</a>
                </div>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/me.png" alt="">
                </div>
                <div class="column right">
                    <div class="text">My name is Asaf Baibekov and I'm a <span class="typing-2"></span></div>
                    <p>
                        software engineering student at Shenkar college of engineering and design. Mobile Applications developer.
                    </p>
                    <a href="Asaf's Resume.pdf" target="_blank">Download CV</a>
                </div>
            </div>
        </div>
    </section>
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">About Me</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">FullStack Developer</div>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <div class="text">Student</div>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <div class="text">Mobile Developer</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- myworks section start -->
    <section class="myworks" id="myworks">
        <div class="max-width">
            <h2 class="title">My Work</h2>
            <div id="page-top mainmain">
                <section class="page-section bg-light" id="portfolio">
                    <div class="container">
                        <div class="text-center"></div>
                        <div class="row">
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <?php
                                    $project_id = htmlspecialchars($row["project_id"]);
                                    $project_name = htmlspecialchars($row["project_name"]);
                                    $project_description = htmlspecialchars($row["project_description"]);
                                    $programming_language = htmlspecialchars($row["programming_language"]);
                                    $github = htmlspecialchars($row["project_github"]);
                                    $project_pic = htmlspecialchars($row["project_pic"]);
                                ?>
                                <div class="col-lg-4 col-sm-6 mb-4">
                                    <div class="portfolio-item">
                                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $project_id; ?>">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fa-solid fa-ellipsis fa-3x"></i></div>
                                            </div>
                                            <img class="img-fluid" src="<?php echo $project_pic; ?>" alt="<?php echo $project_name; ?>" />
                                        </a>
                                        <div class="portfolio-caption">
                                            <div class="portfolio-caption-heading"><?php echo $project_name; ?></div>
                                            <div class="portfolio-caption-subheading text-muted"><?php echo $programming_language; ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php
                                mysqli_free_result($result);
                            ?>
                        </div>
                    </div>
                </section>
                <?php while ($row = mysqli_fetch_assoc($resultPopUp)) : ?>
                    <?php
                        $project_id = $row["project_id"];
                        $project_name = $row["project_name"];
                        $project_description = $row["project_description"];
                        $programming_language = $row["programming_language"];
                        $github = $row["project_github"];
                        $project_pic = $row["project_pic"];
                        $project_link = $row["project_link"];
                    ?>
                    <div class="portfolio-modal modal fade " id="portfolioModal<?php echo $project_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon2.svg" alt="Close modal" /></div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                            <div class="modal-body">
                                                <h2 class="text-uppercase"><?php echo $project_name; ?></h2>
                                                <p class="item-intro text-muted"><?php echo $programming_language; ?></p>
                                                <img class="img-fluid d-block mx-auto" src="<?php echo $project_pic; ?>" alt="<?php echo $project_name; ?>" />
                                                <p><?php echo $project_description; ?></p>
                                                <ul class="list-inline">
                                                    <?php if ($github != "NULL") : ?>
                                                        <li>
                                                            <a href="<?php echo $github; ?>" target="_blank" class="gitHubPic"></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <a href="<?php echo $project_link; ?>" target="_blank" class="toTheCode"></a>
                                                    </li>
                                                </ul>
                                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button"><i class="fas fa-times me-1"></i>Close Project</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Asaf Baibekov</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Ramat-Gan, Israel</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">asafall21@gmail.com</div>
                            </div>
                        </div>
                        <div class="row">
                            <a href="https://github.com/asafbaibekov" target="_blank"><i class="fab fa-github"></i></a>
                            <div class="info">
                                <div class="head">Github</div>
                                <div class="sub-title"><a href="https://github.com/asafbaibekov" target="_blank">github.com/asafbaibekov</a></div>
                            </div>
                        </div>
                        <div class="row">
                            <a href="https://linkedin.com/in/asafbaibekov" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <div class="info">
                                <div class="head">Linkedin</div>
                                <div class="sub-title">
                                    <a href="https://linkedin.com/in/asafbaibekov" target="_blank">linkedin.com/in/asafbaibekov</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form class="contact-form" action="https://formsubmit.co/asafall21@gmail.com" method="POST" target="_blank">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" class="fullname" name="name" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input type="email" name="email" class="email-input" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" class="subject" placeholder="Subject">
                        </div>
                        <div class="field textarea">
                            <textarea class="message" cols="30" rows="10" name="message" placeholder="Message.."
                                required></textarea>
                        </div>
                        <div class="button-area">
                            <button class="send-msg" type="submit" name="send">Submit Form</button>
                            <div class="error-box"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <footer>
        <span id="iconShenkar"></span><a href="https://www.shenkar.ac.il/he/departments/engineering-software-department" target="_blank" class="text" id="shenkarText">תואר ראשון בהנדסת תוכנה בשנקר</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script.js"></script>
</body>
</html>
<?php mysqli_close($connection); ?>