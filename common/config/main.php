<?php
    return [
        'language'      => 'ru-RU',
        'vendorPath'    => dirname(dirname(__DIR__)) . '/vendor',
        'modules'       => [
            //...
            'filemanager' => [
                'class'      => 'linchpinstudios\filemanager\Module',
                'thumbnails' => [[100, 100]],                                              // Optional: array
                'path'       => '/image/news/',
                // Default relative to your web directory or AWS
                'thumbPath'  => '/image/news/thumb/',
                // Default relative to your web directory or AWS
                'url'        => '/',
                // either s3 buket URL or CloudFront (can be changed)
                'aws'        => [
                    'enable' => false,
                    'key'    => 'YOURAWS_KEY',
                    'secret' => 'YOURAWS_SECRET',
                    'bucket' => 'your-bucket',
                ],
            ],
            //...
        ],
        'components'    => [
            'cache'       => [
                'class' => 'yii\caching\FileCache',
            ],
            'authManager' => [
                'class' => 'yii\rbac\DbManager',
            ],
            'formatter'   => [
                'class'             => 'yii\i18n\Formatter',
                'nullDisplay'       => '&nbsp;',
                'thousandSeparator' => ' ',
                'locale'            => 'ru-RU',
            ],
        ],
        'controllerMap' => [
            'elfinder' => [
                'class'            => 'mihaildev\elfinder\Controller',
                'access'           => ['@', '?'],
                //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
                'disabledCommands' => ['netmount'],
                //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
                'roots'            => [
                    [
                        'baseUrl'    => '',
                        'basePath'   => '@frontend/web',
                        'path'       => 'image/upload',
                        'name'       => 'Изображения',
                    ],
                    //                    [
                    //                        'class' => 'mihaildev\elfinder\UserPath',
                    //                        'path'  => 'files/user_{id}',
                    //                        'name'  => 'My Documents'
                    //                    ],
                    //                    [
                    //                        'path' => 'image/some',
                    //                        'name' => ['category' => 'my', 'message' => 'Some Name'] //перевод Yii::t($category, $message)
                    //                    ],
                    //                    [
                    //                        'path'   => 'image/some',
                    //                        'name'   => ['category' => 'my', 'message' => 'Some Name'], // Yii::t($category, $message)
                    //                        'access' => ['read' => '*', 'write' => 'UserFilesAccess']
                    //                        // * - для всех, иначе проверка доступа в даааном примере все могут видет а редактировать могут пользователи только с правами UserFilesAccess
                    //                    ]
                ],
                'watermark'        => [
                    'source'         => __DIR__ . '/logo.png', // Path to Water mark image
                    'marginRight'    => 5,          // Margin right pixel
                    'marginBottom'   => 5,          // Margin bottom pixel
                    'quality'        => 95,         // JPEG image save quality
                    'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                    'targetType'     => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
                    'targetMinPixel' => 200         // Target image minimum pixel size
                ]
            ]
        ],
    ];
