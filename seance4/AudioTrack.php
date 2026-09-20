<?php

class AudioTrack 
{
    protected string $title;
    protected string $artiste;
    protected string $genre;
    protected int $duree;
    protected string $nom_fichier;

    public function __construct(string $title, string $nom_fichier){
        $this->title = $title;
        $this->nom_fichier = $nom_fichier;
    }

    public function __tostring() : string {
        return json_encode(get_object_vars($this));
    }
}
