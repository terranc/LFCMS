<?php
$branch = $_GET['branch'];
if(empty($branch)) $branch = 'master';
var_dump("cd " . $_SERVER['DOCUMENT_ROOT'] . " && git reset --hard HEAD && git pull origin $branch;");
$output = shell_exec("cd " . $_SERVER['DOCUMENT_ROOT'] . " && git reset --hard HEAD && git pull origin " . $branch . ";");
die($output . " done " . mktime());
