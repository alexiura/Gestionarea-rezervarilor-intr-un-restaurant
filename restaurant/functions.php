<?php

function showMessage(string $msg)
{
    echo "<div><h3 class='text-danger'>$msg</h3></div>";
}



function redirectIfNotAuthenticated()
{
    if( !($_SESSION["name"] ?? null) )
    {
        header("Location: signIn.php");
    }
}

function redirectIfAuthenticated()
{
    if( $_SESSION["name"] ?? null )
    {
        header("Location: index.php");
    }
}


function checkIfExistReservationInSameDay($name, $reservationDate, $email)
{
    $ret = true;
    $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
    $sql =mysqli_query($dbconnect, "SELECT * FROM reservation WHERE name LIKE '%$name%' AND date LIKE '%$reservationDate%' AND email LIKE '%$email%';");
    if(mysqli_num_rows($sql) > 0)
    {
        $ret= false;
    }
    else
    {
        $ret= true;
    }
    return $ret;
}

function validationInputForReservation($name, $phoneNumber, $time)
{
    $ret = false;
    if (strlen($name) < 3 || strlen($name) > 30 )
    {
        echo "Numarul de caractere al numelui trebuie sa fie cumprins intre 3 si 30";
        echo "<div><button class='button'><a href='index.php#rezervare'><- BACK</a></button></div>";
    }

    elseif (strlen($phoneNumber) != 10 )
    {
        echo "Numarul de telefon trebuie sa fie alcatuit din 10 numere";
        echo "<div><button class='button'><a href='index.php#rezervare'><- BACK</a></button></div>";
    }

    elseif ( ($time <= '08:00:00.000' ) || ($time > '23:00:00.000' ) )
    {
        echo "Ne pare rau, restaurantul nostru isi desfasoara activitatea in intervalul 08:00 - 23:00";
        echo "<div><button class='button'><a href='index.php#rezervare'><- BACK</a></button></div>";
    }
    else
        return true;
}

function maxNumberOfPeopleInSameTime($date, $time)
{
    $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
    $sql =mysqli_query($dbconnect, "SELECT SUM(person)  FROM reservation WHERE date = '$date' and time BETWEEN '$time' AND ( SELECT ADDTIME('$time', '01:00:00.000') );");
    $row = mysqli_fetch_row($sql);
    $result = $row[0];
    if( $result > 5)
    {
        echo "La ora $time sunt ocupate toate locurile";
        echo "$result";
        echo "<div><button class='button'><a href='index.php#rezervare'><- BACK</a></button></div>";
        return false;
    }
    else
        return true;
}


function checkAccount($userName)
{
    $ret = false;
    $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
    $sql =mysqli_query($dbconnect, "SELECT * FROM login WHERE userNameLogin LIKE '$userName' ");
        if(mysqli_num_rows($sql) > 0)
        {
            $ret= false;
        }
        else
        {
            $ret= true;
        }
    return $ret;
}



function register($usernameLogin, $emailLogin, $phoneNumberLogin, $dateLogin, $fatherNameLogin, $passwordLogin, $confirmPasswordLogin)
    {
        $usernameLogin = trim(htmlspecialchars($_POST['userNameLogin']));
        $emailLogin = trim(htmlspecialchars($_POST['emailLogin']));
        $phoneNumberLogin = trim(htmlspecialchars($_POST['phoneNumberLogin']));
        $dateLogin = trim(htmlspecialchars($_POST['dateLogin']));
        $fatherNameLogin = trim(htmlspecialchars($_POST['fatherNameLogin']));
        $passwordLogin = trim(htmlspecialchars($_POST['passwordLogin']));
        $confirmPasswordLogin = trim(htmlspecialchars($_POST['confirmPasswordLogin']));

        if ($usernameLogin == '' || $emailLogin == '' || $phoneNumberLogin == '' || $dateLogin == '' || $fatherNameLogin == '' || $passwordLogin == '' || $confirmPasswordLogin == '') {
            echo "Fill All Required Fields!";
            return false;
        }
        if (strlen($usernameLogin) < 3 || strlen($usernameLogin) > 30 || strlen($passwordLogin) < 3 || strlen($passwordLogin) > 30) {
            echo "Username an Password Length Must Be Between 3 And30!";
            return false;
        }

        if ($passwordLogin !== $confirmPasswordLogin)
        {
            echo "something wrong about password";
            return false;
        }
        else
        {
            echo "Account has been created";
        }


    }

function pre_r($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sendMail($name, $date, $time, $email)
{
        $mail_send= mail($email,'Rezervare Good Taste',"Rezervarea s-a facut cu succes\n\n Aveti o revervare pe numele '$name' ,in data de: '$date' , la ora '$time'.\n\n Va multumim!", "From: restaurantGoodTaste08@gmail.com\r\nReply-To: restaurantGoodTaste08@gmail.com");
        if ($mail_send == true)
        {
            echo "A-ti primit un email de confirmare a comenzii";
        }
        else
        {
            echo "Mail failed";
        }
}
