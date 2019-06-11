<?php
/**
 *{@inheritdoc}
 */
namespace Drupal\remote_articles;

use Drupal\Component\Serialization\Json;

class RemoteArticlesClient {

  /**
   * @var \GuzzleHttp\Client
   */
  protected $client;

  /**
   * RemoteArticlesClient constructor.
   *
   * @param $http_client_factory \Drupal\Core\Http\ClientFactory
   */
  public function __construct($http_client_factory) {
    $this->client = $http_client_factory->fromOptions([
      'base_uri' => 'https://jsonplaceholder.typicode.com/',
    ]);
  }

  /**
   * Get some random articles
   *
   * @return array
   */
  public function random() {
    $response = $this->client->get('posts/');

    return Json::decode($response->getBody());
  }

}