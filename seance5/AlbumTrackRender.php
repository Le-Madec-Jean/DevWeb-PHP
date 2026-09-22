<?php
require_once("AlbumTrack.php");

class AlbumTrackRender extends AudioTrackRender
{

    private AlbumTrack $albumTrack;

    public function __construct(AlbumTrack $albumTrack_para)
    {
        $this->albumTrack = $albumTrack_para;

    }

    public function __get(string $name) : mixed{
        if(property_exists($this, $name)){return $this->$name;}
        throw new Exception("invalid property : $name");
    }

    public function __set(string $name, mixed $value): void{
        if(property_exists($this, $name)){ $this->$name = $value;} else{
        throw new Exception("invalid property : $name");}
    }



    protected function render_html(int $selector): string
    {
        $res = "";
        $data = json_decode($this->albumTrack);
        switch ($selector) {
            case Renderer::COMPACT:
                $res =
                    "<audio controls>
                <source src= \"$data->nom_fichier\" type=\"audio/mpeg\">
                </audio>
                
                <p> $data->title-$data->album </p> 
                ";
                break;

            case Renderer::LONG:
                $res =
                    "<audio controls>
                <source src= \"$data->nom_fichier\" type=\"audio/mpeg\">
                </audio>
                
                <p>$data->numero_pistes-$data->title-$data->album </p> 
                ";
                break;

            default:
                $res =
                    "<audio controls>
                <source src= \"$data->nom_fichier\" type=\"audio/mpeg\">
                </audio>
                
                <p> $data->title-$data->album </p> 
                ";
                break;
        }

        return $res;
    }

}


