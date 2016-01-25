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
        $uid = $auth->verify($username, $password);
        $_SESSION['uid'] = $uid ? $uid : 0;
        echo $_SESSION['uid'];
    }
}
?>