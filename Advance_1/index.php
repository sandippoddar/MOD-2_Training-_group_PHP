<?php

  require 'Field.php';
  $fieldArray = fieldService();
 
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link rel = "stylesheet" href = "./CSS/style.css">
</head>
<body>
  <?php for($i = 0; $i < count($fieldArray); $i++) : ?>
    <?php if ($i % 2 == 0) : ?>
      <section>
          <div class = "container">
            <div class = "left ele">
                <div class = "title"><?php echo $fieldArray[$i]->getServiceTitle(); ?></div>

                <div class="image_div">
                  <!-- Iterate for getting Image Icons. -->
                  <?php for($icon = 0; $icon < $fieldArray[$i]->getIconArrayLength(); $icon++) : ?>
                      <div class = "img-ele">
                        <img src = "<?php echo $fieldArray[$i]->getIconArray()[$icon]; ?>">
                      </div>
                  <?php endfor; ?>
                </div>

                <div class = "fieldservice">
                  <?php echo $fieldArray[$i]->getFieldService(); ?>
                </div>

                <button><a href = "<?php echo $fieldArray[$i]->getAlias(); ?>">Explore More</a></button>
            </div>

            <div class = "right ele">
                <img src = "<?php echo $fieldArray[$i]->getFieldImage(); ?>">
            </div>
          </div>
      </section>

      <?php else : ?>
          <section>
              <div class = "container">
                  <div class = "right ele">
                    <img src = "<?php echo $fieldArray[$i]->getFieldImage(); ?>">
                  </div>

                  <div class = "left ele">
                    <div class = "title"><?php echo $fieldArray[$i]->getServiceTitle(); ?></div>

                    <div class = "image_div">
                        <?php for($icon = 0; $icon < $fieldArray[$i]->getIconArrayLength(); $icon++) : ?>
                            <div class = "img-ele">
                              <img src = "<?php echo $fieldArray[$i]->getIconArray()[$icon]; ?>">
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class = "fieldservice">
                      <?php echo $fieldArray[$i]->getFieldService(); ?>
                    </div>

                    <button><a href = "<?php echo $fieldArray[$i]->getAlias(); ?>">Explore More</a></button>
                  </div>
              </div>
          </section>
    <?php endif; ?>
  <?php endfor; ?> 
</body>
</html>
