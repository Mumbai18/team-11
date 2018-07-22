<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite33ba6d2ca040a26fe8d2441b176298c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite33ba6d2ca040a26fe8d2441b176298c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite33ba6d2ca040a26fe8d2441b176298c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
