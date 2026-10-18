<?php

namespace Iutnc\Deefy\Audio\Lists;


class AudioList
{
    protected string $nom;
    protected int $nb_pistes;
    protected int $duree_total;
    protected array $liste_pistes;

    public function __construct(string $nom_para, array $liste_pistes_para = []){
        $this->nom = $nom_para;
        $this->liste_pistes = $liste_pistes_para;
        $this->nb_pistes = count($liste_pistes_para);
        $this->duree_total = 0;
    }

    public function __get(string $name) : mixed{
        if(property_exists($this, $name)){return $this->$name;}
        throw new \Seance5\Iutnc\Deefy\Exception\InvalidPropertyNameException("invalid property : $name");
    }
    

}
