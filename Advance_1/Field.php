<?php

require 'FetchApi.php';
class Field {

  /**
   * 
   * @var int
   * 
   * Store Id of Field.
   * 
   */

  private $id;

  /**
   * @var string.
   * 
   * Store Link of the Image Field.
   *  
   */

  private $fieldImage;

  /**
   * 
   * @var string.
   * 
   * Store list of the Field Services in HTML Format.
   * 
   */

  private $fieldService;

  /**
   * 
   * @var string.
   * 
   * Store link of the Explore More button. 
   * 
   */

  private $alias;

  /**
   * 
   * @var string.
   * 
   * Store Title of the Field in HTML format.
   * 
   */

  private $serviceTitle;

  /**
   * 
   * @var array.
   * 
   * Stores an array of Icons of the Field.
   * 
   */

  private $iconArray;

  /**
   * 
   * Constructor of class Field.
   * 
   * Initialize the instance variables of class Field
   * when object of this class is created.
   * 
   * @param int 
   * Store Id of field object.
   * 
   * @param string.
   * Store list of the Field Services in HTML Format.
   * 
   * @param string.
   * Store Link of the Image Field.
   * 
   * @param string.
   * Store link of the Explore More button. 
   * 
   * @param string.
   * Store list of Field services in HTML format.
   * 
   * @param array.
   * Store array of icons of field object.
   * 
   */

  function __construct($id, $fieldService, $fieldImage, $alias, $serviceTitle, $iconArray) {
    $this->id = $id;
    $this->serviceTitle = $serviceTitle;
    $this->fieldService = $fieldService;
    $this->fieldImage = $fieldImage;
    $this->alias = $alias;
    $this->iconArray = $iconArray;
  }

  /**
   * 
   * Function to return Id of Field object. 
   * 
   * @return int.
   */

  public function getId() {
    return $this->id;
  }

  /**
   * 
   * Function to return Field Title.
   * 
   * @return string.
   * 
   */

  public function getServiceTitle() {
    return $this->serviceTitle;
  }

  /**
   * 
   * Function to return List of Field services.
   * 
   * @return string.
   *  
   */

  public function getFieldService() {
    return $this->fieldService;
  }

  /**
   * 
   * Function to return link of
   * Explore More button. 
   * 
   * @return string.
   * 
   */

  public function getAlias() {
    return $this->alias;
  }

  /**
   * 
   * Function to return Link of Image field.
   * 
   * @return string.
   * 
   */

  public function getFieldImage() {
    return $this->fieldImage;
  }
  
  /**
   * 
   * Function to return Array of Icons.
   * 
   * @return array.
   * 
   */

  public function getIconArray() {
    return $this->iconArray;
  }

  /**
   * 
   * Function to return length of iconArray.
   * 
   * @return int.
   * 
   */

  public function getIconArrayLength() {
    return count($this->iconArray);
  }
}

/**
 * 
 * Function to return an Array of objects of class Field.
 * 
 * @return array.
 * 
 */

function fieldService () {
  $fieldArray = array();
  // Make a API call to fetch the Given JSON API.
  $data = (new FetchApi('https://www.innoraft.com/jsonapi/node/services')) -> callApi();

  for ($i = 0; $i < count($data['data']); $i++) {

    if ($data['data'][$i]['attributes']['field_services']['value'] != NULL && $i > 11) {
      $iconArray = [];
      $link = 'https://www.innoraft.com';
      // Store the title of Field.
      $serviceTitle = $data['data'][$i]['attributes']['field_secondary_title']['value'];
      // Store list of Field Services in string.
      $fieldService = ($data['data'][$i]['attributes']['field_services']['value']);
      //Store link of Image of Field in string.
      $fieldImage = $link . (new FetchApi($data['data'][$i]['relationships']['field_image']['links']['related']['href'])) -> callApi()['data']['attributes']['uri']['url'];
      // Store link of 'Explore More' button.
      $alias = $link . $data['data'][$i]['attributes']['path']['alias'];
      // Make a API call to fetch another API to get iamge Icons.
      $fieldIconCall1 = (new FetchApi($data['data'][$i]['relationships']['field_service_icon']['links']['related']['href'])) -> callApi();

      for ($icon = 0; $icon < count($fieldIconCall1['data']); $icon++) {
        // Make another API call to fetch Image Icons.
        $fieldIconCall2 = (new FetchApi($fieldIconCall1['data'][$icon]['relationships']['field_media_image']['links']['related']['href'])) -> callApi();
        $iconEle = $link . $fieldIconCall2['data']['attributes']['uri']['url'];
        $iconArray[] = $iconEle; 
      }
      // Create an object of Field class.
      $ob = new Field($i, $fieldService, $fieldImage, $alias, $serviceTitle, $iconArray);
      $fieldArray[] = $ob;
    }
  }
  
  return $fieldArray;
}

?>
