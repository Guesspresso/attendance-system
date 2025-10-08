<??>
<section popover class="content-card leave-section" id="leave-dialog">
    <h2>Request for leave</h2>

        <div class="form-context">
            <p><strong>Applicant:</strong> <?php isset($_SESSION["firstname"]) ? print htmlspecialchars($_SESSION['firstname']) : print "Guest" ?></p>
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

<style>
section.leave-section {
    position: relative;
    min-height: 85vh;
    min-width: 85vw;
    margin: auto;
}

.leave-dialog {
    margin: auto;
}

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


form {
    display: block;
    width: 80vw;
    gap: 20px;
    margin: auto;
}

.form-group {
    margin: 20px;
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: 10px;
}

.form-row {
    display: flex;
    flex-direction: row;
    width: 50%;
    gap: 10px;
}

.input-container {
    position: relative;
}

.input-container > label {
    position: absolute;
    top: 0.5rem;
    left: 1rem;
    background-color: rgba(255, 144, 144, 0.79);
    transition: all .3s ease;
}

.input-container input[value] + label,
.input-container input:focus + label,
.input-container input:valid + label ,
.input-container textarea:focus + label {
    font-size: 12px;
    top: -.5rem;
}


.input-container input:focus,
.input-container input:valid {
    border-bottom: 2px solid blueviolet;
}

.input-container input:read-only:focus {
    border-bottom: 2px solid transparent;
}
.input-container input:read-only {
    background-color: lightgray;
}

input[type=text],
input[type=password] {
    padding: 10px 20px;
    width: fit-content;
    border: none;
    border-bottom: 2px solid transparent;
    outline: none;
    font-size: inherit;
    transition: all .3s ease;
}


textarea {
    font-size: 25px;
    width: auto;
    padding: 30px 20px;
    border: 1px solid red;
    border-bottom: 2px solid transparent;
    outline: none;
    font-size: inherit;
    transition: all .3s ease;
}

.input-container textarea:focus {
    padding: 10px 20px;
    border: none;
    border-bottom: 2px solid blueviolet;
}

input[type=date],
select {
    padding: 10px;
}

.btn-submit {
    background-color: #67ff53ff;
    outline:none;
    font-weight: 500;
    font-size: 15px;
    position: absolute;
    padding: 20px;
    right: 10%;
    bottom: 10%;
}
</style>