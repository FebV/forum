<!DOCTYPE html>
<html lang="zh-CN">
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>Welcome to PubBoard!</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">

     </head>
    <body>
        <nav class='navbar navbar-default'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='index.php'><img src='pic/PubBoard.png' /></a>
                </div>
                <div id="sign">
                    <button type="button" class="btn btn-default navbar-btn navbar-right" data-toggle="modal" data-target="#signInModal">Sign in</button>
                    <button type="button" class="btn btn-default navbar-btn navbar-right" data-toggle="modal" data-target="#signUpModal">Sign up</button>
                </div>
            </div>
        </nav>
        <div id='up'>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>

            <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="pic/143502_64010836.png" alt="...">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="pic/fc939d928e8d71615893ac02aa1949f8_9.jpg" alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
        <div id='down'>
            <div id='down_left'>
                <a href='forum'><img src='pic/所有贴吧.png' class='img-circle'></a>
            </div>
            <div id='down_center'>
                <img src='pic/敬请期待.png' class='img-circle'>
            </div>
            <div id='down_right'>
                <img src='pic/敬请期待.png' class='img-circle'>
            </div>
        </div>
        
        <!--modal frame for signup-->
        <div class="modal fade" id="signUpModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">注册您的账户</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <input type='text' id="signup_username" class="form-control" placeholder="请输入用户名">
                            </div>
                            <div class="form-group">
                                <input type='password' id="signup_password" class="form-control" placeholder="请输入密码">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="signup()">注册</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <!--modal frame for signin-->
        <div class="modal fade" id="signInModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">登陆您的账户</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <input type='text' id="login_username" class="form-control" placeholder="请输入用户名">
                            </div>
                            <div class="form-group">
                                <input type='password' id="login_password" class="form-control" placeholder="请输入密码">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="login()">登陆</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.2.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            function signup()
            {
                $.ajax({
                    url: 'user',
                    type: "POST",
                    data: {
                        username: $('#signup_username').val(),
                        password: $('#signup_password').val()
                    },
                    success: function(data)
                    {
                        alert(data);
                    }
                });
            }
            
             function login()
            {
                $.ajax({
                    url: 'login',
                    type: "POST",
                    data: {
                        username: $('#login_username').val(),
                        password: $('#login_password').val()
                    },
                    success: function(data)
                    {
                        alert(data);
                    }
                });
            }
        </script>
     </body>
</html>