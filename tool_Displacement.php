<!DOCTYPE html>
<html>
	<head>
		<title>Physics Easily</title>
		<meta charset="utf-8"> 
		<link rel = "stylesheet" type = "text/css" href = "css/flatly.css">
            <script type="application/x-javascript" src="js/createjs.js">               
            </script>
            <script type="application/x-javascript" src = "js/jquery-1.10.2.js">
            </script>
            <script type = "text/javascript" src = "js/displacement.js"></script>
        
	</head>
	<body>
		<script src = "http://code.jquery.com/jquery-1.10.1.min.js"> </script>
		<script src = "js/bootstrap.js"> </script>

		<div class="”container”" style = "font-family: 'Museo Slab'">
			<!--- Nav bar div-->
                <div class="navbar navbar-default">
                    <?php include 'navbar.php' ?>
                </div>
            <!-- Nav bar div ends -->
            <div class="intro-header-intermediate">        
            </div>

            <div class = "row" style = "height: 100%">
            <!-- Panel div -->
    	    <div class="col-md-3 col-sm-2" style = "background-color: #f0f0f0" align = "center">
                <?php include 'panel.php' ?>
            </div>
            <!-- Panel div ends -->

            <!-- Home page div -->
    		<div class="col-md-7" style = "margin-left: 10px; margin-top: 10px">
                <canvas id = "canvas1" height="500" width="460"></canvas>
                <br>
                <p>X : &nbsp <span id = "x-coord"></span></p>
                <p >Y : &nbsp <span id = "y-coord"></span></p>
                <p>Displacement : &nbsp <span id = "disp"></span></p>
                <p>Distance : &nbsp <span id = "dist"></span></p>
    		  </div>
    		</div>
            <div class = "row">
                <!-- Made from header-->
                 <div class="navbar navbar-inverse">
                    <?php include 'footer.php' ?>
                </div>
            </div>
        </div>            
	</body>
</html>
