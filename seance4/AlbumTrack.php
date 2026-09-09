<?php

class AlbumTrack
{
    public string $title;
    public string $artiste;
    public string $album;
    public string $annee;
    public int $numero_pistes;
    public string $genre;
    public int $duree;
    public string $nom_fichier;

    public function __construct(string $title_para, string $path, string $album_para, int $num_pistes_para)
    {
        $this->title = $title_para;
        $this->nom_fichier = $path;
        $this->album = $album_para;
        $this->numero_pistes = $num_pistes_para;

    }

    public function __tostring() : string {
        return json_encode(get_object_vars($this));
    }
}
