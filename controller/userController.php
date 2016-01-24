<?php 
include_once('model/users.php');

class userController{

    
    public function new_user()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $nickname = '';
        $user = new users();
        $suc = $user->insert($username, $password, $nickname);
        return $suc ? 1 : 0;
    }
}

?>