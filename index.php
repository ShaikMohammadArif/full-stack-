<?php
$conn = new mysqli("localhost", "root", "", "studentdb");

$sort = isset($_GET['sort']) ? $_GET['sort'] : "name";
$department = isset($_GET['department']) ? $_GET['department'] : "all";

$sql = "SELECT * FROM students";

if($department != "all"){
    $sql .= " WHERE department='$department'";
}

$sql .= " ORDER BY $sort ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>

<h2>Student Records</h2>

<form method="GET">
    Sort By:
    <select name="sort">
        <option value="name">Name</option>
        <option value="date">Date</option>
    </select>

    Filter By Department:
    <select name="department">
        <option value="all">All</option>
        <option value="CSE">CSE</option>
        <option value="ECE">ECE</option>
        <option value="IT">IT</option>
    </select>

    <button type="submit">Apply</button>
</form>

<table border="1">
<tr>
    <th>Name</th>
    <th>Department</th>
    <th>Date</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
    echo "<tr>
        <td>".$row['name']."</td>
        <td>".$row['department']."</td>
        <td>".$row['date']."</td>
    </tr>";
}
?>
</table>

<h3>Department Count</h3>

<?php
$countQuery = "SELECT department, COUNT(*) as total FROM students GROUP BY department";
$countResult = $conn->query($countQuery);

while($row = $countResult->fetch_assoc()){
    echo $row['department']." : ".$row['total']."<br>";
}
?>

</body>
</html>
