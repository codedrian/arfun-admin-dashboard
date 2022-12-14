///add data table
var stdNo = 0;
var tbody = document.getElementById("tbody1")
function AddItem(name, _uid, _dateCompleted, _description, _items, _quizId, _quizTitle, _score) {

    let trow = document.createElement("tr");
    let tdFname = document.createElement("td");
    let tdMidName = document.createElement("td");
    let tdLname = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let td5 = document.createElement("td");
    let td6 = document.createElement("td");

    tdFname.innerHTML = name.firstName;
    tdMidName.innerHTML = name.midName;
    tdLname.innerHTML = name.lastName;
    td2.innerHTML = _uid;
    td3.innerHTML = _dateCompleted;
    td4.innerHTML = _description;
    td5.innerHTML = _items;
    td6.innerHTML = _quizTitle;


    trow.appendChild(tdFname); //this should conatin the name
    trow.appendChild(tdMidName); //this should conatin the name
    trow.appendChild(tdLname); //this should conatin the name
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
    TheStudent.forEach(element => {
        AddItem(names, element.student.uid, element.student.dateCompleted, element.student.description, element.student.items, element.student.quizId, element.student.quizTitle, element.student.score);
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

async function GetAllDataOnece() {
    const querySnapshot = await getDocs(collection(db, "quizScores"));

    var names = []
    var students = [];
    querySnapshot.forEach(async doc => {

        var dbRef = collection(db, 'users');

        var q = query(dbRef, where('uid', '==', doc.data().uid));
        var qSnapshot = await getDocs(q);
        if (qSnapshot.docs[0]) {
            var user = qSnapshot.docs[0].data();

            console.log(user)

            students.push(doc.data());
            names.push({
                firstName: user.firstName,
                midName: user.midName,
                lastName: user.lastName
            })
        }
    });

    addAllItems(students, names);
}

//to retrieve the name of given UID in quizScores to users collection student
// const uid = "someUID";
// const querySnapshot = await collection(db, "users").where("uid", "==", uid).get();

// if(querySnapshot.size === 0) {
//     alert("No matching documents.");
//     return;
// }

// const student =querySnapshot.docs[0].data();
// const name = student.name;





window.onload = GetAllDataOnece;