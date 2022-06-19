<?php
return [
    'components' => [
        'mailer' => function() {
            $settings = \craft\helpers\App::mailSettings();
            $settings->transportType = \craft\mail\transportadapters\Smtp::class;
            $settings->transportSettings = [
                'useAuthentication' => true,
                'host' => getenv('SMTP_HOST'),
                'port' => getenv('SMTP_PORT'),
                'username' => getenv('SMTP_USERNAME'),
                'password' => getenv('SMTP_PASSWORD'),
            ];
            $config = \craft\helpers\App::mailerConfig($settings);
            return Craft::createObject($config);
        },
    ],
];
