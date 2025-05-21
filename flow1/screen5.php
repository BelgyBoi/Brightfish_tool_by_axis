<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on campaign 1</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
</head>
<body>
    <?php include '../components/header.php';?>
    <?php include '../components/progress.php';?>
    <div class="container screen5">
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
                <div class="custom-select-wrapper">
                  <select id="adSlot" name="adSlot">
                    <option value="">Select target mission</option>
                    <option value="standard">Standard Ad slot</option>
                    <option value="silver">Silver</option>
                    <option value="gold">Gold</option>
                    <option value="titanium">Titanium</option>
                  </select>
                  <!-- Styled dropdown icon (custom but stock-looking) -->
                  <svg class="dropdown-icon" viewBox="0 0 10 6" width="14" height="6">
                    <path d="M0 0 L5 6 L10 0" fill="#333" />
                  </svg>
                </div>
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


            <?php include($_SERVER['DOCUMENT_ROOT'] . "/components/buttons.php"); ?>

        </div>
    </div>

    <div id="infoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="../../images/info.svg" alt="Info popup" class="modal-image">
        </div>
    </div>

    <?php include '../components/brands.php';?>
    <?php include '../components/footer.php';?>

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

        const select = document.getElementById('adSlot');
            const icon = document.querySelector('.dropdown-icon');

            // Track if the dropdown is currently open
            let isOpen = false;

            const rotateIcon = (open) => {
              icon.style.transform = open
                ? 'translateY(-50%) rotate(180deg)'
                : 'translateY(-50%) rotate(0deg)';
            };

            // Toggle when user clicks to open or close (some browsers only open on focus)
            select.addEventListener('mousedown', () => {
              isOpen = !isOpen;
              rotateIcon(isOpen);
            });

            // Always reset arrow when the dropdown loses focus (clicks away)
            select.addEventListener('blur', () => {
              isOpen = false;
              rotateIcon(false);
            });

            // Always reset arrow when an item is selected
            select.addEventListener('change', () => {
              isOpen = false;
              rotateIcon(false);
            });

    
        


    </script>

</body>
</html>