<?php

namespace Drupal\pet_store_friend\Plugin\Block;

use Drupal\pet_store_friend\Services\RemoteArticles;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Fetch latest article from friends website.
 *
 * @Block(
 *   id = "latest_article",
 *   admin_label = @Translation("Latest"),
 *   category = @Translation("Pet store friend"),
 * )
 */
class Latest extends BlockBase implements ContainerFactoryPluginInterface 
{
  private $article;
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RemoteArticles $article) 
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->article = $article;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) 
  {
    // $article = $container->get('pet_store_friend.fetch_articles');
    // return new static($article);

    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('pet_store_friend.fetch_articles')
    );

  }
  /**
   * {@inheritdoc}
   */
  public function build() 
  {
    return [
      '#theme' => 'article_list',
      '#items' => $this->article->getArticles(),
      '#title' => 'Pet Store Friend Block',
    ];
  }
}