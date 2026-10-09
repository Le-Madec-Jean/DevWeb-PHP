<?php
namespace iutnc\deefy\action;
class DisplayPlaylistAction extends Action
{

    public function __construct()
    {
        parent::__construct();
    }


    public function execute(): string
    {

        session_start();

        $res = "";

        if ((isset($_SESSION["playlist"]))) {

            for ($i = 0; $i < count($_SESSION["playlist"]->liste_pistes); $i++) {
                $piste = $_SESSION["playlist"]->liste_pistes[$i];
                $AlbumTrackRender = new \Iutnc\Deefy\Render\AlbumTrackRender($piste);
                $res .= $AlbumTrackRender->render(1);
            }




            
        }

        return $res;
    }



}


