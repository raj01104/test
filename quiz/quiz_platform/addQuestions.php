<?php 
$quiz ="";
$msg="";
$status="";
$startID=""; 

if(isset($_GET['msg'])){
	$quiz = $_GET['msg'];
}

if(isset($_GET['status'])){
	$status = $_GET['status'];
}
?>

<?php
if(isset($_POST['desc'])){
	$quiz = $_GET['msg'];
	
	if(!isset($_POST['iscorrect']) || $_POST['iscorrect'] == ""){
		echo "Sorry, important data to submit your question is missing. Please press back in your browser and try again and make sure you select a correct answer for the question.";
		exit();
	}
	if(!isset($_POST['type']) || $_POST['type'] == ""){
		echo "Sorry, there was an error parsing the form. Please press back in your browser and try again";
		exit();
	}
	require_once("scripts/connect_db.php");
	$question = $_POST['desc'];
	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	$answer3 = $_POST['answer3'];
	$answer4 = $_POST['answer4'];
	$type = $_POST['type'];
	$type = preg_replace('/[^a-z]/', "", $type);
	$isCorrect = preg_replace('/[^0-9a-z]/', "", $_POST['iscorrect']);
	$answer1 = strip_tags($answer1);
	$answer1 = mysql_real_escape_string($answer1);
	$answer2 = strip_tags($answer2);
	$answer2 = mysql_real_escape_string($answer2);
	$answer3 = strip_tags($answer3);
	$answer3 = mysql_real_escape_string($answer3);
	$answer4 = strip_tags($answer4);
	$answer4 = mysql_real_escape_string($answer4);
	$question = strip_tags($question);
	$question = mysql_real_escape_string($question);
	if($type == 'tf'){
	if((!$question) || (!$answer1) || (!$answer2) || (!$isCorrect)){
		echo "Sorry, All fields must be filled in to add a new question to the quiz. Please press back in your browser and try again.";
		exit();
		}
	}
	if($type == 'mc'){
	if((!$question) || (!$answer1) || (!$answer2) || (!$answer3) || (!$answer4) || (!$isCorrect)){
		echo "Sorry, All fields must be filled in to add a new question to the quiz. Please press back in your browser and try again.";
		exit();
		}
	}
	//echo $quiz;
	//exit();
	$sql = mysql_query("INSERT INTO questions (question, type,quiz_id) VALUES ('$question', '$type', '$quiz')")or die(mysql_error());
		$lastId = mysql_insert_id();
		mysql_query("UPDATE questions SET question_id='$lastId' WHERE id='$lastId' LIMIT 1")or die(mysql_error());
	//// Update answers based on which is correct //////////
	if($type == 'tf'){
		if($isCorrect == "answer1"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer1', '1','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer2', '0','$quiz')")or die(mysql_error());
		$status = 'Thanks, your question has been added';
		$quiz = $_GET['msg'];
		header('location: addQuestions.php?msg='.$quiz.'&status='.$status.'');
	exit();
	}
	if($isCorrect == "answer2"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer2', '1','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer1', '0','$quiz')")or die(mysql_error());
		$status = 'Thanks, your question has been added';
		header('location: addQuestions.php?msg='.$quiz.'&status='.$status.'');
	exit();
		}	
	}
	if($type == 'mc'){
		if($isCorrect == "answer1"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer1', '1','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer2', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer3', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer4', '0','$quiz')")or die(mysql_error());
		$status = 'Thanks, your question has been added';
	  header('location: addQuestions.php?msg='.$quiz.'&status='.$status.'');
	exit();
	}
	if($isCorrect == "answer2"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer2', '1','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer1', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer3', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer4', '0','$quiz')")or die(mysql_error());
		$status = 'Thanks, your question has been added';
	  header('location: addQuestions.php?msg='.$quiz.'&status='.$status.'');
	exit();
	}
	if($isCorrect == "answer3"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer3', '1','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer1', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer2', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer4', '0','$quiz')")or die(mysql_error());
		$status = 'Thanks, your question has been added';
	  header('location: addQuestions.php?msg='.$quiz.'&status='.$status.'');
	exit();
	}
	if($isCorrect == "answer4"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer4', '1','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer1', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer2', '0','$quiz')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct,quiz_id) VALUES ('$lastId', '$answer3', '0','$quiz')")or die(mysql_error());
		$status = 'Thanks, your question has been added';
	  header('location: addQuestions.php?msg='.$quiz.'&status='.$status.'');
	exit();
		}
	}
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create A Quiz</title>
<script>
function showDiv(el1,el2,el3){
	document.getElementById(el1).style.display = 'block';
	document.getElementById(el2).style.display = 'none';
	document.getElementById(el3).style.display = 'none';
}
</script>
<style type="text/css">
.content{
	margin-top:48px;
	margin-left:auto;
	margin-right:auto;
	width:780px;
	border:#333 1px solid;
	border-radius:12px;
	-moz-border-radius:12px;
	padding:12px;
	display:none;
}
</style>
<link rel = "stylesheet" type = "text/css" href = "../../css/flatly.css">
</head>

