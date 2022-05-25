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

<?php require_once "crudDbConnection.php"; ?>

<?php if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?php echo $_SESSION['msg_type'] ?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>


<div class="container">
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'licenta');
    $result = $mysqli->query("SELECT * FROM reservation") or die($mysqli->error);
    $number_of_results = mysqli_num_rows($result);

    $results_per_page = 7;

    $number_of_pages = ceil($number_of_results/$results_per_page);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $this_page_first_result = ($page-1)*$results_per_page;

    $sql='SELECT * FROM reservation LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
    $result = $mysqli->query('SELECT * FROM reservation LIMIT ' . $this_page_first_result . ',' .  $results_per_page) or die($mysqli->error);
    ?>


    <div class="d-flex justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>PhoneNumber</th>
                <th>Date</th>
                <th>Person</th>
                <th>Email</th>
                <th>Time</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>

            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['person']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['time']; ?></td>

                    <td>
                        <a href="crud.php?edit=<?php echo $row['Id']; ?>" class="btn btn-info">Edit</a>
                        <a href="crudDbConnection.php?delete=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>

        </table>

    </div>

    <?php
    for ($page=1;$page<=$number_of_pages;$page++) {
        echo '<button><a href="crud.php?page=' . $page . '">' . $page . '</a></button> ';
    }

    ?>

    <div class="d-flex justify-content-center">
        <form action="crudDbConnection.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
            <div class="form-group mb-2">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control"
                       value="<?=  $name; ?>" placeholder="Enter your name">
            </div>

            <div class="form-group mb-2">
                <label for="tel">PhoneNumber</label>
                <input type="tel" name="phoneNumber" class="form-control"
                       value="<?=  $phoneNumber; ?>" placeholder="Enter your name">
            </div>

            <div class="form-group mb-2">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control"
                       value="<?=  $date; ?>" placeholder="Enter your name">
            </div>

            <div class="form-group mb-2">
                <label for="person">Person</label>
                <input type="text" name="person" class="form-control"
                       value="<?=  $person; ?>" placeholder="Enter your name">
            </div>

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control"
                       value="<?=  $email; ?>" placeholder="Enter your name">
            </div>

            <div class="form-group mb-2">
                <label for="time">Time</label>
                <input type="time" name="time" class="form-control"
                       value="<?= $time; ?>" placeholder="Enter your location">
            </div>

            <div class="form-group">
                <?php if($update == true):?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                <?php endif;?>
            </div>

        </form>
    </div>
</div>
</body>
</html>