<?php

namespace Iutnc\Deefy\Action;


class AddPlaylistAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }


    public function execute(): string
    {
        $res = "";

        if ($this->http_method === "GET") {
            $res = <<<HTML
                <form method="post" action="?action=add-playlist">
                    <label> titre Playlist : </label>
                    <input type="text" name="addPlaylist" >
                    <button type="submit"> créer</button>
                </form>
              HTML;
        } else {


            if (isset($_POST["addPlaylist"])) {
                $titre = filter_var($_POST["addPlaylist"], FILTER_SANITIZE_SPECIAL_CHARS);
                $playlist = new \Iutnc\Deefy\Audio\Lists\Playlists($titre);
                $_SESSION["playlist"][$_POST["addPlaylist"]] = $playlist;


                $audioRender = new \Iutnc\Deefy\Render\AudioListRenderer($playlist);
                $html = $audioRender->render(1);

                $res = <<<HTML
                $html
                <a href="?action=add-track-podcast">Ajouter un podcast</a>
                <a href="?action=add-track-album">Ajouter une piste</a>

                HTML;

            } else {
               $audioRender = new \Iutnc\Deefy\Render\AudioListRenderer($_SESSION["playlist"][$_POST["addPlaylist"]] );
                $html = $audioRender->render(1);

                $res = <<<HTML
                $html
                <a href="?action=add-track-podcast">Ajouter un podcast</a>
                    <a href="?action=add-track-album">Ajouter une piste</a>
                HTML;
            }



        }



        return $res;
    }
}
