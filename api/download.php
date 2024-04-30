<?php

// require_once "./admin_session_guard.php";
require_once "./lib.php";

pg_prepare($db, "select_all_participants_query", "SELECT * FROM participants;");

function download_records()
{
  global $db;

  $stdout = fopen("php://output", 'w');

  $query_result = pg_execute($db, "select_all_participants_query", array());

  if ($query_result == false) {
    redirect("/?variant=failure&msg=Failed+to+query+db");
  }

  $rows = pg_fetch_all($query_result);

  header('Content-Description: File Transfer');
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename=participants.csv');
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  // header('Content-Length: ' .filesize("php://output"));

  foreach ($rows as $row) {
    fputcsv($stdout, $row);
  }

  fclose($stdout);
}

download_records();
// redirect("/admin");
