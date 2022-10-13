<?php
session_start();
$title = "Editer - trajets";
include 'header.php';
if(isset($_GET['id'])){
    $idt = $_GET['id'];
    $depart = $_SESSION["trajet_depart"];
    $depart1 = $_SESSION["trajet_depart1"];
    $depart2 = $_SESSION["trajet_depart2"];
    $arriver = $_SESSION["trajet_arriver"];
    $hours = $_SESSION["trajet_routehours"];
    $calendar = $_SESSION["trajet_calendar"];
    $type = $_SESSION["trajet_routetype"];
    $guest = $_SESSION["trajet_guest"];
    $gps1 = $_SESSION["trajet_gps1"];
    $gps2 = $_SESSION["trajet_gps2"];
    $gps3 = $_SESSION["trajet_gps3"];
    $hours1 = $_SESSION["trajet_step_hour_1"];
    $hours2 = $_SESSION["trajet_step_hour_2"];
    $hours3 = $_SESSION["trajet_final_hour"];
    $hour1;
    $hour2;
    $hour3;

    $hours = explode(':',$hours); $hour = $hours[0]; $min = $hours[1];
    if($hours1!=NULL){
        $hours1 = explode(':',$hours1); $hour1 = $hours1[0]; $min1 = $hours1[1];
    }else{ $hour1 = NULL;}
    if($hours2!=NULL){
        $hours2 = explode(':',$hours2); $hour2 = $hours2[0]; $min2 = $hours2[1];
    }else{$hour2 = NULL;
    }
    if($hours3!=NULL){
        $hours3 = explode(':',$hours3); $hour3 = $hours3[0]; $min3 = $hours3[1];

    }else{// $hour1
    }
    
    
    
}else{
    header("location: index.php");
}

?>

