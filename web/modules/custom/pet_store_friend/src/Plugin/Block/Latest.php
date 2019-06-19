<?php

namespace Drupal\pet_store_friend\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Fetch latest article from friends website and display to block.
 *
 * @Block(
 *   id = "latest_article",
 *   admin_label = @Translation("Latest"),
 *   category = @Translation("Pet store friend"),
 * )
 */
class Latest extends BlockBase implements ContainerFactoryPluginInterface 
{
  /**
   *
   * @var \Drupal\pet_store_friend\Services\RemoteArticles
   */
  protected $article;
 /**
  * Latest constructor
  *
  * @param array $configuration
  * @param string $plugin_id
  * @param mixed $plugin_definition
  * @param RemoteArticles $article
  */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, $article) 
  {
    /**
     * @{@inheritdoc}
     */
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->article = $article;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) 
  {

  /**
   * {@inheritdoc}
   */
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
      '#items' => $this->article->getLatest(),
      '#title' => 'Pet Store Friend Block',
    ];
  }
}