<?php 

session_start();
require_once("scripts/connect_db.php");
$arrCount = "";
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$output = "";
	$answers = "";
	$q = "";

	if(isset($_GET['quiz_id'])){
	$quiz_id = $_GET['quiz_id'];
	}

	

	$sql = mysql_query("SELECT question_id FROM questions WHERE quiz_id = $quiz_id");
	$numQuestions = mysql_num_rows($sql);
	if(!isset($_SESSION['answer_array']) || $_SESSION['answer_array'] < 1){
		$currQuestion = "1";
	}else{
		$arrCount = count($_SESSION['answer_array']);
		
	}
	if($arrCount > $numQuestions){
		unset($_SESSION['answer_array']);
		header("location: ../../test.php");
		exit();
	}
	if($arrCount >= $numQuestions){
		echo '<br>Finished|
		<p>There are no more questions. Please enter your first and last name and click next</p>
				<form action="userAnswers.php?quiz_id='.$quiz_id.'" method="post">
				<input type="hidden" name="complete" value="true">
				<input type="text" name="username">
				<input class = "btn btn-primary" type="submit" value="Finish">
				</form>';
		exit();
	}
	$singleSQL = mysql_query("SELECT * FROM questions WHERE id='$question' AND quiz_id = $quiz_id LIMIT 1");
		while($row = mysql_fetch_array($singleSQL)){
			$id = $row['id'];
			$thisQuestion = $row['question'];
			$type = $row['type'];
			$question_id = $row['question_id'];
			$q = '<h2>'.$thisQuestion.'</h2>';
			$sql2 = mysql_query("SELECT * FROM answers WHERE question_id='$question' AND quiz_id = $quiz_id ORDER BY rand()");
			while($row2 = mysql_fetch_array($sql2)){
				$answer = $row2['answer'];
				$correct = $row2['correct'];
				$answers .= '<label style="cursor:pointer;"><input type="radio" name="rads" value="'.$correct.'">'.$answer.'</label> 
				<input type="hidden" id="qid" value="'.$id.'" name="qid"><br /><br />
				';
				
			}
			$output = ''.$question_id.'. '.$q.','.$answers.',<div class = "row" align = "center"><span id="btnSpan"><button class = "btn btn-primary" onclick="post_answer()">Submit</button></span></div>';
			echo $output;
		   }
		}
	

?>