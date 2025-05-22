<?php
$fullPath = $_SERVER['PHP_SELF'];
$parts = explode('/', trim($fullPath, '/'));

$flow = $parts[count($parts) - 2] ?? '';
$currentPage = $parts[count($parts) - 1] ?? '';

$pages = [
<<<<<<< Updated upstream
  'flow1' => ['screen1.php', 'screen2.php', 'screen3.php', 'screen4.php', 'screen5.php'],
  'flow2' => ['screen1.php', 'screen2.php', 'screen3.php', 'screen4.php']
=======
  'flow1' => ['screen1.php', 'screen2.php', 'screen3.php', 'screen4.php', 'screen5.php', 'screen6.php', 'screen7.php'],
  'flow2' => ['screen1.php', 'screen2.php', 'screen3.php', 'screen4.php', 'screen5.php', 'screen6.php', 'screen7.php'],
>>>>>>> Stashed changes
];

$currentIndex = array_search($currentPage, $pages[$flow] ?? []);
$prevPage = $pages[$flow][$currentIndex - 1] ?? null;
$nextPage = $pages[$flow][$currentIndex + 1] ?? null;
?>

<link rel="stylesheet" href="<?= STYLES_URL ?>buttons.css">

<div class="button-group">
  <?php if ($nextPage): ?>
    <a class="next-btn disabled" id="nextBtn" href="<?= BASE_URL . $flow . '/' . $nextPage ?>" style="pointer-events: none; opacity: 0.5;">Next question</a>
  
  <?php elseif ($currentIndex === count($pages[$flow]) - 1): ?>
    <!-- Last screen: Confirm Campaign instead of next -->
    <button id="confirmBtn" class="next-btn" disabled>Request quote</button>
  <?php endif; ?>

  <?php if ($prevPage || $currentIndex === 0): ?>
    <a class="back-link" href="<?= $currentIndex === 0 
      ? BASE_URL . 'index.php' 
      : BASE_URL . $flow . '/' . $prevPage 
      ?>">Go back</a>
  <?php endif; ?>
</div>
