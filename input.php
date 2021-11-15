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
                <div class="col-md-1 col-2 active">
                    <a href="input.php">input</a>
                </div>
                <div class="col-md-1 col-2">
                    <a href="all.php">all</a>
                </div>
                <div class="col-md-1 col-2">
                    <a href="#">one</a>
                </div>
                <div class="col-md-1 col-2">
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

                    $sql = "INSERT INTO `users`(`name`, `family`, `birthdate`, `tel`, `address`, `gender`) VALUES ('".$name."','".$family."','".$birthdate."','".$tel."','".$address."','".$gender."')";
                    $sql = $GLOBALS['databaseconnect']->query($sql);
            ?>
            <h3>Query Submitted!</h3>
            <div class="row">
                <p><span><?php echo $text = ($gender == "male") ? "Mr. " : "Ms. " ; ?></span><span><?php echo $name." ".$family; ?></span> was <span class="query-type">added</span> to your entry list in the date of birth <span><?php echo $birthdate; ?></span> and the contact number <span><?php echo $tel; ?></span> on the date of <span><?php echo date("D M j G:i:s T Y"); ?></span>.<br>To continue, you can click on the <a href="input.php">input</a> or <a href="all.php">all</a> option from the top menu.</p>
            </div>
            <?php
                }else{
            ?>
            <h3>Fill inputs :</h3>
            <div class="row">
                <form class="row" action="input.php" method="post">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="family" class="form-label">Family:</label>
                        <input type="text" class="form-control" id="family" name="family" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birthdate" class="form-label">BirthDate:</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tel" class="form-label">Tel:</label>
                        <input type="tel" class="form-control" id="tel" name="tel" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Select Your Gender:</label>
                        <select class="form-select" name="gender" id="gender" required>
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
