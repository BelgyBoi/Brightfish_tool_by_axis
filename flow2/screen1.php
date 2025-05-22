<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on budget 1</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
</head>
<body>
    <?php require_once COMPONENTS_PATH . 'header.php'; ?>
    <?php require_once COMPONENTS_PATH . 'progress.php'; ?>
    <div class="container flow2">
        <div class="innerContainer">
            <div class="budget-section">
                <div class="budget-card">
                    <h2>Choose the budget for your campaign</h2>
                    <div class="slider-wrapper">
                        <label for="budget">Campaign budget</label>
                        <div class="slider-container" id="slider-container1">
                            <input type="range" id="budget" min="0" max="100000" value="0" step="50" />
                            <div class="value-box" id="budget-value">€0</div>
                        </div>
                    </div>
                    <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>

                </div>
            </div>
        </div>
    </div>
    <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
    <?php require_once COMPONENTS_PATH . 'footer.php'; ?>     

    <script>
        const slider = document.getElementById('budget');
        const valueBox = document.getElementById('budget-value');
        const nextBtn = document.getElementById('nextBtn');

        function updateSliderFill() {
            const thumbWidth = 30;
            const percent = (slider.value - slider.min) / (slider.max - slider.min);
            const offset = percent * (slider.offsetWidth - thumbWidth) + thumbWidth / 2;

            valueBox.style.left = `${offset}px`;
            valueBox.textContent = `€${slider.value}`;
            slider.style.setProperty('--fill-percent', `${percent * 100}%`);

            if (parseInt(slider.value) > 0) {
                nextBtn.style.pointerEvents = 'auto';
                nextBtn.style.opacity = '1';
                nextBtn.classList.remove('disabled');
            } else {
                nextBtn.style.pointerEvents = 'none';
                nextBtn.style.opacity = '0.5';
                nextBtn.classList.add('disabled');
            }
        }

        slider.addEventListener('input', updateSliderFill);
        window.addEventListener('load', updateSliderFill);
        window.addEventListener('resize', updateSliderFill);
    </script>
</body>
</html>