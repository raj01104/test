<?php 

$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	$msg = strip_tags($msg);
	$msg = addslashes($msg);
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Quiz Tut</title>
<script>
function startQuiz(url){
	window.location = url;
}
</script>
<link rel = "stylesheet" type = "text/css" href = "css/flatly.css">
</head>
<body>
<script src = "http://code.jquery.com/jquery-1.10.1.min.js"> </script>
		<script src = "js/bootstrap.js"> </script>

		<div class="”container”" style = "font-family: 'Museo Slab'">
			<!---<h1><a href="”#”">Physics-Easily</a></h1>-->
			<!--- Nav bar -->
			<div class="navbar navbar-default" style = "margin-bottom: 0px;">
  			<div class="navbar-header" style = "margin-bottom: 0px;">
    			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
              <span class="icon-bar"></span>  				
    			</button>
  			</div>
  			<div class="navbar-collapse collapse navbar-responsive-collapse" >
        <a class="navbar-brand" href="#">Physics-Easily</a>
    			<ul class="nav navbar-nav" style = "font-size: 15px">
      				<li class="active"><a href="#">Home</a></li>
              <li><a href = "#">About</a></li>
              <li><a href = "#"></a></li>
      				  </ul>
      				</li>
    			</ul>
          
    			
    			<ul class="nav navbar-nav navbar-right">
                <!--<form class="navbar-form navbar-left">
                    <input type="text" class="form-control col-lg-4" placeholder="Search">
                </form>-->
      				<li><a href="login.html">LOGIN</a></li>
      				<li><a href="signup.html">Sign Up</a></li>
    			</ul>
  			</div>
			</div>
			<!--- Navbar ends-->
			<!--- Intro header -->
			<div class="intro-header" style = "background:url('../img/pencil.jpg');background-size: 1350px 200px; height :200px;">
                    <div class="intro-message">
                        
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            
                        </ul>
                    </div>
    		</div>
<?php echo $msg; ?>


<h3 class="font-green" style="font-size:20px" >Click below when you are ready to start the quiz on kinematics</h3>
<button class="info" onClick="startQuiz('quiz_kin.php?question=1')">Click Here To Begin</button>
<h3 style="font-size:20px;color:#242cc2">Click below when you are ready to take the complete quiz</h3>
<button type="button" class="btn btn-info" onClick="startQuiz('quiz.php?question=1')">Click Here To Begin</button>
<h3 style="font-size:20px;color:#242cc2">Click below when you are ready to start the quiz on newtons law of motion</h3>
<button type="button" class="btn btn-info" onClick="startQuiz('quiz_newt.php?question=1')">Click Here To Begin</button>
<h3 style="font-size:20px;color:#242cc2">Click below when you are ready to start the quiz on vectors</h3>
<button type="button" class="btn btn-info" onClick="startQuiz('quiz_v.php?question=1')">Click Here To Begin</button>

</body>
</html>