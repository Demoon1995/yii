<?php
/* @var $this yii\web\View */
?>
<h1>品牌列表</h1>
<a href="<?= \yii\helpers\Url::to(['add']) ?>" class="btn btn-info">添加</a>

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
            <td><?= $brand->id ?></td>
            <td><?= $brand->name ?></td>
            <td><?=\yii\bootstrap\Html::img("/".$brand->logo,['height'=>50])?></td>
            <td><?= $brand->intro ?></td>
            <td><?= $brand->status ?></td>
            <td><?= $brand->sort ?></td>
            <td><a href="<?= \yii\helpers\Url::to(['edit', 'id' => $brand->id]) ?>" class="btn btn-success">编辑</a>

                <?= \yii\bootstrap\Html::a("删除", ['del', 'id' => $brand->id], ["class" => "btn btn-danger"]) ?>

            </td>
        </tr>
    <?php endforeach; ?>
</table>


