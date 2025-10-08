<?php
session_start();
include "../components/db.php";

if (isset($_GET['usn'])) {
    $username = $_GET['usn'];
    $sql1 = $conn->prepare("select * from employee where employee_usn = :username");
    $sql1->execute([':username' => $username]);

    $employee=$sql1->fetch(PDO::FETCH_ASSOC);

    $sql2 = $conn->prepare("SELECT 
        SUM(CASE WHEN attn_status = 'Present' THEN 1 ELSE 0 END) AS total_present,
        SUM(CASE WHEN attn_status = 'Late' THEN 1 ELSE 0 END) AS total_late,
        SUM(CASE WHEN attn_status = 'Absent' THEN 1 ELSE 0 END) AS total_absent,
        SUM(CASE WHEN attn_status = 'Leave' THEN 1 ELSE 0 END) AS total_leave
        FROM attendance
        WHERE employee_id = :id");
    // $sql2->execute(['id' => $employee['employee_id']]);
    $emp_attendances = $sql2->fetch(PDO::FETCH_ASSOC);
}
else {

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/employee_panel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <?php include_once "../components/sidebar.php"?>
        <div class="main">
            <div class="employee-info">
                <div class="image">
                    <img src="https://placehold.co/400x400?text=E" alt="profile" srcset="">
                </div>
                <div class="info">
                    <h1><?php echo ($employee['employee_ln'] ?? "last name") ?>, <?php echo ($employee['employee_fn'] ?? "first name") ?></h1>
                    <h2><?= ($employee['employee_dept'] ?? "unknown")?> Department</h2>
                    <h3># <?= ($employee['employee_usn'] ?? "username")?></h3>
                    <h2>Made <?= ($employee['employee_create'] ?? "date created")?></h2>
                    <h2><?= ($employee['is_online'] ?? "unknown") ?></h2>

                    <div class="block">
                        <h4>Days present</h4>
                        <h5><?= ($emp_attendances['total_present'] ?? "0")?> day/s</h5>
                    </div>
                    <div class="block">
                        <h4>Days late</h4>
                        <h5><?= ($emp_attendances['total_late'] ?? "0")?> day/s</h5>
                    </div>
                    <div class="block">
                        <h4>Days absent</h4>
                        <h5><?= ($emp_attendances['total_absent'] ?? "0")?> day/s</h5>
                    </div>
                    <div class="block">
                        <h4>Days on leave</h4>
                        <h5><?= ($emp_attendances['total_leave'] ?? "0")?> day/s</h5>
                    </div>
                </div>
            </div>
            <div class="button-options">
                <button onclick="window.history.back()">Return</button></a>
            </div>
        </div>
    </div>
</body>

</html>