<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],


                    //管理员
                    [
                        'label' => '用户管理',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '用户列表', 'icon' => 'file-code-o', 'url' => ['/admin/index'],],
                            ['label' => '添加用户', 'icon' => 'dashboard', 'url' => ['/admin/add'],],

                        ],
                    ],


                    //品牌
                    [
                        'label' => '品牌管理',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '品牌列表', 'icon' => 'file-code-o', 'url' => ['/brand/index'],],
                            ['label' => '添加品牌', 'icon' => 'dashboard', 'url' => ['/brand/add'],],

                        ],
                    ],

                        //文章
                    [
                        'label' => '文章管理',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '文章列表', 'icon' => 'file-code-o', 'url' => ['/article/index'],],
                            ['label' => '文章添加', 'icon' => 'dashboard', 'url' => ['/article/add'],],
                            ['label' => '文章分类', 'icon' => 'dashboard', 'url' => ['/article-category/index'],],
                            ['label' => '添加分类', 'icon' => 'dashboard', 'url' => ['/article-category/add'],],

                        ],
                    ],

                    //商品

                    [
                        'label' => '商品管理',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '商品列表', 'icon' => 'file-code-o', 'url' => ['/goods/index'],],
                            ['label' => '商品添加', 'icon' => 'dashboard', 'url' => ['/goods/add'],],
                            ['label' => '商品分类', 'icon' => 'dashboard', 'url' => ['/goods-category/index'],],
                            ['label' => '添加分类', 'icon' => 'dashboard', 'url' => ['/goods-category/add'],],

                        ],
                    ],





                ],
            ]













//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],

////                        ],
////                    ],
//
//            ]
        ) ?>

    </section>

</aside>
