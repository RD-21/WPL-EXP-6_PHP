<?php include 'db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Student</title>
<style>
body {background:black;color:white;font-family:"Times New Roman";}
form {
    background:white;color:black;
    padding:30px;width:40%;
    margin:100px auto;
    border-left:6px solid red;
}
input {width:100%;padding:10px;margin-bottom:15px;}
button {
    background:red;color:white;
    padding:10px;border:none;
}
</style>
</head>
<body>

<h1 style="text-align:center;">Update Student</h1>

<form method="POST">
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">

    <label>Email</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>">

    <label>Course</label>
    <input type="text" name="course" value="<?php echo $row['course']; ?>">

    <button name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $course=$_POST['course'];

    $conn->query("UPDATE students 
                  SET name='$name', email='$email', course='$course'
                  WHERE id=$id");

    header("Location:index.php");
}
?>

</body>
</html>