function getChoiceTemplate(qid) {
  return `<div class="col d-flex">
    <div class="input-group d-flex align-items-center">
        <div class="form-check me-2">
            <input class="form-check-input" type="radio" name="choice-${qid}"
                id="choice">
        </div>
        <input type="text" class="form-control"
            placeholder="Choice value">
        <a class="btn btn-danger" onClick="removeChoice(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" class="bi bi-dash"
                viewBox="0 0 16 16">
                <path
                    d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
            </svg>
        </a>
    </div>
</div>`;
}

// use for adding choice base on questionId
function addChoice(qid) {
  var container = document.querySelector(`[data-choice-qid="${qid}"]`);
  var tempDiv = document.createElement("div");
  tempDiv.innerHTML = getChoiceTemplate(qid);

  container.append(tempDiv.firstChild);
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
