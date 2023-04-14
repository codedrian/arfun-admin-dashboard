///add data table

var stdNo = 1;
var mainSelect = document.getElementById("section");
function createStartingSelection() {
    let d0 = document.createElement("option");
    d0.textContent = "Select a section";
    d0.value = "undf";
    mainSelect.appendChild(d0);
}
function AddSectionSelection(_section) {
  let d1 = document.createElement("option");
  d1.textContent = _section;
  d1.value = _section;
  mainSelect.append(d1);
  
}

//Add All Data
function addAllSectionSelection(section) {
  stdNo = 0;
  mainSelect.innerHTML = "";
  for (var l = 0; l < section.length; l++) {
    AddSectionSelection(section[l].section);
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
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";

const db = getFirestore();

async function getSectionsSelection() {
  //For section  
    const dbRef = collection(db, 'sections');
    const qs = await getDocs(dbRef);
    var sections = [];
    //console.log(qs);
    qs.forEach(async (doc) => {
        sections.push(doc.data());
    });


    //get
    createStartingSelection();
    addAllSectionSelection(sections);
    setDefaultSection();
}

getSectionsSelection();

// Set the default student reg to current sec of prof
function setDefaultSection() {
  const a = document.querySelectorAll("option");
  setTimeout(function() {
    const b = document.querySelector("#section-sdc").getAttribute("data-session-section");

    for(var i = 0; i < a.length; i++) {
      if (a[i].value == b) {
        a[i].setAttribute("selected", "");
      }
    }
  }, 300);
}