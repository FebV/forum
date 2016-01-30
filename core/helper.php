<?php 
function filter()
{
    foreach($_GET as $x)
    {
        if(strpos($x, '<script') != false)
            return false;
    }

    foreach($_POST as $x)
    {
        if(strpos($x, '<script') != false)
            return false;
    }
    return true; 
}


function csrf()
{
    $ran = rand();
    file_put_contents('temp/oldcsrf.txt', file_get_contents('temp/csrf.txt'));
    file_put_contents('temp/csrf.txt', $ran);
    return $ran;
}




?>