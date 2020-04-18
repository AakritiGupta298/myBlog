<?php

    session_start();
    
    $error="";

    $link = mysqli_connect("localhost","root","","blog");
        
         if(mysqli_connect_error()){
           
             die("Database connection error");

    }

    if(isset($_POST['signup'])){
        
         header("Location: blog_signup.php");
        
    }

    if(isset($_POST['login'])){
        
        if(!$_POST['login_username']){
            
            $error.="Username is required.<br>";
        }
        
        if(!$_POST['login_password']){
            
            $error.=" Password is required.<br>";
        }
        
        else{
            
            $username=$_POST['login_username'];
            $password=$_POST['login_password'];
            $query="SELECT * FROM `blog` WHERE username = '$username' AND password ='$password'";

            $result=mysqli_query($link,$query);
            
            if(mysqli_num_rows($result) > 0){
                
                $_SESSION['username']=$username;
                header("Location: blog_homepage.php");
                
            } else{
                
                $error.= "Incorrect Username or Password<br>";
                
            }
            
        }
        
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
    <title>Shhtories</title>
	
	<style>
		
		html { 
  
		    background-color:#c62828;
		}
		
		body{
		
			background: none;
		}
		
		.quote{
		
			width: 500px;
			padding:20px;
			margin-top: 50px;
			margin-left: 20px;
			flex:1;
			
		}
		
		.parent{
		
			display:flex;
		
		}
		
	    .shhtories{
	        
	        font-size:10px;
	        
	    }
		
		.login{
		
			width: 35%;
			height: auto;
			border-style:solid;
			border-color:white;
			padding:20px;
			margin-top: 150px;
			margin-right: 50px;
			border-radius:25px;
			
		
		}
		
		.myblog{
		    
		    width:100%;
		    height: 40px;
		    background-color:brown;
		    padding-left:2px;
		    
		}
		
	
		
	</style>
	
  </head>
  
  
  
  <body>
      
      <form method="POST">
 
<p style="background-color: #8e0000; font-family: 'Pacifico', cursive; font-size: 80px; display: flex;justify-content: center; color: white;"> My Blog</p>
	
<div class="parent">	

<div class="quote">
    
    <p style=" font-family: 'Pacifico', cursive; font-size: 60px; display: flex;justify-content: left; color: white;" class="shhtories"> Hey!! </p>
    <p style="color:white; font-size:30px; font-family: 'Pacifico', cursive;">The writer inside you is waiting my dear......</p>
	<p style="color:white; font-size:30px; font-family: 'Pacifico', cursive;">Save your thoughts or show out your skills to the world. Start writing your stories and you will fall in love with it. Share your achievements and what all you discovered. It's amazing. Give it a try!!</p>
	
	

</div>

<div class="container login">

	<div class="form-group">
	    
	    <?php echo $error; ?>
	    
	
		<input type="text" class="form-control" id="name" name="login_username" aria-describedby="emailHelp" placeholder="Enter Username" >
    </div>
	
	<div class="form-group">
	
		<input type="password" class="form-control" id="password" name="login_password" aria-describedby="emailHelp" placeholder="Enter Password" >
    </div>
    <br>
	<button class="btn btn-lg" style="background-color:#8e0000; color: white;" name="login">Login</button>
	<button class="btn btn-lg"  style="background-color:#8e0000; color: white; float:right"name="signup">Signup</button>

</div>

</div>
</form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>