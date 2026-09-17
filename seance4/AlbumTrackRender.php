<?php
require_once("AlbumTrack.php");

class AlbumTrackRender
{

    private AlbumTrack $albumTrack;

    public function __construct(AlbumTrack $albumTrack_para)
    {
        $this->albumTrack = $albumTrack_para;

    }

    public function render(int $selector): string
    {
        $res = "";
        switch ($selector) {
            case 1:
                $res = $this->render_html(1);
                break;

            case 2:
                $res =$this->render_html(2);
                break;

            default:
                $res = $this->render_html(1);
                break;
        }

        return $res;
    }

    private function render_html(int $selector): string
    {
        $res = "";
        $data = json_decode($this->albumTrack);
        switch ($selector) {
            case '1':
                $res =
                    "<audio controls>
                <source src= \"$data->nom_fichier\" type=\"audio/mpeg\">
                </audio>
                
                <p> $data->title-$data->album </p> 
                ";
                break;

            case "2":
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


