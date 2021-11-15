<?php
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>ADB - 2nd Ex.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="libs/bootstrap.css">
        <script type="text/javascript" src="libs/bootstrap.js"></script>

        <script type="text/javascript" src="libs/ajax.js"></script>
        <script type="text/javascript" src="libs/jquery.js"></script>

    </head>
    <body>
        <style media="screen">
            <?php include "styles.css"; ?>
        </style>
        <div class="container">
            <div class="row justify-content-center menu">
                <div class="col-md-1 col-2">
                    <a href="input.php">input</a>
                </div>
                <div class="col-md-1 col-2">
                    <a href="all.php">all</a>
                </div>
                <div class="col-md-1 col-2 active">
                    <a href="#">one</a>
                </div>
                <div class="col-md-1 col-2">
                    <a href="#">edit</a>
                </div>
            </div>
            <?php
                $sql = "SELECT * FROM `users` WHERE `users`.`user id` = ".$_GET['id'];
                $sql = $GLOBALS['databaseconnect']->query($sql);
                $row = $sql->fetch();
            ?>
            <h3><?php echo $row['name']." ".$row['family'] ?> :</h3>
            <div class="row">
                <div class="col-md-3 capital">
                    <p><?php echo substr($row['name'],0,1); ?></p>
                </div>
                <div class="col-md-9 info">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <p>name : <br>
                                <span class="left-padding"><?php echo $row['name']." ".$row['family']; ?></span>
                            </p>
                        </div>
                        <div class="col-md-3 col-6">
                            <p>date of birth : <br>
                                <span class="left-padding"><?php echo $row['birthdate']; ?></span>
                            </p>
                        </div>
                        <div class="col-md-3 col-6">
                            <p>tel : <br>
                                <span class="left-padding"><?php echo $row['tel']; ?></span>
                            </p>
                        </div>
                        <div class="col-md-3 col-6">
                            <p>gender : <br>
                                <span class="left-padding"><?php echo $row['gender']; ?></span>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>address : <br>
                                <span class="left-padding"><?php echo $row['address']; ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
