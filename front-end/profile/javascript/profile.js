function GetInfo(usrname) {
  if (usrname.length != 0) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
	  if (this.readyState == 4 && this.status == 200 && usrname == sessionStorage.getItem("username")) {
        var myObj = JSON.parse(this.responseText);         
        document.getElementById("password").value = myObj[0];
        document.getElementById("full_name").innerHTML = myObj[1];
        document.getElementById("fn").value = myObj[2];
        document.getElementById("email").value = myObj[3];
        document.getElementById("graduation").value = myObj[4];
        document.getElementById("major").value = myObj[5];
        document.getElementById("groupN").value = myObj[6];
      }
    };
  
    xmlhttp.open("GET", "../../back-end/api/profile/profile.php?username=" + usrname, true);
    xmlhttp.send();
  }
}

const submitBtn = document.getElementById("button");

submitBtn.addEventListener('click', (event) => {
  event.preventDefault();
	
  const username = document.getElementById("username");
  const password = document.getElementById("password");
  const graduation = document.getElementById("graduation");
  const major = document.getElementById("major");
  const groupN = document.getElementById("groupN");
	
  const formData = {
    username: username.value,
    password: password.value,
    graduation: graduation.value,
    major: major.value,
    groupN: groupN.value
  };

  updateProfile(formData);
});

async function updateProfile(formData) {
  const data = new FormData();

  fetch('../../back-end/api/profile/modifyProfile.php', {
    method: 'PUT',
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error('Error updating profile info.');
      }
      return response.json();
    })
    .then((data) => {
      if (data.success === true) {
        console.log("The profile is updated successfully.");
      } else {
        console.log('The profile is NOT updated successfully.');
      }
    })
    .catch(error => {
      const message = 'Error when updating profile.';
      console.log(error);
      console.error(message);
    });
}
