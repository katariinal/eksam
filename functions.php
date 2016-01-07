<?php
    //loome AB ühenduse
    /* 
        //config_global.php
        $servername = "";
        $server_username = "";
        $server_password = "";
    */   
    
    require_once("../config_global.php");

    $database = "if15_klinde";
    
    //paneme sessiooni serveris tööle, saame kasutada SESSION[]
    session_start();
    
    $mysqli = new mysqli($servername, $server_username, $server_password, $database);
    
    
    function createCar($car_number, $car_mark, $car_year){
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("INSERT INTO car_plates (user_id, number_plate , mark, year) VALUES (?,?,?)");
        //i - iser_id INT
        $stmt->bind_param("iss",  $_SESSION['logged_in_user_id'], $car_number, $car_mark, $car_year);
        
        $message = "";
        
        //kuiõnnestub, siis tõene, kui viga, siis else
        if($stmt->execute()){
            //õnnestus
            $message = "Edukalt andmebaasi salvestatud!";
        }


        $stmt->close();
		
        
        $mysqli->close();
        //saadan sõnumi tagasi 
        return $message;
       
    }
    
    function getAllData($keyword=""){
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, contest_name, name FROM contests");
		// küsi juurde tabelist, et ei oleks kirjet confirm tabelis JOIN (left, inner)
        $stmt->bind_result($id_from_db, $user_id_from_db, $contest_name_from_db, $name_from_db);
        $stmt->execute();
        //iga rea kohta, mis on andmebaasis, teeme midagi 
        while($stmt->fetch()){
            //saime andmed kätte
            //echo($contest_name_from_db);
            
        }
                $search = "";
        if($keyword == ""){
            //ei otsi
            $search = "%%";
        }else{
            //otsime
            $search = "%".$keyword."%"; 
        }
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        //deleted IS NULL ehk kustutab ära 
        $stmt = $mysqli->prepare("SELECT id, user_id, contest_name, name FROM contests WHERE deleted IS NULL AND (contest_name LIKe ? OR name LIKE ?)");
        $stmt->bind_param("ss", $search, $search);
        $stmt->bind_result($id_from_db, $user_id_from_db, $contest_name_from_db, $name_from_db);
        $stmt->execute();
  
        // iga rea kohta mis on ab'is teeme midagi
        
        $array = array(); 
        
        while($stmt->fetch()){
            
            //tühi objekt, kus hoiame väärtuseid
            $all_contest = new StdClass();
            $all_contest->id = $id_from_db;
            $all_contest->contest_name = $contest_name_from_db;
            $all_contest->user_id = $user_id_from_db;
            $all_contest->name = $name_from_db;
            
            array_push($array, $all_contest);

            
        }
        //saadan tagasi
        return $array;
        
        $stmt->close();
        $mysqli->close();
        $stmt->close();
        $mysqli->close();
    }
    
 ?>