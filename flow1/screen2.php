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
                    ["img" => "movies/Destination.svg", "title" => "Destination<br>Finale Bloodlines"],
                    ["img" => "movies/Until Dawn.svg", "title" => "Until Dawn"],
                    ["img" => "movies/Lads.svg", "title" => "Lads"],
                    ["img" => "movies/Sinner.svg", "title" => "Sinners"],
                    ["img" => "movies/Patser.svg", "title" => "Patser"],
                    ["img" => "movies/Dog man.svg", "title" => "Dog man"],
                    ["img" => "movies/Minecraft.svg", "title" => "Minecraft"],
                    ["img" => "movies/A working man.svg", "title" => "A working man"],
                    ["img" => "movies/Anges & Cie.svg", "title" => "Anges & Cie"],
                    ["img" => "movies/Thunderbolt.svg", "title" => "Thunderbolt"],
                    ["img" => "movies/Hit Pig.svg", "title" => "Hit Pig"],
                    ["img" => "movies/The amateur.svg", "title" => "The Amateur"],
                ];

                foreach ($movies as $movie) {
                    $cleanTitle = strtolower(strip_tags($movie['title']));
                    echo '
                    <div class="movie-card" data-title="' . $cleanTitle . '">
                        <div class="poster-wrapper">
                            <img src="../images/' . $movie['img'] . '" alt="' . strip_tags($movie['title']) . '">
                        </div>
                        <div class="title-info">
                            <p>' . $movie['title'] . '</p>
                            <span class="info">ℹ️</span>
                        </div>
                    </div>';
                }

                ?>
            </div>

            <?php include($_SERVER['DOCUMENT_ROOT'] . "/components/buttons.php"); ?>

        </div>
    </div>
    <?php include '../components/brands.php';?>
    <?php include '../components/footer.php';?>

    <script>
        const searchInput = document.getElementById("searchInput");
        const movieCards = document.querySelectorAll(".movie-card");
                    
        // SEARCH: Show/hide cards based on query
        searchInput.addEventListener("input", () => {
          const query = searchInput.value.toLowerCase();
          movieCards.forEach(card => {
            const title = card.getAttribute("data-title");
            card.style.display = title.includes(query) ? "block" : "none";
          });
        });
        
        // SELECTION: Toggle 'selected' class on .poster-wrapper
        movieCards.forEach(card => {
          card.addEventListener("click", () => {
            const poster = card.querySelector(".poster-wrapper");
            if (poster) {
              poster.classList.toggle("selected");
            }
          });
        });

    </script>
</body>
</html>