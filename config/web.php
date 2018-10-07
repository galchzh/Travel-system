<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'name' => '',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'social' => [
            // the module class
            'class' => 'kartik\social\Module',
    
            // the global settings for the disqus widget
            'disqus' => [
                'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
            ],
    
            // the global settings for the facebook plugins widget
            'facebook' => [
                'appId' => 'FACEBOOK_APP_ID',
                'secret' => 'FACEBOOK_APP_SECRET',
            ],
    
            // the global settings for the google plugins widget
            'google' => [
                'pageId' => 'GOOGLE_PLUS_PAGE_ID',
                'clientId' => 'GOOGLE_API_CLIENT_ID',
            ],
    
            // the global settings for the google analytic plugin widget
            'googleAnalytics' => [
                'id' => 'TRACKING_ID',
                'domain' => 'TRACKING_DOMAIN',
            ],
            
            // the global settings for the twitter plugins widget
            'twitter' => [
                'screenName' => 'TWITTER_SCREEN_NAME'
            ],
        ],
        'vote' => [
          'class' => hauntd\vote\Module::class,
            'guestTimeLimit' => 3600,
            'entities' => [
              // Entity -> Settings
              'itemVote' => app\models\Item::class, // your model
              'itemVoteGuests' => [
                  'modelName' => app\models\Item::class, // your model
                  'allowGuests' => true,
                  'allowSelfVote' => false,
                  'entityAuthorAttribute' => 'user_id',
              ],
              'itemLike' => [
                  'modelName' => app\models\Item::class, // your model
                  'type' => hauntd\vote\Module::TYPE_TOGGLE, // like/favorite button
              ],
              'itemFavorite' => [
                  'modelName' => app\models\Item::class, // your model
                  'type' => hauntd\vote\Module::TYPE_TOGGLE, // like/favorite button
              ],
          ],
        ],
      ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Zy6URG-qXt1WJX3fF7bh0FG6Ty7j3oRs',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            ],

          
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
        
    ],
    'params' => [
        'icon-framework' => \kartik\icons\Icon::FAS,  // Font Awesome Icon framework
      ]
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
