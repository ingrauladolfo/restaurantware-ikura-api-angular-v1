<?php
  $allowed_methods = ["post", "get", "put", "delete"];

  //GET Variables
  $allowed_variables['get'] = ['useraccessid'];
  $required_variables['get'] = [];

  // POST Variables
  $allowed_variables['post'] = ['accessgroupid','userid'];
  $required_variables['post'] = ['accessgroupid','userid'];

  // PUT Variables
  $allowed_variables['put'] = ['accessgroupid','userid', 'useraccessid'];
  $required_variables['put'] = ['useraccessid', 'email','accessgroupid','userid'];

  // DELETE Variables
  $allowed_variables['delete'] = ['useraccessid'];
  $required_variables['delete'] = ['useraccessid'];
