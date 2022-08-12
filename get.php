<?php
$db = mysqli_connect("localhost", "root", "", "mathsolver");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
function curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
$solve = $_GET["input"];
$send = curl("http://api.wolframalpha.com/v2/query?appid=LYP6W3-AAYW45TYQU&input=" . urlencode($solve));
date_default_timezone_set('Asia/Kuala_Lumpur');
$time = date("Y-m-d H:i:s");

$data = simplexml_load_string($send);
if ($data->attributes()["success"] == "true") {
    $insert = "INSERT INTO query (id, query, time) VALUES (0, '$solve', '$time')";
    mysqli_query($db, $insert);
    $prop = $data->pod;
    foreach ($prop as $dt) {
        echo '<h6 class="mb-2 ms-3">' . $dt->attributes()["title"] . '</h6>';
        echo '<img class="mb-2 ms-3" style="max-width: 300px;" src="' . $dt->subpod->img->attributes()["src"] . '">';
        echo "<hr>";
    }
    $querytotal = 'SELECT * FROM query';
    $total = mysqli_num_rows(mysqli_query($db, $querytotal));
    echo '<p style="color: #48a1ff;" id="total" class="text-center">Answered question : ' . $total . '</p>';
    echo '<p style="color: #48a1ff;" class="text-center">Powered by Wolframalpha</p>';
} else {
    echo '<h6 class="ms-3">' . "I can't understand your question" . "</h6>";
}
