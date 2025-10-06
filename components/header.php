<?php
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
?>

<style>
    :root {
        --color-bg: #f7f9fc;
        --color-card-bg: #ffffff;
        --color-text-primary: #333333;
        --color-text-secondary: #6b7280;
        /* ORANGE PALETTE CHANGES - Semantic colors remain distinct */
        --color-success: #10b981;
        /* Emerald Green (Approved) */
        --color-warning: #facc15;
        /* Vibrant Yellow (Late/Pending) */
        --color-info: #3b82f6;
        /* Standard Blue (On Leave) */
        --color-danger: #ef4444;
        /* True Red (Absent/Denied) */
        --color-brand: #f97316;
        /* PRIMARY BRAND ORANGE */
        /* ORANGE PALETTE CHANGES ABOVE */
        --border-radius: 8px;
        --shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        --font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .header h1 {
        font-size: 1.875rem;
        /* 30px */
        font-weight: 700;
        margin: 0;
    }

    .header-meta {
        font-size: 0.875rem;
        color: var(--color-text-secondary);
        display: flex;
        align-items: center;
    }

    .header-meta a {
        color: var(--color-brand);
        text-decoration: none;
        font-weight: 500;
        margin-left: 1rem;
    }

    .header-meta a:hover {
        text-decoration: underline;
    }
</style>

<header class="header">
    <h1>Welcome, <?php isset($_SESSION["firstname"]) ? print htmlspecialchars($_SESSION['firstname']) : print "Guest" ?>
    </h1>
    <div class="header-meta">
        <span id="current-time"></span>
        <a href="../accounts/logout.php">Log out</a>
    </div>
</header>

<script defer>
    function updateTime() {
        const now = new Date();
        // Format time as H:MM AM/PM
        const timeString = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
        // Format date as Short Weekday, Short Month, Numeric Day
        const dateString = now.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
        document.getElementById('current-time').textContent = `${timeString} | ${dateString}`;
    }
    updateTime();
    setInterval(updateTime, 60000);
</script>