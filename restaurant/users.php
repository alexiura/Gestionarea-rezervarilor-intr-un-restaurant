<?php
include_once "navbarAdmin.php";
include_once "functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>



<div class="container">
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'licenta');
    $result = $mysqli->query("SELECT * FROM login") or die($mysqli->error);
    $number_of_results = mysqli_num_rows($result);

    $results_per_page = 7;

    $number_of_pages = ceil($number_of_results/$results_per_page);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $this_page_first_result = ($page-1)*$results_per_page;

    $sql='SELECT * FROM login LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
    $result = $mysqli->query('SELECT * FROM login LIMIT ' . $this_page_first_result . ',' .  $results_per_page) or die($mysqli->error);
    ?>


    <div class="d-flex justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Father Name</th>
                <th>Password</th>
            </tr>
            </thead>

            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['userNameLogin']; ?></td>
                    <td><?php echo $row['emailLogin']; ?></td>
                    <td><?php echo $row['phoneNumberLogin']; ?></td>
                    <td><?php echo $row['dateLogin']; ?></td>
                    <td><?php echo $row['fatherNameLogin']; ?></td>
                    <td><?php echo $row['passwordLogin']; ?></td>

                </tr>
            <?php endwhile; ?>
            </tbody>

        </table>

    </div>

    <?php
    for ($page=1;$page<=$number_of_pages;$page++) {
        echo '<button><a href="users.php?page=' . $page . '">' . $page . '</a></button> ';
    }

    ?>

</div>
</body>
</html>