<body>
    <section id="containerbox" class="w100 minh100 is-flex is-justify-content is-align-items-center">
        <div id="divleft"
            class="posre h100 w55 is-justify-content-center is-align-items-start is-flex-direction-column">
            <?php include_once 'vitrineLeft.php'; ?>
        </div>

        <div id="divright"
            class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
            <img class="posabL" src="assets/img/autres/pos1.svg" alt="">
            <img class="posabR" src="assets/img/autres/pos2.svg" alt="">
            <!-- <main class="dekstop box"> -->

            <main class="dekstop">
                <header id="headerprofil"
                    class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                    <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg"
                            alt="Le logo Blabla Campus"></a>
                    <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg"
                            alt="Icon d'une personne"></a>
                </header>
                <div id="cache" class="w0"></div>
                <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
                    <!-- coordonnées -->
                    <p class="bungee my-4 mx-3">editer un trajet</p>

                    <form action="PHP/includes/edittraj.inc.php?"
                        class="loginForm is-flex is-flex-direction-column container" method="GET"
                        enctype="multipart/form-data" autocomplete="off">
                        <!-- hidden champ id -->
                        <input type="hidden" value="<?= $idt;?>" name="id">
                        <!-- depart -->
                        <div class="control has-icons-left enAvant firstAutoC">
                            <label for="depart" class="greyText">
                                <p id="info">D'où partez vous ?</p>
                            </label>
                            <span class="icon is-small is-left mt-3">
                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.657 14.6567L10.414 18.8997C10.2284 19.0854 10.0081 19.2328 9.76556 19.3333C9.52303 19.4339 9.26305 19.4856 9.0005 19.4856C8.73796 19.4856 8.47798 19.4339 8.23544 19.3333C7.99291 19.2328 7.77256 19.0854 7.587 18.8997L3.343 14.6567C2.22422 13.5379 1.46234 12.1124 1.15369 10.5606C0.845043 9.00873 1.00349 7.40022 1.60901 5.93844C2.21452 4.47665 3.2399 3.22725 4.55548 2.34821C5.87107 1.46918 7.41777 1 9 1C10.5822 1 12.1289 1.46918 13.4445 2.34821C14.7601 3.22725 15.7855 4.47665 16.391 5.93844C16.9965 7.40022 17.155 9.00873 16.8463 10.5606C16.5377 12.1124 15.7758 13.5379 14.657 14.6567V14.6567Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 8.99969C12 9.79534 11.6839 10.5584 11.1213 11.121C10.5587 11.6836 9.79565 11.9997 9 11.9997C8.20435 11.9997 7.44129 11.6836 6.87868 11.121C6.31607 10.5584 6 9.79534 6 8.99969C6 8.20405 6.31607 7.44098 6.87868 6.87837C7.44129 6.31576 8.20435 5.99969 9 5.99969C9.79565 5.99969 10.5587 6.31576 11.1213 6.87837C11.6839 7.44098 12 8.20405 12 8.99969V8.99969Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>
                            <div class="autocomplete-container w100" id="autocomplete-container">
                                <input type="text" placeholder="etapes" id="location" name="location"
                                    class="input my-3 py-5" value="<?= $depart; ?>">
                            </div>
                            <!-- <input type="text" name="depart" id="depart" class="input is-medium" placeholder="Départ"> -->
                        </div>
                        <!-- heure -->
                        <div class="control has-icons-left">
                            <p for="heure" class="greyText mb-3">À quelle heure partez vous ?</p>
                            <span class="icon is-small is-left mt-3">
                                <i class="fa-regular fa-clock"></i></span>
                            <input type="time" name="heure" id="heure" class="input is-medium" placeholder="Heure"
                                value="<?php if($hour!=NULL){echo $hour.":".$min;}  ?>">
                        </div>

                        <!-- arrivée -->
                        <div class="selectH">
                            <div class="control has-icons-left my-3">
                                <div class="select w100">
                                    <p for="arrivee" class="greyText mb-3">Pour allez où ?</p>
                                    <select name="arrivee" id="arrivee">
                                        <!-- <option value="" disabled selected></option> -->
                                        <option value="Centre Avenue du Stade"
                                            <?php if ($arriver == "Centre Avenue du Stade") { echo "selected";}?>>Centre
                                            Avenue du Stade</option>
                                        <option value="Campus numérique"
                                            <?php if ($arriver == "Campus numérique") { echo "selected";}?>>Campus
                                            numérique</option>
                                    </select>
                                </div>
                                <div class="icon is-small is-left mt-3">
                                    <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.657 14.6567L10.414 18.8997C10.2284 19.0854 10.0081 19.2328 9.76556 19.3333C9.52303 19.4339 9.26305 19.4856 9.0005 19.4856C8.73796 19.4856 8.47798 19.4339 8.23544 19.3333C7.99291 19.2328 7.77256 19.0854 7.587 18.8997L3.343 14.6567C2.22422 13.5379 1.46234 12.1124 1.15369 10.5606C0.845043 9.00873 1.00349 7.40022 1.60901 5.93844C2.21452 4.47665 3.2399 3.22725 4.55548 2.34821C5.87107 1.46918 7.41777 1 9 1C10.5822 1 12.1289 1.46918 13.4445 2.34821C14.7601 3.22725 15.7855 4.47665 16.391 5.93844C16.9965 7.40022 17.155 9.00873 16.8463 10.5606C16.5377 12.1124 15.7758 13.5379 14.657 14.6567V14.6567Z"
                                            stroke="#333333" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 8.99969C12 9.79534 11.6839 10.5584 11.1213 11.121C10.5587 11.6836 9.79565 11.9997 9 11.9997C8.20435 11.9997 7.44129 11.6836 6.87868 11.121C6.31607 10.5584 6 9.79534 6 8.99969C6 8.20405 6.31607 7.44098 6.87868 6.87837C7.44129 6.31576 8.20435 5.99969 9 5.99969C9.79565 5.99969 10.5587 6.31576 11.1213 6.87837C11.6839 7.44098 12 8.20405 12 8.99969V8.99969Z"
                                            stroke="#333333" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- heure arrivee estimée -->
                        <div class="control has-icons-left">
                            <p for="heure" class="greyText mb-3">Heure d'arrivée estimée</p>
                            <span class="icon is-small is-left mt-3">
                                <i class="fa-regular fa-clock"></i></span>
                            <input type="time" name="h-arrive" id="h-arrive" class="input is-medium h-arrive"
                                placeholder="Heure" value="<?php if($hour!=NULL){echo $hour.":".$min;} ?>">
                        </div>

                        <!-- date départ -->
                        <div class="control has-icons-left pt-3 my-5">
                            <p for="date" class="greyText mb-3">Quand partez vous ?</p>
                            <div class="icon is-small is-left calendar mt-5">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4 2.79999H4.6C2.61177 2.79999 1 4.41176 1 6.39999V15.4C1 17.3882 2.61177 19 4.6 19H15.4C17.3882 19 19 17.3882 19 15.4V6.39999C19 4.41176 17.3882 2.79999 15.4 2.79999Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.4 1V4.6M13.6 1V4.6M1 8.2H19" stroke="#333333" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input type="date" name="date" id="date" class="input is-medium" placeholder="Aujourd'hui"
                                value="<?= $calendar; ?>">
                        </div>
                        <!-- Type de trajet -->
                        <label for="type" class="greyText mt-3">Type de trajet : </label>
                        <div class="is-flex is-justify-content-space-around mb-4">
                            <label class="checkbox radioTransform">
                                <input type="radio" <?php if ($type == "simple") { echo "checked";}
                        ?> value="simple" name="road">
                                Allez simple
                            </label>
                            <label class="checkbox radioTransform">
                                <input type="radio" <?php if ($type == "retour") { echo "checked";}
                        ?> value="retour" name="road">
                                Allez / retour
                            </label>
                        </div>
                        <!-- nombre de place disponible -->
                        <div class="control has-icons-left mt-3">
                            <p for="place" class="greyText mb-3">Nombre de place disponible : </p>
                            <span class="icon is-small is-left mt-3"><svg width="20" height="19" viewBox="0 0 20 19"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.9919 16.0169L13.4505 11.6823C13.3738 11.0684 13.0754 10.5036 12.6115 10.0942C12.1476 9.68483 11.5501 9.45902 10.9313 9.45926H9.06691C8.44847 9.45943 7.85138 9.68543 7.38782 10.0948C6.92425 10.5041 6.62612 11.0687 6.54944 11.6823L6.0072 16.0169C5.97744 16.255 5.99868 16.4967 6.06952 16.726C6.14036 16.9553 6.25917 17.1669 6.41807 17.3468C6.57696 17.5267 6.7723 17.6707 6.99112 17.7692C7.20993 17.8678 7.44721 17.9187 7.6872 17.9185H12.3127C12.5526 17.9186 12.7898 17.8676 13.0085 17.769C13.2273 17.6703 13.4225 17.5263 13.5813 17.3465C13.7401 17.1666 13.8588 16.9551 13.9296 16.7258C14.0004 16.4966 14.0216 16.2549 13.9919 16.0169V16.0169Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M9.99993 6.07555C11.4015 6.07555 12.5377 4.93935 12.5377 3.53777C12.5377 2.1362 11.4015 1 9.99993 1C8.59836 1 7.46216 2.1362 7.46216 3.53777C7.46216 4.93935 8.59836 6.07555 9.99993 6.07555Z"
                                        stroke="#333333" stroke-width="2" />
                                    <path
                                        d="M3.2325 8.61331C4.16688 8.61331 4.92435 7.85585 4.92435 6.92146C4.92435 5.98708 4.16688 5.22961 3.2325 5.22961C2.29812 5.22961 1.54065 5.98708 1.54065 6.92146C1.54065 7.85585 2.29812 8.61331 3.2325 8.61331Z"
                                        stroke="#333333" stroke-width="2" />
                                    <path
                                        d="M16.7673 8.61331C17.7017 8.61331 18.4591 7.85585 18.4591 6.92146C18.4591 5.98708 17.7017 5.22961 16.7673 5.22961C15.8329 5.22961 15.0754 5.98708 15.0754 6.92146C15.0754 7.85585 15.8329 8.61331 16.7673 8.61331Z"
                                        stroke="#333333" stroke-width="2" />
                                    <path
                                        d="M3.2326 11.1511H2.97375C2.57326 11.151 2.18573 11.2931 1.88012 11.5519C1.57451 11.8107 1.37062 12.1696 1.30474 12.5646L1.02305 14.2565C0.982623 14.4989 0.995489 14.7472 1.06075 14.9841C1.12601 15.221 1.2421 15.4409 1.40095 15.6284C1.55979 15.8159 1.75758 15.9665 1.98054 16.0698C2.20351 16.1732 2.44631 16.2267 2.69206 16.2266H5.77038M16.7674 11.1511H17.0262C17.4267 11.151 17.8143 11.2931 18.1199 11.5519C18.4255 11.8107 18.6294 12.1696 18.6953 12.5646L18.977 14.2565C19.0174 14.4989 19.0045 14.7472 18.9392 14.9841C18.874 15.221 18.7579 15.4409 18.5991 15.6284C18.4402 15.8159 18.2424 15.9665 18.0195 16.0698C17.7965 16.1732 17.5537 16.2267 17.3079 16.2266H14.2296"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <input type="number" name="place" id="place" class="input is-medium"
                                placeholder="Places disponibles" min="1" max="8" value="<?= $guest; ?>">
                        </div>
                        <!-- etapes éventuelles -->
                        <div class="control has-icons-left addEtape">
                            <label for="depart" class="greyText">Étapes éventuelles </label>
                            <span class="icon is-small is-left mt-3">
                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.657 14.6567L10.414 18.8997C10.2284 19.0854 10.0081 19.2328 9.76556 19.3333C9.52303 19.4339 9.26305 19.4856 9.0005 19.4856C8.73796 19.4856 8.47798 19.4339 8.23544 19.3333C7.99291 19.2328 7.77256 19.0854 7.587 18.8997L3.343 14.6567C2.22422 13.5379 1.46234 12.1124 1.15369 10.5606C0.845043 9.00873 1.00349 7.40022 1.60901 5.93844C2.21452 4.47665 3.2399 3.22725 4.55548 2.34821C5.87107 1.46918 7.41777 1 9 1C10.5822 1 12.1289 1.46918 13.4445 2.34821C14.7601 3.22725 15.7855 4.47665 16.391 5.93844C16.9965 7.40022 17.155 9.00873 16.8463 10.5606C16.5377 12.1124 15.7758 13.5379 14.657 14.6567V14.6567Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 8.99969C12 9.79534 11.6839 10.5584 11.1213 11.121C10.5587 11.6836 9.79565 11.9997 9 11.9997C8.20435 11.9997 7.44129 11.6836 6.87868 11.121C6.31607 10.5584 6 9.79534 6 8.99969C6 8.20405 6.31607 7.44098 6.87868 6.87837C7.44129 6.31576 8.20435 5.99969 9 5.99969C9.79565 5.99969 10.5587 6.31576 11.1213 6.87837C11.6839 7.44098 12 8.20405 12 8.99969V8.99969Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>

                            <div class="is-flex is-flex-direction-column">
                                <div id="autocomplete-container1" class="w100">
                                    <input type="text" placeholder="etape" name="locationAdd" id="locationAdd"
                                        value="<?= $depart1; ?>" class="input my-3 py-5 isEmpty">
                                </div>
                                <!-- heure estimée étape -->
                                <div class="hmid1">
                                    <div class="control has-icons-left">
                                        <p for="heure" class="greyText mb-3">Heure d'arrivée estimée étape 1</p>
                                        <span class="icon is-small is-left mt-3">
                                            <i class="fa-regular fa-clock"></i></span>
                                        <input type="time" name="h-mid1" id="h-mid1" class="input is-medium h-mid1"
                                            placeholder="Heure" value="<?php if($hour1!=NULL){echo $hour1.":".$min1;} ?>">
                                    </div>
                                </div>

                                <div class="etape2 mt-2">
                                    <p class="greyText">Etape 2</p>
                                    <div id="autocomplete-container13" class="w100">
                                        <input type="text" placeholder="etape" name="locationAdd2" id="locationAdd2"
                                            value="<?= $depart2; ?>" class="input my-3 py-5 isEmpty">
                                    </div>
                                    <div class="hmid2">
                                        <div class="control has-icons-left">
                                            <p for="heure" class="greyText mb-3">Heure d'arrivée estimée étape 2</p>
                                            <span class="icon is-small is-left mt-3">
                                                <i class="fa-regular fa-clock"></i></span>
                                            <input type="time" name="h-mid2" id="h-mid2" class="input is-medium h-mid2"
                                                placeholder="Heure" value="<?php if($hour2!=NULL){echo $hour2.":".$min2;} ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- <button type="button" class="addTrajet addNbLocation">
                                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.5 0C12.876 0.0557868 8.45719 1.91744 5.18731 5.18731C1.91744 8.45719 0.0557868 12.876 0 17.5C0.0557868 22.124 1.91744 26.5428 5.18731 29.8127C8.45719 33.0826 12.876 34.9442 17.5 35C22.124 34.9442 26.5428 33.0826 29.8127 29.8127C33.0826 26.5428 34.9442 22.124 35 17.5C34.9442 12.876 33.0826 8.45719 29.8127 5.18731C26.5428 1.91744 22.124 0.0557868 17.5 0ZM27.5 18.75H18.75V27.5H16.25V18.75H7.5V16.25H16.25V7.5H18.75V16.25H27.5V18.75Z"
                                            fill="#D41E45" />
                                    </svg>
                                </button> -->
                            </div>
                        </div>
                        <div class="mx-auto">
                            <button class="button redBtn mt-5" name="action" value="newTrajet">
                                <p>mettre à jour</p>
                            </button>
                        </div>
                        <input id="gpsCo1" type="text" value="" name="gpsCo1" class="gpsCo1 dsn">
                <input id="gpsCo2" type="text" value="" name="gpsCo2" class="gpsCo2 dsn">
                <input id="gpsCo3" type="text" value="" name="gpsCo3" class="gpsCo3 dsn">
                    </form>
                </div>

                

                <span class="addTrajet dsn"></span>
                <!-- arbois -->
                <div class="gps1Php dsn" name="gps1Php"> <?= $gps1; ?> </div>
                <div class="gps2Php dsn" name="gps2Php"> <?= $gps2; ?> </div>
                <div class="gps3Php dsn" name="gps3Php"> <?= $gps3; ?> </div>

            </main>

            <script src="assets/js/geoapify.js"></script>
            <script src="assets/js/app.js"></script>
</body>

</html>