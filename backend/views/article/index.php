<?php
/* @var $this yii\web\View */
?>
<h1>文章管理</h1>
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
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td><?= $article->name ?></td>
            <td><?=\yii\bootstrap\Html::img("/".$article->logo,['height'=>50])?></td>
            <td><?= $article->intro ?></td>
            <td><?= $article->status ?></td>
            <td><?= $article->sort ?></td>
            <td><a href="<?= \yii\helpers\Url::to(['edit', 'id' => $article->id]) ?>" class="btn btn-success">编辑</a>

                <?= \yii\bootstrap\Html::a("删除", ['del', 'id' => $article->id], ["class" => "btn btn-danger"]) ?>

            </td>
        </tr>
    <?php endforeach; ?>
</table>


