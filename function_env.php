<?php

function get_env()
{
  phpinfo(16);
}

function set_env($varname, $content)
{
  if (putenv($varname . "=" . $content))
    echo $varname . "=" . $content . "Ajoute\n";
}

function unset_env($varname)
{
  if (putenv($varname))
    echo $varname . " " . "unset\n";
}
