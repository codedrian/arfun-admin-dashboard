//Quiz Edit
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
      getDoc,
      query,
      where,
      deleteDoc,
      doc,
    } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";


//Show quiz list, hide quiz frame
document.querySelector("#main-form").style.display = "none";
var base = document.querySelector(".base");

//Dynamically create elements
function createList(arrData, arrId) {
    let i = 0;
    arrData.forEach((data) => { 
        let a = document.createElement("span");
        a.innerText = data.title;
        a.setAttribute("data-quiz-id", arrId[i]);
        i++;
        a.addEventListener("click", (e) => {
            editQuiz(e.target.getAttribute("data-quiz-id"))
        });
        base.appendChild(a);
    })
}

const dbdb = getFirestore();
//Get the quiz list
async function getQuizList() {
    const sectionRef = document.querySelector("#section-sdc").getAttribute("data-session-section");
    const dbRef = collection(dbdb, 'quizzes');
    console.log(sectionRef);
    const q = query(dbRef, where('section', '==', sectionRef));
    const quizList = [];
    const quizId = [];

    const querySnapshot = await getDocs(q);

    querySnapshot.forEach((doc) => {
        //For every quiz data gathered, show on the page
        console.log(doc.data());
        quizList.push(doc.data());
        quizId.push(doc.id);
    });

    createList(quizList, quizId);
}

setTimeout(getQuizList, 1000);

function editQuiz(quizId) {
    let mf = document.querySelector("#main-form");
    let base = document.querySelector(".base");
    mf.style.display = "block";
    mf.setAttribute("data-quiz-id", quizId);
    base.style.display = "none";
    renderQuiz(quizId);
}

async function renderQuiz(quizId) {
    console.log(quizId);
    const a = doc(dbdb, 'quizzes', quizId);
    const docSnap = await getDoc(a);
    const datahook = docSnap.data();
    var i = 0;
    var y = 0;

    if(docSnap.exists()) {
        //Edit the name
        document.querySelector("#inp-quiz-name").value = datahook.title;
        document.querySelector("#inp-quiz-instruct").value = datahook.instructions;
        //Loop questions
        for (var x = 0; x < datahook.questions.length - 1; x++) {
            addQuestion();
        }
        var arrayOfChild = document.querySelector(".question-container").children;
        //console.log(arrayOfChild);
        datahook.questions.forEach((data) =>  {
            arrayOfChild[i].querySelector("#inp-question").value = data.question;
            //Choices
            for (var x = 0; x < data.choices.length - 2; x++) {
                addChoiceForEdit(arrayOfChild[i]);
            }
            var aocArray = arrayOfChild[i].querySelectorAll("input[placeholder='Choice value']");
            //console.log(data.choices);
            for (var l = 0; l < aocArray.length; l++) {
                //console.log(data.choices[l]);
                aocArray[l].value = data.choices[l].value;
            }
            i++;        
        });
        datahook.answers.forEach((data) => {
            //Show Correct Answer
            //Get All Radios
            var radioArray = [];
            for (var x = 0; x < arrayOfChild.length; x++) {
                //console.log(arrayOfChild);
                radioArray.push(arrayOfChild[x].querySelectorAll("#choice"));
                
                console.log(radioArray[x][data.answerIdx]);
            }
            //console.log(radioArray);
            //console.log(radioArray);
            radioArray[y][data.answerIdx].setAttribute("checked", "checked");
            y++;
            //var radioArray = arrayOfChild[i].querySelectorAll("#choice");
        });
        
        //Reset on exit
        y=0;
        i=0;

    }
}

async function deleteQuiz() {
    let mf = document.querySelector("#main-form").getAttribute("data-quiz-id");
    console.log(mf);
    const a = doc(dbdb, 'quizzes', mf);
    
    if (confirm("Are you sure you want to delete this quiz?")) {
        await deleteDoc(a);
        alert("Quiz Deleted.");
        location.reload();
    }
}

document.querySelector("#deleteQuiz").addEventListener("click", deleteQuiz);