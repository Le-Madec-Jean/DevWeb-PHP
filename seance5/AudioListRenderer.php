<?php

namespace seance5\Iutnc\Deefy\Render;
class AudioListRenderer implements Renderer {
    private \seance5\Iutnc\Deefy\Audio\lists\AudioList $audioList;
    
    public function __construct(\seance5\Iutnc\Deefy\Audio\lists\AudioList $audioList) {
        $this->audioList = $audioList;
    }
    
    public function render(int $selector) : string {
        $res = "";

        $res = "<p>" . $this->audioList->nom ."</p>";

        foreach ($this->audioList->liste_pistes as $key => $value) {
            $track = new AlbumTrackRender($value);
            $res .= $track->render(Renderer::COMPACT);
        }

        $res .= "<p>" . $this->audioList->nb_pistes ."</p>";
        $res .= "<p>" . $this->audioList->duree_total ."</p>";;

        return $res;
    }
        
    

}