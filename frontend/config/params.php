<?php
return [
    'adminEmail' => 'admin@example.com',
    'payType' => [
        ['id'=>1,'name' => '支付宝', 'intro' => '支付宝，知托付！！！'],
        ['id'=>2,'name' => '微信', 'intro' => '微信支付，不止支付！！！'],
        ['id'=>3,'name' => '上门自提', 'intro' => '自提时付款，支持现金、POS刷卡、支票支付'],
        ['id'=>4,'name' => '邮局汇款', 'intro' => '通过快钱平台收款 汇款后1-3个工作日到账'],
    ],
    //送货方式
    'delivers' => [
        [
            'id' => 1,
            'name'=>'顺丰',
            'price'=>20.00,
            'info'=>'食物传递，选择最好'
        ],
        [
            'id'=>2,
            'name'=>'菜鸟物流',
            'price'=>15.00,
            'info'=>'任何地方都有点'
        ],
        [
            'id'=>3,
            'name'=>'京东物流',
            'price'=>10.00,
            'info'=>'今日购今日达',
        ],
        [
            'id'=>4,
            'name'=>'EMS',
            'price'=>8.00,
            'info'=>'爬山涉水，送到你手中。'
        ]
    ],


    'easyWechat'=>[

        'debug'=>true,
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id'  => 'wx85adc8c943b8a477',         // AppID
        'secret'  => 'a687728a72a825812d34f307b630097b',     // AppSecret
        // 'token'   => 'your-token',          // Token
        // 'aes_key' => '',


        /**
         * 日志设置
         */

        'log' => [
            'level'      => 'debug',
            'permission' => 0777,
            'file'       => '/tmp/easywechat.log',
        ],


        /**
         * OAuth 配置
         *
         * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
         * callback：OAuth授权完成后的回调页地址
         */
        /* 'oauth' => [
             'scopes'   => ['snsapi_userinfo'],
             'callback' => '/examples/oauth_callback.php',
         ],*/

        /*
         * 微信支付
         */
        'payment' => [
            'merchant_id'        => '1228531002',//商户账号
            'key'                => 'a687728a72a825812d34f307b630097b',//密钥
            //'cert_path'          => 'path/to/your/cert.pem', // 退款
            //'key_path'           => 'path/to/your/key',      // 退款
            // 'device_info'     => '013467007045764',
            // 'sub_app_id'      => '',
            'notify_url'         => '默认的订单回调地址',//回调地址 客户支付成功微信服务器通知你的地址
            // ...
        ],
        /**
         * Guzzle全局设置
         */

        'guzzle' => [
            'timeout' => 3.0, // 超时时间（秒） https
            'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
        ],
    ]




];


