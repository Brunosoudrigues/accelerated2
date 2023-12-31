<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4053af1f7acf900004053846729f61c5
{
    public static $files = array (
        '898368f0be3530c516adc6a90218cdaf' => __DIR__ . '/../..' . '/source/Boot/Config.php',
        '4ef4a26d51b33e5701fbc0d3fe7a7d9b' => __DIR__ . '/../..' . '/source/Boot/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'C' => 
        array (
            'CoffeeCode\\Uploader\\' => 20,
            'CoffeeCode\\Router\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'CoffeeCode\\Uploader\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/uploader/src',
        ),
        'CoffeeCode\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/router/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4053af1f7acf900004053846729f61c5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4053af1f7acf900004053846729f61c5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4053af1f7acf900004053846729f61c5::$classMap;

        }, null, ClassLoader::class);
    }
}
