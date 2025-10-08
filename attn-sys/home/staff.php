<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/staffstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  

    <title>Staff Dashboard</title>
</head>
<body>
    <?php include '../components/header.php'?>

    <div class="main">
        <div class="metric-cards">
            <div class="metric-card present">
                <p class="title">Total present</p>
                <div class="value">31</div>
                <p class="caption">out of x employees</p>
            </div>
            <div class="metric-card late">
                <p class="title">Total late</p>
                <div class="value">0</div>
                <p class="caption">out of x employees</p>
            </div>
            <div class="metric-card on-leave">
                <p class="title">Total leave</p>
                <div class="value">0</div>
                <p class="caption">out of x employees</p>
            </div>
            <div class="metric-card absent">
                <p class="title">Total absent</p>
                <div class="value">0</div>
                <p class="caption">out of x employees</p>
            </div>
        </div>

        <div class="content-card announcements">
            <div class="item">
                <p class="title">
                    Announcement title
                </p>
                <p class="description">
                    Announcement description
                </p>
            </div>
        </div>

        <div class="chart-container">
            <h2>Department Attendance</h2>
            <?php include "../components/dept-attendance.php"?>
            <button popovertarget="dept-attn">More info</button>
            <canvas id="myChart" width="400" height="200" class="attendance-chart"></canvas>
            <h2>Your Attendance</h2>
            <canvas id="myChar" width="400" height="200" class="attendance-chart"></canvas>
        </div>

        <div class="content-card events-sec">
            <h3>On this month</h3>
            <div class="event-list">
                <div class="event-item">
                    <div class="">
                        <p class="event-name">Event title</p>
                        <p class="event-date">date</p>
                    </div>
                </div>
                <div class="event-item">
                    <div class="">
                        <p class="event-name">Event title</p>
                        <p class="event-date">date</p>
                    </div>
                </div>
                <div class="event-item">
                    <div class="">
                        <p class="event-name">Event title</p>
                        <p class="event-date">date</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-card leave-requests">
            <h1 class="title">Leave requests</h1>
            <div class="list">
                <div class="item">
                    <p class="info">
                        [status] <br>
                        From [name] in [dept] <br>
                        submitted in [date]<br>
                    </p>
                    <p class="description">
                        [reason]
                    </p>
                </div>
                <div class="item">
                    <p class="info">
                        [status] <br>
                        From [name] in [dept] <br>
                        submitted in [date]<br>
                    </p>
                    <p class="description">
                        [reason]
                    </p>
                </div>
                <div class="item">
                    <p class="info">
                        [status] <br>
                        From [name] in [dept] <br>
                        submitted in [date]<br>
                    </p>
                    <p class="description">
                        [reason]
                    </p>
                </div>
                <div class="item">
                    <p class="info">
                        [status] <br>
                        From [name] in [dept] <br>
                        submitted in [date]<br>
                    </p>
                    <p class="description">
                        [reason]
                    </p>
                </div>
                <div class="item">
                    <p class="info">
                        [status] <br>
                        From [name] in [dept] <br>
                        submitted in [date]<br>
                    </p>
                    <p class="description">
                        [reason]
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
<script defer>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // Type of chart (bar, line, pie, etc.)
            data: {
                labels: ['Jan', 'feb', 'Mar', 'Apr', 'May', 'Jun'], // Labels on the x-axis
                datasets: [{
                    label: 'Attendance',  // Label for the dataset
                    data: [12, 19, 3, 5, 2, 3], // Data for the y-axis
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
        var ctx = document.getElementById('myChar').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // Type of chart (bar, line, pie, etc.)
            data: {
                labels: ['Jan', 'feb', 'Mar', 'Apr', 'May', 'Jun'], // Labels on the x-axis
                datasets: [{
                    label: 'Attendance',  // Label for the dataset
                    data: [12, 19, 3, 5, 2, 3], // Data for the y-axis
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