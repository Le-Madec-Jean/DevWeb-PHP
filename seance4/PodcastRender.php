<?php

final class PodcastRender  implements Renderer
{
    private PodcastTrack $podcasts;

    public function __construct(PodcastTrack $PodcastTrack_para)
    {
        $this->podcasts = $PodcastTrack_para;

    }
    public function render(int $selector): string
    {
        $res = "";
        switch ($selector) {
            case Renderer::COMPACT:
                $res = $this->render_html(Renderer::COMPACT);
                break;

            case Renderer::LONG:
                $res =$this->render_html(Renderer::LONG);
                break;

            default:
                $res = $this->render_html(Renderer::COMPACT);
                break;
        }

        return $res;
    }

    private function render_html(int $selector): string
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
