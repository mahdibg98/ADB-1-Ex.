<?php
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>ADB - 1st Ex.</title>
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
                <div class="col-md-1 col-2">
                    <a href="#">one</a>
                </div>
                <div class="col-md-1 col-2 active">
                    <a href="#">edit</a>
                </div>
            </div>
            <?php
                if(isset($_POST['name'])){
                    $name = $_POST['name'];
                    $family = $_POST['family'];
                    $tel = $_POST['tel'];
                    $address = $_POST['address'];
                    $birthdate = $_POST['birthdate'];
                    $gender = $_POST['gender'];

                    $sql = "UPDATE `users` SET `name`='".$name."',`family`='".$family."',`birthdate`='".$birthdate."',`tel`='".$tel."',`address`='".$address."',`gender`='".$gender."' WHERE `users`.`user id` = " .$_GET['id'];
                    $sql = $GLOBALS['databaseconnect']->query($sql);
            ?>
            <h3>Query Submitted!</h3>
            <div class="row">
                <p><span><?php echo $text = ($gender == "male") ? "Mr. " : "Ms. " ; ?></span><span><?php echo $name." ".$family; ?></span> informations was <span class="query-type">editted</span> on the date of <span><?php echo date("D M j G:i:s T Y"); ?></span>.<br>To continue, you can click on the <a href="input.php">input</a> or <a href="all.php">all</a> option from the top menu.</p>
            </div>
            <?php
                }else{
            ?>
            <h3>Fill inputs :</h3>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM `users` WHERE `users`.`user id` = ".$_GET['id'];
                    $sql = $GLOBALS['databaseconnect']->query($sql);
                    $row = $sql->fetch();
                ?>
                <form class="row" action="edit.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="family" class="form-label">Family:</label>
                        <input type="text" class="form-control" id="family" name="family" value="<?php echo $row['family']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birthdate" class="form-label">BirthDate:</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo str_replace("/","-",$row['birthdate']); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tel" class="form-label">Tel:</label>
                        <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo $row['tel']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Select Your Gender:</label>
                        <select class="form-select" name="gender" id="gender" value="<?php echo $row['gender']; ?>" required>
                            <option value="" selected>...</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>
