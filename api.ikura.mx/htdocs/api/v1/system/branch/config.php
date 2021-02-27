<?php
  $allowed_methods = ["post", "get", "put", "delete"];
  
  //GET Variables
  $allowed_variables['get'] = ['branchid'];
  $required_variables['get'] = [];

  // POST Variables
  $allowed_variables['post'] = ['calle', 'numero', 'local', 'cp', 'ciudad', 'estado', 'telefono'];
  $required_variables['post'] = ['calle', 'numero', 'cp', 'ciudad', 'estado', 'telefono'];

  // PUT Variables
  $allowed_variables['put'] = ['calle', 'numero', 'local', 'cp', 'ciudad', 'estado', 'telefono','branchid'];
  $required_variables['put'] = ['calle', 'numero', 'local', 'cp', 'ciudad', 'estado', 'telefono','branchid' ];

  // DELETE Variables
  $allowed_variables['delete'] = ['branchid'];
  $required_variables['delete'] = ['branchid'];