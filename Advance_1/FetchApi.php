<?php

  require 'vendor/autoload.php';
  /**
   * 
   * class API.
   * 
   * This class represents to fetch the json API.
   * 
   */

  class FetchApi
  {

    /**
     * 
     * @var string @url.
     * 
     *  Stores the URL of Given Json API.
     * 
     */

    public $url;

    /**
     * 
     * Constructor of class FetchApi.
     * 
     * @param string @url.
     * 
     * Initialize the Instance $url.
     * 
     */

    function __construct($url)
    {
      $this->url = $url;
    }

    /**
     * 
     * Fnuction callApi().
     * 
     * Return Array format of given JSON API.
     * 
     * @return array.
     * 
     */

    public function callApi()
    {
      $client = new GuzzleHttp\Client();
      $response = $client->request('GET', $this->url);
      $data = json_decode($response->getBody(), TRUE);
      return $data;
    }
  }

?>
