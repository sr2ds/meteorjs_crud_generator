<?php

/**
* app/genetator.php
*
* This file receive command line params and make crud on yout meteor
*
* @author     David Silva
* @version    0.0.1
*/


/**
*  Call Functions
**/
function run($schema_path){
    // Define Schema Json Path
    define('SCHEMA_PATH', $schema_path);

    // Call Generator Collection
    generate_collection();
}

/**
*  Generator Colletions from json file
**/
function generate_collection() {
    $file = file_get_contents(SCHEMA_PATH);
    $tmp = file_get_contents("./templates/collection.js");
    $json = json_decode($file);
    
    $name = $json->schema;
    $table = $json->table;
    
    $t = null;
    foreach ($table as $field) {
        $opt = ($field->optional == false) ? 'false' : 'true';
        $t .= "$field->name: { type: $field->type, label: $field->label, max: $field->max, optional: $opt },\n";
    }
    
    $e1 = str_replace('_name', $name, $tmp);
    $e2 = str_replace('_NameUper', ucfirst($name), $e1);
    $e3 = str_replace('_table', $t, $e2);
    
    file_put_contents("../collections/".ucfirst($name).".js", $e3);
}

/**
*  Generator Views from json file
**/
function generate_views($path_to_file) {
    
}


/**
*  Generator Routes from json file
**/
function generate_routes($path_to_file) {
    
}


/**
*  Generator Menu Links from json file
**/
function generate_menu_links($path_to_file) {
    
}