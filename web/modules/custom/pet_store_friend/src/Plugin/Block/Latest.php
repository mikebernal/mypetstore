<?php

namespace Drupal\pet_store_friend\Plugin\Block;

use Drupal\pet_store_friend\Services\RemoteArticles;
use Drupal\Core\Block\BlockBase;
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
class Latest extends BlockBase 
{
  private $article;
  public function __construct(RemoteArticles $article) 
  {
    $this->article = $article;
  }

  public function create(ContainerInterface $container) 
  {
    $article = $container->get('pet_store_friend.fetch_articles');
    return new static($article);
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