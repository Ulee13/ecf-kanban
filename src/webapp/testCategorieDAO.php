<?php
require_once '../../../vendor/autoload.php';
// vendor/autoload.php

use src\dao\CategorieDAO;
use src\metier\Categorie;

$cDao = new CategorieDAO();

// Test insert
$cat = new Categorie(10, "Test DAO");
$cDao->insert($cat);

// Test findAll
// $categories = $cDao->findAll();
// foreach ($categories as $c) {
//     echo $c->getIdCat() . " - " . $c->getLibCat() . "<br>";
// }

// Test findById
//$found = $cDao->findById(10);
//if ($found) echo "Found: " . $found->getLibCat();

// Test update
//$found->setLibCat("Updated Label");
//$cDao->update($found);

// Test delete
//$cDao->delete(10);