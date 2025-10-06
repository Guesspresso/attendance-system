<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <!-- Header & Navigation -->
    <header class="header">
        <h1>Welcome, jvaun</h1>
        <div class="header-meta">
            <span id="current-time"></span>
            <a href="#">Log out</a>
        </div>
    </header>

    <!-- Main Dashboard Grid Layout -->
    <main class="dashboard-main">
        <!-- Attendance Metrics Cards (Spans across the top) -->
        <section class="metric-cards-container">
            <div class="metric-card present">
                <p class="metric-card-title">Present</p>
                <div class="metric-value">31</div>
                <p class="metric-caption">Out of 31 days</p>
            </div>
            <div class="metric-card late">
                <p class="metric-card-title">Late</p>
                <div class="metric-value">0</div>
                <p class="metric-caption">Out of 3 instances</p>
            </div>
            <div class="metric-card on-leave">
                <p class="metric-card-title">On Leave</p>
                <div class="metric-value">0</div>
                <p class="metric-caption">Today</p>
            </div>
            <div class="metric-card absent">
                <p class="metric-card-title">Absent</p>
                <div class="metric-value">0</div>
                <p class="metric-caption">Out of 10 instances</p>
            </div>
        </section>

        <!-- Chart Section (Center Column on Desktop) -->
        <div class="chart-container">
            <h2>Your attendance chart</h2>
            <!-- Simple SVG Chart Placeholder (Simulating data over months) -->
            <svg viewBox="0 0 500 250" style="width: 100%; height: 80%;">
                <!-- Axes -->
                <line x1="50" y1="230" x2="480" y2="230" stroke="#ccc" stroke-width="2"/>
                <line x1="50" y1="30" x2="50" y2="230" stroke="#ccc" stroke-width="2"/>
                
                <!-- Data Path (Simulated: Jan(15) -> Feb(18) -> Mar(5) -> Apr(10) -> May(7) -> Jun(8)) -->
                <polyline fill="none" stroke="#ef4444" stroke-width="3" 
                          points="50,130 140,100 230,200 320,160 410,180 480,170" 
                          style="opacity:0.7"/>
                
                <!-- Data Points (Circles) - Using orange brand color -->
                <circle cx="50" cy="130" r="4" fill="#f97316" />
                <circle cx="140" cy="100" r="4" fill="#f97316" />
                <circle cx="230" cy="200" r="4" fill="#f97316" />
                <circle cx="320" cy="160" r="4" fill="#f97316" />
                <circle cx="410" cy="180" r="4" fill="#f97316" />
                <circle cx="480" cy="170" r="4" fill="#f97316" />
                
                <!-- X-Axis Labels -->
                <text x="50" y="245" text-anchor="middle" font-size="12" fill="#666">Jan</text>
                <text x="140" y="245" text-anchor="middle" font-size="12" fill="#666">Feb</text>
                <text x="230" y="245" text-anchor="middle" font-size="12" fill="#666">Mar</text>
                <text x="320" y="245" text-anchor="middle" font-size="12" fill="#666">Apr</text>
                <text x="410" y="245" text-anchor="middle" font-size="12" fill="#666">May</text>
                <text x="480" y="245" text-anchor="middle" font-size="12" fill="#666">Jun</text>

                <!-- Y-Axis Labels (20, 15, 10, 5, 0) -->
                <text x="45" y="35" text-anchor="end" font-size="12" fill="#666">20</text>
                <text x="45" y="80" text-anchor="end" font-size="12" fill="#666">15</text>
                <text x="45" y="130" text-anchor="end" font-size="12" fill="#666">10</text>
                <text x="45" y="180" text-anchor="end" font-size="12" fill="#666">5</text>
                <text x="45" y="230" text-anchor="end" font-size="12" fill="#666">0</text>
            </svg>
        </div>

        <!-- Leave Request Form (Middle Column on Desktop) -->
        <section class="content-card leave-section">
            <h2>Request for leave</h2>
            
            <div class="form-context">
                <p><strong>Applicant:</strong> jvaun (HR Department)</p>
                <p><strong>Date Filed:</strong> 2025-10-05</p>
            </div>

            <form>
                <div class="form-group">
                    <label for="leave-type">Leave Type <span class="required-star">*</span></label>
                    <select id="leave-type" name="leave-type" required class="form-select">
                        <option value="">-- Select Type --</option>
                        <option value="vacation">Vacation</option>
                        <option value="sick">Sick Leave</option>
                        <option value="personal">Personal Leave</option>
                        <option value="maternity">Maternity/Paternity</option>
                    </select>
                </div>

                <div class="form-group form-date-group">
                    <div class="date-input-wrapper">
                        <label for="from-date">From Date <span class="required-star">*</span></label>
                        <input type="date" id="from-date" name="from-date" required class="form-input">
                    </div>
                    <div class="date-input-wrapper">
                        <label for="to-date">To Date <span class="required-star">*</span></label>
                        <input type="date" id="to-date" name="to-date" required class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="reason">Reason <span class="required-star">*</span></label>
                    <textarea id="reason" name="reason" rows="4" required class="form-textarea"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-submit">
                        Submit Request
                    </button>
                </div>
            </form>
        </section>
        
        <!-- Upcoming Events (Sidebar/Right Column on Desktop) -->
        <div class="content-card events-section">
            <h3>On this month</h3>
            <ul class="event-list">
                <!-- Event 1 (Blue) -->
                <li class="event-item">
                    <svg class="event-icon icon-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <div>
                        <p class="event-name">Payroll Deadline</p>
                        <p class="event-date">2025-10-10</p>
                    </div>
                </li>
                <!-- Event 2 (Changed to Orange Brand) -->
                <li class="event-item">
                    <svg class="event-icon icon-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <p class="event-name">Company Lunch & Learn</p>
                        <p class="event-date">2025-10-15</p>
                    </div>
                </li>
                <!-- Event 3 (Yellow) -->
                <li class="event-item">
                    <svg class="event-icon icon-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <div>
                        <p class="event-name">Performance Review Window</p>
                        <p class="event-date">2025-10-20</p>
                    </div>
                </li>
            </ul>
        </div>

    </main>
    
    <h2 class="overview-title">Leave Request Overview</h2>

    <!-- Leave Request Metric Boxes (Full Width) -->
    <div class="placeholder-boxes">
        <div class="placeholder-box">
            <strong class="number-pending">10</strong>
            <p>Pending Requests requiring immediate review and action from the management team.</p>
        </div>
        <div class="placeholder-box">
            <strong class="number-approved">5</strong>
            <p>Approved Requests this month. Click to view the schedule and coverage details.</p>
        </div>
        <div class="placeholder-box">
            <strong class="number-denied">2</strong>
            <p>Denied Requests. Review these to provide feedback or clarify policy with employees.</p>
        </div>
    </div>

    <!-- JavaScript to display current time -->
