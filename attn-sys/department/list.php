<?php
include "../components/db.php";
$sql = "Select * from department";
$dept_records = $conn->prepare($sql);
$dept_records->execute();
$records = $dept_records->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/liststyles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Department list</title>
</head>

<body>
    <?php include "../components/header.php"?>
    <div class="main">
        <div class="employee-list">
            <div class="filter">
                <div class="filter-dialog">
                    <h1>List of departments</h1>
                    <input type="text" name="" id="">
                    <button type="submit" class="search-btn">Search</button>
                </div>
            </div>
        </div>
        <div class="content-box">
            <table>
                <thead>
                    <tr>
                        <th>
                            Department
                        </th>
                        <th>
                            Head
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Updated
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($records as $record): ?>
                            <td>
                                <?= $record["dept_name"] ?>
                            </td>
                            <td>
                                <?= $record["dept_manager"] ?>
                            </td>
                            <td>
                                <?= $record["dept_desc"] ?>
                            </td>
                            <td>
                                <?= $record["dept_updated"] ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
             <div class="button-options">
                <?php // if ($_SESSION["role"] === "admin"): ?>
                    <?php include "add.php"?>
                <button popovertarget="add-new-dept" class="add-new-btn">Add new</button>
                <?php // endif; ?>
            </div>
        </div>
    </div>
</body>

</html>