

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/png" href="img/logo.png">
    <!-- custom css link -->
    <link rel="stylesheet" href="style/up_down.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/advert.css">
    <link rel="stylesheet" href="style/sign.css">
    <link rel="stylesheet" href="style/main.css">
    <!-- boxicon link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- remixicon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+AU+NSW:wght@100..400&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css">
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <header class="nav" id="nav">
        <a href="home" class="logo">automate</a>

        <ul class="navlist">
            <li><a href="/git/advertListing.php" class="menu-link">Search cars</a></li>
            <li><a href="service" class="menu-link">Services</a></li>
            <li><a href="about" class="menu-link">About us</a></li>
            <li><a href="user/login">Sign in</a></li>
            <div>
                <li><a href="../git/createAds.php" class="Ads-button Ads-mob" id="Ads-mob">Create Ads</a></li>
                <div class="icons">
                    <a href="https://www.instagram.com/alex.chamara?igsh=MTF4MmdqeHA5MDNtOA%3D%3D&utm_source=qr" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100070128788033&mibextid=LQQJ4d" target="_blank"><i class="ri-facebook-circle-line"></i></a>
                    <a href="https://www.tiktok.com/@_chathushi_mallawa_?_t=8nucWcohfUO&_r=1" target="_blank"><i class="ri-tiktok-line"></i></a>
                </div>
            </div>
        </ul>

        <div class="bx bx-menu" id="menu-icon"></div>
    </header>
    



    <?php
    // Ensure $viewPath is set correctly
    if (isset($viewPath)) {
        // Construct the full path to the view file
        $viewFilePath = '../app/views/' . $viewPath . '.php';

        // Check if the view file exists before including it
        if (file_exists($viewFilePath)) {
            require_once $viewFilePath;
        } else {
            echo "View file not found: " . htmlspecialchars($viewFilePath);
        }
    } else {
        echo "Error: \$viewPath is not set.";
    }
    ?>

    <!-- footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <a href="home" class="logo">automate</a>
                <div class="contact-infor">
                    <ul>
                        <li>
                            <a href="tel:+94112545422">+94 112 545 422</a>
                        </li>
                        <li>
                            <a href="mailto:infor@automate.com">Email: infor@automate.com</a>
                        </li>
                        <li>
                            <a href="mailto:inquiry@automate.com">Inquiries: inquiry@automate.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-links">
                <div class="footer-link">
                    <h3>Automate</h3>
                    <ul>
                        <li>
                            <a href="about.php">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">Careers</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-link">
                    <h3>Find my car</h3>
                    <ul>
                        <li>
                            <a href="/git/advertListing.php">Search cars</a>
                        </li>
                        <li>
                            <a href="#">Buying advice</a>
                        </li>
                        <li>
                            <a href="#">Account loging</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-link">
                    <h3>Sell my car</h3>
                    <ul>
                        <li>
                            <a href="../git/createAds.php">Advertise</a>
                        </li>
                        <li>
                            <a href="#">Advert promotion</a>
                        </li>
                        <li>
                            <a href="#">Car valuation</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-link">
                    <h3>Legal</h3>
                    <ul>
                        <li>
                            <a href="#">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Cookie Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- custom js for navigation -->
    <script type="text/javascript">
        //resposive navigation bar
        let menu = document.querySelector("#menu-icon");
        let navlist = document.querySelector(".navlist");

        // toggle menu
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            document.getElementById("nav").classList.toggle("sticky", window.scrollY > 0);
            // header.classList.toggle("sticky", window.scrollY > 0);
            // window.scroll > 0 ? document.getElementById("nav").classList.add("sticky") : document.getElementById("nav").classList.remove("sticky");
            const menuLinks = document.querySelectorAll(".menu-link");


            if (window.scrollY > 0) {
                if (!menu.classList.contains("bx-x")) {
                    menu.style.color = "black";
                }
                if (window.innerWidth >= 1100) {
                    menuLinks.forEach((link) => {
                        link.style.color = "#000";
                    })
                } else {
                    menuLinks.forEach((link) => {
                        link.style.color = "#fff";
                    })
                }
            } else if (window.scrollY == 0) {
                menu.style.color = "white";
                if (window.innerWidth >= 1100) {
                    menuLinks.forEach((link) => {
                        link.style.color = "#fff";
                    })
                } else {
                    menuLinks.forEach((link) => {
                        link.style.color = "#fff";
                    })
                }
            }
        });

        //change color of create ads button when scrolling
        window.addEventListener("scroll", function() {
            var adsMob = document.querySelector(".Ads-mob");
            if (window.scrollY > 0) {
                adsMob.style.color = "white";
            }
        });

        menu.onclick = () => {
            menu.classList.toggle("bx-x");
            navlist.classList.toggle("open");
            if (menu.classList.contains("bx-x")) {
                menu.style.color = "white";
            } else {
                window.scrollY > 0 ? menu.style.color = "black" : menu.style.color = "white";
            }
        }

        //drop down
        // document.addEventListener('DOMContentLoaded', function() {
        //     const dropdown = document.querySelector('.dropdown');
        //     const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
        //     const dropdownMenu = dropdown.querySelector('.dropdown-menu');

        //      dropdownToggle.addEventListener('click', function(e) {
        //          e.preventDefault();
        //          dropdownMenu.classList.toggle('show');
        //      });

        //     // Close dropdown if clicked outside
        //     document.addEventListener('click', function(e) {
        //         if (!dropdown.contains(e.target)) {
        //             dropdownMenu.classList.remove('show');
        //         }
        //     });
        // });
        document.addEventListener('DOMContentLoaded', () => {
            const dropdown = document.querySelector('.dropdown');
            if (dropdown) {
                const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
                const dropdownMenu = dropdown.querySelector('.dropdown-menu');

                if (dropdownToggle && dropdownMenu) {
                    dropdownToggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        dropdownMenu.classList.toggle('show');
                    });

                    document.addEventListener('click', function(e) {
                        if (!dropdown.contains(e.target)) {
                            dropdownMenu.classList.remove('show');
                        }
                    });
                }
            }
        });
    </script>
</body>

</html>