<style>
        /* Basic CSS for the popup */
        #reusable-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border: 1px solid #333;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            width: fit-content;
            max-width: 80%;
            z-index: 2000;
            display: none;
            overflow: scroll;
            border-radius: 25px;
        }
        #popup-header {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        #close-popup {
            margin-top: 15px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .announcement-link {
            padding: 20px;
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
            display: block;
            margin-bottom: 5px;
        }
        #popup-body {
            max-height: 250px;
            overflow-y: auto; 
            padding: 10px 0; 
        }
    </style>

<div id="reusable-popup">
    <div id="popup-header"></div>
    <div id="popup-body"></div>
    <button id="close-popup">Close</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('reusable-popup');
    const header = document.getElementById('popup-header');
    const body = document.getElementById('popup-body');
    const closeButton = document.getElementById('close-popup');
    const links = document.querySelectorAll('.event-link');
    
    function hidePopup() {
        popup.style.display = 'none';
    }

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();

            // Pull data from the clicked link's attributes
            const title = event.currentTarget.dataset.title;
            const content = event.currentTarget.dataset.content;

            // Populate and show the popup
            header.textContent = title;
            // Use textContent for security, but since the content is database-driven 
            // and often needs HTML/linebreaks, we use innerHTML with safety:
            body.innerHTML = content.replace(/\n/g, '<br>'); 
            popup.style.display = 'block';
        });
    });

    // Close listeners
    closeButton.addEventListener('click', hidePopup);
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && popup.style.display === 'block') {
            hidePopup();
        }
    });
    // Click outside listener (optional but recommended)
    document.addEventListener('click', (event) => {
        const isTriggerLink = event.target.classList.contains('announcement-link');
        const isInsidePopup = popup.contains(event.target);
        if (popup.style.display === 'block' && !isTriggerLink && !isInsidePopup) {
            hidePopup();
        }
    });
});
</script>