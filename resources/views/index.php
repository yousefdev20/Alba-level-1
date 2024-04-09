<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo assets('css/style.css'); ?>">
</head>
<body>
<header id="header" class="">
    <img src="<?php echo assets('images/web.png'); ?>" width="50px" alt="Logo">
    <img src="<?php echo assets('images/button.png'); ?>" width="40px" alt="Meniu buton">
</header>

<section id="hero">
    <div id="heroinfo">
        <h1>Cindea Darius-Gabriel</h1>
        <p>Programator & desingner web.</p>
        <p>Full stack dev-HTML5, CSS3.</p>
    </div>
    <div id="heroimg"></div>
</section>

<section id="servicii">
    <div>
        <h1>Servicii oferite</h1>
    </div>
    <?php
    foreach ($servicesOffered ?? [] as $service) {
        echo '<article id="serva1">
        <img src="' . assets($service[3]) . '" width="50px" alt="Logo design grafic">
        <h1>' . $service[2] . '</h1>
        <p>' . $service[4] . '</p>
    </article>';
    }
    ?>
</section>

<section id="portofoliu">
    <div>
        <h1>Portofoliu</h1>
    </div>

    <?php
    foreach ($projects ?? [] as $project) {
        echo '
        <div style="border: 1px solid gray; padding-inline: 10px; margin-block: 10px">
        <h1>PROJECT ('. $project['id'] .')</h1>
        <h3>' . $project['title'] . '</h3>
        <img src="' . assets($project['image']) . '" width="30px" height="20px" alt="Proiect logo">
        <h4>' . $project['description'] . '</h4>
        ';
        if ($project['services']) {
            echo "<h1>Services: </h1>";
        }
        foreach ($project['services'] ?? [] as $key => $service) {
            echo '
                <div style="border: 1px solid gray; padding: 10px; margin-inline: 50px; margin-block: 10px">
                <h3>' . ++$key . ') ' . $service['title'] . '</h3>
        <img src="' . assets($service['image']) . '" width="30px" height="20px" alt="Proiect logo">
        <h4>' . $service['description'] . '</h1>
            </div>';
        }
        echo "</div>";
    }
    ?>
</section>

<section id="contact">
    <h3>Contacteaza-ma pentru orice detalii</h3>
    <article>
        <div class="contact-info">
            <h3>Informatii de contact:</h3>
            <h4>Adresa postala</h4>
            <p>Strada Vasile Goldis nr.9, ap.12, Alba Iulia, jud.Alb</p>
            <p><b>Tel : </b>0730671185</p>
            <p><b>Email : </b>dariusgabrielcindea@gmail.com</p>
            <h4>Social media:</h4>
            <div>
                <img src="<?php echo assets('images/insta.png'); ?>" alt="icon" width="30" height="30">
                <img src="<?php echo assets('images/facebook.png'); ?>" alt="icon" width="30" height="30">
                <img src="<?php echo assets('images/linkedin.png'); ?>" alt="icon" width="30" height="30">
            </div>
        </div>

        <div class="contact-form">
            <h3>Scrie un mesaj aici:</h3>
            <form>
                <label for="name">Nume:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="subiect">Subiect:</label>
                <select id="subiect" name="subiect">
                    <option value="General">General</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>

                <label for="message">Mesaj:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Trimite</button>
            </form>
        </div>
    </article>
</section>

<footer id="footerul">
    <img src="<?php echo assets('images/web.png'); ?>" width="50px" alt="Logo">
    <p>©2023.Design si implementare:Cindea Darius-Gabriel.All rights reserved</p>
</footer>
</body>
</html>
