<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/formstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Employee Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="main">
            <?php include_once "../components/header.php" ?>
            <div class="quick-info">
                <div class="block present">
                    <h1>Present</h1>
                    <h2>0/31</h2>
                </div>
                <div class="block late">
                    <h1>Late</h1>
                    <h2>0/3</h2>
                </div>
                <div class="block leave">
                    <h1>On leave</h1>
                    <h2>0</h2>
                </div>
                <div class="block absent">
                    <h1>Absent</h1>
                    <h2>0/10</h2>
                </div>
            </div>
            <div class="charts">
                <div class="holiday-container">
                    <h2 class="title">On this month</h2>
                    <div class="holiday-list">
                        <div class="holiday">
                            <h3>{Date}</h3>
                            <p>Event name</p>
                        </div>
                        <div class="holiday">
                            <h3>{Date}</h3>
                            <p>Event name</p>
                        </div>
                        <div class="holiday">
                            <h3>{Date}</h3>
                            <p>Event name</p>
                        </div>
                        <div class="holiday">
                            <h3>{Date}</h3>
                            <p>Event name</p>
                        </div>
                    </div>
                </div>
                <div class="requests">
                    <h1 class="title">File a leave request</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="input-container">
                                <input type="text" id="name" name="name"
                                value="<?php echo htmlspecialchars($_SESSION['firstname'] ?? '', ENT_QUOTES); ?>" readonly>
                                <label for="name">Name</label>
                            </div>
        
                            <div class="input-container">
                                <input type="text" id="department" name="department"
                                value="<?php echo htmlspecialchars($_SESSION['department'] ?? '', ENT_QUOTES); ?>" readonly>
                                <label for="department">Department</label>
                            </div>
        
                            <label for="date_created">Date Filed</label>
                            <input type="text" id="date_created" name="date_created" value="<?php echo date('Y-m-d'); ?>"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label for="leave_type">Leave Type</label>
                            <select id="leave_type" name="leave_type" required>
                                <option value="">-- Select Type --</option>
                                <option value="Vacation">Vacation</option>
                                <option value="Sick">Sick</option>
                                <option value="Maternity">Maternity</option>
                                <option value="Paternity">Paternity</option>
                            </select>

                            <div class="form-row">
                                <label for="date_from">From</label>
                                <input type="date" id="date_from" name="date_from" required>
                                
                                <label for="date_to">To</label>
                                <input type="date" id="date_to" name="date_to" required>
                            </div>
                            
                            <div class="input-container">
                                <textarea name="reason" required> </textarea>
                                <label for="reason">Reason</label>
                            </div>
                            <button type="submit">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    /* 
        .form-context {
            font-size: 0.875rem;
            color: var(--color-text-secondary);
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e5e7eb;
        }
        .form-context strong { color: #4b5563; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--color-text-primary);
            margin-bottom: 0.25rem;
        }
        .required-star { color: var(--color-danger); }
        .form-input, .form-select, .form-textarea {
            display: block;
            width: 100%;
            padding: 10px 12px;
            font-size: 1rem;
            border: 1px solid #d1d5db;
            border-radius: var(--border-radius);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        /* Focus color remains orange brand */
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--color-brand);
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.3); 
        }
        .form-textarea { resize: vertical; }
        .form-date-group {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        @media (min-width: 640px) {
            .form-date-group { flex-direction: row; }
        }
        .date-input-wrapper { flex: 1; }
        /* Button color remains orange brand */
        .btn-submit {
            display: block;
            width: 100%;
            background-color: var(--color-brand);
            color: var(--color-card-bg);
            padding: 12px 16px;
            border-radius: 6px;
            font-weight: 600;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: background-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            box-shadow: 0 2px 4px rgba(249, 115, 22, 0.4); 
        }
        .btn-submit:hover { background-color: #ea580c; } /* Darker orange on hover */

        /* Events Section */
        .events-section h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        .event-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .event-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
        }
        .event-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            margin-top: 4px;
            flex-shrink: 0;
        }
        .event-name {
            font-size: 0.875rem;
            font-weight: 500;
        }
        .event-date {
            font-size: 0.75rem;
            color: var(--color-text-secondary);
        }
        /* Event Icon Colors - icon-green changed to brand orange */
        .icon-blue { color: var(--color-info); }
        .icon-green { color: var(--color-brand); } /* Now using brand orange */
        .icon-yellow { color: var(--color-warning); }
    */
</style>