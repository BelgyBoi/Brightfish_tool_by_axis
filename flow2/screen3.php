<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on budget 3</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
</head>
<body>
    <?php require_once COMPONENTS_PATH . 'header.php'; ?>
    <?php require_once COMPONENTS_PATH . 'progress.php'; ?>
    <div class="container">
        <div class="innerContainer">
            <h1>Select your movie(s) for the campaign</h1>

            <div class="search-container">
                <input type="text" placeholder="Search for a movie" id="searchInput">
                <button class="search-icon">🔍</button> 
            </div>

            <div class="grid" id="movieGrid">
                <?php
                $movies = [
                    ["img" => "movies/Destination.svg", "title" => "Destination<br>Finale Bloodlines", "description" => "A thrilling horror sequel where death itself is the enemy.", "genre" => "Horror", "release" => "2025-05-14", "duration" => "110 minutes"],
                    ["img" => "movies/Until Dawn.svg", "title" => "Until Dawn", "description" => "A group trapped in a cabin must survive until sunrise.", "genre" => "Horror", "release" => "2025-06-01", "duration" => "98 minutes"],
                    ["img" => "movies/Lads.svg", "title" => "Lads", "description" => "Coming-of-age story about three friends navigating adult life.", "genre" => "Drama", "release" => "2025-05-20", "duration" => "102 minutes"],
                    ["img" => "movies/Sinner.svg", "title" => "Sinners", "description" => "A detective unravels secrets in a deeply religious town.", "genre" => "Mystery", "release" => "2025-06-08", "duration" => "108 minutes"],
                    ["img" => "movies/Patser.svg", "title" => "Patser", "description" => "A gangster comedy set in the streets of Antwerp.", "genre" => "Action", "release" => "2025-05-18", "duration" => "115 minutes"],
                    ["img" => "movies/Dog man.svg", "title" => "Dog man", "description" => "Doug, abused and isolated, finds love and justice through his bond with dogs.", "genre" => "Drama", "release" => "2025-05-14", "duration" => "110 minutes"],
                    ["img" => "movies/Minecraft.svg", "title" => "Minecraft", "description" => "An epic adventure in the pixelated world of Minecraft.", "genre" => "Adventure", "release" => "2025-07-01", "duration" => "105 minutes"],
                    ["img" => "movies/A working man.svg", "title" => "A working man", "description" => "A heartfelt story of a man trying to rebuild after layoffs.", "genre" => "Drama", "release" => "2025-06-10", "duration" => "112 minutes"],
                    ["img" => "movies/Anges & Cie.svg", "title" => "Anges & Cie", "description" => "Whimsical French comedy about guardian angels on Earth.", "genre" => "Comedy", "release" => "2025-05-30", "duration" => "95 minutes"],
                    ["img" => "movies/Thunderbolt.svg", "title" => "Thunderbolt", "description" => "A superhero must face his past to save the future.", "genre" => "Superhero", "release" => "2025-06-20", "duration" => "120 minutes"],
                    ["img" => "movies/Hit Pig.svg", "title" => "Hit Pig", "description" => "An unlikely friendship forms between a pig and a bounty hunter.", "genre" => "Animation", "release" => "2025-05-25", "duration" => "94 minutes"],
                    ["img" => "movies/The amateur.svg", "title" => "The Amateur", "description" => "An ex-hacker is pulled back into the underground.", "genre" => "Thriller", "release" => "2025-06-18", "duration" => "101 minutes"]
                ];

                foreach ($movies as $movie) {
                    $cleanTitle = strtolower(strip_tags($movie['title']));
                    echo '
                    <div class="movie-card" 
                        data-title="' . $cleanTitle . '"
                        data-description="' . htmlspecialchars($movie['description']) . '"
                        data-genre="' . $movie['genre'] . '"
                        data-release="' . $movie['release'] . '"
                        data-duration="' . $movie['duration'] . '">
                        <div class="poster-wrapper">
                            <img src="../images/' . $movie['img'] . '" alt="' . strip_tags($movie['title']) . '">
                        </div>
                        <div class="title-info">
                            <p>' . $movie['title'] . '</p>
                            <span class="info" data-title="' . strip_tags($movie['title']) . '">ℹ️</span>
                        </div>
                    </div>';
                }

                ?>
            </div>

            <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>

        </div>
    </div>
    <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
    <?php require_once COMPONENTS_PATH . 'footer.php'; ?>

    <div id="movieModal" class="movie-modal hidden">
        <div class="modal-content">
            <span class="close" id="closeModal">×</span>
            <div class="modal-body">
            <img id="modalImage" src="" alt="Movie Poster">
            <div class="modal-text">
                <h2 id="modalTitle">Title</h2>
                <p id="modalDescription">Movie description</p>
                <p><strong>Genre:</strong> <span id="modalGenre"></span></p>
                <p><strong>Release date:</strong> <span id="modalRelease"></span></p>
                <p><strong>Duration:</strong> <span id="modalDuration"></span></p>
            </div>
            </div>
        </div>
    </div>

    <script>
    const searchInput = document.getElementById("searchInput");
    const movieCards = document.querySelectorAll(".movie-card");
    const modal = document.getElementById("movieModal");
    const closeModal = document.getElementById("closeModal");
    const modalImage = document.getElementById("modalImage");
    const modalTitle = document.getElementById("modalTitle");
    const modalDescription = document.getElementById("modalDescription");
    const modalGenre = document.getElementById("modalGenre");
    const modalRelease = document.getElementById("modalRelease");
    const modalDuration = document.getElementById("modalDuration");

    // Zoekfunctie
    searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase();
        movieCards.forEach(card => {
            const title = card.getAttribute("data-title");
            card.style.display = title.includes(query) ? "block" : "none";
        });
    });

    // Voor elke movie-card:
    movieCards.forEach(card => {
        // Klik op poster = selecteer
        card.addEventListener("click", () => {
            const poster = card.querySelector(".poster-wrapper");
            if (poster) {
                poster.classList.toggle("selected");
                validateSelection(); // ✅ Update knopstatus na elke klik
            }
        });

        // Info-icoon toont modal
        const infoBtn = card.querySelector(".info");
        if (infoBtn) {
            infoBtn.addEventListener("click", (e) => {
                e.stopPropagation(); // voorkom dat de kaart wordt geselecteerd
                const img = card.querySelector("img").src;
                modalImage.src = img;
                modalTitle.textContent = infoBtn.dataset.title;
                modalDescription.textContent = card.dataset.description;
                modalGenre.textContent = card.dataset.genre;
                modalRelease.textContent = card.dataset.release;
                modalDuration.textContent = card.dataset.duration;
                modal.classList.remove("hidden");
            });
        }
    });

    // Modal sluiten
    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // ✅ Functie om knopstatus bij te werken
    function validateSelection() {
        const selected = document.querySelectorAll(".poster-wrapper.selected");
        const nextBtn = document.getElementById("nextBtn");
        if (nextBtn) {
            if (selected.length > 0) {
                nextBtn.classList.remove("disabled");
                nextBtn.style.pointerEvents = "auto";
                nextBtn.style.opacity = "1";
            } else {
                nextBtn.classList.add("disabled");
                nextBtn.style.pointerEvents = "none";
                nextBtn.style.opacity = "0.5";
            }
        }
    }
</script>

</body>
</html>