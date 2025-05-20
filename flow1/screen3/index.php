<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on campaign 1</title>
    <link rel="stylesheet" href="../../stylesheets/header.css">
    <link rel="stylesheet" href="../../stylesheets/progress3.css">
    <link rel="stylesheet" href="../../stylesheets/brands2.css">
    <link rel="stylesheet" href="../../stylesheets/footer2.css">
    <link rel="stylesheet" href="../../stylesheets/flow1_screen3.css">
    <link rel="icon" type="image/png" href="../../images/brightfish_logo_small.png">
</head>
<body>
    <?php include '../../components/header.php';?>
    <?php include '../../components/progress.php';?>
    <div class="container">
        <div class="innerContainer">
            <div class="map-section">
                <h2>Where do you want your ad to run?</h2>
                <div class="search-wrapper">
                    <input type="text" id="location-search" placeholder="Search for a location..." />
                    <button id="clear-search" class="clear-btn" style="display: none;">&times;</button>
                </div>
                <ul id="suggestions" class="suggestions-list"></ul>
                <div class="map-container">
                    <div id="map"></div>
                    <div id="selected-theaters" class="selected-theaters"></div>
                </div>
                <div class="button-group">
                    <a class="next-btn" href="../screen4/index.php">Next question</a>
                    <a href="../screen2/index.php" class="back-link">Go back</a>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../components/brands.php';?>
    <?php include '../../components/footer.php';?>

    
</body>
</html>