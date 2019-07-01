<?php

namespace Drupal\pet_store_friend\Services;

use Drupal\Component\Serialization\Json;
/**
 * RemoteArticles Class Service  
 * 
 */
class RemoteArticles 
{
  /**
   * @var \GuzzleHttp\Client
   */
  protected $client;
  /**
   * RemoteArticles constructor.
   *
   * @link https://jsonplaceholder.typicode.com as source
   * 
   * @param $http_client_factory \Drupal\Core\Http\ClientFactory
   */
  public function __construct($http_client_factory) {
    $this->client = $http_client_factory->fromOptions([
      'base_uri' => 'https://jsonplaceholder.typicode.com/',
    ]);
  }
  /**
   * Get the latest article which id is 100
   *
   * 
   * @return array to block
   */
  public function getLatest() 
  {
    $response = $this->client->get('posts/100');

    return Json::decode($response->getBody());
  }

  /**
   * Get all articles
   * 
   * /posts	100 posts
   * 
   * @return array to ArticleController class path 'friends-articles'
   */
  public function getArticles() 
  {
    $response = $this->client->get('posts/');

    return Json::decode($response->getBody());
  }
}