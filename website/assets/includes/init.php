<?php
/**
 * init.php
 *
 * Contient toutes les informations qui doivent
 * être globales à TOUS les scripts.
 *
 * Cela peut être relatif à la base de données,
 * aux pages HTML, etc. Tout ce qui doit être
 * récupéré plusieurs fois est stocké ici.
 *
 * @author Alexandre SBEGHEN
 */

namespace assets\includes;

class init {
    private static string $ROOT_DIR;
    private static string $IMAGES_DIR;
    private static string $CSS_DIR;

    /**
     * Pseudo-constructeur de init.
     *
     * Permet d'initialiser les constantes qui
     * seront plus tard utilisées un peu partout
     * dans le site web.
     *
     * @param string $ROOT_DIR Le répertoire de la racine du site web.
     * @param string $IMAGES_DIR Le répertoire des images
     * @param string $CSS_DIR Le répertoire des feuilles de style <code>.css</code>
     */
    public static function init(string $ROOT_DIR, string $IMAGES_DIR, string $CSS_DIR) {
        self::$ROOT_DIR = $ROOT_DIR;
        self::$IMAGES_DIR = $IMAGES_DIR;
        self::$CSS_DIR = $CSS_DIR;
    }

    /**
     * Permet d'obtenir sous forme de string
     * le répertoire de la racine du site web
     * (là où se trouve le fichier <code>index.php</code>)
     *
     * @return string Répertoire de la racine.
     */
    public static function getRootDir(): string {
        return self::$ROOT_DIR;
    }

    /**
     * Permet d'obtenir sous forme de string
     * le répertoire des images.
     *
     * @return string Répertoire des images
     */
    public static function getImagesDir(): string {
        return self::$IMAGES_DIR;
    }

    /**
     * Permet d'obtenir sous la forme de string
     * le répertoire des feuilles de styles <code>.css</code>
     * du site web.
     *
     * @return string Répertoire des fichiers.
     */
    public static function getCSSDir(): string {
        return self::$CSS_DIR;
    }

    public static function getPDO():null
    {
        $dotenv = Dotenv\Dotenv::createImmutable();
        $servername = getenv('serverName');
        $username = getenv('userName');
        $password = getenv('password');
        try {
            $connexion = new PDO("mysql:host=$servername;dbname=dbUser", $username, $password);
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
}


}