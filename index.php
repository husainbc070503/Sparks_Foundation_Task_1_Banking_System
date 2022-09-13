<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task - 1: Sparks Foundation</title>
    <script src="https://kit.fontawesome.com/6ccdd39db5.js" crossorigin="anonymous"></script>
    <style>
        <?php include('css/index.css'); ?>
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar" id="navbar">
            <div class="logo">
                <img src="images/logo.png" alt="logo">
            </div>
            <i class="fa-solid fa-bars" onclick="openmenu()"></i>
            <ul class="lists" id="lists">
                <i class="fa-solid fa-xmark" onclick="closemenu()"></i>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="index.php#services">Services</a></li>
                <li><a href="index.php#contact">Contact Us</a></li>
            </ul>
        </nav>
        <div class="content">
            <div class="text">
                Welcome to Sparks Foundation Banking System
            </div>
            <a href="https://www.thesparksfoundationsingapore.org/" class="visit" target="_blank">Know More</a>
        </div>
    </header>

    <!-- About Us -->
    <section id="about">
        <div class="container">
            <div class="about-card">
                <div class="heading">About Us</div>
                <p class="text">The Sparks Foundation Bank is one of the largest bank with many branches spread across the country. It offers entire spectrum of financial services for personal and corporate banking. This bank is the leading private sector bank of the country. It offers varieties of banking services. </p>
                <p class="text"> For availing the money transfer services, the customers can visit the nearby branch or they can easily do so by using the bank's official website. We're here for you always!</p>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services">
        <div class="container">
            <div class="s-heading">
                <h1>Services We Provide</h1>
            </div>
            <div class="service">
                <div class="s-card">
                    <img src="images/users.png" alt="users">
                    <div class="overlay">
                        <a href="viewusers.php" class="users">View Customers</a>
                    </div>
                </div>
                <div class="s-card">
                    <img src="images/trf.jpg" alt="trf">
                    <div class="overlay">
                        <a href="money_transfer.php" class="trf">Transfer Money</a>
                    </div>
                </div>
                <div class="s-card">
                    <img src="images/history.jpg" alt="hsitory">
                    <div class="overlay">
                        <a href="transaction_history.php" class="history">Transaction History</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section id="contact">
        <div class="container">
            <div class="c-row">
                <div class="left">
                    <h1>Get In Touch</h1>
                    <div class="icons">
                        <a href="https://www.facebook.com/thesparksfoundation.info/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://github.com/topics/the-sparks-foundation" target="_blank"><i class="fa-brands fa-github"></i></a>
                        <a href="https://www.linkedin.com/groups/10379184/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/thesparksfoundation.info/?hl=en" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                <div class="right">
                    <form action="index.php" method="post" id="contact_form">
                        <div class="input-group">
                            <input type="text" name="name" id="name" required>
                            <label for="name">Name</label>
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" id="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group">
                            <input type="tel" name="phone" id="phone" maxlength="10" required>
                            <label for="phone">Contact No</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="query" id="query" required class="query">
                            <label for="query">Query</label>
                        </div>
                        <div class="input-buttons">
                            <button type="submit" class="submit-btn">Submit</button>
                            <button type="button" class="reset-btn" onclick="resetForm()">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container foot-text">
            <div class="logo">
                <img src="images/logo-foot.png" alt="logo">
            </div>
            <h1>The Sparks Foundation Bank</h1>
            <p>Copyright &copy; designed by ~Husain Champawala</p>
        </div>
    </footer>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $query = $_POST['query'];
        $sql = "INSERT INTO `contact` (`name`, `email`, `phone`, `query`, `date`) VALUES ('$name', '$email', '$contact', '$query', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
    ?>
            <script>
                alert("Thanks for contacting! We'll get back to you soon");
                window.open('index.php', '_self');
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('<?php echo mysqli_error($conn); ?>');
            </script>
    <?php
        }
    }
    ?>

    <script>
        var nav = document.getElementById('navbar')
        window.onscroll = function() {
            if (window.pageYOffset >= 100) {
                nav.classList.add('active')
            } else {
                nav.classList.remove('active')
            }
        }

        function resetForm() {
            document.getElementById('contact_form').reset();
        }

        var list = document.getElementById('lists');

        function openmenu() {
            list.style.right = '0';
        }

        function closemenu() {
            list.style.right = '-200px';
        }
    </script>
</body>

</html>