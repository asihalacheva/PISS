const btn = document.querySelector("button");

const login = (event) => {
  event.preventDefault();
  console.log(event);
  window.location.href = "front-end/login/login.html";
};
btn.addEventListener("click", login);
