<?php

require_once('function_cmd1.php');
require_once('function_cmd2.php');
require_once('function_env.php');

$line = 0;
$cmd = array(
	     'pwd' => 'get_path',
	     'ls' => 'my_ls',
	     'cat' => 'my_cat',
	     'cd' => 'my_cd',
	     'env' => 'get_env',
	     'unset' => 'unset_env'
	     );

while ($line !== "exit")
  {
    echo "$> ";
    $line = trim(readline());
    $input = explode(" ", $line);
    $args = count($input);
    var_dump($input);
    
    if ($input[0] === "echo")
      my_echo($line);
    else 
      {
	foreach ($input as $space => $empty_string)
	 if ($empty_string === "")
	   unset($input[$space]);
	$input = array_values($input);
	if ($input[0] === "putenv")
	  set_env($input[1], $input[2]);
	else if ($cmd[$input[0]] && $args === 1)
	  $cmd[$input[0]]('.');
	else if ($cmd[$input[0]] && $args > 1)
	  $cmd[$input[0]]($input[1]);
	else
	  echo  "'" . $line . "'" . " " . "N'est pas une commande valide\n";
      }
  }