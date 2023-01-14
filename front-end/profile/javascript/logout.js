(function() {
    const logout = document.getElementById("logout");

    logout.addEventListener("click", () => {
        return fetch("../../back-end/api/logout/logout.php")
	.then((data) => {
	  return data
	})
	.then((data) => {
        if (data["status"] === "error") {
          throw new Error(data["message"]);
        } else {
	  localStorage.removeItem("username");
          localStorage.removeItem("threads");
          window.location.href = "../../index1.php";
        }
        })
        .catch((error) => {
          console.log(error);
        })
    })
})()
