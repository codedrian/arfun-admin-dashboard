function createUser(payload) {
  return fetch("https://arfun-quiz.vercel.app/api/createuser", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    mode: "cors",
    body: JSON.stringify(payload),
  });
}

function setFields(state) {}

var registerBtn = document.querySelector('[name="register_button"]');

registerBtn.addEventListener("click", (e) => {
  e.preventDefault();
  e.stopPropagation();

  registerBtn.setAttribute("disabled", "");

  var name = document.querySelector('[name="fullName"]');
  var email = document.querySelector('[name="email"]');
  name.setAttribute("disabled", "");
  email.setAttribute("disabled", "");

  var phone;
  var idNum;

  var payload = {};
  var type = document
    .querySelector("#main-form")
    .getAttribute("data-type")
    .toLocaleLowerCase();

  if (type == "admin" || type == "teacher") {
    phone = document.querySelector('[name="phone"]');
    phone.setAttribute("disabled", "");

    payload = {
      type: type,
      name: name.value,
      phone: phone.value,
      email: email.value,
    };
  } else if (type == "student") {
    idNum = document.querySelector('[name="idNum"]');
    idNum.setAttribute("disabled", "");

    payload = {
      type: type,
      name: document.querySelector('[name="fullName"]').value,
      email: document.querySelector('[name="email"]').value,
      idNum: document.querySelector('[name="idNum"]').value,
    };
  }

  createUser(payload)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      if (data.status == 201) {
        alert(`New ${type[0].toUpperCase() + type.substring(1)} was added.`);
        location.reload();
      } else if (data.status == 400) {
        if(data.data.details[0].message == `"idNum" is not allowed to be empty`){
          throw new Error('Please provide a valid LRN');
        } else {
          throw new Error(data.data.details[0].message);
        }
      } else if (data.status == 409) {
        throw new Error(
          data.data.error == "EMAIL_EXISTS"
            ? "Email already exist"
            : data.data.error
        );
      }
    })
    .catch((error) => {
      alert(error);
    })
    .finally(() => {
      registerBtn.removeAttribute("disabled");
      name.removeAttribute("disabled");
      email.removeAttribute("disabled");
      if (phone) {
        phone.removeAttribute("disabled");
      }

      if (idNum) {
        idNum.removeAttribute("disabled");
      }
    });
});
