
<?php
include 'dbConfig.php';
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
          
     
         $_SESSION['login_user'] = $myusername;
         
         header("location: viewCategory.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       
body {
    margin: 50px auto;
    text-align: center;
    width: 100%;
}
h1 {
    font-family: 'Passion One';
    font-size: 2rem;
    text-transform: uppercase;
}
label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: 'Lato';
}
input {
    border-radius: 19px;
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
}
form {
    margin: 25px auto;
    padding: 20px;
    border: 5px solid #ccc;
    width: 500px;
    background: white;
}
div.form-element {
    margin: 20px 0;
}
.button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: #1E448B;
    color: white;
    border: none;
}
p.success,
p.error {
    color: white;
    font-family: lato;
    background: yellowgreen;
    display: inline-block;
    padding: 2px 10px;
}
p.error {
    background: orangered;
}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

       <form method="post" action="" name="signin-form">
  <div class="form-element">
    <label>Username</label>
    <input type="text" name="username"  required />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" required />
  </div>
  <input  class="button" type="submit"  value="Log In">
  
  </form>
<a href="register.php">Create New User</a>
        
    </div>
</body>
</html>