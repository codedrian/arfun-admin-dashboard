// checks the user login role before proceeding login

window.addEventListener("DOMContentLoaded", () => {
  var loginBtn = document.querySelector('[name="login_button"]');

  function logToSession(value, cred = {}) {
    var domain = window.location.pathname.substring(
      0,
      window.location.pathname.lastIndexOf("/")
    );

    $.ajax({
      url: `${window.location.origin}${domain}/rolelog.php`,
      method: "post",
      data: {
        name: value,
        cred: cred
      },
      success: (res) => {
        console.log(res);
        res = JSON.parse(res);
        location.href = res.location;
      },
      error: (err) => {
        console.log(err);
      },
    });
  }

  loginBtn.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();

    var payload = JSON.stringify({
      email: document.querySelector('[name="email"]').value,
      password: document.querySelector('[name="password"]').value,
    });

    console.log(payload);

    fetch("https://arfun-quiz.vercel.app/api/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      mode: "cors",
      body: payload,
    })
      .then((response) => {
        return response.json();
      })
      .then(async (data) => {
        if (data.status == 400) {
          logToSession("Login Failed: Invalid email or password");
        } else if (data.status == 401) {
          logToSession("Login Failed: Student accounts are not allowed");
        } else {
          logToSession("Logged in Succesfuly", data.data);
        }
      })
      .catch((error) => {
        console.log(error);
        alert("Something went wrong.");
      });
  });
});
