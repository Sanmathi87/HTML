<!DOCTYPE html>
<html>
<head>
<title>Quiz Application</title>
</head>
<body>
<h1>Quiz Application</h1>
<form method="post">
<p>Question 1:What is the capital of France?</p>
<input type="radio" name="q1" value="Paris">Paris<br>
<input type="radio" name="q1" value="London" required>London<br>
<input type="radio" name="q1" value="Berlin" >Berlin<br>
<p>Question 2:What is the Capital of TamilNadu?</p>
<input type="radio" name="q2" value="Mumbai">Mumbai<br>
<input type="radio" name="q2" value="Chennai" required>Chennai<br>
<input type="radio" name="q2" value="Kerela">Kerela<br>
<p>Question 3:What is the National Bird of India?</p>
<input type="radio" name="q3" value="Peacock">Peacock<br>
<input type="radio" name="q3" value="Parrot" required>Parrot<br>
<input type="radio" name="q3" value="Pigeon">Pigeon<br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
function checkAnswers($userAnswers){
$correctAnswers=array('q1'=>'Paris','q2'=>'Chennai','q3'=>'Peacock');
$score=0;
foreach($userAnswers as $question=>$userAnswer){
if(isset($correctAnswers[$question])&& $correctAnswers[$question]===$userAnswer){
$score++;
}}
return $score;
}
if(isset($_POST['submit'])){
$userAnswers=array(
'q1'=>$_POST['q1'],
'q2'=>$_POST['q2'],
'q3'=>$_POST['q3']
);
$score=checkAnswers($userAnswers);
echo"<h2>Quiz Results:</h2>";
echo"<p>Your Score:$score out of 3</p>";
}
?>
</body>
</html>
