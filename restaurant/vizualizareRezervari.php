<?php
include_once "navbarAdmin.php";
?>
    <table class="table table-striped table-dark my-0 py=0">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">PhoneNumber</th>
            <th scope="col">Date</th>
            <th scope="col">People</th>
            <th scope="col">Email</th>
        </tr>
        </thead>

<?php
include_once "bootstrap.php";
    $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');


    $query = "SELECT id, name, phoneNumber, date, person, email, time FROM reservation ORDER BY id";
    $result = mysqli_query($dbconnect, $query);
    $num_results = mysqli_num_rows($result);
    /* fetch associative array */
    while ($row = mysqli_fetch_row($result))
    {
?>
        <table class="table table-striped table-dark my-0 py-0">
            <tbody>
            <tr">
                <td> <?php printf("%s \n", $row[0]);?> </td>
                <td> <?php printf("%s \n", $row[1]);?> </td>
                <td> <?php printf("%s \n", $row[2]);?> </td>
                <td> <?php printf("%s \n",$row[3]);?> </td>
                <td> <?php printf("%s \n",$row[4]);?> </td>
                <td> <?php printf("%s \n",$row[5]);?> </td>
            </tr>
            </tbody>
        </table>
<?php
    }
?>

