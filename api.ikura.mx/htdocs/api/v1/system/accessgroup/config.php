<?php
  $allowed_methods = ["post", "get", "put", "delete"];

  //GET Variables
  $allowed_variables['get'] = ['accessgroupid'];
  $required_variables['get'] = [];

  // POST Variables
  $allowed_variables['post'] = ['name'];
  $required_variables['post'] = ['name'];

  // PUT Variables
  $allowed_variables['put'] = ['name', 'accessgroupid'];
  $required_variables['put'] = ['accessgroupid', 'name'];

  // DELETE Variables
  $allowed_variables['delete'] = ['accessgroupid'];
  $required_variables['delete'] = ['accessgroupid'];
