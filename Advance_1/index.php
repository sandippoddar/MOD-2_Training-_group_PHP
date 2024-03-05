<?php

    /* Function For getting the array format of API using php curl */

    function callApi($url) {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        return $data;
    }

    /* Created Class. */

    class Task {
        public $id;
        public $fieldImage;
        public $fieldService;
        public $alias;
        public $serviceTitle;
        public $iconArray;
        function __construct($id, $fieldService, $fieldImage, $alias, $serviceTitle, $iconArray) {
            $this -> id = $id;
            $this -> serviceTitle = $serviceTitle;
            $this -> fieldService = $fieldService;
            $this -> fieldImage = $fieldImage;
            $this -> alias = $alias;
            $this -> iconArray = $iconArray;
        }
        public function getArrayLength() {
            return count($this -> iconArray);
        }
    }
    $fieldArray = array();
    $data = callApi('https://www.innoraft.com/jsonapi/node/services');

    for ($i = 0; $i < count($data['data']); $i++) {
        if ($data['data'][$i]['attributes']['field_services']['value'] != NULL && $i > 11) {
            $iconArray = array();
            $id = $i;
            $title = $data['data'][$i]['attributes']['title'];
            $serviceTitle = $data['data'][$i]['attributes']['field_secondary_title']['value'];
            $fieldService = ($data['data'][$i]['attributes']['field_services']['value']);
            $fieldImage = 'https://www.innoraft.com' . callApi($data['data'][$i]['relationships']['field_image']['links']['related']['href'])['data']['attributes']['uri']['url'];
            $alias = 'https://www.innoraft.com' . $data['data'][$i]['attributes']['path']['alias'];

            $fieldIconCall1 = callApi($data['data'][$i]['relationships']['field_service_icon']['links']['related']['href']);
            for($icon = 0; $icon < count($fieldIconCall1['data']); $icon++) {
                $fieldIconCall2 = callApi($fieldIconCall1['data'][$icon]['relationships']['field_media_image']['links']['related']['href']);
                $iconEle = 'https://www.innoraft.com' . $fieldIconCall2['data']['attributes']['uri']['url'];
                $iconArray[] = $iconEle; 
            }

            $ob = new Task($id, $fieldService, $fieldImage, $alias, $serviceTitle, $iconArray);
            $fieldArray[] = $ob;
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
            <?php for($i = 0; $i < count($fieldArray); $i++) : ?>
                <?php if ($i % 2 == 0) : ?>
                    <div class = "container">
                        <div class = "left ele">
                            <div class = "title"><?php echo $fieldArray[$i] -> serviceTitle; ?></div>

                            <div class="image_div">
                                 <!-- Iterate for getting Image Icons. -->
                                <?php for($icon = 0; $icon < $fieldArray[$i] -> getArrayLength(); $icon++) : ?>
                                    <div class = "img-ele">
                                        <img src = "<?php echo $fieldArray[$i] -> iconArray[$icon]; ?>">
                                    </div>
                                <?php endfor; ?>
                            </div>

                            <div class = "fieldservice">
                                <?php echo $fieldArray[$i] -> fieldService; ?>
                            </div>

                            <button><a href = "<?php echo $fieldArray[$i] -> alias; ?>">Explore More</a></button>
                        </div>

                        <div class = "right ele">
                            <img src = "<?php echo $fieldArray[$i] -> fieldImage; ?>">
                        </div>
                    </div>

                    <?php else : ?>
                        <div class = "container">
                            <div class = "right ele">
                                <img src = "<?php echo $fieldArray[$i] -> fieldImage; ?>">
                            </div>

                            <div class = "left ele">
                                <div class = "title"><?php echo $fieldArray[$i] -> serviceTitle; ?></div>

                                <div class = "image_div">
                                    <?php for($icon = 0; $icon < $fieldArray[$i] -> getArrayLength(); $icon++) : ?>
                                        <div class = "img-ele">
                                            <img src = "<?php echo $fieldArray[$i] -> iconArray[$icon]; ?>">
                                        </div>
                                    <?php endfor; ?>
                                </div>

                                <div class = "fieldservice">
                                    <?php echo $fieldArray[$i] -> fieldService; ?>
                                </div>

                                <button><a href = "<?php echo $fieldArray[$i] -> alias; ?>">Explore More</a></button>
                            </div>
                        </div>
                <?php endif; ?>
            <?php endfor; ?> 
    </section>
</body>
</html>
