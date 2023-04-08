<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" />
    <link href="./css/about.css" rel="stylesheet" />
    <title>About</title>

    <style>
    .background{
        min-height:100vh;
        /* justify-content:center; */
        align-items:center;
        position:relative;
        }
    .background::before{
        content:'';
        background-image: url('assets/img/bsu.png') ;
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center;
        position:absolute;
        top:-20px;
        left:0;
        bottom:0;
        right:0;
        opacity:0.7;
    }
 
    </style>
</head>

    <div class="background">
    <nav class="navbar">
        <div class="logo">
                <img src="assets/img/logo.png" alt="logo" width="56" height="56" class="logo">
                Arfun
        </div>

        <a href="#" class="toggle-btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>

        <div class="navbar-links">
                <ul>
                        <li><a href="adminLogin.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <!-- <li><a href="#">Services</a></li> -->
                        <!-- <li><a href="#">Contact</a></li> -->
                </ul>
        </div>
    </nav>


        <div class="content">
        <div class="main-content">
            <div class="content-1">
                <h2>About ArFun</h2>
                <p>ARFUN is a mobile e-learning program that offers lessons on the Araling Panlipunan topic. The web and mobile applications provide features that can assist instructors and students in understanding the material, and they will also enhance their educational experience. </p>
            </div>
            
            <div class="content-2">
                    <h2>Who are we?</h2>
                    <p>The developers are Bachelor of Science in Information Technology students from Bulacan State University Sarmiento Campus.</p>
                    
                    <div class="dev-info">
                            <img src="./assets/img/groupMembers/Ron.jpeg" width="125" height="125">
                            <p class="name">Abacial, Rolando  <br>UI/UX Designer</p>
                    </div>

                    <div class="dev-info">
                        <img src="./assets/img/groupMembers/Joy.jpg" width="125" height="125">
                        <p class="name">
                            Desales, Mary Joy  
                            <br>Front-End Developer</p>
                    </div>

                    <div class="dev-info">
                        <img src="./assets/img/groupMembers/kurt.jpg" width="125" height="125">
                            <p class="name">
                                Francisco, Kurt Russell  
                                <br>Full Stack Developer</p>
                    </div>

                    <div class="dev-info">
                        <img src="./assets/img/groupMembers/veronica.jpg" width="125" height="125">
                            <p class="name">Francisco, Veronica         
                                <br>Project Leader</p>
                    </div>

                    <div class="dev-info">
                        <img src="./assets/img/groupMembers/adrian.jpg" width="125" height="125">
                            <p class="name">
                                Singh, Adrian Gaile 
                                <br>Back-end Developer</p>
                    </div>

                    <div class="contact">
                        <h4>Contact us:</h4>
                        <a href="mailto:arfuncapstonw007@gmail.com">arfuncapstone007@gmail.com</a>
                    </div>
                </div>
            </div>  
        </div>
        
</div>
</html>