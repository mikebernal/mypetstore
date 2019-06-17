<?php

namespace Drupal\pet_store_friend\Services;
/**
 * RemoteArticles
 */
class RemoteArticles 
{
  public function getArticles() 
  {
    $data     = file_get_contents('https://jsonplaceholder.typicode.com/posts');
    $articles = json_decode($data, true);

    return $articles;
  }
}