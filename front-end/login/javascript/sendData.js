(function () {
  const registrationBtn = document.getElementById("register");
  const loginBtn = document.getElementById("login");
  const fields = document.querySelectorAll("input");
  const responseMsg = document.getElementById("response");
  const form = document.getElementById("login-form");

  const toRegister = (event) => {
    event.preventDefault();
    window.location.href = "../register/register.html";
  };

  form.addEventListener("submit", (event) => {
    event.preventDefault();

    responseMsg.innerHTML = "";
    responseMsg.classList.remove("error");
    responseMsg.classList.remove("success");

    let data = {};
    let isEmpty = false;
    fields.forEach((field) => {
      data[field.name] = field.value;
      if (field.value === "") {
        isEmpty = true;
      }
    });
    const formElement = event.target;

    const formData = {
      username: formElement.querySelector("input[name='username']").value,
      password: formElement.querySelector("input[name='password']").value,
    };

    if (!isEmpty) {
      fetch("../../back-end/api/login/login.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      })
        .then((data) => {
          return data.json();
        })
        .then((data) => {
          if (data["status"] === "error") {
            throw new Error(data["message"]);
          } else {
            sessionStorage.setItem("username", document.getElementById("username").value);
            responseMsg.innerHTML = "Успешно влязохте!";
            responseMsg.classList.remove("hidden");
            responseMsg.classList.add("success");
            window.location.href = "../../front-end/destinations/dest.php";
          }
        })
        .catch((err) => {
          responseMsg.innerHTML = err;
          responseMsg.classList.remove("hidden");
          responseMsg.classList.add("error");
        });
    } else {
      responseMsg.innerHTML = "Всички полета трябва да бъдат попълнени!";
      responseMsg.classList.remove("hidden");
      responseMsg.classList.add("error");
    }
  });

  registrationBtn.addEventListener("click", toRegister);
})();
