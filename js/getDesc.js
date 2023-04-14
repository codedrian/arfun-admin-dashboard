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
import { getFirestore, collection, query, getDocs, where } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";
		
const db = getFirestore();
		
document.querySelector("#file-desc").addEventListener("click", async function(e) {
    document.querySelector(".description").style.display = "block";
			
    var fileName = e.currentTarget.parentElement.getAttribute('data-file-name');
    console.log(fileName);
    //Query Data
    const dbRef = collection(db, 'lessons');
    const q = query(dbRef, where('filename', '==', fileName.slice(12)));
	const querySnapshot = await getDocs(q);
    
    querySnapshot.forEach((doc) => {
        if (doc.data().fileDesc != '' || doc.data().fileDesc != undefined) {
            console.log(doc.data());
            document.querySelector("#item-desc").textContent = doc.data().fileDesc;
        } else {
            document.querySelector("#item-desc").textContent = "No description available";
        }
    });
});

document.querySelector("#close-desc").addEventListener("click",
      function() {
        document.querySelector(".description").style.display = 'none';
      }
    );