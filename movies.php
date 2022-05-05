<?php 

/**
 * Récupération de tous les films
 * Méthode : GET
 * 
 */
//Retour d'en-tête
//header('Acces-Control_Allow-Origin:http://api.test');

header('Acces-Control_Allow-Origin:*');
header('Content-Type: application/json');

// Récupération de la méthode
$method = $_SERVER['REQUEST_METHOD'];

/**
 * Si la méthode est différente de 'GET' on retourne une erreur
 */
if ($method !== 'GET') {
    header('405 Method Not Allowed',true, 405);
    // ou http_response_code(405);
    echo json_encode([
        'status'=> 405,
        'message'=> 'Method Not Allowed'
    ]);

    exit;
}

// Connexion à la BDD
require_once 'connexion.php';

$query=$db->query('SELECT * FROM movies');
$movie = $query->fetchAll();

//200-OK
http_response_code(200);

// Retourne les données au format JSON

echo json_encode($movie);
