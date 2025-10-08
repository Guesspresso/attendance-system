<?php
$session_life = 60 * 60 * 24; 
session_set_cookie_params($session_life);
session_start();

include("../components/db.php");
$message = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username)) $message[] = "Username cannot be empty.";
        if (empty($password)) $message[] = "Password cannot be empty.";
        
        if (empty($message)) {
            // Get account
            $sql = "SELECT * FROM account WHERE acct_uid = :username";
            $log_in = $conn->prepare($sql);
            $log_in->bindParam(':username', $username, PDO::PARAM_STR);
            $log_in->execute();
            $user = $log_in->fetch(PDO::FETCH_ASSOC);

            if ($user && $password === $user['acct_password']) {
                $sql = "SELECT * FROM employee WHERE employee_usn = :username";
                $get_employee_records = $conn->prepare($sql);
                $get_employee_records->bindParam(':username', $user['acct_uid'], PDO::PARAM_STR);
                $get_employee_records->execute();
                $record = $get_employee_records->fetch(PDO::FETCH_ASSOC);

                if ($record) {
                    $_SESSION['username']   = $record['employee_usn'];
                    $_SESSION['firstname']  = $record['employee_fn'];
                    $_SESSION['lastname']   = $record['employee_ln'];
                    $_SESSION['role']       = $record['employee_role'];
                    $_SESSION['department'] = $record['employee_dept'];
                    $_SESSION['employeeId'] = $record['employee_id'];

                    header("Location: ../home/index.php");
                    exit();
                } else {
                    $message[] = "Employee record not found.";
                }
            } else {
                $message[] = "Incorrect username or password.";
            }
        }
    } else {
        $message[] = "Required fields missing.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/accounts.css">
    <title>Login</title>
</head>

<body>
    <div class="login-container">
        <div class="login-dialog">
            <h1 class="title">Attendance Monitoring System</h1>
            <form action="login.php" method="post">
                <?php if (!empty($message)): ?>
                    <div class="messages">
                        <?php foreach ($message as $msg): ?>
                            <p><?= htmlspecialchars($msg) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?></p>
                <div class="input-container">
                    <input type="text" name="username" id="" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-container">
                    <input type="password" name="password" id="" required>
                    <label for="">
                        Password
                    </label>
                </div>
                <div class="button-actions">
                    <button type="submit" id="login">Log in</button>
                    <a href=""><button id="register">Register</button></a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>