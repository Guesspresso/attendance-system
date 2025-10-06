<?php 
include("../components/db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">

    <title>New Deparment</title>
</head>
<body>
    <div class="container">
        <?php include_once "../components/sidebar.php"?>
        <div class="main">
            <div class="main-content">
                <h1><?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "Guest"?></h1>
                <h3>current time</h3>
            </div>
            <div class="department-dialog">
                <h1>New department</h1>
                <form action="">
                    <div>
                        <label for="">Department name
                            <input type="text" name="" id="">
                        </label>
                        
                        <label for="">Department head
                            <input type="text" name="" id="">
                        </label>
                    </div>

                    <label for="">Description
                        </label>
                        <textarea name="" id=""></textarea>
                        <div class="button-options">
                            <button type="submit">add</button>
                            <button type="submit" class="cancel">cancel</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>