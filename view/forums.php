<!DOCTYPE html>
<html lang="zh-CN">
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <title>所有贴吧 -- PubBoard</title>
    <link href="<?= $root;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $root;?>css/forums.css" rel="stylesheet">
    
    <body>
        <nav class='navbar navbar-default' id="nav">
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='<?= $root;?>'><img src='<?= $root;?>pic/PubBoard.png' /></a>
                </div>
                <div id="status">
                    <p class="navbar-text navbar-right" id='profile'><?=@$_SESSION['uname'];?></p>
                </div>
            </div>
        </nav>
        
        <div id="search">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="serach_name" placeholder="搜索内容">
                </div>
                <button type="button" class="btn btn-default" onclick="search()">全吧搜索</button>
            </form> 
        </div>
        
        <div id="content"></div>
        
        <div id="new_forum">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="newforum_name" placeholder="新贴吧名称">
                </div>
                <button type="button" class="btn btn-default" onclick="new_forum()">创建贴吧</button>
            </form> 
        </div>
           
        
        
        <nav>
            <ul class="pager">
                <li id='back' onclick="showpage(-1)")><a href="#">上一页</a></li>
                <span id="page_status"></span>
                <li id='forward' onclick="showpage(1)"><a href="#">下一页</a></li>
            </ul>
        </nav>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= $root;?>js/jquery-2.2.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= $root;?>js/bootstrap.min.js"></script>
        <script>
            var page = 1;
            var res;
            var size;
            $(document).ready(function(){
                $.ajax({
                    url: 'forum',
                    type: 'GET',
                    success: function(data)
                    {
                        res = JSON.parse(data);
                        size = res.length;
                        showpage(0);
                    }
                });
            });
            
            function showpage(dir)
            {
                page += dir;
                var total = Math.ceil(size / 5);
                if(page <= 0 || page > total)
                {
                    page -= dir;
                    return;
                }
                $('#page_status').html('第'+page+'页, 共'+total+'页');
                $('#back').attr('class', 'active');  
                if(page == 1)
                {
                    $('#forward').attr('class', 'active');
                    $('#back').attr('class', 'disabled');
                }
                if(page == total)
                {
                    $('#forward').attr('class', 'disabled');
                }
                $('#content').html('');
                for(var i = (page-1)*5; i < page * 5 && i < size; i++)
                {
                    $('#content').append('<div class="panel panel-default"><div class="panel-heading"><a href="forums/'+res[i].id+'">'+res[i].name+'</a></div><div class="panel-body">立即加入'+res[i].name+'吧!</div></div>');
                }
            }
            
            function new_forum()
            {
                $.ajax({
                    url: 'forum',
                    type: 'POST',
                    data: {
                        name: $('#newforum_name').val(),
                        csrf: <?=$csrf;?>
                    },
                    success: function(data)
                    {
                        if(data == 0)
                        {  alert('创建贴吧成功!');
                            location.reload();
                        }
                        else
                            alert('失败了,贴吧已经存在');
                    }
                });
            }
            
            
        </script>
        
    </body>    