<?php

include "../components/db.php";
session_start();

$sql1 = $conn->query("select * from employee");
for ($i = 0; $i < $sql1->columnCount(); $i++) {
    $meta = $sql1->getColumnMeta($i);
    $employee_fields[] = $meta['name'];
}

$labels = [
    "employee_id"     => "Control Number",
    "employee_usn"   => "Username",
    "employee_fn"  => "First name",
    "employee_ln"    => "Last name",
    "employee_role"    => "Role",
    "employee_dept"    => "Department",
    "employee_update"    => "Date updated",
    "employee_create"    => "Date created",
];

$employees = $sql1->fetchAll(PDO::FETCH_ASSOC);
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
            <div class="main-content">
                    <h1><?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "Guest"?></h1>
                    <h3>current time</h3>
                </div>
            <div class="employee-list">
                <h1>Employee list</h1>
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
                <?php foreach ($employee_fields as $field): ?>
                    <th>
                        <?= $label = $labels[$field] ?? $field ?>
                    </th>
                <?php endforeach; ?>
                    <th>
                        Actions
                    </th>
                </tr>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td>
                            <?= $employee["employee_id"] ?>
                        </td>
                        <td>
                            <a href="detail.php?usn=<?= $employee["employee_usn"]?>">
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
            </table>
            <div class="button-options">
                <?php // if ($_SESSION["role"] === "admin"):?>
                <a href="add.php"><button>Add new</button></a>
                <?php // endif;?>
            </div>
        </div>
    </div>
</body>
</html>