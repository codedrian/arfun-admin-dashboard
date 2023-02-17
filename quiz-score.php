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
</head>

<body class="sb-nav-fixed">
    <?php
    include('authentication.php');
    ?>
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
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                                                            <h3>Student Score</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-striped" id="dtbq">

                                                                <thead>
                                                                    <th>First Name</th>
                                                                    <th>Middle Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Section</th>
                                                                    <th>UID</th>
                                                                    <th>Date Completed</th>
                                                                    <th>Score</th>
                                                                    <th>Items</th>
                                                                    <th>Quiz Title</th>


                                                                </thead>
                                                                <tbody id="tbody1"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button id="sort-data">Sort Data</button>
                                                <div class="download-link"></div>
                                                <button id="download-table">Download Table Data</button>
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
      <select name="section" id="section">
        <option>Select a section</option>
      </select>
      <input type="text" id="quiz-number" placeholder="Enter Quiz Title" required>
      <button id="submitSectionSort">Sort Data</button>
      <button id="submitReportSort">Get Class Report</button>
      <button id="resetSectionSort">Reset</button>
      <button id="closeSectionSort">Close</button>
    </div>
  </div>

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
            let td2 = document.createElement("td");
            let td3 = document.createElement("td");
            let td4 = document.createElement("td");
            let td5 = document.createElement("td");
            let td6 = document.createElement("td");

            td1.innerHTML = name.firstName;
            td1_1.innerHTML = name.midName;
            td1_2.innerHTML = name.lastName;
            td1_3.innerHTML = name.section;
            td2.innerHTML = _uid;
            td3.innerHTML = _dateCompleted;
            td4.innerHTML = _description;
            td5.innerHTML = _items;
            td6.innerHTML = _quizTitle;


            trow.appendChild(td1); //this should conatin the name
            trow.appendChild(td1_1); //this should conatin the name
            trow.appendChild(td1_2); //this should conatin the name
            trow.appendChild(td1_3); //this should conatin the section
            trow.appendChild(td2);
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

                    querySnapshot.forEach(doc => {
                        students.push(doc.data());
                    });

                    for (var i = 0; i < students.length; i++) {
                        var student = students[i];

                        const uid = student.uid;

                        var dbRef = collection(db, 'users');
                        var q = query(dbRef, where('uid', '==', uid));
                        var qSnap = await getDocs(q);

                        if (qSnap.size !== 0) {

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
                    const quizSortData = document.querySelector("#quiz-number").value;
                    const querySnapshot = await getDocs(collection(db, "quizScores"));

                    if (quizSortData == 0 || quizSortData == undefined) {
                        alert("Invalid input!");
                        return false;
                    }

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
                                //Check for quiz, to sort-data
                                if (student.quizTitle == quizSortData) {
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
                    }
                    if (studentsRef == 0) {
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

    </script>
    <script src="js/get-section.js" type="module"></script>
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