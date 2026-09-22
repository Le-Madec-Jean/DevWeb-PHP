<?php

final class PodcastRender  extends AudioTrackRender 
{
    private PodcastTrack $podcasts;

    public function __construct(PodcastTrack $PodcastTrack_para)
    {
        $this->podcasts = $PodcastTrack_para;

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
        $data = json_decode($this->podcasts);
        switch ($selector) {
            case Renderer::COMPACT:
                $res =
                    "<audio controls>
                <source src= \"$data->nom_fichier\" type=\"audio/mpeg\">
                </audio>
                
                <p> $data->title</p> 
                ";
                break;

            case Renderer::LONG:
                $res =
                    "<audio controls>
                <source src= \"$data->nom_fichier\" type=\"audio/mpeg\">
                </audio>
                
                <p>$data->date-$data->title</p> 
                ";
                break;

            default:
                $res =
                    "<audio controls>
                <source src= \"$data->nom_fichier\" type=\"audio/mpeg\">
                </audio>
                
                <p> $data->title-$data-> </p> 
                ";
                break;
        }

        return $res;
    }
}
