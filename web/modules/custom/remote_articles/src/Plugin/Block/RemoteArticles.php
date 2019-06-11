<?php

namespace Drupal\remote_articles\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Remote articles
 *
 * @Block(
 *   id = "remote_articles_block",
 *   admin_label = @Translation("Remote articles")
 * )
 */
class RemoteArticles extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * @var \Drupal\remote_articles\RemoteArticlesClient
   */
  protected $remoteArticlesClient;

  /**
   * RemoteArticles constructor.
   *
   * @param array $configuration
   * @param $plugin_id
   * @param $plugin_definition
   * @param $remote_articles_client \Drupal\remote_articles\remoteArticlesClient
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, $remote_articles_client) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->remoteArticlesClient = $remote_articles_client;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('remote_articles_client')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $remote_articles = $this->remoteArticlesClient->random();
    $items = [];

    foreach ($remote_articles as $remote_article) {
      $items[] = $remote_article['body'];
    }

    return [
      '#theme' => 'item_list',
      '#items' => $items,
    ];
  }
}