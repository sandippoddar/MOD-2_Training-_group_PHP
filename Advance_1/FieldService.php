<?php 
require_once 'FetchApi.php';
require_once 'Field.php';
class FieldService {
  public function FieldArray () {
    $FieldArr = [];
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
        $FieldArr[] = $ob;
      }
  }
  
  return $FieldArr;
  }
}
