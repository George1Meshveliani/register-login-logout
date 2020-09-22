
<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="http://example.com/style.css" type="text/css">
<body>  
<nav id="navbar" class="nav">
  <ul class="nav-list">
    <li>
      <a href="home.php">Home</a>
    </li>
    <li>
      <a href="mainRegistrationForm.php">Registration</a>
    </li>
  </ul>
</nav> 

<?php
// define variables and set to empty values
//$nameErr = $userNameErr = $password= $repeatPasswordErr = "";
$name = $username = $password = $repeatPassword = "";

session_start();

$con = mysqli_connect('localhost', 'george', 'passWW123!aaaddd');

mysqli_select_db($con, 'userregistration');


$name = $_POST["name"];
//$username = test_input($_POST["username"]);
$pass = $_POST["password"];

$s = " select * from usertable where name = '$name'";

$result = mysqli_query($con, $s);

$num =mysqli_num_rows($result);

if($num == 1) {
  echo "Username already exsits, try again!";
} else {
  $reg = " insert into usertable(name, password) values ('$name','$pass')";
  mysqli_query($con, $reg);
  echo "Registration successed";
}





//if ($_SERVER["REQUEST_METHOD"] == "POST") {

//}


  // if (empty($_POST["name"])) {
  //   $nameErr = "Name is required";
  // } else {
  //   $name = test_input($_POST["name"]);
  // }
  
  // if (empty($_POST["username"])) {
  //   $userNameErr = "username is required";
  // } else {
  //   $userName = test_input($_POST["username"]);
  // }

  // if (empty($_POST["password"])) {
  //   $passwordErr = "Password is required";
  // } else {
  //   $password = test_input($_POST["password"]);
  // }
    



/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/


?>

<h2>PHP/HTML Example</h2>

<form name="regForm" method="post" 
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

Full Name: <input type="text" id="name" name="name" requiered>
<br><br>
Password: <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
onkeyup="check()" requiered>
<button type="submit" class = "btn btn-primary"  name="submit" id="mess1"> Register </button> 

</form>  


 

</body>
</html>

