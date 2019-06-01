<?php

namespace Drupal\my_block_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "my_block_example_block",
 *   admin_label = @Translation("My block"),
 * )
 */
class MyBlock extends BlockBase {
  
  public function build() {

    $data     = file_get_contents('https://jsonplaceholder.typicode.com/posts');
    $articles = json_decode($data, TRUE);
    $latest   = end($articles);

    return [
      '#theme' => 'article_list',
      '#items' => $latest,
      '#title' => 'Friends pet blog'
    ];
  }

}