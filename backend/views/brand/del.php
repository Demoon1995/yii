<?php
/* @var $this yii\web\View */
?>
<h1>回收站</h1>
<a href="<?= \yii\helpers\Url::to(['add']) ?>" class="btn btn-info "><span class="glyphicon glyphicon-plus"></span></a>
<a href="<?= \yii\helpers\Url::to(['del'])?>" class="btn btn-info "><span class="glyphicon glyphicon-trash"></span></a>

<table class="table">

    <tr>
        <th>Id</th>
        <th>名称</th>
        <th>图标</th>
        <th>简介</th>
        <th>状态</th>
        <th>排序</th>
        <th>操作</th>
    </tr>
    <?php foreach ($brands as $brand): ?>
        <tr>
            <td><?= $brand->id; ?></td>
            <td><?= $brand->name; ?></td>
            <td><?=\yii\bootstrap\Html::img("/".$brand->logo,['height'=>50]);?></td>
            <td><?= $brand->intro;?></td>
            <td><?=$brand->status;?></td>
            <td><?= $brand->sort; ?></td>
            <td><a href="<?= \yii\helpers\Url::to(['edit', 'id' => $brand->id]); ?>" ><span class="glyphicon glyphicon-pencil"></span></a>

                <?= \yii\bootstrap\Html::a("删除", ['del', 'id' => $brand->id]); ?><span class="glyphicon glyphicon-minus"></span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>