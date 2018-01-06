<?php
/* @var $this yii\web\View */
?>
<h1>文章管理</h1>
<?=\yii\bootstrap\Html::a("添加",['add'],['class'=>'btn btn-info'])?>

<table class="table">


    <tr>
        <th>Id</th>
        <th>标题</th>
        <th>简介</th>
        <th>状态</th>
        <th>排序</th>
        <th>分类</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>

    <?php foreach ($models as $model):?>

        <tr>
            <td><?= $model->id ?></td>
            <td><?= $model->title ?></td>
            <td><?= $model->intro ?></td>
            <td><?php if ($model->status == 0) {
                    echo '<span class="glyphicon glyphicon-download alert-info" >';
                } else echo '<span class="glyphicon glyphicon-upload alert-info text-center " >'; ?></td>
            <td><?= $model->sort ?></td>
            <td><?=$model->articleCategory->name;?></td>
            <td><?= $model->createTimeText ?></td>

            <td><a href="<?= \yii\helpers\Url::to(['edit', 'id' => $model->id]) ?>" class="btn btn-success">编辑</a>

                <?= \yii\bootstrap\Html::a("删除", ['del', 'id' => $model->id], ["class" => "btn btn-danger"]) ?></td>
        </tr>

    <?php endforeach;?>
</table>
