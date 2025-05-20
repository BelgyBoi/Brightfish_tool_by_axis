<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on campaign 1</title>
    <link rel="stylesheet" href="../../stylesheets/header.css">
    <link rel="stylesheet" href="../../stylesheets/progress5.css">
    <link rel="stylesheet" href="../../stylesheets/brands2.css">
    <link rel="stylesheet" href="../../stylesheets/footer3.css">
    <link rel="stylesheet" href="../../stylesheets/flow1_screen5.css">
    <link rel="icon" type="image/png" href="../../images/brightfish_logo_small.png">
</head>
<body>
    <?php include '../../components/header.php';?>
    <?php include '../../components/progress.php';?>
    <div class="container">
        <div class="innerContainer">
            <div class="titleDiv">
                <h1>Advanced options</h1>
                <p class="subtitle">These fields are optional</p>
            </div>

            <div class="group">
                <div class="form-group">
                    <label for="adSlot">
                        <strong>Select Ad slot</strong>
                        <span class="info-icon" id="openInfoModal" title="How ad slots work">ℹ️</span>
                    </label>
                    <select id="adSlot" name="adSlot">
                        <option value="">Select target mission</option>
                        <option value="standard">Standard Ad slot</option>
                        <option value="silver">Silver</option>
                        <option value="gold">Gold</option>
                        <option value="titanium">Titanium</option>
                    </select>
                </div>

                <div class="form-group checkbox">
                    <input type="checkbox" id="noCompetitors" name="noCompetitors">
                    <label for="noCompetitors">No competitors in the same slot</label>
                </div>

                <div class="form-group" id="businessField" style="display: none;">
                    <label for="business"><strong>Type your business</strong></label>
                    <input type="text" id="business" name="business" placeholder="Type your business">
                </div>
            </div>

            <div class="button-group">
                <a class="next-btn" href="../screen6/index.php">Next question</a>
                <a href="../screen4/index.php" class="back-link">Go back</a>
            </div>
        </div>
    </div>

    <div id="infoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="../../images/info.svg" alt="Info popup" class="modal-image">
        </div>
    </div>

    <?php include '../../components/brands.php';?>
    <?php include '../../components/footer.php';?>

    <script>
        const checkbox = document.getElementById('noCompetitors');
        const businessField = document.getElementById('businessField');
        checkbox.addEventListener('change', () => {
            businessField.style.display = checkbox.checked ? 'block' : 'none';
        });

        const modal = document.getElementById('infoModal');
        const openBtn = document.getElementById('openInfoModal');
        const closeBtn = modal.querySelector('.close');

        openBtn.addEventListener('click', () => modal.style.display = 'block');
        closeBtn.addEventListener('click', () => modal.style.display = 'none');
        window.addEventListener('click', (e) => {
            if (e.target === modal) modal.style.display = 'none';
        });
    </script>

</body>
</html>