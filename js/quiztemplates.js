function getChoiceTemplate(qid, isChecked = false, withRemover = false) {
  return `<div class="col d-flex">
      <div class="input-group d-flex align-items-center">
          <div class="form-check me-2">
              <input class="form-check-input" type="radio" name="choice-${qid}"
                  id="choice" ${isChecked ? `checked` : ``}>
          </div>
          <input type="text" class="form-control"
              placeholder="Choice value" >

          ${
            withRemover
              ? `<a class="btn btn-danger" onClick="removeChoice(this)">
              <svg xmlns="http://www.w3.org/2000/svg" width="16"
                  height="16" fill="currentColor" class="bi bi-dash"
                  viewBox="0 0 16 16">
                  <path
                      d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
              </svg>
          </a>`
              : ``
          }
      </div>
  </div>`;
}

function getQuestionTemplate(qid, withDelete = true) {
  return `<div class="rounded-3 mt-2 p-4 mb-4 bg-light border border-2 shadow" data-qid="${qid}">
      <div class="row d-flex flex-column">
          <div class="col mb-3">
              <label for="inp-question" class="form-label h6 mb-3">Question</label>
              <input type="text" class="form-control" id="inp-question">
          </div>
          <div class="col mt-3">
              <div class="row">
                  <p class="h6 mb-3">Choices</p>
              </div>
              <div class="row d-flex flex-column gap-3" data-choice-qid="${qid}">
                  ${getChoiceTemplate(qid, true)}
                  ${getChoiceTemplate(qid)}
              </div>
          </div>
      </div>
  
      <div class="row mt-3">
          <div class="col p-2 d-flex justify-content-center gap-3">
          ${
            withDelete
              ? `<a class="btn btn-danger" role="button" onClick="removeQuestion('${qid}')">
            <div class="d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-trash me-2"
                    viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
                <span>Delete</span>
            </div>
        </a>`
              : ``
          }
              <a class="btn btn-primary" role="button" onclick="addChoice(this)">
                  <div class="d-flex align-items-center justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                          fill="currentColor" class="bi bi-plus-circle me-2"
                          viewBox="0 0 16 16">
                          <path
                              d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                          <path
                              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                      </svg>
                      <span>Choice</span>
                  </div>
              </a>
          </div>
      </div>
  </div>`;
}
