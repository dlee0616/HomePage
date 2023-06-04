<!DOCTYPE HTML>
<html lang = us-en>
<head>
<link rel = "stylesheet" href = "marklet.css">
</head>

<?php

function getFile($file) {
$result = file_get_contents($file);
$d_result = json_decode($result, true);
return $d_result;
}


function fileTable($result){
$table = '<table><tr><th>Name</th><th>Location</th><th>Room</th><th>Time</th><th>Performance</th></tr>';
for($i=0; $i <count($result); $i++){
    $table .=  "<tr><td>" . $result[$i]["name"].'</td>'.
                '<td>'.$result[$i]["location"].'</td>'.
                '<td>'.$result[$i]["room"].'</td>'.
                '<td>'.$result[$i]["time"].'</td>'.
                '<td>'.$result[$i]["performance"]."</td></tr>";
}
$table .= '</table>';
return $table;
}
function getName($performance){
    if ($performance == "duet"){
        return $_GET['first_name']." ".$_GET['last_name'].$_GET['first_name_2'].$_GET['last_name_2'];
    }
    else {
        return $_GET['first_name'].$_GET['last_name'];
    }
}
function main(){
    $file = "./data/piano.json";
    $result = getFile($file);
    
    $result[] = ['name' => getName($_GET['performance']),
    'location'=> $_GET['location'],
    'room'=> $_GET['room'],
    'time'=> $_GET['time_slot'],
    'performance' => $_GET['performance']." with ". $_GET['instrument']." ".$_GET['skill']];
    file_put_contents($file, json_encode($result)); 
    $table = fileTable($result);
    echo $table;
}

main();
?>

