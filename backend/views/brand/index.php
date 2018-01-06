<?php
/* @var $this yii\web\View */
?>

<h1>品牌列表</h1>


<div class="table-responsive">

<a href="<?= \yii\helpers\Url::to(['brand/add']) ?>" class="btn btn-info "><span class="glyphicon glyphicon-plus"></span></a>
<a href="<?= \yii\helpers\Url::to([''])?>" class="btn btn-info "><span class="glyphicon glyphicon-trash"></span></a>

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
            <td><?php if ($brand->status == 0) {
                    echo '<span class="glyphicon glyphicon-download alert-info" >';
                } else echo '<span class="glyphicon glyphicon-upload alert-info text-center " >'; ?></td>
            <td><?= $brand->sort ?></td>
            <td><a href="<?= \yii\helpers\Url::to(['edit', 'id' => $brand->id] ) ?>" ><span class="glyphicon glyphicon-pencil"></span></a>

                <?= \yii\bootstrap\Html::a("", ['del', 'id' => $brand->id]) ?><span class="glyphicon glyphicon-minus"></span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</div>
