//add data table

  var stdNo = 0;
    var tbody = document.getElementById("tbody1");
    function AddItem(_firstName, _lastName, _email) {
      let trow = document.createElement("tr"); //change trow to tr
      let td1 = document.createElement("td");
      let td2 = document.createElement("td");
      let td3 = document.createElement("td");

      // set the text content of each td element to the corresponding argument
      td1.textContent = _firstName;
      td2.textContent = _lastName;
      td3.textContent = _email;

      trow.appendChild(td1);
      trow.appendChild(td2);
      trow.appendChild(td3);

      tbody.appendChild(trow);
    }

    function addAllItems(TheStudent) {
      stdNo = 0;
      tbody.innerHTML = "";
      TheStudent.forEach((element) => {
        AddItem(element.uid, element.name, element.email);
      });
    }

import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
 
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
      const q = query(dbRef, where('role', '==', 'teacher'));

      var querySnapshot = await getDocs(q);

      var students = [];
      querySnapshot.forEach((doc) => {
        students.push(doc.data());
      });

      addAllItems(students);
    }

    window.onload = GetAllDataOnece;


      

