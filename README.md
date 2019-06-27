# Drupal 8 Custom module 101

<p>During my internship at Doghouse Agency Perth, Me and my fellow interns instructed to create a Drupal 8 fictitious website for a Pet Site to improve our skills in web development. I struggle on starting my project not knowing how Drupal or should I say a CMS work. </p>

<p>CMS takes care most of the back end stuff and let's you focus on creating and designing the content to save time in development. Thus, you need to make a solid plan before appraoching the project.</p>

## Files for creating custom module in Drupal 8

1. info.yml
2. routing.yml
3. Controller class
4. A method from Controller class that returns a response
5. 

## Steps for creating custom module for Drupal 8

1. Create your_module_name.info.yml file into the root of your module directory 
2. Create your_module_name.routing.yml file into the root of your module directory
3. Create a Controller class for the route and a method that returns a response
4. Create a service for code modularity


## Base theme: Omega theme
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

## Content types

### Animals
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