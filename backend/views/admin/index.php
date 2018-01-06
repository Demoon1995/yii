<?php
/* @var $this yii\web\View */
?>
<h1>管理员列表</h1>

<?=\yii\bootstrap\Html::a("添加管理员",['add'],['class'=>'btn btn-info'])?>

<table class="table table-bordered">
    <tr>
        <th>id</th>
        <th>用户姓名</th>
        <th>邮箱</th>
        <th>注册时间</th>
        <th>最后登录时间</th>
        <th>最后登录IP地址</th>
        <th>操作</th>

    </tr>
    <?php foreach ($model as $row):?>
        <tr>
            <td><?=$row->id?></td>
            <td><?=$row->username?></td>

            <td><?=$row->email?></td>

            <td><?=date('Y-m-d',$row->created_at)?></td>
            <td><?=$row->login_at?></td>
            <td><?=$row->login_ip?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['edit','id'=>$row->id])?>"title="编辑"><spanp class="glyphicon glyphicon-edit btn-lg"style="color: green"></spanp></a>
                <a href="<?=\yii\helpers\Url::to(['del','id'=>$row->id])?>"title="删除"><spanp class="glyphicon glyphicon-remove btn-lg"style="color: red"></spanp></a>

            </td>
        </tr>
    <?php endforeach;?>


</table>


