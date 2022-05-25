<!DOCTYPE html>
<html lang="en,ro">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Sing In</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        


		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
		<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>


    </head>

    <style>
        .marginTop
        {
            margin-top: 280px;
        }

        .error {color: #FF0000;}

    </style>


<body class="bg-image bg-parallax" style="background-image: url(./img/login1.gif);">

<?php
include_once "functions.php";
session_start();
$name = $nameErr = $passwordErr = $parola ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["userName"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input(empty($_POST["userName"]));
        }

        if(empty($_POST["password"]))
        {
            $passwordErr = "Password is required";
        } else {
            $parola = md5(test_input(empty($_POST["userName"])));
        }
    }


if(count($_POST)>0)
{
    $con = mysqli_connect('localhost','root','','licenta') or die('Unable To connect');
    $userName = $_POST["userName"];
    $password = md5($_POST["password"]);
    $result = mysqli_query($con,"SELECT * FROM login WHERE userNameLogin = '$userName' AND passwordLogin = '$password'");
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        $_SESSION["id"] = $row['idLogin'];
        $_SESSION["name"] = $row['userNameLogin'];
        $_SESSION["email"] = $row['emailLogin'];
        $_SESSION["phone"] = $row['phoneNumberLogin'];
        $_SESSION["date"] = $row['dateLogin'];
    }
    else
    {
        echo "<div><h2 class='text-danger text-center'>Invalid Username or Password!</h2></div>";
    }
}
if(isset($_SESSION["id"])) {
    switch( $_SESSION["id"] )
    {
        case 1:
            header("Location:admin.php");
            break;

        default:
            header("Location:index.php");
            break;
    }
}

?>

    <div class="section mt-5">

        <div class="container mt-5 pt-5">            
            <div class="row col-md-6 col-md-offset-4 ">

                <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                       <label for="User Name" class="text-primary">User Name</label>
                       <input type="text" name="userName"  class="form-control" value="<?php echo $name;?>" placeholder="Enter User Name">
                        <span class="error">* <?php echo $nameErr;?></span>
                     </div>
                    <div class="form-group">
                       <label for="Password" class="text-primary">Password</label>
                       <input type="password" name="password"   class="form-control"  placeholder="Enter Password">
                        <span class="error">* <?php echo $passwordErr;?></span>
                    </div>
                    <div class="col-md-12 text-center ">
                       <button type="submit" name="submit" value="send" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                       <hr class="hr-or">
                    </div>
                    <div class="form-group">
                       <p class="text-center text-primary">Don't have account? <a href="signUp.php" id="signup">Sign up here</a></p>
                    </div>
                 </form>


            </div>
        <!-- /container  -->

        </div>
    </div>




    <!-- /Home -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- /Preloader -->

    <!-- jQuery Plugins -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>