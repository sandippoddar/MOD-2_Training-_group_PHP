<?php

class Field {

  /**
   * @var int
   *  Store Id of Field.
   */
  private $id;

  /**
   * @var string. 
   *  Store Link of the Image Field.  
   */
  private $fieldImage;

  /**
   * @var string. 
   *  Store list of the Field Services in HTML Format.
   */
  private $fieldService;

  /**
   * @var string.
   *  Store link of the Explore More button. 
   */
  private $alias;

  /**
   * @var string.
   *  Store Title of the Field in HTML format.
   */
  private $serviceTitle;

  /**
   * @var array.
   *  Stores an array of Icons of the Field.
   */
  private $iconArray;

  /**
   * Initialize the instance variables of class Field when object of this class 
   * is created.
   * 
   * @param int 
   *  Store Id of field object.
   * @param string.
   *  Store list of the Field Services in HTML Format.
   * @param string.
   *  Store Link of the Image Field.
   * @param string.
   *  Store link of the Explore More button. 
   * @param string.
   *  Store list of Field services in HTML format.
   * @param array.
   *  Store array of icons of field object.
   */
  public function __construct($id, $fieldService, $fieldImage, $alias, $serviceTitle, $iconArray) {
    $this->id = $id;
    $this->serviceTitle = $serviceTitle;
    $this->fieldService = $fieldService;
    $this->fieldImage = $fieldImage;
    $this->alias = $alias;
    $this->iconArray = $iconArray;
  }

  /**
   * Function to return Id of Field object. 
   * 
   * @return int.
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Function to return Field Title.
   * 
   * @return string.
   */
  public function getServiceTitle() {
    return $this->serviceTitle;
  }

  /**
   * Function to return List of Field services.
   * 
   * @return string.
   */
  public function getFieldService() {
    return $this->fieldService;
  }

  /**
   * Function to return link of Explore More button. 
   * 
   * @return string.
   */
  public function getAlias() {
    return $this->alias;
  }

  /**
   * Function to return Link of Image field.
   * 
   * @return string.
   */
  public function getFieldImage() {
    return $this->fieldImage;
  }
  
  /**
   * Function to return Array of Icons.
   * 
   * @return array.
   */
  public function getIconArray() {
    return $this->iconArray;
  }

  /**
   * Function to return length of iconArray.
   * 
   * @return int.
   */
  public function getIconArrayLength() {
    return count($this->iconArray);
  }
}

?>
