<!DOCTYPE html>
<html lang="en,ro">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Sing Up</title>
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

    <style>
        .error {color: #FF0000;}
    </style>

</head>


<body class="bg-image bg-parallax" style="background-image: url(./img/signUp.png);">

<?php
include_once "functions.php";

$usernameLogin = $_POST['userNameLogin'] ?? null;
$emailLogin = $_POST['emailLogin'] ?? null;
$phoneNumberLogin = $_POST['phoneNumberLogin'] ?? null;
$dateLogin = $_POST['dateLogin'] ?? null;
$fatherNameLogin = $_POST['fatherNameLogin'] ?? null;
$passwordLogin = md5($_POST['passwordLogin'] ?? null) ;
$confirmPasswordLogin = md5($_POST['confirmPasswordLogin'] ?? null) ;

// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $fatherNameErr = $passwordErr = $confirmPasswordErr = $formErr = "";
$name = $email = $phone = $fatherName = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($usernameLogin))
    {
        $nameErr = "Name is required";
    }
    else
    {
        $name = test_input($usernameLogin);
    }


    if (empty($emailLogin))
    {
        $emailErr = "Email is required";
    }
    else
    {
        $email = test_input($_POST["emailLogin"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($phoneNumberLogin))
    {
        $phoneErr = "Phone number is required";
    }
    else
    {
        $phone = test_input($phoneNumberLogin);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9' ]*$/",$phone))
        {
            $nameErr = "Only number allowed";
        }
    }

    if (empty($fatherNameLogin))
    {
        $fatherNameErr = "Father name is required";
    }
    else
    {
        $fatherName = test_input($fatherNameLogin);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fatherName))
        {
            $fatherNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($passwordLogin))
    {
        $passwordErr = "Password is required";
    }

    if (empty($confirmPasswordLogin))
    {
        $confirmPasswordErr = "Password confirm  is required";
    }

}

$dbconnect = mysqli_connect('localhost', 'root', '', 'licenta');

if (!empty($usernameLogin) && !empty($emailLogin) && !empty($phoneNumberLogin) && !empty($dateLogin) && !empty($fatherNameLogin) && !empty($passwordLogin) && !empty($confirmPasswordLogin))
{
    if (checkAccount($usernameLogin)) {
        $sql = mysqli_query($dbconnect, "insert into login (idLogin, userNameLogin, emailLogin, phoneNumberLogin, dateLogin, fatherNameLogin, passwordLogin, confirmPasswordLogin) 
                                                    values('', '$usernameLogin', '$emailLogin', '$phoneNumberLogin', '$dateLogin', '$fatherNameLogin', '$passwordLogin', '$confirmPasswordLogin')");

        if (register($usernameLogin, $emailLogin, $phoneNumberLogin, $dateLogin, $fatherNameLogin, $passwordLogin, $confirmPasswordLogin)) {
            if ($sql) {
                $formErr ="Data inserted successfully";
            } else
                $formErr = "Data not inserted";
        }
    } else {
        $formErr = "This Username or Password have been use";
    }
}
?>


<div id="rezervare" class="section">
    <h3 class="bg-danger text-center"><?php echo $formErr;?></h3>
    <div class="container">
        <div class="row col-md-4 col-md-offset-4">
            <div class="signup-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h2>Sign Up</h2>
                    <p>Please fill in this form to create an account!</p>
                    <hr>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="userNameLogin" value="<?php echo $name;?>" placeholder="Username">
                            <span class="error">* <?php echo $nameErr;?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                            <input type="email" class="form-control" name="emailLogin" value="<?php echo $email;?>" placeholder="Email Address" >
                            <span class="error">* <?php echo $emailErr;?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="number" class="form-control" name="phoneNumberLogin" value="<?php echo $phone;?>" placeholder="Phone Number">
                            <span class="error">* <?php echo $phoneErr;?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mars"></i></span>
                            <input type="text" class="form-control" name="fatherNameLogin" value="<?php echo $fatherName;?>" placeholder="Enter your father's Name">
                            <span class="error">* <?php echo $fatherNameErr;?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="date" class="form-control" name="dateLogin" id="dateLogin" placeholder="Enter today's date">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="passwordLogin" placeholder="Password">
                            <span class="error">* <?php echo $passwordErr;?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                        <i class="fa fa-check"></i>
                                    </span>
                            <input type="password" class="form-control" name="confirmPasswordLogin"  placeholder="Confirm Password">
                            <span class="error">* <?php echo $confirmPasswordErr;?></span>
                            <span><p>Parolele trebuie sa corespunda</p></span>
                        </div>
                    </div>

                    <div class="form-group col-md-offset-3">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg"
                    </div>
                </form>
                <div class="text-center text-info">Already have an account? <a href="signIn.php">Login here</a></div>
            </div>
        </div>

    </div>

</div>


<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>