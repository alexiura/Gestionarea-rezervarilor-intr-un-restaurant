<?php
include_once "functions.php";

	$usernameLogin = $_POST['userNameLogin'];
	$emailLogin = $_POST['emailLogin'];
	$phoneNumberLogin = $_POST['phoneNumberLogin'];
	$dateLogin = $_POST['dateLogin'];
	$fatherNameLogin = $_POST['fatherNameLogin'];
	$passwordLogin = $_POST['passwordLogin'];
	$confirmPasswordLogin = $_POST['confirmPasswordLogin'];


	$dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');

    if(!empty($usernameLogin) && !empty($emailLogin) && !empty($phoneNumberLogin) && !empty($dateLogin) && !empty($fatherNameLogin) && !empty($passwordLogin) && !empty($confirmPasswordLogin))
    {
        if (checkAccount($usernameLogin)) {
            $sql = mysqli_query($dbconnect, "insert into login (idLogin, userNameLogin, emailLogin, phoneNumberLogin, dateLogin, fatherNameLogin, passwordLogin, confirmPasswordLogin)
                                                    values('', '$usernameLogin', '$emailLogin', '$phoneNumberLogin', '$dateLogin', '$fatherNameLogin', '$passwordLogin', '$confirmPasswordLogin')");

            if (register($usernameLogin, $emailLogin, $phoneNumberLogin, $dateLogin, $fatherNameLogin, $passwordLogin, $confirmPasswordLogin)) {
                if ($sql) {
                    echo "Data inserted successfully";
                } else
                    echo "Data not inserted";
            }
        } else {
            echo "This Username or Password have been use";
            echo "<div><button><a href='signUp.php'>Back</a></button></div>";
        }
    }
    else
    {
        echo "Please fill all boxes";
        echo "<div><button class='button'><a href='signUp.php'><- BACK</a></button></div>";
    }




