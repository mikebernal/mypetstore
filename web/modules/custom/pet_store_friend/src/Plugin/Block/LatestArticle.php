<?php

namespace Drupal\pet_store_friend\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\pet_store_friend\Controller\ArticleController;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "my_block_example_block",
 *   admin_label = @Translation("Latest article"),
 * )
 */

class LatestArticle extends BlockBase {
  
  public function build() {

    $controller = new ArticleController();

    $article = $controller->getArticles();
    $recent  = reset($article['#items']);

    return array(
      '#theme' => 'article_list',
      '#items' => $recent,
      '#title' => 'Pet store friends',
    );

  }

}