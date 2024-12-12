
<?php



?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<style type="text/css">
    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-transform: capitalize;
        transition: all .2s ease-out;
        text-decoration: none;
    }

    :root {
        --blue: #3385ff;
        --light-green: #99c2ff;
        --gray: #b3b3b3;
        --white: #ccffff;
        --black: #444444;
    }

    html {
        font-size: 65.5%;
        overflow-x: hidden;
        scroll-behavior: smooth;
        scroll-padding-top: 7rem;
    }

    body {
        font-family: 'Montserrat', sans-serif;
    }

    section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .header {
        padding: 2rem 9%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        display: flex;
        box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, 0.1);
        align-items: center;
        justify-content: space-between;
        background: #fff;
    }

    .header .logo {
        font-size: 2.5rem;
        color: black;
    }

    .header .logo i {
        color: green;
    }

    .header .navbar a {
        font-size: 1.7rem;
        color: #777;
        margin-left: 2rem;
    }

    .header .navbar a:hover {
        color: green;
    }

    #menu-btn {
        font-size: 2.5rem;
        border-radius: .5rem;
        background: white;
        color: green;
        padding: 1rem 1.5rem;
        cursor: pointer;
        display: none;
    }

    .header .icons {
        display: flex;
        position: absolute;
        right: 2rem;
    }

    .header .icons .fas {
        font-size: 2.5rem;
        color: #777;
        margin-left: 2rem;
        cursor: pointer;
    }

    .header .icons .fas:hover {
        color: green;
    }

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-left: 10px;
    }

    @media (max-width: 991px) {
        html {
            font-size: 55%;
        }

        .header {
            padding: 2rem 4rem 2rem 2rem;
        }

        .header .icons {
            display: flex;
            position: absolute;
            right: 1rem;
        }
    }

    @media (max-width: 768px) {
        #menu-btn {
            display: block;
        }

        .header .navbar {
            position: absolute;
            top: 115%;
            right: 2rem;
            border-radius: .5rem;
            width: 20rem;
            background: white;
            transform: scale(0);
            opacity: 0;
            background-image: linear-gradient(-225deg, #FFFEFF 0%, #D7FFFE 100%);
            transform-origin: top right;
            transition: all .2s ease-out;
        }

        .header .navbar.active {
            transform: scale(1);
            opacity: 1;
        }

        .header .navbar a {
            font-size: 2rem;
            display: block;
            margin: 2.5rem;
        }

        .header .navbar a:hover {
            padding-left: 10px;
        }

        .header .icons {
            display: flex;
            position: absolute;
            right: 10rem;
        }
    }

    @media (max-width: 450px) {
        html {
            font-size: 50%;
        }

        .header {
            padding: 2rem;
        }
    }
</style>

<body>
    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i>Mental healthcare</a>
        <nav class="navbar">
            
           
            <a href="contactForm.php">Contact</a>
          
          
        </nav>


        

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <script type="text/javascript">
        let menu = document.querySelector('#menu-btn');
        let navbar = document.querySelector('.navbar');
        let notificationBtn = document.querySelector('#notification-btn');
        

        menu.onclick = () => {
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');
        }

        window.onscroll = () => {
            menu.classList.remove('fa-times');
            navbar.classList.remove('active');
        }

      
    </script>
</body>
</html>
