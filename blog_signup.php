<?php

session_start();
    
    $error="";

    $link = mysqli_connect("localhost","root","","blog");
        
         if(mysqli_connect_error()){

             die("Database connection error");
         }
         
    if(isset($_POST['signup'])){
        
        if(!$_POST['signup_username']){
            
            $error.="Username is required.<br>";
            
        }
        
        if(!$_POST['signup_password']){
            
            $error.="Password is required.<br>";
            
        }
        
        if(!$_POST['signup_email']){
            
            $error.="Email is required.<br>";
            
        }
        
        if(!$_POST['signup_contact']){
            
            $error.="Contact number is required.<br>";
            
        }
      
        
        else{
            
            $username=$_POST['signup_username'];
            $_SESSION['username']=$username;
            $password=$_POST['signup_password'];
            $email=$_POST['signup_email'];
            $contact=$_POST['signup_contact'];
            $profession=$_POST['signup_profession'];
            $education=$_POST['signup_education'];
            $workplace=$_POST['signup_workplace'];
            $query="SELECT * FROM `blog` WHERE username= '$username'";
            $result=mysqli_query($link,$query);
            if($row=mysqli_num_rows($result)){
                
                $error.="This username is already taken.";
            }
            else{
                
                $query="INSERT INTO `blog` (`username` , `password` , `email` , `contact` , `education` , `profession` , `workplace`) VALUES ('$username' , '$password' , '$email' , '$contact' , '$education' , '$profession' , 'workplace')";
                $result=mysqli_query($link,$query);
                if($result){
                    
                    //echo "signed up";
                    header("Location: blog_homepage.php");
                    
                }
                
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
    <title>Sign Up</title>
  
  <style>
      html{background-color: #c62828;
          
      }
      
      body{
          background:none;
      }
      
      .myblog{
		    
		    width:100%;
		    background-color:brown;
		    padding-left:2px;
		    
		}
		
	  .container{
	      
	      border:solid;
	      margin-top:5%;
	      width:50%;
	      border-radius:25px;
	      
	  }
	  
	  .star{
	      
	      float:right;
	      
	  }
      
  </style>
  </head>
  <body>
      
    <div class="myblog">
    
        <p style="background-color: #8e0000; font-family: 'Pacifico', cursive; font-size: 60px; display: flex;justify-content: center; color: white;"> Sign Up </p>
    
    </div>
   
   <form method="post">
   <div class="container"style="background-color:white; ">
        <p></p>
        <?php echo $error; ?>
  <div class="form-group">
    <label for="exampleInputEmail1"><strong>*Username</strong></label>
    <input type="username" class="form-control" id="exampleInputEmail1" name="signup_username" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><strong>*Password</strong></label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="signup_password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><strong>*E-Mail</strong></label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="signup_email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><strong>*Contact</strong></label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="signup_contact" placeholder="Contact">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><strong>Education</strong></label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="signup_education" placeholder="Education">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><strong>Profession</strong></label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="signup_profession" placeholder="Profession">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><strong>Workplace</strong></label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="signup_workplace" placeholder="Workplace">
  </div>
  <button class="btn" name="signup" style="background-color:#8e0000; color: white;">Sign Up</button>
  <br>
  <small class="star">* fields are compulsory.</small><br>
  
  <br>
  </div>
</form>
<br>
<br>

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