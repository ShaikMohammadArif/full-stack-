<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<style>
body{
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #4e73df, #1cc88a);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container{
    background:white;
    padding:30px;
    border-radius:10px;
    width:400px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

input, select{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:5px;
    border:1px solid #ccc;
}

button{
    width:100%;
    padding:10px;
    background:#4e73df;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#2e59d9;
}

.table-container{
    margin-top:20px;
}
table{
    width:100%;
    border-collapse:collapse;
}
th, td{
    border:1px solid #ddd;
    padding:8px;
    text-align:center;
}
th{
    background:#4e73df;
    color:white;
}
</style>
</head>
<body>

<div class="container">
<h2>Student Registration</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="date" name="dob" required>
    
    <select name="department" required>
        <option value="">Select Department</option>
        <option>CSE</option>
        <option>ECE</option>
        <option>EEE</option>
        <option>Mechanical</option>
        <option>Civil</option>
    </select>
    
    <input type="tel" name="phone" placeholder="Phone Number" required>
    
    <button type="submit" name="submit">Register</button>
</form>

<?php
// Database Connection
$conn = mysqli_connect("localhost","root","","student_db");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO students(name,email,dob,department,phone)
            VALUES('$name','$email','$dob','$department','$phone')";
    mysqli_query($conn,$sql);
}

// Retrieve Data
$result = mysqli_query($conn,"SELECT * FROM students");

echo "<div class='table-container'>";
echo "<h3>Registered Students</h3>";
echo "<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>DOB</th>
<th>Department</th>
<th>Phone</th>
</tr>";

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['name']."</td>
    <td>".$row['email']."</td>
    <td>".$row['dob']."</td>
    <td>".$row['department']."</td>
    <td>".$row['phone']."</td>
    </tr>";
}

echo "</table></div>";
?>

</div>
</body>
</html>
