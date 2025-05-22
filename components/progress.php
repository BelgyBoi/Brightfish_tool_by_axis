<?php
  $dir = __DIR__ . '/../flow1'; // Or flow2 if that's where you're at
  $files = glob($dir . '/screen*.php');
  $totalScreens = count($files);

  // Get the current screen from the URL (e.g., screen3.php)
  $currentScreen = 1;
  if (isset($_SERVER['REQUEST_URI'])) {
      preg_match('/screen(\\d+)/', $_SERVER['REQUEST_URI'], $matches);
      $currentScreen = isset($matches[1]) ? intval($matches[1]) : 1;
  }
?>
<link rel="stylesheet" href="<?= STYLES_URL ?>progress.css">
<div class="progressBar" data-current="<?= $currentScreen ?>" data-total="<?= $totalScreens ?>">
  <div class="progress"></div>
</div>
<script>
  const progressBar = document.querySelector('.progressBar');
  if (progressBar) {
    const current = parseInt(progressBar.dataset.current || 1);
    const total = parseInt(progressBar.dataset.total || 1);
    const percent = Math.min((current / total) * 100, 100);
    progressBar.querySelector('.progress').style.width = percent + '%';
  }
</script>

</script>
