<?php

session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']>30))
	{
		session_unset();
		session_destroy();
	}
	$_SESSION['LAST_ACTIVITY']=time();
if(!isset($_SESSION['countdown_time'])){
	$_SESSION['countdown_time'] = 20;
	//"fdas";
}
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$next = $question + 1;
	$prev = $question - 1;
	
}
if(isset($_GET['quiz_id'])){
$quiz_id=preg_replace('/[^0-9]/', "", $_GET['quiz_id']);
//echo $quiz_id;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quiz Page</title>
<script src = "../../js/jquery.countdown.js"></script>

<script type="text/javascript">
function countDown(secs,elem) {
	var element = document.getElementById(elem);
	element.innerHTML = "<center>You have "+secs+" seconds remaining.</center>";
	if(secs < 1) {
		var xhr = new XMLHttpRequest();
		var url = "userAnswers.php";
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
		document.getElementById('btnSpan').innerHTML += '<a href="quiz.php?question=<?php echo $next; ?>?&quiz_id=<?php echo $quiz_id?>">Click here now</a>';
		
	}
	secs--;
	<?php $_SESSION['countdown_time'] = $_SESSION['countdown_time'];?>
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
hr.open("GET", "questions.php?question=" + <?php echo $question; ?> + "?&quiz_id=" + <?php echo $quiz_id?>, true);
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
			var url = "userAnswers.php";
			var vars = "qid="+id+"&radio="+x();
			p.open("POST", url, true);
			p.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			p.onreadystatechange = function() {
			if(p.readyState == 4 && p.status == 200) {
			document.getElementById("status").innerHTML = '';
			var url = 'quiz.php?question=<?php echo $next; ?>?&quiz_id=<?php echo $quiz_id?>';
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
<link rel = "stylesheet" type = "text/css" href = "../../css/flatly.css">

</head>

<body onLoad="getQuestion()">
<script src = "http://code.jquery.com/jquery-1.10.1.min.js"> </script>
		<script src = "../../js/bootstrap.js"> </script>

		<div class="”container”" style = "font-family: 'Museo Slab'; height: 710px; background: url(../../img/pen-paper.jpg);">
		
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
<script type="text/javascript">countDown(<?php echo $_SESSION['countdown_time'];?>,"counter_status");</script>
</body >
</html>