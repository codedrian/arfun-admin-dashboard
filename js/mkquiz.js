var questionContainer = document.querySelector(".question-container");

function init() {
  var tempDiv = document.createElement("div");
  tempDiv.innerHTML = getQuestionTemplate(uuidv4(), false);
  questionContainer.append(tempDiv.firstElementChild);
}

// create default question template
init();

// use for adding choice base on questionId
function addChoice(e) {
  var qid =
    e.parentElement.parentElement.parentElement.getAttribute("data-qid");
  var container = document.querySelector(`[data-choice-qid="${qid}"]`);
  var tempDiv = document.createElement("div");
  tempDiv.innerHTML = getChoiceTemplate(qid, false, true);

  container.append(tempDiv.firstElementChild);
}

function removeChoice(e) {
  var inputGroupParent = e.parentElement;
  if (inputGroupParent.querySelector('[type="radio"]').checked) {
    // move he check to previous radio
    inputGroupParent.parentElement.previousElementSibling.querySelector(
      '[type="radio"]'
    ).checked = true;
  }
  inputGroupParent.parentElement.remove();
}

function addQuestion() {
  var tempDiv = document.createElement("div");
  tempDiv.innerHTML = getQuestionTemplate(uuidv4(), true);
  questionContainer.append(tempDiv.firstElementChild);
}

function removeQuestion(qid) {
  var confirmDeletion = confirm("This question will be deleted?");
  if (confirmDeletion) {
    document.querySelector(`[data-qid="${qid}"]`).remove();
  }
}

function getLetter(index) {
  const code = "a".charCodeAt(0);
  return String.fromCharCode(code + index);
}

// form submission
var form = document.getElementById("main-form");
form.addEventListener("submit", function (e) {
  e.preventDefault();

  // you can add input validation here

  // disable all fields
  document.querySelectorAll('input').forEach(inp => {
    inp.setAttribute('disabled', '');
  });
  document.querySelectorAll('[role="button"]').forEach(btn => {
    console.log(btn)
    btn.classList.add('disabled');
  });

  // show button loader
  document.getElementById("sbm-loader").style.display = "block";

  // construct the json payload
  var quizName = document.querySelector("#inp-quiz-name").value;
  var quizInstruction = document.querySelector("#inp-quiz-instruct").value;
  var questions = {};
  var answers = [];

  // gather all questions
  document.querySelectorAll("[data-qid]").forEach((qElement) => {
    var choices = [];
    var questionId = uuidv4();

    // evaluate choices
    qElement.querySelectorAll(".input-group").forEach((inpGroup, cIndex) => {
      choices.push({
        letter: getLetter(cIndex),
        value: inpGroup.querySelector('[type="text"]').value,
      });

      // if checked push in answer
      if (inpGroup.querySelector("#choice").checked) {
        answers.push({
          questionId: questionId,
          answerIdx: cIndex,
        });
      }
    });

    // add the new question
    questions[`${questionId}`] = {
      question: qElement.querySelector("#inp-question").value,
      choices: choices,
    };
  });

  // bundle document
  var quizDoc = {
    title: quizName,
    instruction: quizInstruction,
    questions: questions,
    answers: answers,
  };

  // save to firestore database
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
});

// create guids v4 - base on: https://stackoverflow.com/questions/105034/how-do-i-create-a-guid-uuid
function uuidv4() {
  return ([1e7] + 1e3 + 4e3 + 8e3 + 1e11).replace(/[018]/g, (c) =>
    (
      c ^
      (crypto.getRandomValues(new Uint8Array(1))[0] & (15 >> (c / 4)))
    ).toString(16)
  );
}
