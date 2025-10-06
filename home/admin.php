<?php 
include "../components/db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <?php include_once "../components/sidebar.php"?>
        <div class="main">
            <div class="main-content">
                <h1>Welcome name</h1>
                <h3>current time</h3>
            </div>
            <div class="quick-view dept-attendance">
                <h1>Attendances of every department</h1>
                <canvas id="dept-attn-chart" width="500" height="200" class=""></canvas>
            </div>
            <div class="quick-info">
                <h1>Pending leave requests</h1>
                <div class="block">
                    <p>Person</p>
                    <p>Date</p>
                    <p>Department</p>
                    <p>Reason</p>
                </div>
                <div class="block">
                    <p>Person</p>
                    <p>Date</p>
                    <p>Department</p>
                    <p>Reason</p>
                </div>
                <div class="block">
                    <p>Person</p>
                    <p>Date</p>
                    <p>Department</p>
                    <p>Reason</p>
                </div>
                <div class="block">
                    <p>Person</p>
                    <p>Date</p>
                    <p>Department</p>
                    <p>Reason</p>
                </div>
                <div class="block">
                    <p>Person</p>
                    <p>Date</p>
                    <p>Department</p>
                    <p>Reason</p>
                </div>
                <div class="block">
                    <p>Person</p>
                    <p>Date</p>
                    <p>Department</p>
                    <p>Reason</p>
                </div>
            </div>
            <div class="button-options">
                <a href="">
                    <button type="">Create an announcement</button>
                </a>
                <a href="">
                    <button type="button">Department</button>
                </a>
                <a href="../employee/list.php">
                    <button type="button">Employees</button>
                </a>
            </div>
        </div>
    </div>
</body>
<script defer>
var ctx = document.getElementById('dept-attn-chart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar', // Type of chart (bar, line, pie, etc.)
            data: {
                labels: ['Dept 1', 'Dept 2', 'Dept 3', 'Dept 4', 'Dept 5', 'Dept x', 'Dept 6', 'Dept 7', 'Dept 8'], // Labels on the x-axis
                datasets: [{
                    label: '',  // Label for the dataset
                    data: [12, 19, 3, 5, 2, 3, 20, 15, 14], // Data for the y-axis
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ], // Bar color
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ], // Border color
                    borderWidth: 1 // Border width
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Ensures the y-axis starts at 0
                    }
                }
            }
        });
</script>
</html>