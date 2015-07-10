<?php
    $params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'),
        require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/params.php'),
        require(__DIR__ . '/params-local.php')
    );

    return [
        'id'                  => 'app-backend',
        'basePath'            => dirname(__DIR__),
        'controllerNamespace' => 'backend\controllers',
        'bootstrap'           => ['log'],
        'modules'             => [
            'login'     => [
                'class' => 'backend\modules\login\Login',
            ],
            'adminpage' => [
                'class' => 'backend\modules\adminpage\AdminPage',
            ],
            'manager'   => [
                'class' => 'backend\modules\manager\Manager',
            ],
            'category'  => [
                'class' => 'backend\modules\category\Category',
            ],
            'review'  => [
                'class' => 'backend\modules\review\Review',
            ],
            'news' => [
                'class' => 'backend\modules\news\News',
            ],
        ],
        'components'          => [
            'request'      => [
                'baseUrl' => '/secure',
            ],
            'user'         => [
                'identityClass'   => 'common\models\db\User',
                'enableAutoLogin' => true,
                'loginUrl' => 'login',
            ],
            'log'          => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets'    => [
                    [
                        'class'  => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'urlManager'   => [
                'enablePrettyUrl' => true,
                'showScriptName'  => false,
                'rules'           => [
                    'login'             => 'login/login/view',
                    ''                  => 'adminpage/admin/view',
                    'logout'            => 'login/login/logout',
                    'manager'           => 'manager/manager',
                    'manager/<action>'  => 'manager/manager/<action>',
                    'category/<action>' => 'category/category/<action>'
                ],
            ],
            'errorHandler' => [
                'errorAction' => 'site/error',
            ],
        ],
        'params'              => $params,
    ];
