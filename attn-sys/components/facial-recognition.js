console.log("it worky!");
(async function () {
    const staffNameInput = document.getElementById("staff-name-input");
    const registerBtn = document.getElementById("register-btn");
    const trainBtn = document.getElementById("train-btn");
    const attendanceBtn = document.getElementById("attendance-btn");
    const video = document.getElementById("video-feed");
    const canvas = document.getElementById("overlay-canvas");
    const statusMessage = document.getElementById("status-message");
    const attendanceList = document.getElementById("attendance-list");

    let trainedModel = null;
    let videoStream = null;
    let currentInterval = null;
    const modelUri =
        "https://cdn.jsdelivr.net/gh/justadudewhohacks/face-api.js@0.22.2/weights";

    function updateStatus(message, type = "info") {
        statusMessage.textContent = message;
        statusMessage.className = "status-message";
        if (type == "success") {
            statusMessage.classList.add("success");
        } else if (type == "error") {
            statusMessage.classList.add("error");
        } else {
            statusMessage.classList.add("info");
        }
    }
    function addAttendanceEntry(name) {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        const dateString = now.toLocaleDateString();
        const entry = document.createElement("li");
        entry.className = "entry-item";
        entry.innerHTML = `
            <span class="entry-name">${name}</span>
            <span class="entry-title"> ${dateString} at ${timeString} </span>
        `;
        if (attendanceList.firstChild) {
            attendanceList.insertBefore(entry, attendanceList.firstChild);
        } else {
            attendanceList.append(entry);
        }
    }

    async function loadModels() {
        updateStatus("Loading face recognition models.");
        await Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri(modelUri),
            faceapi.nets.faceLandmark68Net.loadFromUri(modelUri),
            faceapi.nets.faceRecognitionNet.loadFromUri(modelUri),
        ]);
        updateStatus("Models loaded. System standby.");
    }
    async function startVideoStream() {
        if (videoStream) {
            videoStream.getTracks().forEach((track) => track.stop());
        }
        try {
            videoStream = await navigator.mediaDevices.getUserMedia({
                video: true,
            });
            video.srcObject = videoStream;
            return true;
        } catch (error) {
            updateStatus(`Error accessing webcam: ${error.name}. `, "error");
            return false;
        }
    }
    // Step 1: Face Registration
    async function registerFace() {
        const staffName = staffNameInput.value.trim();
        if (!staffName) {
            updateStatus("Please enter an employee name first.", "error");
            return;
        }

        if (!(await startVideoStream())) return;
        updateStatus(
            `Capturing face for ${staffName}... Please look at the camera.`
        );

        const descriptors = [];
        let captures = 0;

        // Clear any existing intervals
        clearInterval(currentInterval);

        currentInterval = setInterval(async () => {
            const detections = await faceapi
                .detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
                .withFaceLandmarks()
                .withFaceDescriptor();

            if (detections && captures < 30) {
                descriptors.push(detections.descriptor);
                captures++;
                updateStatus(
                    `Capturing face for ${staffName}... (${captures}/30)`
                );
            }

            if (captures >= 30) {
                clearInterval(currentInterval);

                // Save to localStorage
                const savedData =
                    JSON.parse(localStorage.getItem("faceData")) || {};
                savedData[staffName] = descriptors;
                localStorage.setItem("faceData", JSON.stringify(savedData));

                updateStatus(
                    `Registration complete for ${staffName}!`,
                    "success"
                );
                videoStream.getTracks().forEach((track) => track.stop());
            }
        }, 1000);
    }

    // Step 2: Training the Model
    function trainModel() {
        const savedData = JSON.parse(localStorage.getItem("faceData"));
        if (!savedData || Object.keys(savedData).length === 0) {
            updateStatus(
                "No face data found. Please register some faces first.",
                "error"
            );
            return;
        }

        updateStatus("Training model...");
        const labeledDescriptors = [];

        for (const name in savedData) {
            const descriptors = savedData[name].map(
                (desc) => new Float32Array(Object.values(desc))
            );
            labeledDescriptors.push(
                new faceapi.LabeledFaceDescriptors(name, descriptors)
            );
        }

        trainedModel = labeledDescriptors;
        updateStatus(
            "Model trained successfully. Ready for attendance.",
            "success"
        );
    }

    // Step 3: Real-Time Attendance
    async function startAttendance() {
        if (!trainedModel) {
            updateStatus("Please train the model first.", "error");
            return;
        }

        if (!(await startVideoStream())) return;
        updateStatus("Attendance system running. Please look at the camera.");

        const faceMatcher = new faceapi.FaceMatcher(trainedModel, 0.6); // 0.6 is the confidence threshold
        let recognizedToday = new Set();

        // Clear any existing intervals
        clearInterval(currentInterval);

        currentInterval = setInterval(async () => {
            const detections = await faceapi
                .detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
                .withFaceLandmarks()
                .withFaceDescriptor();

            const displaySize = {
                width: video.videoWidth,
                height: video.videoHeight,
            };
            faceapi.matchDimensions(canvas, displaySize);

            const resizedDetections = faceapi.resizeResults(
                detections,
                displaySize
            );
            canvas
                .getContext("2d")
                .clearRect(0, 0, canvas.width, canvas.height);

            if (resizedDetections) {
                const bestMatch = faceMatcher.findBestMatch(
                    resizedDetections.descriptor
                );

                if (
                    bestMatch.label !== "unknown" &&
                    !recognizedToday.has(bestMatch.label)
                ) {
                    addAttendanceEntry(bestMatch.label);
                    recognizedToday.add(bestMatch.label);
                }

                const box = resizedDetections.detection.box;
                const drawBox = new faceapi.draw.DrawBox(box, {
                    label: bestMatch.toString(),
                });
                drawBox.draw(canvas);
            }
        }, 100);
    }

    registerBtn.addEventListener("click", registerFace);
    trainBtn.addEventListener("click", trainModel);
    attendanceBtn.addEventListener("click", startAttendance);

    loadModels();
})();
