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

// create guids v4 - base on: https://stackoverflow.com/questions/105034/how-do-i-create-a-guid-uuid
function uuidv4() {
  return ([1e7] + 1e3 + 4e3 + 8e3 + 1e11).replace(/[018]/g, (c) =>
    (
      c ^
      (crypto.getRandomValues(new Uint8Array(1))[0] & (15 >> (c / 4)))
    ).toString(16)
  );
}
