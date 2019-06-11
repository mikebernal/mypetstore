<!-- <?php

namespace Drupal\remote_articles\Plugin\Block;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Block\BlockBase;

/**
 * Remote articles
 *
 * @Block(
 *   id = "remote_articles_block",
 *   admin_label = @Translation("Remote articles")
 * )
 */
class RemoteArticles extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    /** @var \GuzzleHttp\Client $client */
    $client = \Drupal::service('http_client_factory')->fromOptions([
      'base_uri' => 'https://jsonplaceholder.typicode.com/',
    ]);

    $response = $client->get('posts/');

    remote_articles = Json::decode($response->getBody());
    $items = [];

    foreach (remote_articles as $remote_article) {
      $items[] = $remote_article['body'];
    }

    return [
      '#theme' => 'item_list',
      '#items' => $items,
    ];
  }

} -->