<?php

namespace Drupal\pet_store_friend\Controller;

use Drupal\pet_store_friend\Services\RemoteArticles;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * ArticleController
 */
class ArticleController extends ControllerBase 
{
  private $articles;

  public function __construct(RemoteArticles $articles) 
  {
    $this->articles = $articles;
  }

  public static function create(ContainerInterface $container) 
  {
    $articles = $container->get('pet_store_friend.fetch_articles');
    return new static($articles);
  }

  public function renderArray() 
  {
    return [
      '#theme' => 'article_list',
      '#items' => $this->articles->getArticles(),
      '#title' => 'Friends pet blog',
    ];
  }

}