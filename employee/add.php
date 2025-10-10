<section id="add-new-employee" popover class="add-new-employee">
    <link rel="stylesheet" href="../css/styles.css">
    <div class="employee-dialog">
        <h1 class="title">New employee</h1>
        <form action="" class="employee-form">
            <div class="column">
                <h3>Facial details</h3>
                <div class="" style="width: 100%; height:100%; background-color: gray;"></div>
            </div>
                <div class="column">
                    <h3>Employee Info</h3>
                    <input type="text" name="" id="">
                    <label for="">Username
                        </label>
                        <input type="text" name="" id="">
                        <label for="">First name
                            </label>
                        <input type="text" name="" id="">
                        <label for="">Last name
                            </label>
                </div>
                <div class="column">
                    <h3>Work Info</h3>
                    <input type="text" name="" id="">
                    <label for="">Role</label>
                    
                    <input type="text" name="" id="">
                    <label for="">Department
                        </label>
                    
                    <input type="text" name="" id="">
                    <label for="">Email
                        </label>
                </div>
        </form>
    </div>
    <div class="button-options">
        <button type="submit" class="">Rescan</button>
        <button type="submit" class="add-new-btn">Add</button>
    </div>
</section>

<style>
    section.add-new-employee {
        position: sticky;
        min-height: 85vh;
        min-width: 85vw;
        margin: auto;
        padding: 2%;
        border-radius: 25px;
    }

    .add-new-employee .button-options {
        position: absolute;
    }

    .employee-dialog .title {
        font-size: 1.8em;
        font-weight: 500;
        /* Slightly lighter title */
        color: #333;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
        /* Subtle separator */
        margin-bottom: 25px;
    }

    .employee-form h3 {
        font-size: 1.2em;
        font-weight: bold;
        color: #555;
        margin-bottom: 20px;
        border-left: 4px solid #007bff; 
        padding-left: 10px;
    }
    .column {
        flex: 1;
    }
</style>