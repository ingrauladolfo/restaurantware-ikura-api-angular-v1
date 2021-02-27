<?php
  $allowed_methods = ["post", "get", "put", "delete"];

  //GET Variables
  $allowed_variables['get'] = ['menuid'];
  $required_variables['get'] = [];

  // POST Variables
  $allowed_variables['post'] = ['name', 'price', 'category'];
  $required_variables['post'] = ['name', 'price', 'category'];

  // PUT Variables
  $allowed_variables['put'] = ['name', 'price', 'category', 'menuid'];
  $required_variables['put'] = ['menuid','name', 'price', 'category'];

  // DELETE Variables
  $allowed_variables['delete'] = ['menuid'];
  $required_variables['delete'] = ['menuid'];
