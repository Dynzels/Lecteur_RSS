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
        <meta property="og:title" content="Lecteur RSS" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Lecteur de flux RSS développé dans un but pédagogique." />
        <meta property="og:url" content="https://www.yohan-chevrot/demos/Lecteur_RSS" />
        <meta property="og:image" content="http://yohan-chevrot.fr/demos/Lecteur_RSS/img/background.png" />
        <link rel="shortcut icon" type="image/png" href="./img/favicon.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="container">
            <!-- HEADER -->
            <header class="">
                <h1 class="">Lecteur RSS</h1>
                <p class="">Lecteur de flux RSS créé dans un but pédagogique.</p>
            </header>
            <!-- LOGO -->
            <img class="" width="200" src="./img/favicon.png" alt="Logo RSS">
            <!-- CONTENU PRINCIPAL -->
            <main class="">
                <!-- FORMULAIRE -->
                <form class="form" action="#" method="get">
                    <div class="form-group">
                        <label for="flux">URL du flux RSS à consulter :</label>
                        <input value="<?php $feed = parse_ini_file('config.ini'); echo isset($feed['flux_rss']) ? $feed['flux_rss'] : 'http://feeds.feedburner.com/ActualitPokmon' ?>" id="src" type="url" name="url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nbr">Combien d'article afficher ?</label>
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
                    </div>
                    <button id="submit" type="submit" name="submit" class="btn btn-primary">Soumettre</button>
                </form>
                <!-- LISTE DES NEWS -->
                <div id="list_news" class="">
                    <?php include('news.php'); ?>
                </div>
            </main>
            <!-- FOOTER -->
            <footer class="">
                <p class="">Développé par Yohan CHEVROT &copy; 2019</p>
            </footer>
        </div> <!-- Fin container -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Script jQuery -->
        <script type="text/javascript" src="./js/app.js"></script> <!-- Script perso -->
    </body>
</html>
