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
        $res = "";

        if ((isset($_SESSION["playlist"]))) {


            $piste = new \Iutnc\Deefy\Audio\Track\PodcastTrack("titre", "path", "nomAlbum");
            $piste->duree = 120;
            $_SESSION["playlist"]->add_piste($piste);

            $res = "<p> ajout d'une piste </p>";
        } else {


            $_SESSION["playlist"] = new \Iutnc\Deefy\Audio\Lists\Playlists("test");
            $piste = new \Iutnc\deefy\Audio\Track\PodcastTrack("titre", "path", "nomAlbum");
            $_SESSION["playlist"]->add_piste($piste);

             $res = "<p> ajout d'une piste </p>";
        }
        return $res;
    }
}
