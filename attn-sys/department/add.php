<section id="add-new-dept" popover class="add-new-dept">
    <link rel="stylesheet" href="../css/styles.css">
    <div class="department-dialog">
        <h1 class="title">New department</h1>
        <form action="" class="dept-form">
            <div class="column">
                <label for="">Department name
                    <input type="text" name="" id="">
                </label>

                <label for="">Department head
                    <input type="text" name="" id="">
                </label>
            </div>
            <div class="column">
                <label for="">Description
                    </label>
                    <textarea name="" id=""></textarea>
                </div>
            <div class="button-options">
                <button type="submit" class="add-new-btn">Add</button>
                <button type="submit" class="cancel">Cancel</button>
            </div>
        </form>
    </div>
</section>

<style>
    section.add-new-dept {
        position: sticky;
        min-height: 50vh;
        min-width: 85vw;
        margin: auto;
        padding: 2%;
        border-radius: 25px;
    }

    .column textarea {
        width: 100%;
    }

    .add-new-dept .button-options {
        position: absolute;
    }

    .department-dialog .title {
        font-size: 1.8em;
        font-weight: 500;
        /* Slightly lighter title */
        color: #333;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
        /* Subtle separator */
        margin-bottom: 25px;
    }

    .dept-form h3 {
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