<?php

class AlbumTrack extends AudioTrack
{
    
    
    private string $album;
    private string $annee;
    private int $numero_pistes;


    public function __construct(string $title_para, string $path, string $album_para, int $num_pistes_para)
    {
        parent::__construct($title_para, $path);
        $this->album = $album_para;
        $this->numero_pistes = $num_pistes_para;
        

    }

    public function __get(string $name) : mixed{
        if(property_exists($this, $name)){return $this->$name;}
        throw new Exception("invalid property : $name");
    }

    public function __set(string $name, mixed $value): void{
        if(property_exists($this, $name)){ $this->$name = $value;} else{
        throw new Exception("invalid property : $name");}
    }

    public function __tostring() : string {
        return json_encode(get_object_vars($this));
    }
}
