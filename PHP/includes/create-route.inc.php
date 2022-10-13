<?php

if(isset($_GET["action"]) && !empty($_GET["location"]) && !empty($_GET["heure"]) && !empty($_GET["arrivee"]) && !empty($_GET["date"]) && !empty($_GET["place"])){

// grabbing values----------------------------------------------------------
    $location = $_GET["location"];
    $heure = $_GET["heure"];
    $arrivee = $_GET["arrivee"];
    $date = $_GET["date"];
    $place = $_GET["place"];
    $road = $_GET["road"];
    $final_hour = $_GET["h-arrive"];
    // $step_hour1 = $_GET["h-mid1"];
    // $step_hour2 = $_GET["h-mid2"];
    // $gps1 = $_GET["gpsCo1"];
    $gps2 = $_GET["gpsCo2"];
    $gps3 = $_GET["gpsCo3"];

    if(empty($_GET["locationAdd"])){ $etapes1=null; }
    else{ $etapes1 = $_GET["locationAdd"]; }
    if(empty($_GET["locationAdd2"])){ $etapes2=null; }
    else{ $etapes2 = $_GET["locationAdd2"]; }

    if(empty($_GET["h-mid1"])){ $step_hour1=null; }
    else{ $step_hour1 = $_GET["h-mid1"]; }

    if(empty($_GET["h-mid2"])){ $step_hour2=null; }
    else{ $step_hour2 = $_GET["h-mid2"]; }

    if(empty($_GET["gpsCo1"])){ $gps1=null; }
    else{ $gps1 = $_GET["gpsCo1"]; }
    if(empty($_GET["gpsCo2"])){ $gps2=null; }
    else{ $gps2 = $_GET["gpsCo2"]; }
    if(empty($_GET["gpsCo3"])){ $gps3=null; }
    else{ $gps13 = $_GET["gpsCo3"]; }

    $arr = array($etapes1,$etapes2);
    $lesEtapes = implode("&&",$arr);

    //instantiate class----------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/create-route.class.php";
    include "../classes/create-routecontrl.class.php";
    $newroute = new CreateRouteContrl($location,$heure,$arrivee,$date,$place,$lesEtapes,$road,$etapes1,$etapes2,$final_hour,$step_hour1,$step_hour2,$gps1,$gps2,$gps3);
    
    // error handlers and sign up------------------------------------------
    $newroute->newRoute();

    //back to page---------------------------------------------------------
    header("location: ../../confirmation.php?action=trajetCreation");
}else{
    header("location: ../../confirmation.php?action=emptyInputs");
}