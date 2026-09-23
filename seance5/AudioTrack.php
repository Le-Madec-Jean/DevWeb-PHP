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

    public function __get(string $name) : mixed{
        if(property_exists($this, $name)){return $this->$name;}
        throw new Exception("invalid property : $name");
    }

    public function __set(string $name, mixed $value): void
    {
        if ($value < 0 and $name === "duree") {
            throw new InvalidPropertyValueException("argument invalid : $value");
        } else {
            if (property_exists($this, $name)) {
                $this->$name = $value;
            } else {
                throw new InvalidPropertyNameException("invalid property : $name");
            }
        }
    }
}
