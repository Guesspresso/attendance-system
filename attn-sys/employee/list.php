<?php

include "../components/db.php";
session_start();

$sql1 = $conn->query("select * from employee");
for ($i = 0; $i < $sql1->columnCount(); $i++) {
    $meta = $sql1->getColumnMeta($i);
    $employee_fields[] = $meta['name'];
}

$labels = [
    "employee_id" => "Employee ID",
    "employee_usn" => "Username",
    "employee_fn" => "First name",
    "employee_ln" => "Last name",
    "employee_role" => "Role",
    "employee_dept" => "Department",
    "employee_update" => "Date updated",
    "employee_create" => "Date created",
];

$employees = $sql1->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/staffstyles.css">
    <link rel="stylesheet" href="../css/liststyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>List of Employees</title>
</head>

<body>
    <?php include '../components/header.php' ?>
    <div class="main">
        <div class="metric-cards">
            <div class="metric-card employees">
                <p class="title">Department 1</p>
                <div class="value">X/X</div>
                <div class="caption">Present</div>
            </div>
            <div class="metric-card employees">
                <p class="title">Department 1</p>
                <div class="value">X/X</div>
                <div class="caption">Present</div>
            </div>
            <div class="metric-card employees">
                <p class="title">Department 1</p>
                <div class="value">X/X</div>
                <div class="caption">Present</div>
            </div>
            <div class="metric-card employees">
                <p class="title">Department 1</p>
                <div class="value">X/X</div>
                <div class="caption">Present</div>
            </div>
        </div>
        <div class="filter">
            <div class="filter-dialog">
                <h1>List of employees</h1>
                <input type="text" name="" id="">
                <button type="submit" class="search-btn">Search</button>
            </div>
        </div>
        <div class="content-box">
            <table>
                <thead>
                    <tr>
                        <?php foreach ($employee_fields as $field): ?>
                            <th>
                                <?= $label = $labels[$field] ?? $field ?>
                            </th>
                        <?php endforeach; ?>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td>
                                <?= $employee["employee_id"] ?>
                            </td>
                            <td class="control-num">
                                <a href="detail.php?usn=<?= $employee["employee_usn"] ?>">
                                    <?= $employee["employee_usn"] ?>
                                </a>
                            </td>
                            <td>
                                <?= $employee["employee_fn"] ?>
                            </td>
                            <td>
                                <?= $employee["employee_ln"] ?>
                            </td>
                            <td>
                                <?= $employee["employee_role"] ?>
                            </td>
                            <td>
                                <?= $employee["employee_dept"] ?>
                            </td>
                            <td>
                                <?= $employee["is_online"] ?>
                            </td>
                            <td>
                                <?= $employee["employee_update"] ?>
                            </td>
                            <td>
                                <?= $employee["employee_create"] ?>
                            </td>
                            <td>
                                <button>
                                    <i class="ri-pencil-line"></i>
                                </button>
                                <button>
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="button-options">
                <?php // if ($_SESSION["role"] === "admin"): ?>
                <?php include "add.php"?>
                <button popovertarget="add-new-employee" class="add-new-btn">Add new</button>
                <?php // endif; ?>
            </div>
        </div>
    </div>
</body>

</html>