//Quiz Edit


// form submission
var form = document.getElementById("main-form");
form.addEventListener("submit", function (e) {
  e.preventDefault();

  // you can add input validation here

  // disable all fields
  document.querySelectorAll("input").forEach((inp) => {
    inp.setAttribute("disabled", "");
  });
  document.querySelectorAll('[role="button"]').forEach((btn) => {
    btn.classList.add("disabled");
  });

  // show button loader
  document.getElementById("sbm-loader").style.display = "block";

  // construct the json payload
  var quizName = document.querySelector("#inp-quiz-name").value;
  var quizInstruction = document.querySelector("#inp-quiz-instruct").value;
  // var questions = {};
  var questions = [];
  var answers = [];

  // gather all questions
  document.querySelectorAll("[data-qid]").forEach((qElement, qIndex) => {
    var choices = [];

    // evaluate choices
    qElement.querySelectorAll(".input-group").forEach((inpGroup, cIndex) => {
      choices.push({
        letter: getLetter(cIndex),
        value: inpGroup.querySelector('[type="text"]').value,
      });

      // if checked push in answer
      if (inpGroup.querySelector("#choice").checked) {
        answers.push({
          questionId: qIndex,
          answerIdx: cIndex,
        });
      }
    });

    questions.push({
      question: qElement.querySelector("#inp-question").value,
      choices: choices,
    });
  });

  var uidDataSection = document.querySelector("#section-sdc").getAttribute("data-session-section");
  

  // bundle document
  var quizDoc = {
    title: quizName,
    instructions: quizInstruction,
    questions: questions,
    answers: answers,
    section: uidDataSection,
  };

  // save to firestore database
  // check if the ID exists, if yes, override.
  const quizId = document.querySelector('#main-form').getAttribute("data-quiz-id");
  if (quizId != null) {
    //const ref = doc(db, "quizzes", quizId);
    //set(ref, quizDoc);
    db.collection("quizzes")
    .doc(quizId)
    .set(quizDoc)
    .then((doc) => {
        var delay = setTimeout(() => {
          // you can show success dialog here
          alert("Quiz updated");
          window.location.reload(true);
          clearTimeout(delay);
        }, 1000);
      })
      .catch((err) => {
        console.log("Something went wrong...");
      })
      .finally(function () {
        // stop loader
        document.getElementById("sbm-loader").style.display = "none";
      });;
  } else {
    db.collection("quizzes")
    .add(quizDoc)
    .then((doc) => {
      var delay = setTimeout(() => {
        // you can show success dialog here
        alert("Quiz created.");
        window.location.reload(true);
        clearTimeout(delay);
      }, 1000);
    })
    .catch((err) => {
      console.log("Something went wrong...");
    })
    .finally(function () {
      // stop loader
      document.getElementById("sbm-loader").style.display = "none";
    });
}
  });
