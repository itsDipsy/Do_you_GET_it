<?php 

$filename3 = "users.json";
if(file_exists($filename3)){
    
    $users3_php = json_decode(file_get_contents($filename3), true);
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        if(array_key_exists("knows", $_GET)){
            $below_age_data_array = []; 
            foreach($users2_php as $users2){
                for ($i=0; $i < count($users2["knows"]); $i++) { 
                    if($users2["knows"][$i] === intval($_GET["knows"])){
                        array_push($below_age_data_array, $users2);
                    }
                }
            }
            header("Content-Type: application/json");
            echo json_encode($below_age_data_array); 
        }
    }
}
?>