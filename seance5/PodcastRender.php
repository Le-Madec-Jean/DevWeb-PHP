<?php

final class PodcastRender  extends AudioTrackRender 
{
    private PodcastTrack $podcasts;

    public function __construct(PodcastTrack $PodcastTrack_para)
    {
        $this->podcasts = $PodcastTrack_para;

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
