<?php
class AudioListRenderer implements Renderer {
    private AudioList $audioList;
    
    public function __construct(AudioList $audioList) {
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