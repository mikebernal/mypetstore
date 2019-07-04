# Drupal 8 Pet store

## Introduction

<p>During my internship at Doghouse Agency Perth, Me and my fellow interns instructed to create a Drupal 8 fictitious website for a Pet Site to improve our skills in web development. At first, I struggle on starting my project not knowing how Drupal or should I say a CMS work. </p>

<p>CMS takes care most of the back end stuff and let's you focus on creating and designing the content to save time in development. Thus, you need to make a solid plan before appraoching the project.</p>

<p>Here I will show you the necessary files in order to build a simple Drupal 8 site. I am using a Omega subtheme which is created using the Generator from Omega theme.</p>

## Prerequisite

1. Vagrant
2. Cmder that supports git
3. Virtual Box
4. IDE
5. Geerlingguy's DRUPAL VM

## Files for creating custom module

1. info.yml
2. routing.yml
3. Controller class
4. A method from Controller class that returns a response

## Steps for creating custom module for Drupal 8

1. Create your_module_name.info.yml file into the root of your module directory 
2. Create your_module_name.routing.yml file into the root of your module directory
3. Create a Controller class for the route and a method that returns a response
4. Create a service for code modularity

## Drupal modules:

1.  webform
2.  page_manager
3.  displaysuite
4.  pathauto
5.  voting api
6.  vote_up_down
7.  better_exposed_filters
8.  contact_storage
9.  pet store friend
10. responsive image
11. devel
12. admin toolbar
13. telephone
14. block class
15. field group

## Content types

#### Animals
1. title(default)
2. image
3. type(list)
4. body(default)
5. care instructions
6. this pet is great for people who

#### News
1. title(default)
2. image
3. posted_at
4. body(default)

## Custom module

1. Pet store friends 
   1. path '/friends-articles'
   2. block 'latest'

## UI components

1. Navigation
2. Hero
3. Introduction
4. Browse animals
5. Pet news
6. Remote articles