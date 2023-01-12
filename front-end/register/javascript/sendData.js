const btn = document.getElementById("btn");
const responseMsg = document.getElementById("response");
const fields = document.querySelectorAll("input");

const register = (event) => {
  event.preventDefault();

  responseMsg.innerHTML = "";
  responseMsg.classList.remove("error");
  responseMsg.classList.remove("success");
  
  let userName = document.getElementById("username").value;  
  let passWord = document.getElementById("password").value;
  let validPwd = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{6,}$/;
  let eMail = document.getElementById("email").value;
  let validEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  let fullName = document.getElementById("fullName").value;

  if (userName == "" || passWord == "" || eMail == "" || fullName == "") {
	  responseMsg.innerHTML = "Всички полета трябва да бъдат попълнени!";
    responseMsg.classList.remove("hidden");
    responseMsg.classList.add("error");
  } else if (userName.length < 2 || userName.length > 30) {
	  responseMsg.innerHTML = "Невалидно потребителско име. Трябва да съдържа 2-30 символа.";
	  responseMsg.classList.remove("hidden");
    responseMsg.classList.add("error");
  } else if (validPwd.test(passWord) == false) {
	  responseMsg.innerHTML = "Невалидна парола. Трябва да съдържа поне 6 символа, да включва главни и малки букви и цифри.";
	  responseMsg.classList.remove("hidden");
    responseMsg.classList.add("error");
  } else if (validEmail.test(eMail) == false) {
	  responseMsg.innerHTML = "Невалиден e-mail. Поддържа валиден имейл формат.";
	  responseMsg.classList.remove("hidden");
    responseMsg.classList.add("error");
  } else if (fullName.length > 50) {
	  responseMsg.innerHTML = "Невалидно име. Tрябва да съдържа максимум 50 символа.";
	  responseMsg.classList.remove("hidden");
    responseMsg.classList.add("error");
  } else {
	  let data = {};
	  fields.forEach((field) => {
		  data[field.name] = field.value;
    });
	
	  fetch("../../back-end/api/register/register.php", {
	    method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
    .then((data) => {
      return data.json();
    }) 
    .then((data) => {
      if (data["status"] === "error") {
        throw new Error(data["message"]);
      } else {
        responseMsg.innerHTML = "Успешна регистрация!";
        responseMsg.classList.remove("hidden");
        responseMsg.classList.add("success");
        window.location.href = "../login/login.html";
      }
    })
    .catch((err) => {
      responseMsg.innerHTML = err;
      responseMsg.classList.remove("hidden");
      responseMsg.classList.add("error");
    });
  }
}

btn.addEventListener("click", register);
