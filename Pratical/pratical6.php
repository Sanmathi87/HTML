<!DOCTYPE html>
<html>
<head>
<title>Course Registration</title>
<style>
body{
background-color:lightblue;
}
form{
background-color:white;
padding:15px;
width: 300px;
}
</style>
</head>
<body>

<h2>Course Registration Form</h2>

<form method="post">
Name: <input type="text" name="name" required><br><br>

Email: <input type="email" name="email" required><br><br>
Department:<input type="text" name="dept" requires><br><br>

Course:
<select name="course">
    <option value="Computer Science">Computer Science</option>
    <option value="Data Science">Data Science</option>
    <option value="Web Development">Web Development</option>
</select><br><br>

Gender:<select name="gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select><br><br>
<input type="submit" name="submit" value="Register">
</form>

<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    $gender = $_POST["gender"];
    $dept=$_POST["dept"];

    echo "<h3>Registration Details</h3>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Department: $dept</p>";
    echo "<p>Course: $course</p>";
    echo "<p>Gender: $gender</p>";
    }
?>

</body>
</html>