<?php 
include_once('model/users.php');

class userController
{
    
    public function new_user()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $nickname = '';
        $user = new users();
        if($user->has($username))
        {
            echo 1;
            return;
        }
        $suc = $user->insert($username, $password, $nickname);
        return $suc ? 0 : 1;
    }
    
    public function get_profile()
    {
        $id = $_GET['id'];
        $user = new users();
        $res = $user->find($id);
        echo json_encode($res);
    }
}

?>