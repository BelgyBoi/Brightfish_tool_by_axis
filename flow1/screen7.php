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
  <title>Brightfish - Based on campaign 7</title>
  <link rel="stylesheet" href="<?= STYLES_URL ?>flow1_screen7.css">
  <link rel="icon" type="image/png" href="<?= IMAGES_URL ?>brightfish_logo_small.png" />
</head>
<body>
  <?php require_once COMPONENTS_PATH . 'header.php'; ?>
  <?php require_once COMPONENTS_PATH . 'progress.php'; ?>

  <div class="container screen7">
    <div class="innerContainer">
      <h1>Campaign Summary</h1>
      <p class="subtitle">Please review your campaign details and confirm.</p>

      <div class="details-wrapper">
        <div class="form">
          <input type="text" id="fullName" placeholder="Your full name" />
          <input type="email" id="emailAddress" placeholder="Email address" />
          <textarea placeholder="Additional comments or requirements" rows="4"></textarea>
        </div>

        <div class="summary">
          <h3>Campaign Details</h3>
          <p><strong>Target Audience:</strong> 15–24, 25–34</p>
          <p><strong>Mission Focus:</strong> Gamers, No minors</p>
          <p><strong>Duration:</strong> 3 weeks</p>
          <p><strong>Location:</strong> Antwerp, Leuven</p>
          <p><strong>Selected Movie(s):</strong> Lads, Sinners</p>
        </div>

      </div>

      <div class="budget-slider-wrapper" id="screen7form"
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




      <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>
    </div>
  </div>

  <div id="successOverlay" class="success-overlay hidden">
    <div class="success-content">
      <img src="<?= IMAGES_URL ?>success.svg" alt="Success" class="success-icon" />
      <h2>Submission Received!</h2>
      <p>Thank you for creating your campaign with Brightfish.</p>
      <p>Our team will review your submission and contact you shortly.</p>
      <p class="confirmation-note">
        <img src="<?= IMAGES_URL ?>email.svg" alt="Email icon" class="email-icon" />
        You’ll receive an email confirmation with the detail.
      </p>
      <a class="return-btn" href="<?= BASE_URL ?>index.php">Return to homepage</a>
    </div>
  </div>



  <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
  <?php require_once COMPONENTS_PATH . 'footer.php'; ?>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const confirmBtn = document.querySelector('#confirmBtn');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('emailAddress');
    const successOverlay = document.getElementById('successOverlay');

    // Form validation function
    function validateFormFields() {
      const nameFilled = fullNameInput.value.trim() !== '';
      const emailFilled = emailInput.value.trim() !== '';
      const isValid = nameFilled && emailFilled;

      confirmBtn.disabled = !isValid;
      confirmBtn.style.opacity = isValid ? '1' : '0.5';
      confirmBtn.style.pointerEvents = isValid ? 'auto' : 'none';
    }

    // Add input event listeners for validation
    fullNameInput.addEventListener('input', validateFormFields);
    emailInput.addEventListener('input', validateFormFields);

    // Initial validation on page load
    validateFormFields();

    // Show success overlay on confirm button click
    confirmBtn.addEventListener('click', () => {
      successOverlay.classList.remove('hidden');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Budget slider logic
    const wrapper = document.querySelector('.budget-slider-wrapper');
    if (wrapper) {
      const fill = wrapper.querySelector('.range-fill');
      const leftThumb = wrapper.querySelector('.left-thumb');
      const rightThumb = wrapper.querySelector('.right-thumb');
      const leftValueBox = wrapper.querySelector('.left-value');
      const rightValueBox = wrapper.querySelector('.right-value');

      // Get values from data attributes
      const rangeMin = parseFloat(wrapper.dataset.min);
      const rangeMax = parseFloat(wrapper.dataset.max);
      const valueLeft = parseFloat(wrapper.dataset.left);
      const valueRight = parseFloat(wrapper.dataset.right);

      const track = wrapper.querySelector('.range-track');

      function update() {
        const trackWidth = track.offsetWidth;

        // Calculate % positions
        const leftPercent = (valueLeft - rangeMin) / (rangeMax - rangeMin);
        const rightPercent = (valueRight - rangeMin) / (rangeMax - rangeMin);

        const leftPos = leftPercent * trackWidth;
        const rightPos = rightPercent * trackWidth;

        // Set fill bar position and width
        fill.style.left = `${leftPos}px`;
        fill.style.width = `${rightPos - leftPos}px`;

        // Set thumbs positions
        leftThumb.style.left = `${leftPos}px`;
        rightThumb.style.left = `${rightPos}px`;

        // Set value boxes positions
        leftValueBox.style.left = `${leftPos}px`;
        rightValueBox.style.left = `${rightPos}px`;
      }

      // Initial update and update on resize
      update();
      window.addEventListener('resize', update);
    }
  });
</script>



</body>
</html>
