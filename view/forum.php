<!DOCTYPE html>
<html lang="zh-CN">
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <title>所有贴吧 -- PubBoard</title>
    <link href="<?= $root;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $root;?>css/forum.css" rel="stylesheet">
    
    <body>
        <nav class='navbar navbar-default'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='<?= $root;?>'><img src='<?= $root;?>pic/PubBoard.png' /></a>
                </div>
            </div>
        </nav>
        
        <div id="new_post">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="newpost_title" placeholder="帖子标题">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows='3' id="newpost_content" placeholder="帖子内容"></textarea>
                </div>
                <button type="button" class="btn btn-default" onclick="new_post()">发表帖子</button>
            </form> 
        </div>
           
        <div id="content"></div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.2.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!--script>
            $.ajax({
                url: 'forum',
                type: 'GET',
                success: function(data)
                {
                    var res = JSON.parse(data);
                    var size = res.length;
                    for(var i = 0; i < size; i++)
                    {
                        $('#content').append('<div class="panel panel-default"><div class="panel-heading"><a href="forum/'+res[i].id+'">'+res[i].name+'</a></div><div class="panel-body">立即加入'+res[i].name+'吧!</div></div>');
                    }
                }
            });
            
            function new_forum()
            {
                $.ajax({
                    url: 'forum',
                    type: 'POST',
                    data: {
                        name: $('#newforum_name').val()
                    },
                    success: function(data)
                    {
                        if(data == 0)
                            alert('创建贴吧成功!');
                        else
                            alert('失败了,贴吧已经存在');
                    }
                });
            }
            
        </script-->
        
    </body>    