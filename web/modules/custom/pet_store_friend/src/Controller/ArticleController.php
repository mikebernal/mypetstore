<?php

namespace Drupal\pet_store_friend\Controller;

use Drupal\pet_store_friend\Services\RemoteArticles;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * ArticleController class for path 'friends-articles'
 */
class ArticleController extends ControllerBase 
{
  /**
   *
   * @var RemoteArticles
   */
  protected $articles;
  /**
   *
   * @param $articles \Drupal\pet_store_friend\Services\RemoteArticles
   *
   * Instantiate $articles
   */
  public function __construct(RemoteArticles $articles) 
  {
    $this->articles = $articles;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) 
  {
    // Fetch service from container
    $articles = $container->get('pet_store_friend.fetch_articles');
    return new static($articles);
  }
  /**
   * Returns render array
   * 
   * @return array
   */
  public function renderArray() 
  {
    return [
      '#theme' => 'article_list',
      '#items' => $this->articles->getArticles(),
      '#title' => 'Friends pet blog',
    ];
  }

}