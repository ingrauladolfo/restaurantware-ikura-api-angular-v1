<?php
  $allowed_methods = ["post", "get", "delete"];
  
  // GET Variables
  $allowed_variables['get'] = ['session_key'];
  $required_variables['get'] = ['session_key'];

  // POST Variables
  $allowed_variables['post'] = ['email', 'password'];
  $required_variables['post'] = ['email', 'password'];

  // DELETE Variables
  $allowed_variables['delete'] = ['userid'];
  $required_variables['delete'] = ['userid'];