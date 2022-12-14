<?php
// session_start();

class Routes extends Dbh {

    protected function showRoutes($req,$value,$original_location,$original_arrival,$original_date){
        $request = implode(" ", $req);
        $stmt = $this->connect()->prepare('SELECT * FROM trajet INNER JOIN utilisator ON trajet.id_utilsateur = utilisator.id_user  WHERE 1 '.$request.' ORDER BY routehours ASC');

        $resultat = $stmt->execute($value);
        $stmt->debugDumpParams();

        if($resultat==false){
            $stmt = null; //delete the statement
            header("location: ../../confirmation.php?action=stmtFailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = null;
            header("location: ../../confirmation.php?action=0rowcounts");
            exit();
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "after fetch all";
        $rc = $stmt->rowCount();
        // session_start();
        for ($i=0; $i < $rc ; $i++) { 

            $_SESSION["original_location"] = $original_location;
            $_SESSION["original_arrival"] = $original_arrival;
            $_SESSION["original_date"] = $original_date;
            $_SESSION["cal_search".$i] = $user[$i]["calendar"];
            $_SESSION["depart_search".$i] = $user[$i]["depart"];
            $_SESSION["depart1_search".$i] = $user[$i]["depart1"];
            $_SESSION["depart2_search".$i] = $user[$i]["depart2"];
            $_SESSION["arriver_search".$i] = $user[$i]["arriver"];
            $_SESSION["routetype_search".$i] = $user[$i]["routetype"];
            $_SESSION["time_search".$i] = $user[$i]["routehours"];
            $_SESSION["time_step1_search".$i] = $user[$i]["step_hour_1"];
            $_SESSION["time_step2_search".$i] = $user[$i]["step_hour_2"];
            $_SESSION["time_final_search".$i] = $user[$i]["final_hour"];
            $_SESSION["place_search".$i] = $user[$i]["guest"];
            $_SESSION["avatar_search".$i] = $user[$i]["avatar"];
            $_SESSION["bio_search".$i] = $user[$i]["bio"];
            $_SESSION["pseudo_search".$i] = $user[$i]["pseudo"];
            $_SESSION["route_id".$i] = $user[$i]["id_trajet"];
            $_SESSION["route_id_owner".$i] = $user[$i]["id_user"];

            $ex = $_SESSION["cal_search".$i];
            $ex1 = $_SESSION["original_location"];
            $ex2 = $_SESSION["original_arrival"];
            $ex3 = $_SESSION["original_date"];
        }
        $_SESSION["rc_search"] = $rc;

        $stmt = null;

        }
}