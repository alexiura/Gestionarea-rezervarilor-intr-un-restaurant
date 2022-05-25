<?php
    include_once "bootstrap.php";
?>
<html>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="crud.php">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="micDejunForm.php">Mic de jun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="preparateCaldeForm.php">Preparate calde</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="desertForm.php">Desert</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bauturiForm.php">Bauturi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Users</a>
                </li>
            </ul>
        </div>
    </nav>

    <button class="position-fixed top-10 end-0"><a class="text-danger" href="logout.php" title="Logout">Logout</a></button>
</div>


</html>
