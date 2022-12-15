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

if (registerBtn != null) {
  registerBtn.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();

    registerBtn.setAttribute("disabled", "");

    var firstName = document.querySelector('[name="firstName"]');
    var midName = document.querySelector('[name="midName"]');
    var lastName = document.querySelector('[name="lastName"]');
    var email = document.querySelector('[name="email"]');
    firstName.setAttribute("disabled", "");
    midName.setAttribute("disabled", "");
    lastName.setAttribute("disabled", "");
    email.setAttribute("disabled", "");

    var phone;
    var idNum;

    var type = document
      .querySelector("#main-form")
      .getAttribute("data-type")
      .toLocaleLowerCase();

    var payload = {
      type: type,
      firstName: firstName.value,
      lastName: lastName.value,
      email: email.value,
    };

    if(midName.value){
      payload['midName'] = midName.value;
    }

    if (type == "admin" || type == "teacher") {
      phone = document.querySelector('[name="phone"]');
      phone.setAttribute("disabled", "");
      payload["phone"] = phone.value;
    } else if (type == "student") {
      idNum = document.querySelector('[name="idNum"]');
      idNum.setAttribute("disabled", "");
      payload["idNum"] = idNum.value;
    }

    console.log(payload);

    createUser(payload)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        if (data.status == 201) {
          alert(`New ${type[0].toUpperCase() + type.substring(1)} was added.`);
          location.reload();
        } else if (data.status == 400) {
          console.log(data);
          if (data.data.details) {
            if (
              data.data.details[0].message ==
              `"idNum" is not allowed to be empty`
            ) {
              throw new Error("Please provide a valid LRN");
            } else {
              throw new Error(data.data.details[0].message);
            }
          } else if (data.data.error) {
            throw new Error(data.data.error);
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
        console.log(error);
        alert(error);
      })
      .finally(() => {
        registerBtn.removeAttribute("disabled");
        firstName.removeAttribute("disabled");
        lastName.removeAttribute("disabled");
        midName.removeAttribute("disabled");
        email.removeAttribute("disabled");
        if (phone) {
          phone.removeAttribute("disabled");
        }

        if (idNum) {
          idNum.removeAttribute("disabled");
        }
      });
  });
}
