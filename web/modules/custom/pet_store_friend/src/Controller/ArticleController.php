<?php

  namespace Drupal\pet_store_friend\Controller;

  class ArticleController {
 
    private $url;
    private $json;
    private $data;
    private $len;
    private $articles;

    public function __construct() {
      $this->url      = 'https://jsonplaceholder.typicode.com/posts';
      $this->json     = file_get_contents($this->url);
      $this->data     = json_decode($this->json, TRUE);
      $this->len      = count($this->data);
      $this->articles = array_slice($this->data, ($this->len - 10), $this->len);

    }

    public function getArticles() {

      arsort($this->articles);

      return array(
        '#theme' => 'article_list',
        '#items' => $this->articles,
        '#title' => 'Friends pet blog'
      );

    }

  }