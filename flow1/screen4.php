<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on campaign 4</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>
    <?php require_once COMPONENTS_PATH . 'header.php'; ?>
    <?php require_once COMPONENTS_PATH . 'progress.php'; ?>
    <div class="container">
        <div class="innerContainer">
            <h1>Set Your Ad Duration and Dates</h1>

            <div class="groups">
                <div class="form-group">
                    <label for="adDuration"><strong>Ad duration</strong></label>
                    <select id="adDuration" name="adDuration">
                        <option value="">Select ad duration</option>
                        <option value="15">15 seconds</option>
                        <option value="30">30 seconds</option>
                        <option value="60">60 seconds</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="campaignPeriod"><strong>Campaign period</strong></label>
                    <div class="date-picker-wrapper">
                        <input type="text" id="campaignPeriod" readonly placeholder="Start date to end date">
                        <button id="openCalendar">📅</button>
                    </div>
                </div>
            </div>

            <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>

        </div>
    </div>

    <div class="modal" id="calendarModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>May</h3>
            <p>Choose your campaign week</p>
            <div class="weeks">
                <button data-range="1–6">1–6</button>
                <button data-range="7–13">7–13</button>
                <button data-range="14–20">14–20</button>
                <button data-range="21–27">21–27</button>
                <button data-range="28–31">28–31</button>
            </div>
            <button id="confirmDate" class="confirm">Confirm</button>
        </div>
    </div>

    <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
    <?php require_once COMPONENTS_PATH . 'footer.php'; ?>     

    <<!-- Flatpickr JS -->
    <script>

        const openBtn = document.getElementById("openCalendar");
        const modal = document.getElementById("calendarModal");
        const closeBtn = modal.querySelector(".close");
        const confirmBtn = document.getElementById("confirmDate");
        const input = document.getElementById("campaignPeriod");
        let selectedRanges = [];

        document.querySelectorAll(".weeks button").forEach(btn => {
            btn.addEventListener("click", () => {
                btn.classList.toggle("selected");
                const range = btn.dataset.range;
                if (btn.classList.contains("selected")) {
                    selectedRanges.push(range);
                } else {
                    selectedRanges = selectedRanges.filter(r => r !== range);
                }
            });
        });

        openBtn.onclick = () => modal.style.display = "block";
        closeBtn.onclick = () => modal.style.display = "none";

        confirmBtn.onclick = () => {
            input.value = selectedRanges.join(", ");
            modal.style.display = "none";
            validateFields(); // ✅ Dit triggert validatie nadat datum is ingesteld
        };

        window.onclick = (e) => {
            if (e.target == modal) {
                modal.style.display = "none";
            }
        };

        const adDurationInput = document.getElementById('adDuration');
        const campaignPeriodInput = document.getElementById('campaignPeriod');
        const nextBtn = document.getElementById('nextBtn');

        function validateFields() {
            const adDuration = adDurationInput?.value.trim();
            const campaignPeriod = campaignPeriodInput?.value.trim();

            console.log("Ad:", adDuration, "| Period:", campaignPeriod); // Debug

            const isValid = adDuration !== '' && campaignPeriod !== '';

            if (nextBtn) {
                nextBtn.classList.toggle('disabled', !isValid);
                nextBtn.style.pointerEvents = isValid ? 'auto' : 'none';
                nextBtn.style.opacity = isValid ? '1' : '0.5';
            }
        }

        if (adDurationInput && campaignPeriodInput) {
            adDurationInput.addEventListener('change', validateFields);
            campaignPeriodInput.addEventListener('change', validateFields);

            validateFields(); // Initieel
        }

    </script>

</body>
</html>