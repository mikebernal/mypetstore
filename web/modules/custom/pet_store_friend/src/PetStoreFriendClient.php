<?php
/**
 *{@inheritdoc}
 */
namespace Drupal\pet_store_friend;

use Drupal\Component\Serialization\Json;

class PetStoreFriendClient {

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
   * Get articles
   *
   * @return array
   */
  public function random() {
    $response = $this->client->get('posts/');

    return Json::decode($response->getBody());
  }

}