<?php

/**
* Adds an current_page_parent class to any post type and removes current_page_parent from main posts if needed
* Works on all custom post types
*/
function nav_parent_class($classes, $item) {
  //get URL
  $url = get_permalink();
  //Get URL without domain
  $url = str_replace( home_url(), "", $url );
  //Menu item
  $menu_url = $item->url;
  //split URL
  $gethost = parse_url($menu_url);

  //Split the URl at slashes
  $breakapart = explode('/', $gethost['path']);

  //Get first part of the string after the domain
  $path  = $breakapart['1'];

  //check it's not the hompage and that it's not a sub menu article
  if($path && empty($endofurl[2])){
    //add class if the url is contained inside the menu item
    if (strpos($url, $path) !== false) {
      $classes[] = 'current_page_parent';
    } else {
      //get array class then remove it
      $key = array_search('current_page_parent', $classes);

      if(in_array('current_page_parent', $classes)) {

        if (($key = array_search('current_page_parent', $classes)) !== false) {
          unset($classes[$key]);
        }
      }
    }
  }
  return $classes;
}
