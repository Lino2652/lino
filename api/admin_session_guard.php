<?php

session_start();
require_once "./lib.php";

if ($_SESSION["role"] !== "admin") {
  redirect("/");
}