<body>
	<script src = "http://code.jquery.com/jquery-1.10.1.min.js"> </script>
		<script src = "../../js/bootstrap.js"> </script>

		<div class="”container”" style = "font-family: 'Museo Slab'">
			<!---<h1><a href="”#”">Physics-Easily</a></h1>-->
			<!--- Nav bar -->
			<div class="navbar navbar-default">
    			<?php include 'navbar.php' ?>
			</div>
			<!--- Navbar ends-->
			<!--- Intro header -->
	<div class = "row">	
	<div class="col-md-3 col-sm-2" style = "background-color: #f0f0f0" align = "center">
                <?php include 'panel.php' ?>
            </div>
    <div class="col-md-7" style = "margin-left: 10px; margin-bottom: 10px">
   		<div id = "quiz" style="width:700px;margin-left:auto;margin-right:auto;text-align:center;">
   			<p class = 'text-info'><?php echo $status; ?></p>
			<h2>What type of question would you like to create?</h2>
    		</div>
    	<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active"><a href="#tf" data-toggle="tab">True/False</a></li>
  			<li class=""><a href="#mc" data-toggle="tab">MCQs</a></li>
		</ul>
		<div id="myTabContent" class="tab-content" style = "margin-left: 15px">
  			<div class="tab-pane fade active in" id="tf">
  				
    			<form action="addQuestions.php?msg=<?php echo $quiz;?>" name="addQuestion" method="post">
    			Please type your new question here
    			<br>
    			<textarea id="tfDesc" name="desc" style="width:400px;height:95px;"></textarea>
    	  		<br/>
    			<br/>
    			Please select whether true or false is the correct answer
    			<br/>
            	<input type="text" id="answer1" name="answer1" value="True" readonly>&nbsp;
              	<label style="cursor:pointer; color:#06F;">
            	<input type="radio" name="iscorrect" value="answer1">Correct Answer?</label>
    	  		<br />
   				<br />
            	<input type="text" id="answer2" name="answer2" value="False" readonly>&nbsp;
              	<label style="cursor:pointer; color:#06F;">
              		<input type="radio" name="iscorrect" value="answer2">Correct Answer?
            	</label>
    	  		<br />
    			<br />
    			<input type="hidden" value="tf" name="type">
    			<input class = "btn btn-warning" type="submit" value="Add To Quiz">
    			</form>
    			<div class = "row" align = "right">
    			<button class = "btn btn-info" onclick = "window.location = 'addQuiz.php?msg=\'Thank you. Your quiz has been created.\''">Done</button>
 			</div></div>
			<div class="tab-pane fade" id="mc">
  	
    <form action="addQuestions.php?msg=<?php echo $quiz;?>" name="addMcQuestion" method="post">
    Please type your new question here
        <br />
        <textarea id="mcdesc" name="desc" style="width:400px;height:95px;"></textarea>
        <br />
      <br />
    Please create the first answer for the question
    	<br />
        <input type="text" id="mcanswer1" name="answer1">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer1">Correct Answer?
        </label>
      <br />
    <br />
    Please create the second answer for the question
    <br />
        <input type="text" id="mcanswer2" name="answer2">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer2">Correct Answer?
        </label>
      <br />
    <br />
    Please create the third answer for the question
    <br />
        <input type="text" id="mcanswer3" name="answer3">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer3">Correct Answer?
        </label>
      <br />
    <br />
    Please create the fourth answer for the question
    <br />
        <input type="text" id="mcanswer4" name="answer4">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer4">Correct Answer?
        </label>
      <br />
    <br />
    <input type="hidden" value="mc" name="type">
    <input class = "btn btn-warning" type="submit" value="Add To Quiz">
   	</form>
   	<div class = "row" align = "right">
    			<button class = "btn btn-info" onclick = "window.location = 'addQuiz.php'">Done</button>
 			</div></div> 
		</div>
 </div>
 </div>
    <div class = "navbar navbar-inverse">
    <?php include 'footer.php' ?>
    </div>
 </div>
</body>
</html>