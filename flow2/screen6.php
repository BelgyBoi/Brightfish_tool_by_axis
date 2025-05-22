<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Brightfish - Based on budget 6</title>
  <link rel="stylesheet" href="<?= STYLES_URL ?>screens.css" />
  <link rel="stylesheet" href="<?= STYLES_URL ?>flow2_screen6.css" />
  <link rel="icon" type="image/png" href="<?= BASE_URL ?>images/brightfish_logo_small.png" />
</head>
<body>

  <?php require_once COMPONENTS_PATH . 'header.php'; ?>
  <?php require_once COMPONENTS_PATH . 'progress.php'; ?>

    <main class="results-suggestions-wrapper">
        <section class="results-suggestions">
            <h1 class="title">Results & suggestions</h1>
            <p class="subtitle">Here are the results from your selected criteria<br>and some suggestions</p>

            <div class="card-row">
                <div class="campaign-card">
                    <img src="../images/movies/captainAmerica.avif" alt="Captain America">
                    <div class="card-content">
                        <h2>Captain America: Brave New World</h2>
                        <p>24/06/2025–26/06/2025</p>
                        <p>Price range: €500–€750</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
                <div class="campaign-card">
                    <img src="../images/movies/finalDestination.jpg" alt="Captain America">
                    <div class="card-content">
                        <h2>Destination Finale: Bloodlines</h2>
                        <p>04/06/2025–10/06/2025</p>
                        <p>Price range: €500–€750</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
                <div class="campaign-card">
                    <img src="../images/movies/lads.webp" alt="Captain America">
                    <div class="card-content">
                        <h2>Lads</h2>
                        <p>04/06/2025–10/06/2025</p>
                        <p>Price range: €500–€650</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
                <div class="campaign-card">
                    <img src="../images/movies/Sinner.svg" alt="Captain America">
                    <div class="card-content">
                        <h2>Sinners</h2>
                        <p>04/06/2025–10/06/2025</p>
                        <p>Price range: €600–€700</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
            </div>

            <h2 class="suggestions-title">Suggestions</h2>
            <p class="subtitle">Here are some suggestions based on your<br>criteria</p>

            <div class="card-row">
                <div class="campaign-card">
                    <img src="../images/movies/Patser.svg" alt="Captain America">
                    <div class="card-content">
                        <h2>Patser</h2>
                        <p>27/06/2025–30/06/2025</p>
                        <p>Price range: €620–€710</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
                <div class="campaign-card">
                    <img src="../images/movies/Dog man.svg" alt="Captain America">
                    <div class="card-content">
                        <h2>Dog Man</h2>
                        <p>29/06/2025–30/06/2025</p>
                        <p>Price range: €620–€630</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
                <div class="campaign-card">
                    <img src="../images/movies/Minecraft.svg" alt="Captain America">
                    <div class="card-content">
                        <h2>The Minecraft Movie</h2>
                        <p>04/06/2025–10/06/2025</p>
                        <p>Price range: €500–€630</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
                <div class="campaign-card">
                    <img src="../images/movies/Thunderbolt.svg" alt="Captain America">
                    <div class="card-content">
                        <h2>Thunderbolts</h2>
                        <p>04/06/2025–10/06/2025</p>
                        <p>Price range: €650–€730</p>
                        <button class="select-button">Select campaign</button>
                    </div>
                </div>
            </div>

            <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>

        </section>
    </main>

  <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
  <?php require_once COMPONENTS_PATH . 'footer.php'; ?>
  <?php require_once CHATBOT_PATH; ?>

  <script>
        const selectButtons = document.querySelectorAll('.select-button');
        const nextBtn = document.getElementById('nextBtn');

        function updateNextButtonState() {
            const anySelected = [...selectButtons].some(btn => btn.classList.contains('selected'));
            if (anySelected) {
                nextBtn.classList.remove('disabled');
                nextBtn.style.pointerEvents = 'auto';
                nextBtn.style.opacity = '1';
            } else {
                nextBtn.classList.add('disabled');
                nextBtn.style.pointerEvents = 'none';
                nextBtn.style.opacity = '0.5';
            }
        }

        selectButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Toggle 'selected' status
                button.classList.toggle('selected');
                button.textContent = button.classList.contains('selected') ? 'Selected' : 'Select campaign';

                updateNextButtonState();
            });
        });

        // Check state on load
        window.addEventListener('DOMContentLoaded', updateNextButtonState);
    </script>

</body>
</html>
