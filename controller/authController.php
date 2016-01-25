<?php 
session_start();
include_once('model/users.php');
class authController
{
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $auth = new users();
        $user = $auth->verify($username, $password);
        if($user)
        {
            $_SESSION['uid'] = $user->id;
            $_SESSION['uname'] = $user->username;
            echo $user->id;
            return;
        }
        echo 0;
    }
}
?>