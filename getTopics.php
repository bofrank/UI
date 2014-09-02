<?php

include "config.php"; 

$DB->Query("SELECT * FROM topicb.topics");

$result = $DB->get();

$dataFormated = array();

for($i=0;$i<count($result);$i+=3){

    $dataFormated[$i]['tapid'] = $result[$i]['tapid'];
    $dataFormated[$i]['topics']=array();

    for($j=$i;$j<$i+3;$j++){            
        $dataFormated[$i]['topics'][$j]['topic'] = $result[$j]['topic'];
        $dataFormated[$i]['topics'][$j]['category'] = $result[$j]['category'];
    }

    $dataFormated[$i]['state'] = $result[$i]['state'];


}

echo json_encode(fix_keys($dataFormated));

function fix_keys($array) {
    $numberCheck = false;
    foreach ($array as $k => $val) {
        if (is_array($val)){
            $array[$k] = fix_keys($val); //recurse
        }
        if(is_numeric($k)){
            $numberCheck = true;
        }
    }
    if($numberCheck === true){
        return array_values($array);
    } else {
        return $array;
    }
}

?>