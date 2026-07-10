<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Student Course Selection</title>
</head>
<body>
<h1><b><center>Course Registration</center></b></h1>
<form action="course.php" method="get">
<Table align="center">
<tr> <th>Name</th>
<td><input type="text" name="name"></td></tr>
<tr> <th>SSLC Mark </th>
<td><input type="number" name="sslcmrk"></td>
</tr>
<tr> <th>HSC Mark </th><td><input type="number" name="hscmrk"></td></tr>
<tr>
<th>Courses</th><td><select name="course">
<option value="Computer Science">Computer Science</option>
<option value="Computer Science with Cognitive Systems">Computer Science with Cognitive Systems</option>
<option value="Computer Science with Artificial Intelligence">Computer Science with Artificial Intelligence</option>
<option value="Information Technology">Information Technology</option>
<option value="B.Sc CS with cyber security">B.Sc CS with cyber security</option>
</select></td></tr>
<tr><td><input type="submit" name="submit"></td></tr>
</Table></form></body></html>