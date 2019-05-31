<?php

  namespace Drupal\pet_store_friend\Controller;

  class ArticleController {
      
      public function __construct() {

      }

      public function articles() {

        $data     = file_get_contents('https://jsonplaceholder.typicode.com/posts');
        $articles = json_decode($data, TRUE);
        $len      = count($articles);
        $latest   = array_slice($articles, ($len - 10), $len);

        // Sort array into descening
        arsort($latest);
        $list = [];

        // Store sorted array into the new array
        foreach($latest as $post) {
          array_push($list, $post);
        }

        return array(
          '#theme'    => 'article_list',
          '#items'    => $list,
          '#title'    => 'Friends pet blog'
        );

      }

  }