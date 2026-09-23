<?php

final class AudioList
{
    protected string $nom;
    protected int $nb_pistes;
    protected int $duree_total;
    protected array $liste_pistes;

    public function __construct(string $nom_para, array $liste_pistes_para = []){
        $this->nom = $nom_para;
        $this->liste_pistes = $liste_pistes_para;
    }

    public function __get(string $name) : mixed{
        if(property_exists($this, $name)){return $this->$name;}
        throw new InvalidPropertyNameException("invalid property : $name");
    }
    

}
