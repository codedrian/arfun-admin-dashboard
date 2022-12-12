import { initializeApp } from 'firebase/app'
import { getFirestore, collection } from 'firebase/firestore'

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

//initFirebase app
initializeApp(firebaseConfig)

//init firebase services
const db = getFirestore()

//collection ref
const colRef = collection(db, 'users')

//get collection data
getDocs(colRef)
    .then((snapshot) => { 
        let books = []
        snapshot.docs.forEach((doc) => { 
            books.push({ ...doc.data(), id: doc.id})
        })
    })
    .catch(err => { 
        console.log(err.message)
    })