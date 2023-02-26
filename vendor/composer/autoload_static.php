<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit55e4510cc1af4b9a4e4767f7c5eb1f2c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit55e4510cc1af4b9a4e4767f7c5eb1f2c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit55e4510cc1af4b9a4e4767f7c5eb1f2c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit55e4510cc1af4b9a4e4767f7c5eb1f2c::$classMap;

        }, null, ClassLoader::class);
    }
}
