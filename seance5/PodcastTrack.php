<?php

class PodcastTrack extends AudioTrack
{
    private string $date;

    public function __construct(string $date_para, string $title_para, string $path)
    {
        parent::__construct($title_para, $path);
        $this->date = $date_para;
    }

    public function __get(string $name) : mixed{
        if(property_exists($this, $name)){return $this->$name;}
        throw new InvalidPropertyNameException("invalid property : $name");
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

    public function __tostring() : string {
        return json_encode(get_object_vars($this));
    }


}