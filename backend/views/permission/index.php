<?php
/* @var $this yii\web\View */
?>
<h1>权限列表</h1>
<a href="<?=\yii\helpers\Url::to(['add'])?>"class="btn btn-info">添加权限</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>权限路由</th>
        <th>权限描述</th>

        <th>操作</th>
    </tr>
    <?php foreach ($permission as $row):?>
        <tr>
            <td>
                <?=strpos($row->name,'/')?"---":""?>
                <?=$row->name?>
            </td>
            <td><?=$row->description?></td>

            <td>
                <a href="<?=\yii\helpers\Url::to(['edit','name'=>$row->name])?>"title="编辑"><spanp class="glyphicon glyphicon-edit btn-lg"style="color: green"></spanp></a>
                <a href="<?=\yii\helpers\Url::to(['del','name'=>$row->name])?>"title="删除"><spanp class="glyphicon glyphicon-remove btn-lg"style="color: red"></spanp></a>

            </td>
        </tr>
    <?php endforeach;?>
</table>




