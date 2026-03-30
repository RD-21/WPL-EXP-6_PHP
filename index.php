<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>

<style>
body {
    font-family: "Times New Roman", Times, serif;
    background-color: black;
    color: white;
    margin: 0;
    padding: 0;
}
h1 {
    background-color: white;
    color: black;
    padding: 30px;
    margin: 0;
    text-align: center;
    border-bottom: 6px solid red;
    font-size: 30px;
}
.wrapper {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 20px;
}
.section {
    margin-bottom: 40px;
}
h2 {
    color: red;
    border-bottom: 2px solid red;
    padding-bottom: 5px;
    margin-bottom: 20px;
    text-align: center;
}
form {
    background-color: white;
    color: black;
    padding: 30px;
    border-radius: 10px;
    border-left: 6px solid red;
    box-shadow: 0 10px 25px rgba(255, 0, 0, 0.2);
}
form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}
form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
}
button {
    padding: 10px 20px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
}
button:hover {
    background-color: darkred;
}
table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    color: black;
    border-left: 6px solid red;
    box-shadow: 0 10px 25px rgba(255, 0, 0, 0.15);
    margin-top: 20px;
}
th {
    background-color: red;
    color: white;
    padding: 12px;
}
td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}
tr:nth-child(even) {
    background-color: #f4f4f4;
}
a {
    text-decoration: none;
    color: red;
    font-weight: bold;
}
hr {
    border: 1px solid red;
    margin: 40px 0;
}
</style>

</head>
<body>

<h1>Student Management System</h1>

<div class="wrapper">

<div class="section">
<h2>Add Student</h2>
<form method="POST">
    <label>Name</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Course</label>
    <input type="text" name="course" required>

    <button type="submit" name="submit">Add Student</button>
</form>
</div>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("INSERT INTO students(name,email,course)
                  VALUES('$name','$email','$course')");
}
?>

<hr>

<div class="section">
<h2>Student Records</h2>
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM students");
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['email']}</td>
    <td>{$row['course']}</td>
    <td>
        <a href='update.php?id={$row['id']}'>Edit</a> |
        <a href='delete.php?id={$row['id']}'>Delete</a>
    </td>
    </tr>";
}
?>

</table>
</div>

</div>

</body>
</html>