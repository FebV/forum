<?php
include_once('model/forums.php');
include_once('model/users.php');
include_once('model/posts.php');

class database
{
    public $mysql = 0;
    public $stmt = 0;
    public $table;
    
    public function __construct()
    {
        include('core/config.php');
        $this->mysql = new mysqli($host, $username, $password, $database);
        if ($this->mysql->connect_error) 
            die('Connect Error (' . $this->mysql->connect_errno . ') '. $this->mysql->connect_error);
        $this->stmt = $this->mysql->stmt_init();
    }
    
}
?>