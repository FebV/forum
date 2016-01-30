<!DOCTYPE html>
<html lang="zh-CN">
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <title> -- 吧 -- PubBoard</title>
    <link href="<?= $root;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $root;?>css/post.css" rel="stylesheet">
    
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
        <div id="new_comment">
            <form action="<?=$root;?>comment" method="POST" enctype="multipart/form-data" id="pic_form">
                <input type="hidden" class="form-control" name="post_id" value="<?=$param;?>">
                <input type="hidden" class="form-control" name="type" value="2">
                <div class="form-group">
                    <textarea class="form-control" rows='3' id="newcomment_content" placeholder="评论内容"></textarea>
                </div>
                <div class="form-group" id="file_input">
                    <input name="file" type="file" id="newpic_comment">
                </div>
            </form>
                <button type="button" class="btn btn-default" onclick="new_comment()">发表评论</button>
                <div class="checkbox">
                    <label>
                        <input name="pic" type="checkbox" id="pic_check" onclick="toggle_pic()">
                        使用图片回复
                    </label>
                </div>

        </div>
           
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= $root;?>js/jquery-2.2.0.min.js"></script>
        <script src="<?= $root;?>js/jquery.form.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= $root;?>js/bootstrap.min.js"></script>
        <script>
        var if_pic = false;
        $(document).ready(function(){
            $('#file_input').hide();
            $.ajax({
                url: '<?=$root;?>post/<?=$param;?>',
                type: 'GET',
                success: function(data)
                {
                    var res = JSON.parse(data);
                    var size = res.length;
                    for(var i = 0; i < size; i++)
                    {
                         var j = i + 1;
                        if(res[i].type == 1)
                        {
                           
                            $('#content').append('<div class="panel panel-default"><div class="panel-heading">'+j+'楼</div><div class="panel-body">'+res[i].content+'</div></div>');
                        }
                        else
                        {
                            $('#content').append('<div class="panel panel-default"><div class="panel-heading">'+j+'楼</div><div class="panel-body"><img src="<?=$root;?>'+res[i].content+'" /></div></div>');
                        }
                    }
                }
            });
        });

            
            function new_comment()
            {
                if(!if_pic)
                {
                    $.ajax({
                        url: '<?=$root;?>comment',
                        type: 'POST',
                        data: {
                            type: 1,
                            post_id: <?=$param;?>,
                            content: $('#newcomment_content').val()
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
                else
                {
                    $('#pic_form').ajaxSubmit(function(message)
                    {
                        if(message == 0)
                        {
                            location.reload();
                        }
                        else
                        {
                            alert('失败了');
                        }
                    });
                }
            };

            function toggle_pic()
            {
                if($('#pic_check').prop('checked') == true)
                {
                    if_pic = true;
                    $('#newcomment_content').hide();
                    $('#file_input').show();
                }
                else
                {
                    if_pic = false;
                    $('#newcomment_content').show();
                    $('#file_input').hide();
                }
            }
            
        </script>
        
    </body>    