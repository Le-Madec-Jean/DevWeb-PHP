<?php

use iutnc\deefy\action\Action;

class DefaultAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }


   
    public function execute(): string
    {
        return "<h1>Bienvenue sur DeefyApp !</h1>
                <p>Bienvenue sur votre application musicale.</p>";
    }

}

