<?php

class Album extends AudioList
{
    private string $artiste_album;
    private string $date_sortie;


    public function __construct(string $nom_para, array $album_list_para)
    {
        parent::__construct($nom_para, $album_list_para);


    }

    public function setArtiste_album(string $artiste_album)
    {
        $this->artiste_album = $artiste_album;
    }

    public function setDateSortie(string $date_sortie)
    {
        $this->date_sortie = $date_sortie;
    }





}
