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
            <div id="status">
                <p class="navbar-text navbar-right" id='profile'><?=@$_SESSION['uname'];?></p>
            </div>
            </div>
            <input type="hidden" id="position" value="<?=$param;?>"/>
        </nav>
        <div id="content"></div>
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
           
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= $root;?>js/jquery-2.2.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= $root;?>js/bootstrap.min.js"></script>
        <script>
            $.ajax({
                url: '<?=$root;?>forum/<?=$param;?>',
                type: 'GET',
                success: function(data)
                {
                    var res = JSON.parse(data);
                    var size = res.length;
                    for(var i = 0; i < size; i++)
                    {
                        $('#content').append('<div class="panel panel-default"><div class="panel-heading"><a href="forums/<?=$param;?>/post/"'+res[i].id+'">'+res[i].title+'</a></div><div class="panel-body">'+res[i].content+'</div></div>');
                    }
                }
            });
            
            function new_post()
            {
                $.ajax({
                    url: '<?=$root;?>post',
                    type: 'POST',
                    data: {
                        forum_id: <?=$param;?>,
                        title: $('#newpost_title').val(),
                        content: $('#newpost_content').html()
                    },
                    success: function(data)
                    {
                        if(data == 0)
                            location.reload();
                        else
                            alert('失败了- -');
                    }
                });
            }

            
        </script>
        
    </body>    