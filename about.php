<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" />
    <title>About</title>

    <style>
    .background{
        min-height:100vh;
        justify-content:center;
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
            .main-top{
            position:relative;
            background-image:linear-gradient(#033747,#012733);
            text-align:center;
            margin-left:15%;
            margin-right:15%;
            top:100px;
            min-height:10%;
            border-radius: 15px;
            color: #fff;
            padding:10px;
            opacity:0.9;
        }
        .main-top p{
            text-align: justify;
            text-justify: inter-word;
        }
        .main-content{
            position:relative;
            background-image:linear-gradient(#033747,#012733);
            text-align:center;
            margin-left:15%;
            margin-right:15%;
            color: #fff;
            border-radius: 15px;
            top:120px;
            min-height:50%;
            opacity:0.9;
        }
        
        .main-content .dev-info{
            display:inline-block;
            list-style:none;
            font-size:12px;
            text-transform:uppercase;
            padding:0px 15px;
            color:white;
            text-decoration:none
        }
        nav{
        width:100%;
        height:75px;
        line-height:75px;
        padding:0px 100px;
        position:fixed;
        background-image:linear-gradient(#033747,#012733);
        opacity:0.7;
        top:-0px;
    }

        nav .logo{
        font-size:30px;
        font-weight:bold;
        float:left;
        color:white;
        text-transform:uppercase;
        letter-spacing:1.5px;
        cursor:pointer;
    }
        nav ul{
            float:right;
        }
        nav li{
            display:inline-block;
            list-style:none;
        }
        nav li a {
            font-size:18px;
            text-transform:uppercase;
            padding:0px 30px;
            color:white;
            text-decoration:none
        }
        nav li a:hover{
            color:green;
            transition: all 0.4s ease 0s;
        }
        img{
            position:relative;
            top:11px;
        }
        .dev-info .name{
            margin-top:16px;
            font-size:12px;
        }
        .contact{
            margin-top:5px;
        }
    </style>
</head>

    <div class="background">
        <nav>
            <div class="logo">
                <p><img src="assets/img/logo.png" alt="logo" width="56" height="56" class="logo">ArFun</p>
            </div>
            <ul>
                <li><a href="adminLogin.php">Home</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>

        <div class="content">
            <div class="main-top">
                <h2>About ArFun</h2>
                <p>ARFUN is an e-learning mobile application that contains lessons about the Araling Panlipunan subject. The web and mobile applications offers features that can help the students and teachers studying the subject and also it will give them great experience while learning. </p>
            </div>
                <div class="main-content">
                    <h2>Who we are?</h2>
                        <p>The developers are Bachelor of Science in Information Technology students from Bulacan State University Sarmiento Campus.</p>
                        <div class="dev-info">
                            <img src="assets/img/" width="125" height="125">
                            <p class="name">Abacial, Rolando  <br>UI/UX Designer</p>
                        </div>
                        <div class="dev-info">
                            <img src="./assets/img/groupMembers/Joy.jpg" width="125" height="125">
                            <p class="name">
                                Desales, Mary Joy  
                                <br>Front-End Developer</p>
                        </div>

                        <div class="dev-info">
                            <img src="" width="125" height="125">
                                <p class="name">
                                    Francisco, Kurt Russell  
                                    <br>Full Stack Developer</p>
                        </div>

                        <div class="dev-info">
                            <img src="assets/img/" width="125" height="125">
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
</html>