<?php 
include "../components/db.php";
session_start();

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
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <?php include_once "../components/sidebar.php"?>
        <div class="main">
            <div class="employee-list">
                <div class="filter">
                    <h3>Total number:</h3>
                    <div class="filter-dialog">
                        <input type="text" name="" id="">
                        <button type="submit">Search</button>
                    </div>
                </div>
            </div>
            <table>
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
                <tr>
                    <?php foreach ($records as $record):?>
                    <td>
                        <?= $record["dept_name"]?>
                    </td>
                    <td>
                        <?= $record["dept_manager"]?>
                    </td>
                    <td>
                        <?= $record["dept_desc"]?>
                    </td>
                    <td>
                        <?= $record["dept_updated"]?>
                    </td>
                    <?php endforeach;?>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>