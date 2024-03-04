<?php

    $url = "https://www.innoraft.com/jsonapi/node/services";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);

   
    for ($i = 0; $i <= 16; $i++) {
       if ($data['data'][$i]['attributes']['field_services']['value'] != NULL && $i > 11) {
        echo $i." ";
        echo $data['data'][$i]['attributes']['title'];
        print_r($data['data'][$i]['attributes']['field_services']['value']);
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="left ele">
                <?php
                    echo $data['data'][12]['attributes']['title'];
                    print_r($data['data'][12]['attributes']['field_services']['value']);
                ?>
            </div>
            <div class="right ele">
                <img src="
                <?php
                    echo 'https://www.innoraft.com/sites/default/files/2020-07/img-2.jpg';
                ?>
                ">
            </div>
        </div>
    </section>
</body>
</html>
