<?php

class AlbumTrack extends AudioTrack
{
    
    
    public string $album;
    public string $annee;
    public int $numero_pistes;


    public function __construct(string $title_para, string $path, string $album_para, int $num_pistes_para)
    {
        parent::__construct($title_para, $path);
        $this->album = $album_para;
        $this->numero_pistes = $num_pistes_para;
        

    }

    public function __tostring() : string {
        return json_encode(get_object_vars($this));
    }
}
