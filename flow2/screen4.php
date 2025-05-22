<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on campaign 3</title>
    <link rel="icon" type="image/png" href="../images/brightfish_logo_small.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
    <?php require_once COMPONENTS_PATH . 'header.php'; ?>
    <?php require_once COMPONENTS_PATH . 'progress.php'; ?>
    <div class="container">
        <div class="innerContainer">
            <div class="map-section">
                <h2>Where do you want your ad to run?</h2>
                <div class="search-wrapper">
                    <input type="text" id="location-search" placeholder="Search for a location..." />
                    <button id="clear-search" class="clear-btn" style="display: none;">&times;</button>
                </div>
                <ul id="suggestions" class="suggestions-list"></ul>
            <div class="map-theater-wrapper">
                <div class="map-container">
                    <div id="map"></div>
                </div>
                <div id="selected-theaters" class="selected-theaters">
                    <p class="theater-placeholder">No locations selected yet...</p>
                </div>
            </div>

                <?php require_once COMPONENTS_PATH . 'buttons.php'; ?>
            </div>
        </div>
    </div>
    <?php require_once COMPONENTS_PATH . 'brands.php'; ?>
    <?php require_once COMPONENTS_PATH . 'footer.php'; ?>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([50.8503, 4.3517], 8); // Belgium

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const theaters = [{
                name: "Kinepolis Antwerp",
                lat: 51.2458,
                lon: 4.4161
            },
            {
                name: "Kinepolis Brussels",
                lat: 50.8949,
                lon: 4.3415
            },
            {
                name: "Kinepolis Liège",
                lat: 50.6436,
                lon: 5.5706
            },
            {
                name: "Pathé Charleroi",
                lat: 50.4189,
                lon: 4.4447
            },
            {
                name: "Imagix Mons",
                lat: 50.4655,
                lon: 3.9608
            },
            {
                name: "Kinepolis Gent",
                lat: 51.0406,
                lon: 3.7302
            },
            {
                name: "Kinepolis Hasselt",
                lat: 50.9295,
                lon: 5.3694
            },
            {
                name: "Cinescope Louvain La Neuve",
                lat: 50.6683,
                lon: 4.6144
            },
            {
                name: "Acinapolis Namur",
                lat: 50.4537,
                lon: 4.8737
            },
            {
                name: "Kinepolis Kortrijk",
                lat: 50.8280,
                lon: 3.2640
            },
            {
                name: "Kinepolis Braine",
                lat: 50.6685,
                lon: 4.3782
            },
            {
                name: "Siniscoop Sint-Niklaas",
                lat: 51.1722,
                lon: 4.1475
            },
            {
                name: "Euroscoop Maasmechelen",
                lat: 50.9985,
                lon: 5.7081
            },
            {
                name: "Euroscoop Genk",
                lat: 50.9824,
                lon: 5.4921
            },
            {
                name: "Imagix Tournai",
                lat: 50.6144,
                lon: 3.3850
            },
            {
                name: "Kinepolis Leuven",
                lat: 50.8798,
                lon: 4.7005
            },
            {
                name: "Kinepolis Oostende",
                lat: 51.2300,
                lon: 2.9126
            },
            {
                name: "Pathé Verviers",
                lat: 50.5920,
                lon: 5.8620
            },
            {
                name: "Kinepolis Brugge",
                lat: 51.2093,
                lon: 3.2247
            },
            {
                name: "Imagix Huy",
                lat: 50.5180,
                lon: 5.2400
            },
            {
                name: "Wellington Waterloo",
                lat: 50.7170,
                lon: 4.3980
            },
            {
                name: "Cityscoop Roeselare",
                lat: 50.9460,
                lon: 3.1220
            },
            {
                name: "Studio Geel",
                lat: 51.1650,
                lon: 4.9940
            },
            {
                name: "Cinema Koksijde",
                lat: 51.1160,
                lon: 2.6380
            },
            {
                name: "Stuart La Louvière",
                lat: 50.4740,
                lon: 4.1870
            },
            {
                name: "Kinepolis Palace Liège",
                lat: 50.6430,
                lon: 5.5700
            },
            {
                name: "White Cinema Bruxelles",
                lat: 50.8580,
                lon: 4.3525
            },
            {
                name: "Euroscoop Lanaken",
                lat: 50.9080,
                lon: 5.6460
            },
            {
                name: "Vendome Bruxelles",
                lat: 50.8428,
                lon: 4.3676
            },
            {
                name: "Movie Mills Malmedy",
                lat: 50.4260,
                lon: 6.0270
            },
            {
                name: "Focus Geraardsbergen",
                lat: 50.7730,
                lon: 3.8790
            },
            {
                name: "CineXtra Bastogne",
                lat: 50.0000,
                lon: 5.7160
            },
            {
                name: "CineXtra Marche",
                lat: 50.2270,
                lon: 5.3420
            },
            {
                name: "Le Stockel Woluwe St-Pierre",
                lat: 50.8330,
                lon: 4.4500
            },
            {
                name: "Galeries Bruxelles",
                lat: 50.8500,
                lon: 4.3517
            },
            {
                name: "Cine Centre Rixensart",
                lat: 50.7070,
                lon: 4.5270
            },
            {
                name: "Le Totem Libramont",
                lat: 49.9180,
                lon: 5.3760
            },
            {
                name: "L’Etoile Jodoigne",
                lat: 50.7180,
                lon: 4.8720
            },
            {
                name: "Plaza Hotton",
                lat: 50.2680,
                lon: 5.4180
            },
            {
                name: "Bouillon Cine",
                lat: 49.7940,
                lon: 5.0670
            },
            {
                name: "Studio Rubens Zwijndrecht",
                lat: 51.2190,
                lon: 4.3290
            },
            {
                name: "Cine Chaplin Nismes",
                lat: 50.0720,
                lon: 4.5470
            }
        ];

        const selectedTheatersContainer = document.getElementById('selected-theaters');

        const defaultIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        const selectedIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        const markerMap = {};
        const selectedMarkers = new Set();

        function updateTheaterPlaceholder() {
          const container = document.getElementById('selected-theaters');
          const hasTheaters = container.querySelectorAll('.selected-theater').length > 0;
          const placeholder = container.querySelector('.theater-placeholder');
          if (placeholder) {
            placeholder.style.display = hasTheaters ? 'none' : 'block';
          }
        }

        function getTheaterElementId(theater) {
            return `theater-${theater.name.replace(/\s+/g, '-')}`;
        }

        function addSelectedTheater(theater) {
            const elId = getTheaterElementId(theater);
            if (document.getElementById(elId)) return;

            const theaterEl = document.createElement('div');
            theaterEl.className = 'selected-theater';
            theaterEl.id = elId;
            theaterEl.innerHTML = `
            ${theater.name}
            <button class="remove-btn">&times;</button>
        `;

            theaterEl.querySelector('.remove-btn').addEventListener('click', () => {
                selectedTheatersContainer.removeChild(theaterEl);
                const marker = markerMap[theater.name];
                marker.setIcon(defaultIcon);
                selectedMarkers.delete(marker);

                if (selectedMarkers.size === 0) {
                    map.setView([50.8503, 4.3517], 8); // Reset zoom if no theaters selected
                }
                updateTheaterPlaceholder();
            });

            selectedTheatersContainer.appendChild(theaterEl);
            selectedTheatersContainer.style.display = 'flex'; // Show when at least one is selected
        }

        function removeSelectedTheater(theater) {
            const el = document.getElementById(getTheaterElementId(theater));
            if (el) selectedTheatersContainer.removeChild(el);
        }

        theaters.forEach(theater => {
            const marker = L.marker([theater.lat, theater.lon], {
                    icon: defaultIcon
                }).addTo(map)
                .bindTooltip(theater.name)
                .on('click', () => {
                    const isSelected = selectedMarkers.has(marker);
                    if (isSelected) {
                        marker.setIcon(defaultIcon);
                        selectedMarkers.delete(marker);
                        removeSelectedTheater(theater);

                        if (selectedMarkers.size === 0) {
                            map.setView([50.8503, 4.3517], 8);
                        }
                    } else {
                        marker.setIcon(selectedIcon);
                        selectedMarkers.add(marker);
                        addSelectedTheater(theater);
                    }
                    updateTheaterPlaceholder();
                    updateNextButton(); // <-- hier
                });

            markerMap[theater.name] = marker;
        });

        
        // Run this every time you add/remove theaters
        
        
        const searchInput = document.getElementById('location-search');
        const clearBtn = document.getElementById('clear-search');
        
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            clearBtn.style.display = query ? 'block' : 'none';
            
            if (!query) {
                map.setView([50.8503, 4.3517], 8); // Reset to Belgium
                return;
            }
            
            const match = theaters.find(t => t.name.toLowerCase().includes(query));
            if (match) {
                map.setView([match.lat, match.lon], 13); // Zoom in only when searching
            }
        });
        
        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input'));
        });

        function updateNextButton() {
    const nextBtn = document.getElementById('nextBtn');
    const confirmBtn = document.getElementById('confirmBtn');

    const hasSelection = selectedMarkers.size > 0;

    if (nextBtn) {
        if (hasSelection) {
            nextBtn.classList.remove('disabled');
            nextBtn.style.pointerEvents = 'auto';
            nextBtn.style.opacity = '1';
        } else {
            nextBtn.classList.add('disabled');
            nextBtn.style.pointerEvents = 'none';
            nextBtn.style.opacity = '0.5';
        }
    }

    if (confirmBtn) {
        confirmBtn.disabled = !hasSelection;
        confirmBtn.style.opacity = hasSelection ? '1' : '0.5';
        confirmBtn.style.cursor = hasSelection ? 'pointer' : 'not-allowed';
    }
}
    </script>

</body>
</html>