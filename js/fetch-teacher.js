//add data table

var stdNo = 0;
var tbody = document.getElementById("tbody1");
function AddItem(_name, _email, _phone, _section) {
  let trow = document.createElement("tr"); //change trow to tr
  let td1 = document.createElement("td");
  let td1_1 = document.createElement("td");
  let td1_2 = document.createElement("td");
  let td2 = document.createElement("td");
  let td3 = document.createElement("td");
  let td4 = document.createElement('td');
  let td6 = document.createElement("td");
  let td6_cb = document.createElement("input");

  // set the text content of each td element to the corresponding argument
  td1.textContent = _name.firstName;
  td1_1.textContent = _name.midName;
  td1_2.textContent = _name.lastName;
  td2.textContent = _email;
  td3.textContent = _phone;
  td4.textContent = _section;
  td6_cb.setAttribute("type","checkbox");
  td6_cb.setAttribute("value", _email);
  td6_cb.setAttribute("class", "cb-arc");

  trow.appendChild(td1);
  trow.appendChild(td1_1);
  trow.appendChild(td1_2);
  trow.appendChild(td2);
  trow.appendChild(td3);
  trow.appendChild(td4);
  trow.appendChild(td6);
  td6.appendChild(td6_cb);

  tbody.appendChild(trow);
}

function addAllItems(TheTeacher) {
  stdNo = 0;
  tbody.innerHTML = "";
  TheTeacher.forEach((element) => {
    AddItem(
      {
        firstName: element.firstName,
        midName: element.midName == "" ? "-" : element.midName,
        lastName: element.lastName,
      },
      element.email,
      element.phone,
      element.section
    );
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
  where,
  doc,
  updateDoc,
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";

const db = getFirestore();

async function GetAllDataOnece() {
  const dbRef = collection(db, "users");
  const q = query(dbRef, where("role", "==", "teacher"));

  var querySnapshot = await getDocs(q);

  var students = [];
  querySnapshot.forEach((doc) => {
    if(doc.data().isArchived == "false") {
      students.push(doc.data());
    }
  });

  addAllItems(students);
}

//Counter
var counter_asd = 0;
//Archive students
async function archiveStudent(e) {
  //alert("Archiving Started");
  //var a = e.currentTarget.parentElement.getAttribute("data-email");

  //get the doc id first
  const dbRef = collection(db, "users");
  const q = query(dbRef, where("email", "==", e));

  const qs = await getDocs(q);
  let studentData;
  qs.forEach((doc) => {
    //console.log(doc.id);
    studentData = doc.id;
  });

  console.log(studentData);

  //Start updating the data
  const docRef = doc(db, "users", studentData);
  await updateDoc(docRef, {
    isArchived: "true",
  }).then(() => {
    console.log("Teacher with email " + e + " successfully archived!");
    counter_asd++;
    updateCounter(counter_asd);
  });
}

function updateCounter(n) {
  let ap = document.querySelector(".as-proc");
  ap.innerHTML = n;

  //Test if ready for reload
  if (totalNosOfCheckedCB() == n) {
    alert("Successfully archived all selected teachers!");
    location.reload();
  }
}
function totalNosOfCheckedCB() {
  let cbs = document.querySelectorAll(".cb-arc");
  let counter = 0;

  for (var i = 0; i < cbs.length; i++) {
    if (cbs[i].checked == true) {
      counter++;
    }
  }
  return counter;
}

//Multi-Archive
function multiArchive() {
  let cbs = document.querySelectorAll(".cb-arc");
  let cbs_tnc = totalNosOfCheckedCB();
  console.log(cbs_tnc);

  if(cbs_tnc == 0) {
    alert("Nothing to archive");
  } else {
    alert("Archving Started");
    document.querySelector(".arch-status").style.display = "block";
    document.querySelector(".as-total").innerHTML = cbs_tnc;
    for(var i = 0; i < cbs.length; i++) {
      if(cbs[i].checked == true) {
        archiveStudent(cbs[i].value);
      }
    }
  }
}

//Select all
function selectAllCB() {
  var a = document.querySelectorAll(".cb-arc");
  for(var i = 0; i < a.length; i++) {
    a[i].checked = true;
  }
}

function deselectAllCB() {
  var a = document.querySelectorAll(".cb-arc");
  for(var i = 0; i < a.length; i++) {
    a[i].checked = false;
  }
}

document.querySelector("#select-all").addEventListener("click", selectAllCB);
document.querySelector("#deselect-all").addEventListener("click", deselectAllCB);

document.querySelector("#archive").addEventListener("click", multiArchive);

// //Add archive all
// document.querySelector("#archive-all").addEventListener("click", async () => {
// const as = document.querySelector(".arch-status");
// const asp = document.querySelector(".as-proc");
// const ast = document.querySelector(".as-total");
// as.style.display = "block";
// //Disable archive all
// document.querySelector("#archive-all").setAttribute("disabled", "");
// let a = document.querySelectorAll("[data-email]");
// console.log(a);
// for (var l = 0; l < a.length; l++) {
// //get the doc id first
// //alert("Processed: " + (l+1) + "/" + a.length);
// asp.innerHTML = l+1;
// ast.innerHTML = a.length;
// const dbRef = collection(db, "users");
// const q = query(dbRef, where("email", "==", a[l].getAttribute("data-email")));

// const qs = await getDocs(q);
// let studentData;
// qs.forEach((doc) => {
//   //console.log(doc.id);
//   studentData = doc.id;
// });

// console.log(studentData);

// //Start updating the data
// const docRef = doc(db, "users", studentData);
// await updateDoc(docRef, {
//   isArchived: "true",
// }).then(() => {
//   console.log("Student successfully archived!");
// });
// }
// alert("Successfully archived all students");
// location.reload();

// });

window.onload = GetAllDataOnece;
