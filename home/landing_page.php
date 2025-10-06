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
    <link rel="stylesheet" href="../css/staffindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Facial Recognition Panel</title>    
    <script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.js"></script>
    <script src="../components/facial-recognition.js" defer></script>
</head>

<body>
    <div class="container">
        <div class="main">
            <h1 class="title">Attendance Monitoring System</h1>
            <div class="flex-container">
                <div class="flex-item">
                    <div class="video-container">
                        <video src="" id="video-feed" autoplay muted class="video"></video>
                        <canvas id="overlay-canvas" class="overlay"></canvas>
                    </div>
    
                    <div class="input-container">
                        <input type="text" name="" id="staff-name-input" class="input-field" placeholder="Enter employee name">
                        <div class="status-message" id="status-message">
                            Waiting for user action
                        </div>
                    </div>
                    <div class="button-container">
                        <button id="register-btn" class="btn btn-register">
                            register face
                        </button>
                        <button id="train-btn" class="btn btn-train">
                            train face
                        </button>
                        <button id="attendance-btn" class="btn btn-attendance">
                            attendance face
                        </button>
                    </div>
                </div>
    
                <div class="flex-item">
                    <div class="log-container">
                        <h2 class="log-title">Attendance Log</h2>
                        <ul id="attendance-list" class="attendance-list">
                            &nbsp;
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>