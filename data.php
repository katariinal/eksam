<?php
    //kõik, mis on seotud andmetabelitega, lisamine ja tabeli kujul esitamine
    require_once("functions.php");
    
    //kui kasutaja on sisse logitud, suuna teisele lehele
    //kontrollin, kas sessiooni muutuja on olemas 
    if(!isset($_SESSION['logged_in_user_id'])){
        header("Location: login.php");
    }
    
    //aadressireale tekkis ?logout=1
    if(isset($_GET["logout"])){
        //kustutame sessiooni muutujad
        session_destroy();
        header("Location: login.php");
    }
    
    //muutuja väärtused
    $car_plate = $mark = $year = $person_id = $m = "";
    $car_plate_error = $mark_error = $year_error = $person_id_error = "";
    //echo $_SESSION['logged_in_user_id'];
    

     //valideeri väljad
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        
            if(isset($_POST["add_car_plate"])){
                
                if ( empty($_POST["car_plate"]) ) {
                    $car_plate_error = "Auto nr on kohustuslik!";
                }else{
       
				$car_plate = cleanInput($_POST["car_plate"]);
			}
            if ( empty($_POST["mark"]) ) {
                   $mark_error = "Mark";
                }else{
       
				$mark = cleanInput($_POST["mark"]);
			}
			if ( empty($_POST["year"]) ) {
                   $year_error = "Aasta";
                }else{
       
				$year = cleanInput($_POST["year"]);
			}
			if ( empty($_POST["person_id"]) ) {
                   $person_id_error = "Isikukood";
                }else{
       
				$person_id = cleanInput($_POST["person_id"]);
			}
            
            //erroreid ei olnud, käivitan funktsiooni, mis sisaldab andmebaasi
            
            if($car_plate_error == "" && $mark_error == "" && $year_error == "" && $person_id_error == ""){
                //m on message, mille saadame function.php failist
                $m = createCarPlate($car_plate, $mark, $year, $person_id);
                if($m != ""){
                    //teeme vormi tühjaks
                    $car_plate = "";
                    $mark = "";
					$year = "";
					$person_id = "";
                }
            }
            
        }
    }
        
    function cleanInput($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
    }
    
    //küsime tabeli kujul andmed
    getAllData();
    
    
?>

Tere, <?=$_SESSION['logged_in_user_email'];?> <br><a href="?logout=1">Logi välja</a>

<h2>Lisa uus</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
    <label> Auto nr </label>
  	<input id="car_plate" name="car_plate" type="text"  value="<?=$car_plate;?>"> <?=$car_plate_error; ?><br><br>
    <label> Mark </label>
  	<input id="mark" name="mark" type="text" value="<?=$mark; ?>"> <?=$mark_error; ?><br><br>
	<label> Väljalaskeaasta </label>
  	<input id="year" name="year" type="text" value="<?=$year; ?>"> <?=$year_error; ?><br><br>
	<label> Isikukood</label>
  	<input id="person_id" name="person_id" type="text" value="<?=$person_id; ?>"> <?=$person_id_error; ?><br><br>
	
  	<input type="submit" name="add_car_plate" value="Lisa">
    <p style="color:green;"><?=$m;?></p>
  </form>
  
  <p><a href="table.php">Andmed</a></p>