<?php
 
$blurb = $_GET["blurb"];

$url = 'https://api.monkeylearn.com/api/v1/categorizer/cl_5icAVzKR/classify_text/';
$data = array('text' => $blurb);
//$data = array('text' => 'Marc Weiser: Entrepreneurship Is About Controlling Your Own Destiny.');
 
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n".
            "Authorization:token 825fe2c297e090d8c2b73a5adf0e17ee01a59b02\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$json_output = json_decode(trim($result),TRUE);
 
//echo "<script>var result=".$result['result']."</script>";
//$tempData = json_decode($result);

echo $result."\r\n";
//{"status_code": "200", "queries_left": 969, "result": [{"probability": 0.73, "label": "Food & Drink"}, {"probability": 0.346, "label": "Cooking"}], "consumed_queries": 1}

echo $json_output['result'][0]['label'];
//{

//echo $result[0];


?>