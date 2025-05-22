<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/brightfish_logo_small.png">
  <title>Brightfish - Kies je Flow</title>
</head>
<body>
  <header>
    <?php require_once COMPONENTS_PATH . 'header.php'; ?>
  </header>
  <div class="flow-container">
  <h1>Choose how to create your cinema campaign</h1>
  <p>Pick the flow that suits your needs best - by setting criteria or starting<br>from your budget</p>

    <div class="flow-options">
        <div class="flow-box">
            <h3>Based on campaign</h3>
            <p>Plan your cinema ad by selecting your ideal audience, movie genres, time slots, and more. Perfect if you already know who you want to reach and how.</p>
            <a href="flow1/screen1.php">Plan by campaign</a>
        </div>
        <div class="flow-box">
            <h3>Based on your budget</h3>
            <p>Start with your available budget and we’ll show you what’s possible — including locations, timing, and estimated reach tailored to your investment.</p>
            <a href="flow2/screen1.php">Plan by budget</a>
        </div>
        </div>
    </div>
    <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
    <?php require_once COMPONENTS_PATH . 'footer.php'; ?>     
</body>
</html>