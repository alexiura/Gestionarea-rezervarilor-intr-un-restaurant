<?php
session_start();


$mysqli = new mysqli('localhost', 'root', '', 'licenta') or die(mysqli_error($mysqli));

$update = false;
$id =0;
$name = '';
$phoneNumber= 0;
$date = 0;
$person = 0;
$email = '';
$time = 0;


if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $date = $_POST['date'];
    $person = $_POST['person'];
    $email = $_POST['email'];
    $time = $_POST['time'];

    $mysqli->query("insert into reservation (Id, name, phoneNumber, date, person, email, time) values ('', '$name', '$phoneNumber', '$date', '$person', '$email', '$time') " ) or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location:crud.php");
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM reservation WHERE Id= $id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: crud.php");
}

if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM reservation WHERE Id=$id") or die($mysqli->error());

    if ($result)
    {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phoneNumber= $row['phoneNumber'];
        $date = $row['date'];
        $person = $row['person'];
        $email = $row['email'];
        $time = $row['time'];
    }
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phoneNumber= $_POST['phoneNumber'];
    $date = $_POST['date'];
    $person = $_POST['person'];
    $email = $_POST['email'];
    $time = $_POST['time'];

    $result = $mysqli->query("UPDATE reservation SET name='$name', phoneNumber='$phoneNumber', date='$date', person='$person', email='$email', time='$time'
                        WHERE Id = $id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location:crud.php");
}
