<style>
    li{
        display: block;
        float: left;
        text-align: center;
        margin-left:10px;
    }
    ul{
        margin-left:580px;
    }
</style>
<center>
        <form action="{{url('index')}}" method="post">
            <table border="5">
                <tr>
                    <td>留言</td>
                    <td><textarea name="test"></textarea></td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td><input type="text" name="username"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="提交"/></td>
                </tr>
            </table>
        </form>
<table border="5">
    <tr>
        <td>id</td>
        <td>留言人姓名</td>
        <td>留言内容</td>
        <td>留言时间</td>
        <td>操作</td>
    </tr>
    <?php foreach($users as$k=>$v){?>
    <tr>
        <td><?=$v->id?></td>
        <td><?=$v->username?></td>
        <td align='center' width='50%' id="<?=$v->id?>" onclick="change(<?=$v->id?>)"><input type="text" value="<?=$v->test?>" id="i<?=$v->id?>" style="display:none" onblur="update(<?=$v->id?>)" /><span id="s<?=$v->id?>"><?=$v->test?></span>
        </td>
        <td><?=$v->time?></td>
        <td>
            <a href="del?id=<?=$v->id?>">删除</a></td>
    </tr>
    <?php }?>
</table>
    <?php echo $users->links(); ?>
</center>
<script type="text/javascript">
    //修改
    function change(id)
    {
        document.getElementById('i'+id).style.display='block';
        document.getElementById('s'+id).style.display='none';
    }
    //失去焦点修改成功
    function update(id)
    {
        var content=document.getElementById('i'+id).value;
        var xhr=new XMLHttpRequest();
        xhr.open('get','update?id='+id+'&content='+content)
        xhr.send(null);
        xhr.onreadystatechange=function()
        {
            if(xhr.readyState == 4 && xhr.status == 200)
            {
                if(xhr.responseText == 1)
                {
                    document.getElementById('i'+id).style.display='none';
                    document.getElementById('s'+id).style.display='block';
                    document.getElementById('s'+id).innerHTML=content;
                }else {
                    alert('修改失败');
                }
            }
        }
    }
</script>