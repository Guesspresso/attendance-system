<?php 
include "../components/db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <?php include_once "../components/sidebar.php"?>
        <div class="main">
            <div class="main-content">
                <h1><?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "Guest"?></h1>
                <h3>current time</h3>
            </div>
            <div class="employee-dialog">
                <h1>New employee</h1>
                <form action="">
                    <div class="employee-info">
                        <h1>Employee info</h1>
                        <label for="">Username
                            <input type="text" name="" id="">
                        </label>
                        <label for="">First name
                            <input type="text" name="" id="">
                        </label>
                        <label for="">Last name
                            <input type="text" name="" id="">
                        </label>
                    </div>
                    <div class="work-info">
                        <h1>work info</h1>
                        <label for="">Role
                            <input type="text" name="" id="">
                        </label>
                        
                        <label for="">Department
                            <input type="text" name="" id="">
                        </label>
                        
                        <label for="">Email
                            <input type="text" name="" id="">
                        </label>
                    </div>
                </form>
            </div>
            <div class="button-options">
                <button type="submit">add</button>
                <button type="submit" class="cancel" onclick="window.history.back()">cancel</button>
            </div>
        </div>
    </div>
</body>