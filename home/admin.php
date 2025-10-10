<?php 
session_start();
include("../components/db.php");
$popup_html = '
    <div id="reusable-popup">
        <div id="popup-header"></div>
        <div id="popup-body"></div>
        <button id="close-popup">Close</button>
    </div>
';

$sql = "select * from announcement";
$get_announcements = $conn->prepare($sql);
$get_announcements->execute();
$announcements = $get_announcements->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "select * from events";
$get_events = $conn->prepare($sql2);
$get_events->execute();
$events = $get_events->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/staffstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    
    <title>Administrator</title>
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
            <h4>Announcements</h4>
            <?php foreach ($announcements as $announcement): ?>
                <a href="#" 
                    class="announcement-link"
                    data-title="<?php echo htmlspecialchars($announcement['title'] . ", from " . $announcement['sender'] ?? 'No Title'); ?>"
                    data-content="<?php echo htmlspecialchars($announcement['content'] ?? 'No Content'); ?>">
                    <?php echo htmlspecialchars($announcement['title'] ?? 'View Details'); ?>
                </a>
            <?php endforeach; ?>
            <?php include("../components/announcement.php")?>
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
                <h6>View event details</h6>
                <?php foreach ($events as $event): ?>
                    <p class="event-name">
                        <a href="#" 
                        class="event-link" 
                        data-title="<?php echo htmlspecialchars($event['event_title'] ?? 'No Title'); ?>"
                        data-content="<?php echo htmlspecialchars($event['event_description'] ?? 'No Description');?>">
                    </a>
                </p>
                <p class="event-date"><?= htmlspecialchars($event['event_date'])?></p>
                <?php endforeach; ?>
                <?php include("../components/events.php");?>
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

        <div class="button-options">
            <a href="../employee/list.php"><button><i class="ri-user-line"></i>Employees</button></a>
            <a href="../department/list.php"><button><i class="ri-community-line"></i> Department</button></a>
        </div>
    </div>
</body>
<script defer>
    const popup = document.getElementById('reusable-popup');
    const header = document.getElementById('popup-header');
    const body = document.getElementById('popup-body');
    const closeButton = document.getElementById('close-popup');
    const links = document.querySelectorAll('.announcement-link');
    

    function hidePopup() {
        popup.style.display = 'none';
    }

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const title = event.currentTarget.dataset.title;
            const content = event.currentTarget.dataset.content;
            header.textContent = title;
            body.innerHTML = content.replace(/\n/g, '<br>');
            popup.style.display = 'block';
        });
    });
    closeButton.addEventListener('click', hidePopup);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && popup.style.display === 'block') {
            hidePopup();
        }
    });
    

    document.addEventListener('click', (event) => {
        const isTriggerLink = event.target.classList.contains('announcement-link');
        const isInsidePopup = popup.contains(event.target);
        if (popup.style.display === 'block' && !isTriggerLink && !isInsidePopup) {
            hidePopup();
        }
    });

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