<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Lecteur d'un flux RSS créé dans un but pédagogique.">
        <meta property="og:title" content="Lecteur RSS">
        <meta name="robots" content="index,follow" />
        <meta name="Author" content="Yohan CHEVROT" />
        <title>Lecteur RSS</title>
        <meta property="og:title" content="Menu responsive" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Lecteur d'un flux RSS développé dans un but pédagogique." />
        <meta property="og:url" content="https://www.yohan-chevrot/demos/Lecteur_RSS" />
        <meta property="og:image" content="http://yohan-chevrot.fr/demos/Lecteur_RSS/img/background.png" />
        <link rel="shortcut icon" type="image/png" href="./img/favicon.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <header>
            <h1>Lecteur RSS</h1>
            <p id="subtitle">Lecteur d'un flux RSS créé dans un but pédagogique.</p>
        </header>
        <!-- LOGO RSS -->
        <img id="logo" src="./img/favicon.png" alt="Logo RSS">
        <!-- CONTENU PRINCIPAL -->
        <main>
            <!-- FORMULAIRE -->
            <form class="form" action="#" method="get">
                <label for="flux">URL du flux RSS à consulter :
                    <input id="src" type="url" name="url" value="<?php $feed = parse_ini_file('config.ini'); echo isset($feed['flux_rss']) ? $feed['flux_rss'] : 'http://feeds.feedburner.com/ActualitPokmon' ?>">
                </label>
                <label for="nbr">Combien d'article afficher ?
                    <select id="nbr_news" name="nbr_news">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </label>
                <input id="submit" type="submit" name="submit" value="Soumettre">
            </form>
            <!-- LISTE DES NEWS -->
            <div id="list_news">
                <?php include('news.php'); ?>
            </div>
        </main>
        <!-- FOOTER -->
        <footer>
            <p>Développé par Yohan CHEVROT &copy; 2019</p>
        </footer>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Script jQuery -->
        <script type="text/javascript" src="./js/app.js"></script> <!-- Script perso -->
    </body>
</html>
