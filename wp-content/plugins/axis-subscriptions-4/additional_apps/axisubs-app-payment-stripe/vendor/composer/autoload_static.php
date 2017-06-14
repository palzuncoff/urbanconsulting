<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb23f83964dac672f6932bde9ea0bc8a9
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb23f83964dac672f6932bde9ea0bc8a9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb23f83964dac672f6932bde9ea0bc8a9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}