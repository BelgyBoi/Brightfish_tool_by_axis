<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brightfish - Based on campaign 1</title>
    <link rel="stylesheet" href="../../stylesheets/header.css">
    <link rel="stylesheet" href="../../stylesheets/progress2.css">
    <link rel="stylesheet" href="../../stylesheets/brands2.css">
    <link rel="stylesheet" href="../../stylesheets/footer2.css">
    <link rel="stylesheet" href="../../stylesheets/flow2_screen2.css">
    <link rel="icon" type="image/png" href="../../images/brightfish_logo_small.png">
</head>
<body>
    <?php include '../../components/header.php';?>
    <?php include '../../components/progress.php';?>
    <div class="container">
        <div class="innerContainer">
            <h1>Choose your preferred target audience and mission</h1>

            <div class="audience">
                <p><strong>Target audience</strong></p>
                <label><input type="checkbox" value="3-14"> 3–14 years old</label>
                <label><input type="checkbox" value="15-24"> 15–24 years old</label>
                <label><input type="checkbox" value="25-34"> 25–34 years old</label>
                <label><input type="checkbox" value="35-49"> 35–49 years old</label>
                <label><input type="checkbox" value="50+"> 50+ years old</label>
            </div>

            <div class="mission">
                <p><strong>Target mission</strong></p>
                <div class="grid">
                    <button class="mission"><img src="../../images/Everyone.svg" alt=""><span>Everyone</span></button>
                    <button class="mission"><img src="../../images/Man.svg" alt=""><span>Male</span></button>
                    <button class="mission"><img src="../../images/Woman.svg" alt=""><span>Female</span></button>
                    <button class="mission"><img src="../../images/Family.svg" alt=""><span>Families</span></button>
                    <button class="mission"><img src="../../images/No minors.svg" alt=""><span>Restrict minors</span></button>
                    <button class="mission"><img src="../../images/No child labor.svg" alt=""><span>No kids</span></button>
                    <button class="mission"><img src="../../images/No drink.svg" alt=""><span>Restrict alcohol</span></button>
                    <button class="mission"><img src="../../images/sugar.svg" alt=""><span>Restrict sugar</span></button>
                    <button class="mission"><img src="../../images/Gamer.svg" alt=""><span>Gamers</span></button>
                    <button class="mission"><img src="../../images/Paint palette.svg" alt=""><span>Art</span></button>
                    <button class="mission"><img src="../../images/Mainstream.svg" alt=""><span>Mainstream</span></button>
                    <button class="mission"><img src="../../images/Customer.svg" alt=""><span>Purchasers</span></button>
                    <button class="mission"><img src="../../images/Friends.svg" alt=""><span>Youngsters</span></button>
                    <button class="mission"><img src="../../images/-35.svg" alt=""><span>-35</span></button>
                    <button class="mission"><img src="../../images/+35.svg" alt=""><span>35+</span></button>
                    <button class="mission"><img src="../../images/No horror.svg" alt=""><span>No horror</span></button>
                </div>

                <div class="premium-wrapper">
                    <button class="mission premium"><img src="../../images/Premium.svg" alt=""><span>Premium</span></button>
                </div>
            </div>

            <div class="button-group">
                <a class="next-btn" href="../screen3/index.php">Next question</a>
                <a href="../screen1/index.php" class="back-link">Go back</a>
            </div>
        </div>
    </div>
    <?php include '../../components/brands.php';?>
    <?php include '../../components/footer.php';?>

    <script>
        const buttons = document.querySelectorAll("button.mission");
        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                btn.classList.toggle("selected"); // laat meervoudige selectie toe
            });
        });
    </script>
</body>
</html>