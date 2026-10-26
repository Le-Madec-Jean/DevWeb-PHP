<?php

namespace Iutnc\Deefy\Action;

class AddPodcastTrackAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }


    public function execute(): string
    {

        $info = "";
        $res = "";

        if ($this->http_method === "GET") {
            $res = <<<HTML
                <form method="post" action="?action=add-track-podcast" enctype="multipart/form-data">
                    <label> titre piste: </label>
                    <input type="text" name="titre" required>

                    <br>

                    <label> fichier mp3: </label>
                    <input type="file" name="mp3" required>

                    <br>

                    <label> date : </label>
                    <input type="date" name="date" required>

                    <br>

                    <label> duree en s :</label>
                    <input type="number" name="temps" required>

                    <br>

                    <label> genre :</label>
                    <input type="text" name="genre" required>

                    <br>

                    <label> auteur :</label>
                    <input type="text" name="auteur" required>

                    <br>

                    <label>  playlist :  </label>
                    <input type="texte" name="nomPlaylist" required>


                    <button type="submit"> créer</button>
                </form>
              HTML;
        } else {
            //values input
            $titre = filter_var($_POST["titre"], FILTER_SANITIZE_SPECIAL_CHARS);
            $duree = filter_var($_POST["temps"], FILTER_SANITIZE_NUMBER_INT);
            $auteur = filter_var($_POST["auteur"], FILTER_SANITIZE_SPECIAL_CHARS);
            $genre = filter_var($_POST["genre"], FILTER_SANITIZE_SPECIAL_CHARS);
            $nomPlaylist = filter_var($_POST["nomPlaylist"], FILTER_SANITIZE_SPECIAL_CHARS);
            $date = $_POST["date"];


            //upload mp3
            $mp3 = "";
            $destination = "";

            if (substr($_FILES["mp3"]["name"], -4) === ".mp3" && $_FILES["mp3"]["type"] === "audio/mpeg") {
                $mp3 = $_FILES["mp3"]["tmp_name"];
                $filename = uniqid();



                $destination = dirname(__DIR__) . "/Audio/" . $filename . ".mp3";
                $src = "/DevWeb-PHP/Deefy/src/class/Audio/" . $filename . ".mp3";




                if (move_uploaded_file($mp3, $destination)) {

                    if (isset($_SESSION["playlist"][$nomPlaylist])) {
                       print "<p> téléchargement avec succès </p>";
                    } else {
                        print "<p> la playlist ". $nomPlaylist . " n'existe pas <p>";
                    }
                    

                    
                } else {
                    return "<p> téléchargement non valide</p>";
                }

            } else {

                return "<p>" . $_FILES["mp3"]["tmp_name"] . "n'est pas un fichier .mp3</p>";

            }



            if ((isset($_SESSION["playlist"][$nomPlaylist]))) {


                $piste = new \Iutnc\Deefy\Audio\Track\PodcastTrack($date, $titre, $src);
                $piste->duree = $duree;
                $piste->genre = $genre;
                $piste->artiste = $auteur;
                $_SESSION["playlist"][$nomPlaylist]->add_piste($piste);



                $html = "";

                foreach ($_SESSION["playlist"][$nomPlaylist]->liste_pistes  as $value) {

                    $trackRender = new \Iutnc\Deefy\Render\PodcastRender($value);
                    $html .= $trackRender->render(2);
                }




                $res = <<<HTML
                    $html
                    <a href="?action=add-track-podcast">Ajouter encore un podcast</a>
                    <a href="?action=add-track-album">Ajouter encore une piste</a>
                HTML;


            } else {
                $res = <<<HTML
                    <a href="?action=add-playlist">creer une playlist</a>
                HTML;
            }

        }

        return $res;

    }
}
