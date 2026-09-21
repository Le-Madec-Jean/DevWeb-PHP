<?php
require_once("AlbumTrack.php");

class AlbumTrackRender extends AudioTrackRender
{

    private AlbumTrack $albumTrack;

    public function __construct(AlbumTrack $albumTrack_para)
    {
        $this->albumTrack = $albumTrack_para;

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


