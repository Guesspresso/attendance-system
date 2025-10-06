<?php 
$username = $_SESSION["username"];
?>
<link rel="stylesheet" href="../css/styles.css">

<nav>
    <h1 class="nav-heading">Puncher</h1>
    <ul class="nav">
        <li class="dashboard">
            <div class="dropdown-heading"><i class="ri-dashboard-line"></i> Dashboard</div>
            <ul>
                <?php // if admin ?>
                <a href="../home/admin.php">
                    <li>
                        <i class="ri-admin-line"></i> Admin
                    </li>
                </a>
                <? // endif ?>
                <?php // if staff ?>
                <a href="../home/staff.php">
                    <li>
                        <i class="ri-user-star-line"></i> Staff
                    </li>
                </a>
                <? // endif ?>
                <?php // if employee ?>
                <a href="../home/index.php">
                    <li>
                        <i class="ri-user-line"></i> Employee
                    </li>
                </a>
                 <? // endif ?>
            </ul>
        </li>
        <?php if ($_SESSION['role'] == "admin"):?>
        <li class="employees">
            <div class="dropdown-heading"><i class="ri-team-line"></i> Employee</div>
            <ul>
                <?// if admin ?>
                <a href="../employee/list.php">
                    <li>
                        <i class="ri-folder-user-line"></i> List
                    </li>
                </a>
                <a href="../employee/add.php">
                    <li>
                        <i class="ri-user-add-line"></i> Add
                    </li>
                </a>
                <? // endif ?>
                <? // displays details ?>
                <a href="../employee/detail.php?usn=<?= urlencode($username)?>">
                    <li>
                        <i class="ri-info-card-line"></i> View
                    </li>
                </a>
                <!-- <a href="">
                    <li>
                        <i class="ri-user-add-line"></i> New
                    </li>
                </a>
                <a href="">
                    <li>
                        <i class="ri-user-add-line"></i> New
                    </li>
                </a> -->
            </ul>
        </li>
        <?php endif;?>
        <li class="department">
            <div class="dropdown-heading"><i class="ri-group-line"></i> Department</div>
            <ul>
                <a href="../department/list.php">
                    <li>
                        List
                    </li>
                </a>
                <a href="../department/detail.php">
                    <li>
                        view
                    </li>
                </a>
                <a href="../department/add.php">
                    <li>
                        New
                    </li>
                </a>
            </ul>
        </li>
    </ul>

    <div class="side-account">
        <img src="https://placehold.co/50x50?text=E" alt="profile" srcset="">
        <div class="options">
            <h2><?= isset($_SESSION['firstname']) ? htmlspecialchars($_SESSION['firstname']) : "Guest"?></h2>
            <a href="../accounts/logout.php">Log out</a> 
        </div>
    </div>
</nav>