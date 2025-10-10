<div class="employee-form-container">
        <h2 class="form-title">New employee</h2>
        
        <form class="new-employee-form">
            <div class="form-columns">
                <div class="column">
                    <h3>Employee info</h3>
                    </div>
                <div class="column">
                    <h3>Work info</h3>
                    </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="add-btn">add</button>
            </div>
        </form>
    </div>

    <style>
        /* --- Form Container (White Box) Styling --- */
.employee-form-container {
    background-color: white;
    padding: 30px;
    margin-top: 20px;
    border-radius: 8px; /* Consistent with dashboard cards */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); /* Soft shadow for depth */
    min-height: 500px; /* Gives it presence on the page */
}

.form-title {
    font-size: 1.8em;
    font-weight: 500; /* Slightly lighter title */
    color: #333;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee; /* Subtle separator */
    margin-bottom: 25px;
}

/* --- Section Headers --- */
.new-employee-form h3 {
    font-size: 1.2em;
    font-weight: bold;
    color: #555;
    margin-bottom: 20px;
    /* Optional: Add a left border/accent for visual separation */
    border-left: 4px solid #007bff; 
    padding-left: 10px;
}

/* --- Form Layout (Two Columns) --- */
.form-columns {
    display: flex;
    gap: 50px; /* Space between the two columns */
}

.column {
    flex: 1; /* Makes columns take equal width */
}

/* --- Field Groups (Label + Input) --- */
/* Assuming each field is wrapped in a container for vertical alignment */
.field-group {
    margin-bottom: 20px;
}

.field-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #444;
}

/* --- Input Field Styling --- */
.new-employee-form input[type="text"],
.new-employee-form input[type="email"] {
    width: 100%; /* Fill the column width */
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 4px; /* Rounded corners */
    transition: border-color 0.3s, box-shadow 0.3s;
    outline: none;
    font-size: 1em;
}

.new-employee-form input[type="text"]:focus,
.new-employee-form input[type="email"]:focus {
    border-color: #007bff; /* Highlight on focus */
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25); /* Subtle blue glow */
}

/* --- Button Styling --- */
.form-actions {
    display: flex;
    justify-content: flex-end; /* Pushes the button to the bottom right */
    padding-top: 30px;
    /* Position the button far down, mimicking the original placement */
    margin-top: 200px; 
}

.add-btn {
    padding: 10px 30px;
    background-color: #28a745; /* Success Green (consistent with 'Add new' button from previous screen) */
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1.1em;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
    transition: background-color 0.3s;
}

.add-btn:hover {
    background-color: #218838; /* Darker green on hover */
}
    </style>