<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04f50cf6446b617e1a9bc4a0b367e778
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Project\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Project\\' => 
        array (
            0 => __DIR__ . '/..' . '/project/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04f50cf6446b617e1a9bc4a0b367e778::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04f50cf6446b617e1a9bc4a0b367e778::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit04f50cf6446b617e1a9bc4a0b367e778::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
