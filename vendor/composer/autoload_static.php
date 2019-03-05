<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e8e593022f145aba34a81035a3c5cbd
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WxSdk\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WxSdk\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e8e593022f145aba34a81035a3c5cbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e8e593022f145aba34a81035a3c5cbd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}