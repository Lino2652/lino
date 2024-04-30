<?php

require '../vendor/autoload.php';

use Respect\Validation\Validator as v;

$form_data = v::key('full_name', v::stringType())
  ->key('phone_number', v::stringType())
  ->key('reg_no', v::stringType())
  ->key('level', v::stringType())
  ->key('email', v::stringType());

var_dump($form_data);
