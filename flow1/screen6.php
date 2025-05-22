<?php require_once __DIR__ . '/../config.php'; ?>
<?php

$min = 250;
$max = 10000;

$minBudget = 5200;
$maxBudget = 6800;

$minPercent = (($minBudget - $min) / ($max - $min)) * 100;
$maxPercent = (($maxBudget - $min) / ($max - $min)) * 100;
$rangeWidth = $maxPercent - $minPercent;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brightfish - Based on campaign 6</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png" />
</head>
<body>
    <?php require_once COMPONENTS_PATH . 'header.php'; ?>
    <?php require_once COMPONENTS_PATH . 'progress.php'; ?>

    <div class="container">
        <div class="innerContainer">
            <h1>Budget Proposal for Your Campaign</h1>
            <div class="form-group" id="screen6form">
                <label for="budgetRange">Campaign budget</label>
                    <div class="budget-slider-wrapper"
                        data-min="250"
                        data-max="10000"
                        data-left="<?= $minBudget ?>"
                        data-right="<?= $maxBudget ?>">
                        <div class="range-track">
                        <div class="range-fill"></div>
                        <div class="range-thumb left-thumb"></div>
                        <div class="range-thumb right-thumb"></div>
                    </div>
                      <div class="value-box left-value">€<?= number_format($minBudget, 0, ',', '.') ?></div>
                      <div class="value-box right-value">€<?= number_format($maxBudget, 0, ',', '.') ?></div>
                    </div>
            </div>

            <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>
        </div>
    </div>

    <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
    <?php require_once COMPONENTS_PATH . 'footer.php'; ?>     

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const wrapper = document.querySelector('.budget-slider-wrapper');
            const fill = wrapper.querySelector('.range-fill');
            const leftThumb = wrapper.querySelector('.left-thumb');
            const rightThumb = wrapper.querySelector('.right-thumb');
            const leftValueBox = wrapper.querySelector('.left-value');
            const rightValueBox = wrapper.querySelector('.right-value');

            // Get the values from data attributes
            const rangeMin = parseFloat(wrapper.dataset.min);
            const rangeMax = parseFloat(wrapper.dataset.max);
            const valueLeft = parseFloat(wrapper.dataset.left);
            const valueRight = parseFloat(wrapper.dataset.right);

            const track = wrapper.querySelector('.range-track');

            function update() {
              const trackWidth = track.offsetWidth;
            
              // % positions
              const leftPercent = (valueLeft - rangeMin) / (rangeMax - rangeMin);
              const rightPercent = (valueRight - rangeMin) / (rangeMax - rangeMin);
            
              const leftPos = leftPercent * trackWidth;
              const rightPos = rightPercent * trackWidth;
            
              // Set red bar
              fill.style.left = `${leftPos}px`;
              fill.style.width = `${rightPos - leftPos}px`;
            
              // Set thumb positions
              leftThumb.style.left = `${leftPos}px`;
              rightThumb.style.left = `${rightPos}px`;
            
              // Set label positions
              leftValueBox.style.left = `${leftPos}px`;
              rightValueBox.style.left = `${rightPos}px`;
            }
        
            update();
            window.addEventListener('resize', update);
        });

        const nextBtn = document.getElementById('nextBtn');
        if(nextBtn) {
            nextBtn.style.pointerEvents = 'auto';
            nextBtn.style.opacity = '1';
            nextBtn.classList.remove('disabled');
        }
    </script>
</body>
</html>
