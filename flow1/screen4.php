<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on campaign 1</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>
    <?php include '../components/header.php';?>
    <?php include '../components/progress.php';?>
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

            <?php include($_SERVER['DOCUMENT_ROOT'] . "/components/buttons.php"); ?>

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

    <?php include '../components/brands.php';?>
    <?php include '../components/footer.php';?>

    <<!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr">

        flatpickr("#campaignPeriod", {
          inline: true, // for dev/testing, remove if you want it dropdown-style
          dateFormat: "d/m/Y",
          disableMobile: true,
          clickOpens: true,
          onDayCreate: function(dObj, dStr, fp, dayElem) {
            // Optional: style Tuesdays uniquely to hint they're "start of week"
            const date = new Date(dayElem.dateObj);
            if (date.getDay() === 2) { // 2 = Tuesday
              dayElem.style.border = "2px solid #28a746";
              dayElem.style.borderRadius = "50%";
            }
          },
          onChange: function(selectedDates, dateStr, instance) {
            const picked = selectedDates[0];
            const day = picked.getDay();

            // Find the closest Tuesday before/at picked date
            const start = new Date(picked);
            start.setDate(picked.getDate() - ((day + 5) % 7)); // 2 = Tue

            // End = next week's Wednesday
            const end = new Date(start);
            end.setDate(start.getDate() + 7); // Full Tues–Wed span
        
            const formattedStart = start.toLocaleDateString("en-GB");
            const formattedEnd = end.toLocaleDateString("en-GB");
        
            document.getElementById("campaignPeriod").value = `${formattedStart} - ${formattedEnd}`;
          }
        });

    </script>

</body>
</html>