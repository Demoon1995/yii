<?php
/* @var $this yii\web\View */
?>
<h1>商品分类列表</h1>
<?=\yii\bootstrap\Html::a("添加",['goods-category/add'],['class'=>'btn btn-info'])?>

    <table class="table">
        <tr>
            <td>编号</td>
            <td>商品分类</td>
            <td>上级分类</td>
            <td>左对齐</td>
            <td>右对齐</td>
            <td>顶级</td>
            <td>介绍</td>
            <td>操作</td>
        </tr>
        <?php foreach ($cates as $cate):?>
            <tr>
                <td><?=$cate->id?></td>
                <td><?=$cate->name?></td>
                <td><?=$cate->parent_id?></td>
                <td><?=$cate->left?></td>
                <td><?=$cate->right?></td>
                <td><?=$cate->level?></td>
                <td><?=$cate->intro?></td>
                <td>操作</td>
            </tr>
        <?php endforeach;?>
    </table>
