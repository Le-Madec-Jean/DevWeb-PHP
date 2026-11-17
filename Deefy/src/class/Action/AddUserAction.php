<?php

namespace Iutnc\Deefy\Action;

class AddUserAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }


    public function execute(): string
    {

        
        $res = "";

        if ($this->http_method === "GET") {
            $res = <<<HTML
                <form method="post" action="?action=add-user" enctype="multipart/form-data">

                    <label> Nom :  </label>
                    <input type="text" name="nom" required>

                    <br>

                    <label> Email: </label>
                    <input type="email" name="mail" required>

                    <br>

                    <label> Age : </label>
                    <input type="number" name="age" required>

                    <br>


                    <button type="submit"> connexion </button>
                </form>
              HTML;
        } else {
            //values input
            $nom = filter_var($_POST["nom"], FILTER_SANITIZE_SPECIAL_CHARS);
            $mail = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL);
            $age = filter_var($_POST["age"], FILTER_VALIDATE_INT);


            if (!(isset($_SESSION["user"][$mail]))) {
                $_SESSION["user"][$mail][] = $nom;
                $_SESSION["user"][$mail][] = $age;
            }


            $res = <<<HTML

                <p> Bravo connexion réussi !!! </p>
                <p>Nom : $nom, Email: $mail, Age: $age</p>
                <a href="?action=default">retour page d'accueille</a>

            HTML;

        }

        return $res;

    }
}
