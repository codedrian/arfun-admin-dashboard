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
import { getFirestore, collection, query, getDocs, where, doc, updateDoc } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";
import { getStorage, ref, uploadBytesResumable, getDownloadURL} from 	"https://www.gstatic.com/firebasejs/9.15.0/firebase-storage.js";

const db = getFirestore();
const strg = getStorage();


//Get current user session data
let sdc = document.getElementById("sessionDataContainer").dataset.session;
sdc = JSON.parse(sdc);

async function getUserData() {

    //Get the UID from the session data
    const uid = sdc.verified_user_id;
    //Fetch the data from users col
    const dbRef = collection(db, 'users');
    var q = query(dbRef, where('uid', '==', uid));
    var querySnapshot = await getDocs(q);

    //Get the elements that will show the data
    const firstName = document.querySelector("#firstName");
    const midName = document.querySelector("#midName");
    const lastName = document.querySelector("#lastName");
    const mnos = document.querySelector("#mnos");
    const email = document.querySelector("#email");
    const section = document.querySelector(".section");
    const uidEl = document.querySelector(".uid");

    //Process fetched promise
    querySnapshot.forEach((doc) => {
        //Hold data
        var a = doc.data();
        //Print Data
        firstName.value = a.firstName;
        midName.value = a.midName;
        lastName.value = a.lastName;
        mnos.value = a.phone;
        email.value = a.email;
        section.textContent = a.section;
        uidEl.textContent = a.uid;

        loadDp();
    });
}

getUserData();

async function uploadDp() {
  alert("Update Started");
  var udpinp = document.querySelector("#uDp");
  //Get data
  var sessionData = document.getElementById("sessionDataContainer").dataset.session;
  sessionData = JSON.parse(sessionData);
  const dbRef = collection(db, 'users');
  const q = query(dbRef, where('uid', '==', sessionData.verified_user_id));
  const qs = await getDocs(q);
  
  let docId;

  qs.forEach((doc) => {
    docId = doc.id;
  });


  //udpinp.addEventListener("change", function() {
    
    const file  = udpinp.files;
    const storageRef = ref(strg, 'dp/' + sessionData.verified_user_id);
    const uploadTask = uploadBytesResumable(storageRef, file[0]);

    uploadTask.on('state_changed', 
      (ss) => {
        //console.log(file);
        document.querySelector("#upd-bytes").textContent = ss.bytesTransferred;
        document.querySelector("#tt-bytes").textContent = ss.totalBytes;
        document.querySelector("#perc-prog").textContent = (ss.bytesTransferred/ss.totalBytes) * 100 + "%";

        switch (ss.state) {
          case 'paused':
            document.querySelector("#up-status").textContent = "Paused";
            break;
          case 'running':
            document.querySelector("#up-status").textContent = "Uploading";
            break;
        }
      }, (err) => {
        switch (err.code) {
          case 'storage/unauthorized':
            document.querySelector("#up-status").textContent = "Unauthorized";
            break;
          case 'storage/canceled':
            document.querySelector("#up-status").textContent = "Cancelled";
            break;
          case 'storage/unknown':
            document.querySelector("#up-status").textContent = "Unknown Error Occurred";
            break;
          default:
            document.querySelector("#up-status").textContent = "Unknown Error Occurred";
        }
      }, () => {
        console.log(uploadTask);
        getDownloadURL(uploadTask.snapshot.ref).then(async (dUrl) => {
          let a = document.querySelectorAll(".dp");
          for (var i = 0; i < a.length; i++) {
            a[i].setAttribute("src", dUrl);
          }
          //Update img link
          const docRef = doc(db, 'users', docId);
          await updateDoc(docRef, {
            img: dUrl,
          });
          location.reload();
        });
      }
    );
    
 }

document.querySelector("#changeDp").addEventListener("click", uploadDp);

async function loadDp() {
  const dp = document.querySelectorAll(".dp");
  //Get the UID from the session data
  const uid = sdc.verified_user_id;
  //Fetch the data from users col
  const dbRef = collection(db, 'users');
  var q = query(dbRef, where('uid', '==', uid));
  var querySnapshot = await getDocs(q);

  querySnapshot.forEach((a) => {
    for(var i = 0; i < dp.length; i++) {
      dp[i].setAttribute("src", a.data().img);
    }
  });
  
}
function editData() {
    //Get elements
    const firstName = document.querySelector("#firstName");
    const midName = document.querySelector("#midName");
    const lastName = document.querySelector("#lastName");
    const mnos = document.querySelector("#mnos");

    const submitEditsBtn = document.querySelector("#submitEdits");
    const perfEditsBtn = document.querySelector("#startEdits");
    const uploadDpBtn = document.querySelector("#upload-btn");

    firstName.removeAttribute("disabled");
    midName.removeAttribute("disabled");
    lastName.removeAttribute("disabled");
    mnos.removeAttribute("disabled");
    
    submitEditsBtn.removeAttribute("disabled");
    perfEditsBtn.setAttribute("disabled", "");
    uploadDpBtn.removeAttribute("disabled");
}

async function submitData() {
  //Get Values, then update
    //Get data
    var sessionData = document.getElementById("sessionDataContainer").dataset.session;
    sessionData = JSON.parse(sessionData);
    const dbRef = collection(db, 'users');
    const q = query(dbRef, where('uid', '==', sessionData.verified_user_id));
    const qs = await getDocs(q);
  
    let docId;

    qs.forEach((doc) => {
      docId = doc.id;
    });

    //Test mnos
    if (mnos.value.length == 11) {
      //Update data
      const docRef = doc(db, 'users', docId);
      await updateDoc(docRef, {
        firstName: firstName.value,
        midName: midName.value,
        lastName: lastName.value,
        phone: mnos.value,
      });
      alert("Data updated");
      location.reload();
    } else {
      alert("Invalid Number");
    }
}

document.querySelector("#startEdits").addEventListener("click", editData);
document.querySelector("#submitEdits").addEventListener("click", submitData);

document.querySelector("#upload-btn").addEventListener("click",
    function() {
      document.querySelector(".floating-window").style.display = "block";
    }
  );

document.querySelector("#closeSectionSort").addEventListener("click",
  function() {
    document.querySelector(".floating-window").style.display = 'none';
  }
);