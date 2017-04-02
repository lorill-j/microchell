<?php

function print_tab($ls)
{
  sort($ls);
  foreach ($ls as $file)
    echo $file;
}

function my_ls()
{
  $path = func_get_args();
  $path = array_shift($path);

  if ($content = opendir($path))
    {
      $ls = [];
      $i = 0;
      while ($file = readdir($content))
        {
          $substr = substr($file, 0,1);
          if (is_dir($file) && $substr !== ".")
            $ls[$i] = $file . "/" . "\n";
          else if (is_link($file) && $substr !== ".")
            $ls[$i] = $file . "@" ."\n";
          else if (!is_dir($file))
            $ls[$i] = get_extension($file, $ls);
          $i++;
        }
      print_tab($ls);
    }
}

function get_extension ($file)
{
  $exploded = explode(".", $file);
  $length = strlen($file);

  if (count($exploded) > 1)
    {
      $substr = substr($file, 0, 1);
      if ($substr !== ".")
	return ($file . "*" . "\n");
    }
  else
    return ($file . "\n");
}

function my_echo($str)
{
  $str = substr($str, 5);
  echo $str . "\n";
}

function my_cat($path)
{
  if (is_file($path) && file_exists($path))
    readfile($path);
  else if (is_dir($path))
    echo $path . " : Is a directory\n";
  else
    echo $path . " : Don't exist \n";
}
