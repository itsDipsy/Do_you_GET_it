<?php
    $filename = "users.json";
    if(file_exists($filename)){
        $users = json_decode(file_get_contents($filename), true);
        
        if($_SERVER["REQUEST_METHOD"] === "GET"){   
            if(array_key_exists("id", $_GET)){
                foreach($users as $user){
                    if($user["id"] == $_GET["id"]){
                        header("Content-Type: application/json");
                        echo json_encode($user, true);
                        exit();
                    }
                    if($user["id"] === null){ // Jag vill fixa så att man skriver ut något om användaren inte finns
                        echo "the user does not exits";
                    }
                }
            }
        }
            
    }
?>


