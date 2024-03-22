<?php

  require 'vendor/autoload.php';
  use GuzzleHttp\Client;

  /**
   * This class represents to fetch the json API.
   */
  class FetchApi
  {

    /**
     * @var string @url.
     *  Stores the URL of Given Json API.
     */
    public $url;

    /**
     * Initialize the Instance $url.
     * 
     * @param string @url.
     */
    public function __construct($url)
    {
      $this->url = $url;
    }

    /**
     * Return Array format of given JSON API.
     * 
     * @return array.
     */
    public function callApi()
    {
      $client = new Client();
      $response = $client->request('GET', $this->url);
      $data = json_decode($response->getBody(), TRUE);
      return $data;
    }
  }

?>
