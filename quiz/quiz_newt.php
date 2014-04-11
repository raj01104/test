<?php

session_start();
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$next = $question + 1;
	$prev = $question - 1;
	if(!isset($_SESSION['qid_array']) && $question != 1){
		$msg = "Sorry! No cheating.";
		header("location: index_newt.php?msg=$msg"); 
		exit();
	}
	if(isset($_SESSION['qid_array']) && in_array($question, $_SESSION['qid_array'])){
		$msg = "Sorry, Cheating is not allowed. You will now have to start over. Haha.";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		session_destroy();
		header("location: index_newt.php?msg=$msg");
		exit();
	}
	if(isset($_SESSION['lastQuestion']) && $_SESSION['lastQuestion'] != $prev){
		$msg = "Sorry, Cheating is not allowed. You will now have to start over. Haha.";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		session_destroy();
		header("location: index_newt.php?msg=$msg");
		exit();
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quiz Page</title>
<script type="text/javascript">
function countDown(secs,elem) {
	var element = document.getElementById(elem);
	element.innerHTML = "<center>You have "+secs+" seconds remaining.</center>";
	if(secs < 1) {
		var xhr = new XMLHttpRequest();
		var url = "userAnswers_newt.php";
			var vars = "radio=0"+"&qid="+<?php echo $question; ?>;
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {
			alert("You did not answer the question in the allotted time. It will be marked as incorrect.");
			clearTimeout(timer);
	}
}
xhr.send(vars);
		document.getElementById('counter_status').innerHTML = "";
		document.getElementById('btnSpan').innerHTML = '<h2>Times Up!</h2>';
		document.getElementById('btnSpan').innerHTML += '<a href="quiz_newt.php?question=<?php echo $next; ?>">Click here now</a>';
		
	}
	secs--;
	var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
}
</script>
<script>
function getQuestion(){
	var hr = new XMLHttpRequest();
		hr.onreadystatechange = function(){
		if (hr.readyState==4 && hr.status==200){
			var response = hr.responseText.split("|");
			if(response[0] == "finished"){
				document.getElementById('status').innerHTML = response[1];
			}
			var nums = hr.responseText.split(",");
			document.getElementById('question').innerHTML = nums[0];
			document.getElementById('answers').innerHTML = nums[1];
			document.getElementById('answers').innerHTML += nums[2];
		}
	}
hr.open("GET", "questions_newt.php?question=" + <?php echo $question; ?>, true);
  hr.send();
}
function x() {
		var rads = document.getElementsByName("rads");
		for ( var i = 0; i < rads.length; i++ ) {
		if ( rads[i].checked ){
		var val = rads[i].value;
		return val;
		}
	}
}
function post_answer(){
	var p = new XMLHttpRequest();
			var id = document.getElementById('qid').value;
			var url = "userAnswers_newt.php";
			var vars = "qid="+id+"&radio="+x();
			p.open("POST", url, true);
			p.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			p.onreadystatechange = function() {
		if(p.readyState == 4 && p.status == 200) {
			document.getElementById("status").innerHTML = '';
			//alert("Thanks, Your answer was submitted"+ p.responseText);
			var url = 'quiz_newt.php?question=<?php echo $next; ?>';
			window.location = url;
	}
}
p.send(vars);
document.getElementById("status").innerHTML = "processing...";
	
}
</script>
<script>
window.oncontextmenu = function(){
	return false;
}
</script>
<link rel = "stylesheet" type = "text/css" href = "css/flatly.css">

</head>

<body onLoad="getQuestion()">
<script src = "http://code.jquery.com/jquery-1.10.1.min.js"> </script>
		<script src = "js/bootstrap.js"> </script>

		<div class="”container”" style = "font-family: 'Museo Slab'; height: 710px; background: url(../img/pen-paper.jpg);">
		
		<div class = "col-md-offset-2 col-md-8">	
			<div class = "jumbotron" id="status" style = "min-height: 400px; margin-top: 100px; border: 1px solid #000000;">
				<h5 class = "text-warning"><div id="counter_status"></div></h5>
				<h3>
					<div id="question"></div>
				</h3>
				<h4>
					<div id="answers" style = "margin-top: 20px; margin-left: 15px;"></div>
				</h4>
			</div>
		</div>
		</div>
<script type="text/javascript">countDown(20,"counter_status");</script>
</body>
</html>