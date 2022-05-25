<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'licenta') or die(mysqli_error($mysqli));

$update = false;
$prodName = '';
$prodNameOtherLinguage ='';
$grame = '';
$pret = '';
$id = 0;

if(isset($_POST['save']))
{
    $prodName = $_POST['prodName'];
    $prodNameOtherLinguage = $_POST['prodNameOtherLinguage'];
    $grame = $_POST['grame'];
    $pret = $_POST['pret'];

    $mysqli->query("INSERT INTO preparatecalde (prodName, prodNameOtherLinguage, grame, pret) VALUES ('$prodName', '$prodNameOtherLinguage', '$grame', '$pret') " ) or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location:preparateCaldeForm.php");
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM preparatecalde WHERE id= $id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location:preparateCaldeForm.php");
}

if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM preparatecalde WHERE id=$id") or die($mysqli->error());

    if ($result)
    {
        $row = $result->fetch_assoc();
        $prodName = $row['prodName'];
        $prodNameOtherLinguage = $row['prodNameOtherLinguage'];
        $grame = $row['grame'];
        $pret = $row['pret'];
    }
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $prodName = $_POST['prodName'];
    $prodNameOtherLinguage = $_POST['prodNameOtherLinguage'];
    $grame = $_POST['grame'];
    $pret = $_POST['pret'];

    $result = $mysqli->query("UPDATE preparatecalde SET prodName='$prodName', prodNameOtherLinguage='$prodNameOtherLinguage', grame='$grame', pret='$pret' WHERE id = $id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location:preparateCaldeForm.php");
}
