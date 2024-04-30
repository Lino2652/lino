<?php

require_once '../vendor/autoload.php';
require_once './lib.php';

use Respect\Validation\Validator as v;

pg_prepare($db, "insert_participant_query", "INSERT INTO participants
  (full_name, phone_number, reg_no, level, email)
  VALUES
  ($1, $2, $3, $4, $5);
");

function processForm(string $full_name, string $phone_number, string $reg_no, string $level, string $email)
{
  global $db;
  $query_result = pg_execute($db, "insert_participant_query", array($full_name, $phone_number, $reg_no, $level, $email));

  if ($query_result == false) {
    redirect("/?variant=failure&msg=Failed+to+save+details");
  }
}

$form_validator =
  v::key('full_name', v::stringType())
  ->key('phone_number', v::stringType())
  ->key('reg_no', v::stringType())
  ->key('level', v::stringType())
  ->key('email', v::stringType());

$is_valid = $form_validator->validate($_POST);

if ($is_valid) {
  processForm($_POST["full_name"], $_POST["phone_number"], $_POST["reg_no"], $_POST["level"], $_POST["email"]);
  redirect("/?variant=success&msg=Registration+successful");
} else {
  redirect("/?variant=failure&msg=Invalid+form+details");
}
