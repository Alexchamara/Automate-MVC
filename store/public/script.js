// $(function () {
//     $(".nav").load("navigation.html");
//     $(".footer").load("footer.html");
// });

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM fully loaded and parsed");
});

function validateLogin() {
    let email = document.getElementById('logInEmail').value;
    let password = document.getElementById('loginPassword').value;

    let emailError = document.getElementById("logEmailError");
    let passwordError = document.getElementById("logPasswordError");

    // Clear previous error messages
    emailError.innerText = "";
    passwordError.innerText = "";

    // if (email === "" || password === "") {
    //     if (email === "") {
    //         emailError.innerText = "Email is required.";
    //     }
    //     if (password === "") {
    //         passwordError.innerText = "Password is required.";
    //     }
    //     return false;
    // }

    let emailPattern = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    let passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (!emailPattern.test(email)) {
        emailError.innerText = "Invalid email format.";
        return false;
    }
    if (!passwordPattern.test(password)) {
        passwordError.innerText = "Password must be at least 8 characters.";
        return false;
    }

    return true;
}

function validateForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let pwdrepeat = document.getElementById('pwdrepeat').value;

    let nameError = document.getElementById("nameError");
    let emailError = document.getElementById("emailError");
    let passwordError = document.getElementById("passwordError");
    let pwdrepeatError = document.getElementById("pwdrepeatError");

    // Clear previous error messages
    nameError.innerText = "";
    emailError.innerText = "";
    passwordError.innerText = "";
    pwdrepeatError.innerText = "";

    let namePattern = /^[a-zA-Z]+$/;
    let emailPattern = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    let passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (!namePattern.test(name)) {
        nameError.innerText = "Name must contain only letters.";
        return false;
    }
    if (!emailPattern.test(email)) {
        emailError.innerText = "Invalid email format.";
        return false;
    }
    if (!passwordPattern.test(password)) {
        passwordError.innerText = "Password must be at least 8 characters.";
        return false;
    }
    if (password !== pwdrepeat) {
        pwdrepeatError.innerText = "Passwords do not match.";
        return false;
    }

    return true;
}