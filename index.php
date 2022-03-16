<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);
session_start();
// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    pre_r($_GET);
    echo '<h2>$_POST</h2>';
    pre_r($_POST);
    echo '<h2>$_COOKIE</h2>';
    pre_r($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    pre_r($_SESSION);

}

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/MiceRepository.php';

whatIsHappening();

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$MiceRepository = new MiceRepository($databaseManager);
$mice = $MiceRepository->get();
$_SESSION["mice"] = $mice;


// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        create($databaseManager);
        break;
    case 'edit':
            // When clicked on edit button first time go to Edit Page with the data filled in the fields so it's easier to edit
            $miceToEdit = $MiceRepository->getUpdateData();
            pre_r($MiceRepository->getUpdateData());
            showEditpage($miceToEdit);
        break;
    case 'update':
        $MiceRepository ->update(intval($_GET["editID"]), $_GET["editName"],floatval($_GET["editPrice"]) , intval($_GET["editWeight"]), $_GET["editBrand"]);
        header('Location: index.php');
        break;
    default:
        overview();
        break;
}

function overview()
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create(DatabaseManager $database)
{
    // TODO: provide the create logic
    $sql = "INSERT INTO mice (name, price, weight, brand) VALUES ('{$_GET['name']}', {$_GET['price']}, {$_GET['weight']}, '{$_GET['brand']}')";
    try {
        $database->connection->exec($sql);
        echo "Entry Created Successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }


}
function showEditpage($miceToEdit) {


    require "edit.php";
}
// dddd