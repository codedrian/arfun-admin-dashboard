///add data table

var stdNo = 0;
var tbody = document.getElementById("tbody1");
function AddItem(_section, _scount) {
  let trow = document.createElement("tr"); //change trow to tr
  let td1 = document.createElement("td");
  let td2 = document.createElement("td");
  let td3 = document.createElement("td");
  let td3_cb = document.createElement("input");


  // set the text content of each td element to the corresponding argument
  td1.textContent = _section;
  td2.textContent = _scount;
  td3_cb.setAttribute("type", "checkbox");
  td3_cb.setAttribute('class', 'cb-arc');

  trow.appendChild(td1);
  trow.appendChild(td2);
  trow.appendChild(td3);

  td3.appendChild(td3_cb);

  tbody.appendChild(trow);
}

//Add All Data
function addAllSection(section, scount) {
  stdNo = 0;
  tbody.innerHTML = "";
  var scountStore = scount;
  //console.log(scountStore);
  for (var l = 0; l < section.length; l++) {
    AddItem(section[l].section, scountStore[l].count);
  }
}

import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
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
  where,
  getCountFromServer
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";

const db = getFirestore();

async function getSections() {
  //For section
    const dbRef = collection(db, 'sections');
    const qs = await getDocs(dbRef);

  //For Student Count
    const dbRef2 = collection(db, 'users');


    var sections = [];
    var numberOfStudents = [];
    //console.log(qs);
    qs.forEach(async (doc) => {
        //console.log(doc.data());
        sections.push(doc.data());
        /*
        qs.forEach((doc2) => {
          console.log(doc2.data());
        })
        */
    });
    //Count students
    for (var l = 0; l < sections.length; l++) {
      const q2 = query(dbRef2, where('section', '==', sections[l].section));
      const qs2 = await getCountFromServer(q2);
      numberOfStudents.push(qs2.data());
    }


    //get

    addAllSection(sections, numberOfStudents);
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


window.onload = getSections;
