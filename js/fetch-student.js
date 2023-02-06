///add data table

  var stdNo = 0;
    var tbody = document.getElementById("tbody1");
    function AddItem(_name, _email, _idnum) {
      let trow = document.createElement("tr"); //change trow to tr
      let td1 = document.createElement("td");
      let td1_1 = document.createElement("td");
      let td1_2 = document.createElement("td");
      let td2 = document.createElement("td");
      let td3 = document.createElement("td");

      // set the text content of each td element to the corresponding argument
      td1.textContent = _name.firstName;
      td1_1.textContent = _name.midName;
      td1_2.textContent = _name.lastName;
      td2.textContent = _email;
      td3.textContent = _idnum;

      trow.appendChild(td1);
      trow.appendChild(td1_1);
      trow.appendChild(td1_2);
      trow.appendChild(td2);
      trow.appendChild(td3);

      tbody.appendChild(trow);
    }

    //Add All Data
    function addAllItems(TheStudent) {
      stdNo = 0;
      tbody.innerHTML = "";
      TheStudent.forEach((element) => {
        AddItem({
          firstName: element.firstName,
          midName: element.midName == '' ? '-' : element.midName,
          lastName: element.lastName
        }, element.email, element.idNum);
      });
    }

    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
    import { getAuth , onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-auth.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
    const firebaseConfig = {
      apiKey: "AIzaSyD2NHnCMKq75vuFIdzwY_3eDZlfzPorbV0",
      authDomain: "mynewmain-b15f0.firebaseapp.com",
      databaseURL:
        "https://mynewmain-b15f0-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "mynewmain-b15f0",
      storageBucket: "mynewmain-b15f0.appspot.com",
      messagingSenderId: "1045380132876",
      appId: "1:1045380132876:web:a6aa3460d5b72020da7e29",
      measurementId: "G-5PT4Z3YG3P",
    };
    const app = initializeApp(firebaseConfig);
    //const analytics = getAnalytics(app);
    import {
      getFirestore,
      collection,
      getDocs,
      query,
      where
    } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";

    const db = getFirestore();

    async function GetAllDataOnece() {
      const dbRef = collection(db, 'users');
      const q = query(dbRef, where('role', '==', 'student'));
      

      const querySnapshot = await getDocs(q);

      var sessionData = document.getElementById("sessionDataContainer").dataset.session;
      sessionData = JSON.parse(sessionData);
      console.log(sessionData);

      var uidDataSection, teacherUid, role;
      teacherUid = sessionData.verified_user_id;
      role = sessionData.role;
      const r = query(dbRef, where('uid', '==', teacherUid));
      const qs = await getDocs(r);

      qs.forEach((doc) => {
        //Put data to uiddatasecition
        console.log(doc.data());
        uidDataSection = doc.data().section;
      });

      /*
      const r = query(dbRef, where('uid', '==', teacherUid));
      const querySnapshot2 = await getDocs(r);
      querySnapshot2.forEach((doc) => {
        console.log(doc.data());
        uidDataSection = doc.data().section;
      });

      */
      var students = [];
      querySnapshot.forEach((doc) => {
        if(role == "teacher") {
          //Filter Archived students 
          if(doc.data().isArchived == "false") {
            //After checking for archived, check for section
              if(doc.data().section == uidDataSection) {
                console.log(doc.data());
                students.push(doc.data());
            }
          }
        } else if (role == "admin") {
          students.push(doc.data());
        }
      });

      addAllItems(students);
    }


    window.onload = GetAllDataOnece;


      

