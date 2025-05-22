<?php require_once __DIR__ . '/../config.php'; ?>

<?php

require_once __DIR__ . '/../components/db.php';

$conn = Database::connect(); // <-- dit is cruciaal!

// TargetAudience ophalen
$audienceQuery = "SELECT AudienceID, AgeGroup, Gender FROM TargetAudience";
$audienceResult = mysqli_query($conn, $audienceQuery);

// Missions ophalen
$missionQuery = "SELECT MissionID, MissionName FROM Missions";
$missionResult = mysqli_query($conn, $missionQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on budget 2</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
</head>
<body>
    <?php require_once COMPONENTS_PATH . 'header.php'; ?>
    <?php require_once COMPONENTS_PATH . 'progress.php'; ?>
    <div class="container">
        <div class="innerContainer">
            <h1>Choose your preferred target audience and mission</h1>

            <div class="audience">
                <p><strong>Target audience</strong></p>
                <?php while ($audience = mysqli_fetch_assoc($audienceResult)): ?>
                    <label>
                        <input type="checkbox" value="<?= htmlspecialchars($audience['AgeGroup']) ?>">
                        <?= htmlspecialchars($audience['AgeGroup']) ?>
                    </label>
                <?php endwhile; ?>
            </div>

            <div class="mission-wrapper">
                <p><strong>Target mission</strong></p>
                <div class="grid-wrapper">
                    <div class="grid">
                        <?php while ($row = mysqli_fetch_assoc($missionResult)): ?>
                            <button class="mission">
                                <img src="<?= IMAGES_URL . $row['MissionName'] ?>.svg" alt="">
                                <span><?= htmlspecialchars($row['MissionName']) ?></span>
                            </button>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>

        </div>
    </div>
    <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
    <?php require_once COMPONENTS_PATH . 'footer.php'; ?>     

    <script>
        

        const missionButtons = document.querySelectorAll("button.mission");
        const checkboxes = document.querySelectorAll(".audience input[type='checkbox']");
        const nextBtn = document.getElementById("nextBtn");

        missionButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                btn.classList.toggle("selected");
                validateSelections();
            });
        });

        checkboxes.forEach(cb => {
            cb.addEventListener("change", () => {
                validateSelections();
            });
        });

        function validateSelections() {
            const missionSelected = document.querySelectorAll("button.mission.selected").length > 0;
            const audienceSelected = Array.from(checkboxes).some(cb => cb.checked);

            if (missionSelected && audienceSelected) {
                nextBtn.style.pointerEvents = 'auto';
                nextBtn.style.opacity = '1';
                nextBtn.classList.remove('disabled');
            } else {
                nextBtn.style.pointerEvents = 'none';
                nextBtn.style.opacity = '0.5';
                nextBtn.classList.add('disabled');
            }
        }

        // Optioneel: disable bij paginalaad (voor de zekerheid)
        window.addEventListener("load", validateSelections);
    </script>
</body>
</html>