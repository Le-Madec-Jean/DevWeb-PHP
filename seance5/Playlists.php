<?php

class Playlists extends AudioList 
{
    public function add_piste (array $piste){
        $this->liste_pistes[]=$piste;
        $this->nb_pistes++;
        $this->duree_total+=$piste["duree"];
    }

    public function remove_piste (int $i){
        unset($this->liste_pistes[$i]);
        $this->nb_pistes--;
        $this->duree_total-=$this->liste_pistes[$i]["duree"];
    }

    public function addListe_piste (array $tab_piste){
        foreach ($tab_piste as  $value) {
            if (!(in_array($value, $this->liste_pistes))) {
                $this->liste_pistes[]=$value;
            }
        }
    }





}
