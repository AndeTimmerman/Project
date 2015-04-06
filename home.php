<?php
    session_start();

    spl_autoload_register(function ($class) {
        include_once("classes/".$class.".class.php");
    });


    if(isset($_POST['logout'])){
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rent-a-Student</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>

<body>
<div class="container-fluid">
    <?php echo $_SESSION['firstname']."<br>".$_SESSION['email']; ?>

    <div class="row">
        <div class="col-sm-8">

            <form class="form-horizontal" method="post" action="">

                <h1>Logout</h1>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-default" name="logout" value="Logout">
                    </div>
                </div>
            </form>
        </div>

    </div>

</body>