</body>
<style>
   /* CSS Variables for consistent theming */
        :root {
            --color-bg: #f7f9fc;
            --color-card-bg: #ffffff;
            --color-text-primary: #333333;
            --color-text-secondary: #6b7280;
            /* ORANGE PALETTE CHANGES - Semantic colors remain distinct */
            --color-success: #10b981; /* Emerald Green (Approved) */
            --color-warning: #facc15; /* Vibrant Yellow (Late/Pending) */
            --color-info: #3b82f6;    /* Standard Blue (On Leave) */
            --color-danger: #ef4444;  /* True Red (Absent/Denied) */
            --color-brand: #f97316; /* PRIMARY BRAND ORANGE */
            /* ORANGE PALETTE CHANGES ABOVE */
            --border-radius: 8px;
            --shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            --font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--color-bg);
            color: var(--color-text-primary);
            padding: 24px;
            margin: 0;
            min-height: 100vh;
        }

        /* Header Styling */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
        .header h1 {
            font-size: 1.875rem; /* 30px */
            font-weight: 700;
            margin: 0;
        }
        .header-meta {
            font-size: 0.875rem; /* 14px */
            color: var(--color-text-secondary);
            display: flex;
            align-items: center;
        }
        .header-meta a {
            color: var(--color-brand); /* Orange link color */
            text-decoration: none;
            font-weight: 500;
            margin-left: 1rem;
        }
        .header-meta a:hover {
            text-decoration: underline;
        }

        /* Main Dashboard Layout (CSS Grid) */
        .dashboard-main {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Responsive Grid for Desktop: 3 major columns (metrics + sidebar + chart/form) */
        @media (min-width: 1024px) {
            .dashboard-main {
                grid-template-columns: 1fr 2fr 1fr; /* Sidebar, Content, Events */
            }
            .metric-cards-container {
                grid-column: 1 / span 3; /* Metrics span all columns */
            }
            .leave-section {
                grid-column: 2 / span 1; /* Form goes in the middle */
            }
            .events-section {
                grid-column: 3 / span 1; /* Events go to the right */
            }
        }

        @media (min-width: 640px) {
            body {
                padding: 40px;
            }
        }

        /* Attendance Cards (Flexbox) */
        .metric-cards-container {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 32px;
        }
        @media (min-width: 640px) {
            .metric-cards-container {
                flex-direction: row;
            }
        }

        .metric-card {
            flex: 1;
            background-color: var(--color-card-bg);
            padding: 24px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border-top: 4px solid;
            min-width: 0; 
        }
        
        .metric-card-title {
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--color-text-secondary);
            margin-bottom: 4px;
        }

        .metric-value {
            font-size: 2.5rem; /* 40px */
            font-weight: 700;
            line-height: 1;
        }

        .metric-caption {
            font-size: 0.875rem;
            color: #9ca3af;
            margin-top: 4px;
        }

        /* Card Colors - Using semantic variables */
        /* Primary status (Present) now uses the brand orange for overall theme */
        .metric-card.present { border-color: var(--color-brand); } 
        .metric-card.present .metric-value { color: var(--color-brand); }

        .metric-card.late { border-color: var(--color-warning); }
        .metric-card.late .metric-value { color: var(--color-warning); }

        .metric-card.on-leave { border-color: var(--color-info); }
        .metric-card.on-leave .metric-value { color: var(--color-info); }

        .metric-card.absent { border-color: var(--color-danger); }
        .metric-card.absent .metric-value { color: var(--color-danger); }

        /* General Content Card Styling */
        .content-card {
            background-color: var(--color-card-bg);
            padding: 32px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        .content-card h2 {
            font-size: 1.5rem; /* 24px */
            font-weight: 600;
            color: var(--color-text-primary);
            margin-bottom: 24px;
        }

        /* Form Specific Styles (Kept from previous version) */
        

        /* Chart Styling (SVG Placeholder) */
        .chart-container {
            width: 100%;
            height: 300px;
            background-color: var(--color-card-bg);
            border-radius: var(--border-radius);
            padding: 24px;
            box-shadow: var(--shadow);
            margin-bottom: 24px;
        }
        .chart-container h2 {
            margin-top: 0;
        }

        /* Leave Request Overview and Boxes */
        .overview-title {
            font-size: 1.8rem; 
            font-weight: 600; 
            margin-top: 50px; 
            margin-bottom: 16px; 
            border-bottom: 2px solid #e5e7eb; 
            padding-bottom: 8px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .placeholder-boxes {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 24px;
            margin: 0 auto 32px; 
            max-width: 1200px;
        }
        @media (min-width: 768px) {
            .placeholder-boxes {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .placeholder-box {
            background-color: var(--color-card-bg); 
            padding: 20px;
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            line-height: 1.4;
            color: #4b5563;
            box-shadow: var(--shadow); 
        }
        .placeholder-box strong {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        /* Semantic colors - Using semantic variables */
        .number-pending { color: var(--color-warning); }
        .number-approved { color: var(--color-success); }
        .number-denied { color: var(--color-danger); }
</style>

</html>
<script defer>
    function updateTime() {
        const now = new Date();
        // Format time as H:MM AM/PM
        const timeString = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
        // Format date as Short Weekday, Short Month, Numeric Day
        const dateString = now.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
        document.getElementById('current-time').textContent = `${timeString}, ${dateString}`;
    }
    updateTime();
    setInterval(updateTime, 60000); // Update every minute
</script>