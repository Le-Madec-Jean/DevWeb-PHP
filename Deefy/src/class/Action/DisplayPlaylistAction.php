<?php
namespace Iutnc\Deefy\Action;
class DisplayPlaylistAction extends Action
{

    public function __construct()
    {
        parent::__construct();
    }


    public function execute(): string
    {

        

        $res = "";

        if ((isset($_SESSION["playlist"]))) {

            for ($i = 0; $i < count($_SESSION["playlist"]->liste_pistes); $i++) {
                $piste = $_SESSION["playlist"]->liste_pistes[$i];
                $PodcastTrackRender = new \Iutnc\Deefy\Render\PodcastRender($piste);
                $res .= $PodcastTrackRender->render(1);
            }




            
        }

        return $res;
    }



}


