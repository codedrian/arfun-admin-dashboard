<?php
    include('authentication.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Arfun | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/quiz-edit.css" rel="stylesheet" />
    <!-- <link href="css/register.css" rel="stylesheet" /> -->

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <style>
         #sort-data{
          position:relative;
            left:50%;
            padding:10px;
            background:rgb(3, 20, 97);
            border:none;
            border-radius:10px;
            color:white;
            font-size:18px;
        } 

        #sort-data:hover{
          background:blue;
        }

        
        #download-table{
            position:relative;
            left:50%;
            padding:10px;
            background:rgb(3, 20, 97);
            border:none;
            border-radius:10px;
            color:white;
            font-size:18px;
        }
        #download-table:hover{
            background:blue;
        }

        /* .window #section{
            ;
        }

        .window #quiz-numer{
            position:relative;
            left:11%;
        } */


        /* start of Floating Window */
        .window button{
          position: relative;
          background: rgb(3, 20, 97);
          border: none;
          color: white;
          font-weight: 300;
          border-radius: 3px;
          margin:4px;
          /* display: flex; */
          /* left:5%; */
        }

        .window button:hover{
            background:blue;
          }

        .window .buttons{
        display: flex;
        justify-content: center;
        padding: 20px;
        
        }

        .window .selects{
        display: flex;
        justify-content:center;
        
        }
          /* .window #resetSectionSort{
            position:relative;
            left:30%;
            margin-top:10px;
          }
          
          .window #closeSectionSort{
            position:relative;
            left:30%;
            margin-top:10px;
          } */

         /* end of Floating Window */
        
          #myBtn {
          display: none;
          position: fixed;
          bottom: 20px; 
          right: 30px; 
          z-index: 99; 
          border: none;
          outline: none; 
          background-color:rgb(3, 20, 97) ; 
          color: white; 
          cursor: pointer; 
          padding: 15px; 
          border-radius: 10px;
          font-size: 18px; 
          }

        #myBtn:hover {
        background-color: blue; 
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">
            <img src="assets/img/logo.png" alt="logo" width="50" height="50" class="logo">ArFun E-Learning</a>
        <!-- Sidebar Toggle-->

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
               
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i> <span id="dispName">User</span></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="account.php">Edit Account</a>
                        <a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <?php
        include('side-nav.php');
        ?>
        <div id="layoutSidenav_content">
            <main>
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h5 class='alert alert-status '>" . $_SESSION['status'] . "</h5>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="container-fluid px-2">

                    <div class="row mt-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 ">

                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <?php
                                            if (isset($_SESSION['status'])) {
                                                echo "<h5 class='alert alert-status '>" . $_SESSION['status'] . "</h5>";
                                                unset($_SESSION['status']);
                                            }
                                            ?>

                                            <div class="container mt-3">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3>Student Scores
                                                            <button id="sort-data">Sort Data</button>
                                                           
                                                            <button id="download-table">Download Table Data</button>
                                                            <div class="download-link"></div>
                                                            </h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-striped">

                                                                <thead>
                                                                    <th>First Name</th>
                                                                    <th>Middle Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Section</th>
                                                                    <!-- <th>UID</th> -->
                                                                    <th>Date Completed</th>
                                                                    <th>Score</th>
                                                                    <th>Items</th>
                                                                    <th>Quiz Title</th>


                                                                </thead>
                                                                <tbody id="tbody1"></tbody>
                                                            </table>

                                                            <h3>Have Not Answered Yet</h3>
                                                            <span>Load table on <b>Sort Data</b> by selecting the quiz you want to check.</span>
                                                            <table class="table table-striped">

                                                                <thead>
                                                                    <th>First Name</th>
                                                                    <th>Middle Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Section</th>
                                                                    <!-- <th>UID</th> -->
                                                                    <th>Quiz Title</th>


                                                                </thead>
                                                                <tbody id="tbody2"></tbody>
                                                            </table>
                                                        </div>
                                                        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

                                                        <script>
                                                            // Get the button:
                                                            let mybutton = document.getElementById("myBtn");

                                                            // When the user scrolls down 20px from the top of the document, show the button
                                                            window.onscroll = function() {scrollFunction()};

                                                            function scrollFunction() {
                                                            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                                                mybutton.style.display = "block";
                                                            } else {
                                                                mybutton.style.display = "none";
                                                            }
                                                            }

                                                            // When the user clicks on the button, scroll to the top of the document
                                                            function topFunction() {
                                                            document.body.scrollTop = 0;
                                                            document.documentElement.scrollTop = 0; 
                                                        }
                                                        </script>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">


                </div>
            </div>
        </footer>
    </div>
    </div>

    <div class="floating-window">
    <div class="window">

        <div class="selects">
            <select name="section" id="section">
                <option>Select a section</option>
            </select>
            <select name="quiz" id="quiz-number">
                <option>Choose a Quiz</option>
            </select>
        </div>

        <div class="buttons">
            <button id="submitSectionSort">Sort Data</button>
            <button id="submitReportSort">Get Class Report</button>
            <button id="loadNt">Load NT</button>
            <button id="resetSectionSort">Reset</button>
            <button id="closeSectionSort">Close</button>
        </div>
    </div>
  </div>
  <script>
        var sessionData = <?php echo json_encode($_SESSION);?>;
    </script>
    <div id="sessionDataContainer" data-session="<?php echo htmlentities(json_encode($_SESSION)); ?>"></div>
    <div id="section-sdc" data-session-section=""></div>
    <script>
        var sessionData = document.getElementById("sessionDataContainer").dataset.session;
        sessionData = JSON.parse(sessionData);
    </script>

    <script type="module" src="js/fetch-uid.js"></script>
    <script type="module">
        ///add data table
        var stdNo = 0;
        var tbody = document.getElementById("tbody1")
        function AddItem(name, _uid, _dateCompleted, _description, _items, _quizId, _quizTitle, _score) {
            let trow = document.createElement("tr");
            let td1 = document.createElement("td");
            let td1_1 = document.createElement("td");
            let td1_2 = document.createElement("td");
            let td1_3 = document.createElement("td");
            // let td2 = document.createElement("td");
            let td3 = document.createElement("td");
            let td4 = document.createElement("td");
            let td5 = document.createElement("td");
            let td6 = document.createElement("td");

            td1.innerHTML = name.firstName;
            td1_1.innerHTML = name.midName;
            td1_2.innerHTML = name.lastName;
            td1_3.innerHTML = name.section;
            // td2.innerHTML = _uid;
            td3.innerHTML = _dateCompleted;
            td4.innerHTML = _description;
            td5.innerHTML = _items;
            td6.innerHTML = _quizTitle;


            trow.appendChild(td1); //this should conatin the name
            trow.appendChild(td1_1); //this should conatin the name
            trow.appendChild(td1_2); //this should conatin the name
            trow.appendChild(td1_3); //this should conatin the section
            // trow.appendChild(td2);
            trow.appendChild(td3);
            trow.appendChild(td4);
            trow.appendChild(td5);
            trow.appendChild(td6);


            tbody.appendChild(trow);

        }

        function addAllItems(TheStudent, names) {
            stdNo = 0;
            tbody.innerHTML = "";
            TheStudent.forEach((element, index) => {
                var dateCompleted = new Date(element.dateCompleted).toLocaleString('en-US', {
                    year: "numeric",
                    month: "long",
                    day: "numeric",
                    hour: "numeric",
                    minute: "numeric",
                    timeZone: "Asia/Kuala_Lumpur",
                })
                AddItem(names[index], element.uid, dateCompleted, element.description, element.items, element.quizId, element.quizTitle, element.score);
            });
        }

        ///add data table for not taken
        var stdNo = 0;
        var tbody2 = document.getElementById("tbody2");
        function AddNtItem(name, _quizTitle) {
            let trow = document.createElement("tr");
            let td1 = document.createElement("td");
            let td1_1 = document.createElement("td");
            let td1_2 = document.createElement("td");
            let td1_3 = document.createElement("td");
            let td1_4 = document.createElement("td");
            let td2 = document.createElement("td");

            td1.innerHTML = name.firstName;
            td1_1.innerHTML = name.midName;
            td1_2.innerHTML = name.lastName;
            td1_3.innerHTML = name.section;
            // td1_4.innerHTML = name.uid;
            td2.innerHTML = _quizTitle;


            trow.appendChild(td1); //this should conatin the name
            trow.appendChild(td1_1); //this should conatin the name
            trow.appendChild(td1_2); //this should conatin the name
            trow.appendChild(td1_3); //this should conatin the section
            // trow.appendChild(td1_4);
            trow.appendChild(td2);


            tbody2.appendChild(trow);

        }

        function addAllNtItems(names) {
            stdNo = 0;
            tbody2.innerHTML = "";
            const quizSortData = document.querySelector("#quiz-number").value;
            names.forEach((element, index) => {
                AddNtItem(names[index], quizSortData);
            });
        }


        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
        const firebaseConfig = {
            apiKey: "AIzaSyD2NHnCMKq75vuFIdzwY_3eDZlfzPorbV0",
            authDomain: "mynewmain-b15f0.firebaseapp.com",
            databaseURL: "https://mynewmain-b15f0-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "mynewmain-b15f0",
            storageBucket: "mynewmain-b15f0.appspot.com",
            messagingSenderId: "1045380132876",
            appId: "1:1045380132876:web:a6aa3460d5b72020da7e29",
            measurementId: "G-5PT4Z3YG3P"
        };
        const app = initializeApp(firebaseConfig);
        //const analytics = getAnalytics(app);
        import {
            getFirestore, doc, getDoc, collection, getDocs, onSnapshot, query, where
        }
            from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";

        const db = getFirestore();

        function fetchScoreDataAsync() {
            return new Promise(async (resolve, reject) => {
                try {
                    const querySnapshot = await getDocs(collection(db, "quizScores"));

                    var students = [];
                    var names = [];
                    var studentsRef = []
                    var a = document.querySelector("#section-sdc").getAttribute("data-session-section");

                    querySnapshot.forEach(doc => {
                        students.push(doc.data());
                    });

                    for (var i = 0; i < students.length; i++) {
                        //Get the data of the students that have quiz scores
                        var student = students[i];

                        const uid = student.uid;

                        var dbRef = collection(db, 'users');
                        var q = query(dbRef, where('uid', '==', uid));
                        var qSnap = await getDocs(q);

                        if (qSnap.size !== 0) {

                            //Check for section, to sort-data
                            if (qSnap.docs[0].data().section == a) {
                                const studentData = qSnap.docs[0].data();
                                names.push({
                                    firstName: studentData.firstName,
                                    midName: studentData.midName == '' ? '-' : studentData.midName,
                                    lastName: studentData.lastName,
                                    section: studentData.section,
                                });
                                studentsRef.push(student)
                            }
                        }
                    }

                    return resolve({
                        students: studentsRef,
                        names: names
                    });

                } catch (error) {
                    return reject(error);
                }
            })
        }

        async function GetAllDataOnece() {

            fetchScoreDataAsync().then(result => {
                addAllItems(result.students, result.names);
            })
                .catch(error => {
                    alert('Something went wrong.');
                    console.log(error);
                });
        }

        function fetchSortedScoreDataAsync() {
            return new Promise(async (resolve, reject) => {
                try {
                    const sectionSortData = document.querySelector("#section").value;
                    const querySnapshot = await getDocs(collection(db, "quizScores"));

                    var students = [];
                    var names = [];
                    var studentsRef = []

                    querySnapshot.forEach(doc => {
                        students.push(doc.data());
                    });

                    for (var i = 0; i < students.length; i++) {
                        //Get the data of the students that have quiz scores
                        var student = students[i];

                        const uid = student.uid;

                        var dbRef = collection(db, 'users');
                        var q = query(dbRef, where('uid', '==', uid));
                        var qSnap = await getDocs(q);

                        if (qSnap.size !== 0) {

                            //Check for section, to sort-data
                            if (qSnap.docs[0].data().section == sectionSortData) {
                                const studentData = qSnap.docs[0].data();
                                names.push({
                                    firstName: studentData.firstName,
                                    midName: studentData.midName == '' ? '-' : studentData.midName,
                                    lastName: studentData.lastName,
                                    section: studentData.section,
                                });
                                studentsRef.push(student)
                            }
                        }
                    }

                    if (studentsRef.length == 0) {
                        alert("No data found");
                        return false;
                    }

                    return resolve({
                        students: studentsRef,
                        names: names
                    });

                } catch (error) {
                    return reject(error);
                }
            })
        }

        async function GetAllSortedDataOnece() {

        fetchSortedScoreDataAsync().then(result => {
                addAllItems(result.students, result.names);
            })
            .catch(error => {
                alert('Something went wrong.');
                console.log(error);
            });
        }

        function fetchClassReportScoreDataAsync() {
            return new Promise(async (resolve, reject) => {
                try {
                    const sectionSortData = document.querySelector("#section").value;
                    const querySnapshot = await getDocs(collection(db, "quizScores"));
                    const quizSortData = document.querySelector("#quiz-number").value;

                    var students = [];
                    var names = [];
                    var studentsRef = []

                    querySnapshot.forEach(doc => {
                        students.push(doc.data());
                    });

                    for (var i = 0; i < students.length; i++) {
                        //Get the data of the students that have quiz scores
                        var student = students[i];

                        const uid = student.uid;

                        var dbRef = collection(db, 'users');
                        var q = query(dbRef, where('uid', '==', uid));
                        var qSnap = await getDocs(q); //qSnap is user data, not quiz data

                        if (qSnap.size !== 0) {

                            //Check for section, to sort-data
                            if (qSnap.docs[0].data().section == sectionSortData) {
                                //Check for quiz title if matches
                                console.log(students[i]);
                                console.log(students[i].quizTitle);
                                console.log(quizSortData);
                                if (students[i].quizTitle == quizSortData) {
                                    const studentData = qSnap.docs[0].data();
                                    console.log(studentData);
                                    names.push({
                                        firstName: studentData.firstName,
                                        midName: studentData.midName == '' ? '-' : studentData.midName,
                                        lastName: studentData.lastName,
                                        section: studentData.section,
                                    });
                                    studentsRef.push(student)
                                }
                            }
                        }
                    }

                    if (studentsRef.length == 0) {
                        alert("No data found");
                        return false;
                    }

                    return resolve({
                        students: studentsRef,
                        names: names
                    });

                } catch (error) {
                    return reject(error);
                }
            })
        }

        async function GetAllClassReportDataOnece() {

        fetchClassReportScoreDataAsync().then(result => {
                addAllItems(result.students, result.names);
            })
            .catch(error => {
                alert('Something went wrong.');
                console.log(error);
            });
        }

        //Fetch Students that haven't taken the quiz
        function fetchNtDataAsync() {
            return new Promise(async (resolve, reject) => {
                try {
                    const sectionSortData = document.querySelector("#section-sdc").getAttribute("data-session-section");
                    const quizSortData = document.querySelector("#quiz-number").value;

                    if (quizSortData == 0 || quizSortData == undefined) {
                        alert("Invalid input!");
                        return false;
                    }
                    const q = query(collection(db, "quizScores"), where("quizTitle", "==", quizSortData));
                    const querySnapshot = await getDocs(q);

                    var students = [];
                    var names = [];
                    //var studentsRef = []
                    //Put quiz score data to array for checking
                    querySnapshot.forEach(doc => {
                        students.push(doc.data());
                    });
                    //Check every single value of student data if a user uid matches
                    //For every userdata, check if uid exists in quizScores
                    //Query Data for users
                    const udRef = collection(db, "users");
                    const udrQ = query(udRef, where("role", "==", "student"));
                    const udrQs = await getDocs(udrQ);

                    udrQs.forEach((doc) => {
                        //Sort out other sections first
                        if (doc.data().section == sectionSortData) {
                            //Test if all uids match with quiz score, if yes, do not print name
                                if(students.some(function(arrVal) {
                                    return doc.data().uid === arrVal.uid;
                                }) == false) {
                                    names.push({
                                        firstName: doc.data().firstName,
                                        midName: doc.data().midName == '' ? '-' : doc.data().midName,
                                        lastName: doc.data().lastName,
                                        section: doc.data().section,
                                        uid: doc.data().uid,
                                    });
                                }
                        }
                    })

                    if (names == 0) {
                        alert("No data found");
                        return false;
                    }

                    return resolve({
                        names: names
                    });

                } catch (error) {
                    return reject(error);
                }
            })
        }

        async function GetAllNtDataOnece() {
            console.log("Called")
            fetchNtDataAsync().then(result => {
                addAllNtItems(result.names);
            })
                .catch(error => {
                    alert('Something went wrong.');
                    console.log(error);
                });
        }

        

        //Add Sort Student
    document.querySelector("#sort-data").addEventListener("click",
      function() {
        document.querySelector(".floating-window").style.display = "block";
      }
    );
    document.querySelector("#closeSectionSort").addEventListener("click",
      function() {
        document.querySelector(".floating-window").style.display = 'none';
      }
    );
    document.querySelector("#submitSectionSort").addEventListener("click", function() {
        document.querySelector("#tbody1").innerHTML = "";
        GetAllSortedDataOnece();
    });
    document.querySelector("#resetSectionSort").addEventListener("click", function() {
        document.querySelector("#tbody1").innerHTML = "";
        GetAllDataOnece();
    })
    document.querySelector("#submitReportSort").addEventListener("click", function() {
        document.querySelector('#tbody1').innerHTML = "";
        GetAllClassReportDataOnece();
    })


        window.onload = GetAllDataOnece;
        document.querySelector("#loadNt").addEventListener("click", GetAllNtDataOnece);


        var stdNo = 1;
        var mainSelect = document.getElementById("quiz-number");
        function createStartingSelection() {
            let d0 = document.createElement("option");
            d0.textContent = "Select a section";
            d0.value = "undf";
            mainSelect.appendChild(d0);
        }
        function AddSectionSelection(_quiz) {
            let d1 = document.createElement("option");
            d1.textContent = _quiz;
            d1.value = _quiz;
            mainSelect.append(d1);
        }

        //Add All Data
        function addAllQuizSelection(quiz) {
            stdNo = 0;
            mainSelect.innerHTML = "";
            for (var l = 0; l < quiz.length; l++) {
                AddSectionSelection(quiz[l].title);
            }
        }

        async function getQuizSelection() {
        //For section  
        const dbRef = collection(db, 'quizzes');
        const qs = await getDocs(dbRef);
    
        var quiz = [];
        //console.log(qs);
        qs.forEach(async (doc) => {
            quiz.push(doc.data());
        });


        //get
        createStartingSelection();
        addAllQuizSelection(quiz);
    }

    getQuizSelection();

    </script>
    <script src="js/get-section.js" type="module"></script>
    <script src="js/getCurrentUserData.js" type="module"></script>
    <script src="js/convertTableToExcel.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>