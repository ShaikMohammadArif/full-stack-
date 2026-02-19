function validateForm() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let valid = true;

    // Clear previous errors
    document.getElementById("emailError").innerText = "";
    document.getElementById("passwordError").innerText = "";

    if (email === "") {
        document.getElementById("emailError").innerText = "Email is required";
        valid = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerText = "Password is required";
        valid = false;
    }

    return valid;
}
