<?php
include_once "functions.php";
include_once "navbarAdmin.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Preparate Calde</title>
</head>
<body>

<?php require_once "dbConnectPreparateCaldeForm.php"; ?>

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
    $result = $mysqli->query("SELECT * FROM preparatecalde") or die($mysqli->error);
    //pre_r($result);
    //pre_r($result->fetch_assoc());
    ?>

    <div class="d-flex justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Nume Preparat</th>
                <th>Nume preparat in alta limba</th>
                <th>Grame</th>
                <th>Pret</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>

            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['prodName']; ?></td>
                    <td><?php echo $row['prodNameOtherLinguage']; ?></td>
                    <td><?php echo $row['grame']; ?></td>
                    <td><?php echo $row['pret']; ?></td>
                    <td>
                        <a href="preparateCaldeForm.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="preparateCaldeForm.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>

        </table>
    </div>


    <div class="container col-md-4  col-md-offset-4">
        <form action="dbConnectPreparateCaldeForm.php" class="reserve-form row" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
            <div class="form-group mb-2">
                <label for="micDejun">Nume Preparat</label>
                <input type="text" name="prodName" class="form-control"
                       value="<?=  $prodName; ?>" placeholder="Introduceti numele preparatului">
            </div>

            <div class="form-group">
                <label for="micDejun">Nume preparat in alta limba</label>
                <input type="text" name="prodNameOtherLinguage" class="form-control"
                       value="<?=  $prodNameOtherLinguage; ?>" placeholder="Introduceti numele preparatului in alta limba">
            </div>

            <div class="form-group">
                <label for="micDejun">Grame</label>
                <input type="text" name="grame" class="form-control"
                       value="<?=  $grame; ?>" placeholder="Cate grame are produsul?">
            </div>

            <div class="form-group">
                <label for="micDejun">Pret</label>
                <input type="text"  name="pret" class="form-control"
                       value="<?=  $pret; ?>" placeholder="Pretul produsului">
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