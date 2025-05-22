<link rel="stylesheet" href="<?= STYLES_URL ?>brands.css">
<div class="brands-section">
  <h2>Top brands choose cinema advertising</h2>
  <p>Join the brands that trust Brightfish to reach new audiences</p>

  <div class="brands-carousel">
    <div class="arrow left-arrow">&#10094;</div>

    <div class="carousel-track">
      <div class="brand-card">
        <img src="<?= IMAGES_URL ?>logo1.png" alt="LOREAL">
        <span>75%</span>
        <small>customer attention</small>
      </div>
      <div class="brand-card">
        <img src="<?= IMAGES_URL ?>logo2.png" alt="Samsung">
        <span>+80%</span>
        <small>higher brand awareness</small>
      </div>
      <div class="brand-card">
        <img src="<?= IMAGES_URL ?>logo3.png" alt="Telenet" style="width: 200%;">
        <span>60%</span>
        <small>uplift en new customers</small>
      </div>
      <div class="brand-card">
        <img src="<?= IMAGES_URL ?>logo4.png" alt="KBC">
        <span>65%</span>
        <small>More brand recognition</small>
      </div>
      <div class="brand-card">
        <img src="<?= IMAGES_URL ?>logo5.png" alt="Proximus">
        <span>70%</span>
        <small>greater engagement</small>
      </div>
    </div>

    <div class="arrow right-arrow">&#10095;</div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector(".carousel-track");
    const leftArrow = document.querySelector(".left-arrow");
    const rightArrow = document.querySelector(".right-arrow");

    leftArrow.addEventListener("click", () => {
      const cards = track.querySelectorAll(".brand-card");
      const lastCard = cards[cards.length - 1];
      track.insertBefore(lastCard, cards[0]);
    });

    rightArrow.addEventListener("click", () => {
      const firstCard = track.querySelector(".brand-card");
      track.appendChild(firstCard);
    });
  });
</script>