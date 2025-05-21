<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on budget 1</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
</head>
<body>
    <?php include '../components/header.php';?>
    <?php include '../components/progress.php';?>
    <div class="container">
        <div class="innerContainer">
            <div class="budget-section">
                <div class="budget-card">
                    <h2>Choose the budget for your campaign</h2>
                    <div class="slider-wrapper">
                        <label for="budget">Campaign budget</label>
                        <div class="slider-container">
                            <input type="range" id="budget" min="250" max="100000" value="250" step="50" />
                            <div class="value-box" id="budget-value">€250</div>
                        </div>
                    </div>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . "/components/buttons.php"); ?>

                </div>
            </div>
        </div>
    </div>
    <?php include '../components/brands.php';?>
    <?php include '../components/footer.php';?>

    <script>
        const slider = document.getElementById('budget');
        const valueBox = document.getElementById('budget-value');

        function updateValueBoxPosition() {
            const sliderRect = slider.getBoundingClientRect();
            const thumbWidth = 30; // width of the thumb in px
            const percent = (slider.value - slider.min) / (slider.max - slider.min);
            const offset = percent * (slider.offsetWidth - thumbWidth) + thumbWidth / 2;
            valueBox.style.left = `${offset}px`;
            valueBox.textContent = `€${slider.value}`;
        }

        slider.addEventListener('input', updateValueBoxPosition);
        window.addEventListener('load', updateValueBoxPosition);
        window.addEventListener('resize', updateValueBoxPosition);
    </script>
</body>
</html>