<?php

use iutnc\deefy\action\Action;


class AddPlaylistAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }


    public function execute(): string
    {



        if (!(isset($_SESSION["playlist"]))) {
            $_SESSION["playlist"] = new \Iutnc\Deefy\Audio\Lists\Playlists("test");

        }

        return "";
    }
}
