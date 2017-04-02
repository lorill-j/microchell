<?php

function get_path()
{
  $path = getcwd();
  echo $path . "\n";
}

function my_cd($path)
{
  if (is_dir($path))
    chdir($path);
  else if (!file_exists($path))
    echo $path . " : Don't exist\n";
  else if (!is_dir($path))
    echo $path . " : Is a file Not a directory\n";
}
