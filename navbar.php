
<?php 
  echo '<!--- Nav bar -->
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                
                </button>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse" >
            <a class="navbar-brand" href="index.php">Physics-Easily</a>
                
                <ul class="nav navbar-nav" style = "font-size: 15px">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href = "About_us.php">About</a></li>
                    <li><a href = "Contact_us.php">Contact Us</a></li>
                </ul>
          
                <ul class="nav navbar-nav navbar-right">
                <!--<form class="navbar-form navbar-left">
                        <input type="text" class="form-control col-lg-8" placeholder="Search">
                    </form>-->
                    <li><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginModal">
                        LOGIN
                        </button>
                    </li>
                    <li><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#signupModal">
                        Sign up
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Login Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h2 class="modal-title" id="myModalLabel">Login</h2></center>
                  </div>
                  <div class="modal-body">
                    <form class="form col-md-12 center-block">
                      <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block">Sign In</button>
                        <span class="pull-right"><a href="#" style = "color: #2c3e50">Forgot Password?</a></span>
                        <span class = "pull-left"><a href="#" style = "color: #2c3e50">Login with Gmail Account</a></span>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss = "loginModal" data-toggle = "modal" data-target = "#signupModal">Sign up</button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Signup Modal -->
            <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h2 class="modal-title" id="myModalLabel">Sign Up</h2></center>
                  </div>
                  <div class="modal-body">
                                  <form class="form col-md-12 center-block">
                                    <div class="form-group">
                                      <input type="text" class="form-control input-lg" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control input-lg" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" class="form-control input-lg" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" class="form-control input-lg" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                      <button class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                    </div>
                                  </form>
                              </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <span class="pull-right"><a href="#" style = "color: #2c3e50">Sign up using Gmail Account</a></span>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!--- Navbar ends-->'; ?>
    