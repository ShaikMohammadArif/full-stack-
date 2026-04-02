// Validate Name
function validateName() {
    let name = document.getElementById("name").value;
    if (name.length < 3) {
        alert("Name must be at least 3 characters");
    }
}

// Validate Email
function validateEmail() {
    let email = document.getElementById("email").value;
    if (!email.includes("@")) {
        alert("Enter valid email");
    }
}
function submitForm() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let feedback = document.getElementById("feedback").value;

    if (name === "" || email === "" || feedback === "") {
        alert("All fields are required!");
        return;
    }

    alert("Form submitted successfully!");
}