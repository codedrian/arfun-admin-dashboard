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
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";

const db = getFirestore();

async function loadUserData() {
//get session data for teacher's uid
const dbRef = collection(db, 'users');
var sessionData = document.getElementById("sessionDataContainer").dataset.session;
sessionData = JSON.parse(sessionData);
//console.log(sessionData);

var teacherUid, role;
teacherUid = sessionData.verified_user_id;
role = sessionData.role;
const r = query(dbRef, where('uid', '==', teacherUid));
const qs = await getDocs(r);

  qs.forEach((doc) => {
    //Push data to handler
    //console.log(doc.data());
    console.log(doc.data().section);
    document.querySelector("#section-sdc").setAttribute("data-session-section",  doc.data().section);

    //Replace the inserted session data to database data
    const sdc = document.getElementById("sessionDataContainer");
    const sdcData = JSON.parse(sdc.dataset.session);

    //Modify
    sdcData.dispName = doc.data().firstName + " " + doc.data().midName.charAt(0) + ". " + doc.data().lastName;

    //Update
    sdc.dataset.session = JSON.stringify(sdcData);
  });
}

setTimeout(function() {
  document.querySelector("#dispName").textContent = JSON.parse(document.getElementById("sessionDataContainer").dataset.session).dispName;
}, 3000);

loadUserData();

