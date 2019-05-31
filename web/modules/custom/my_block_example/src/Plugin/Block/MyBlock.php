<?php

namespace Drupal\my_block_example\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "my_block_example_block",
 *   admin_label = @Translation("My block"),
 * )
 */
class MyBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {

    $data     = file_get_contents('https://jsonplaceholder.typicode.com/posts');
    $articles = json_decode($data, TRUE);
    $latest   = end($articles);

    return array(
      '#markup'    => '<div class="pet-store-panel">
                         <div class="pet-store-panel__image">
                           <img src="https://picsum.photos/200/300" alt="latest post">
                         </div>
                         <div class="pet-store-panel__text">
                           <h2 class="pet-store-panel__heading">Pet store friends</h2>
                           <h3 class="pet-store-panel__subheading">Latest articles from my mates</h3>
                           <h3>' . $latest['title'] . '</h3><p>' . $latest['body'] . '</p>
                           <a href="https://jsonplaceholder.typicode.com/posts">Read more</a>
                         </div>
                       </div>'
       ); 

  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['my_block_settings'] = $form_state->getValue('my_block_settings');
  }
}