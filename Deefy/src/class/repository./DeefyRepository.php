<?php

use \Iutnc\Deefy\Audio\Track\AudioTrack;
use \Iutnc\Deefy\Audio\Track\AlbumTrack;
use \Iutnc\Deefy\Audio\Lists\Playlists;
class DeefyRepository
{
    private \PDO $pdo;
    private static ?DeefyRepository $instance = null;
    private static array $config = [];
    private function __construct(array $conf)
    {
        $this->pdo = new \PDO(
            $conf['dsn'],
            $conf['user'],
            $conf['pass'],
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
        );
    }
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DeefyRepository(self::$config);
        }
        return self::$instance;
    }
    public static function setConfig(string $file)
    {
        $conf = parse_ini_file($file);
        if ($conf === false) {
            throw new \Exception("Error reading configuration file");
        }
        self::$config = ['dsn' => $conf['driver'] . ":host=" . $conf['host'] . ";dbname=" . $conf['database'] . ";charset=utf8mb4", 'user' => $conf['username'], 'pass' => $conf['password']];
    }

    public function saveEmptyPlaylist(Playlists $pk): PlayLists
    {
        $query = "INSERT INTO playlist (nom) VALUES (:nom)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['nom' => $pk->nom]);
        $pk->setID($this->pdo->lastInsertId());
        return $pk;
    }

    public function get_all_playlist(): array
    {
        $tab_playlists = [];
        $query = <<<SQL
                    select nom from PlayLists
                SQL;

        $stmt = $this->pdo->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tab_playlists[] = new Playlists($row['nom']);
        }
        return $tab_playlists;
    }

    public function savePiste(AudioTrack $piste): AudioTrack
    {
        if ($piste instanceof AlbumTrack) {

            $query = "INSERT INTO track (titre, genre, duree, filename, type, artiste_album, titre_album, annee_album, numero_album) 
                        VALUES (:titre, :genre, :duree, :filename, :type, :artiste_album, :titre_album, :annee_album, :numero_album)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'titre' => $piste->title,
                'genre' => $piste->genre,
                'duree' => $piste->duree,
                'filename' => $piste->nom_fichier,
                'type' => 'A',
                'artiste_album' => $piste->artiste,
                'titre_album' => $piste->album,
                'annee_album' => $piste->annee,
                'numero_album' => $piste->numero_pistes
            ]);
            $piste->setID($this->pdo->lastInsertId());
            return $piste;
        } else {

            $query = "INSERT INTO track (titre, genre, duree, filename, type, auteur_podcast, date_podcast) 
                        VALUES (:titre, :genre, :duree, :filename, :type, :auteur_podcast, :date_podcast)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'titre' => $piste->title,
                'genre' => $piste->genre,
                'duree' => $piste->duree,
                'filename' => $piste->nom_fichier,
                'type' => 'P',
                'auteur_podcast' => $piste->artiste,
                'date_podcast' => $piste->date
            ]);
            $piste->setID($this->pdo->lastInsertId());
            return $piste;
        }
    }

    function savePlayliste(Playlists &$p, AudioTrack $piste): void
    {
        
        //faire une requê pour avoir la ligne de la playliste existante(grâce à son nom)
        $queryPlaylist = <<<SQL
            select id, nom from playlist where nom = :nom;
        SQL;

        $stmtPlaylist = $this->pdo->prepare($queryPlaylist);
        $stmtPlaylist->execute(["nom" => $p->nom]);
        $row_playlist = $stmtPlaylist->fetch(PDO::FETCH_ASSOC);

        // vérifier si la playlist existe
        if ($row_playlist === false) {
            print <<<HTML
                <p> $p->nom n'existe pas dans notre base de donnée</p>
            HTML;
            return;
        }


        //faire une requête pour avoir la piste existante
        $queryPiste = <<<SQL
            select id, titre from track where titre = :titre;
        SQL;

        $stmtPiste = $this->pdo->prepare($queryPiste);
        $stmtPiste->execute(["titre"=> $piste->title]);
        $row_piste = $stmtPiste->fetch(PDO::FETCH_ASSOC);

        // vérifier si la piste existe
        if ($row_piste === false) {
            print <<<HTML
                <p> $piste->title n'existe pas dans notre base de donnée</p>
            HTML;
            return;
        }

        $p->add_piste($piste);

       /* // je sélectionne l'id de la playliste et je compte combien de fois il apparâite et + 1 au moment de l'ajout
        $compteur_piste = <<<SQL
            select count(*) as nb_pistes from playlist2track
            where id_pl = :id;
        SQL;
        $stmtCompteur_piste = $this->pdo->prepare($compteur_piste);
        $stmtCompteur_piste->execute(["id"=> $p->getID()]);
        $row_compteur_piste = $stmtCompteur_piste->fetch(PDO::FETCH_ASSOC);*/

        $index = array_search($piste, $p->liste_pistes);

        if ($index !== false) {
            $numero = $index + 1;
        }

        // ajouter l'id des deux et le num piste à la table de liason playlist2track 

        $insert = <<<SQL
            INSERT INTO playlist2track (id_pl, id_track, no_piste_dans_liste)
                    VALUES (:id_pl, :id_track, :no_piste_dans_liste)
        SQL;
        $stmtInsert = $this->pdo->prepare($insert);
        $stmtInsert->execute(["id_pl" => $row_playlist["id"], "id_track" => $row_piste["id"], "no_piste_dans_liste" => $index]);
    }

}