<?php   
    $filename = "users.json";
    if(file_exists($filename)){
        $users = json_decode(file_get_contents($filename), true);
        if($_SERVER["REQUEST_METHOD"] === "GET"){   
            if(array_key_exists("email", $_GET)){
                if($_GET["email"] === "export"){
                    $data_for_emails_json = [];
                    foreach($users as $user){
                        $data_for_emails_json[] = $user["email"];
                    }
                    header("Content-Type: application/json");
                    echo json_encode($data_for_emails_json, true);
                }
            }
        }
    }
?>