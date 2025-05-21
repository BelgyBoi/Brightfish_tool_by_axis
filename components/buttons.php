<?php
// Get the current file path and break it into parts
$fullPath = $_SERVER['PHP_SELF'];
$parts = explode('/', trim($fullPath, '/'));

// flow1/screen2.php → 'flow1' and 'screen2.php'
$flow = $parts[0] ?? '';
$currentPage = $parts[1] ?? '';

// Define screen order for each flow
$pages = [
  'flow1' => ['screen1.php', 'screen2.php', 'screen3.php', 'screen4.php', 'screen5.php'],
  'flow2' => ['screen1.php', 'screen2.php', 'screen3.php', 'screen4.php']
];

// Determine index and previous/next pages
$currentIndex = array_search($currentPage, $pages[$flow] ?? []);
$prevPage = $pages[$flow][$currentIndex - 1] ?? null;
$nextPage = $pages[$flow][$currentIndex + 1] ?? null;
?>
<link rel="stylesheet" href="/stylesheets/buttons.css">
<div class="button-group">
  <?php if ($nextPage): ?>
    <a class="next-btn" href="/<?php echo $flow . '/' . $nextPage; ?>">Next question</a>
  <?php endif; ?>

<?php if ($prevPage || $currentIndex === 0): ?>
  <a href="<?php 
    echo $currentIndex === 0 
      ? '/index.php' 
      : '/' . $flow . '/' . $prevPage; 
  ?>" class="back-link">
    Go back
  </a>
<?php endif; ?>

</div>
