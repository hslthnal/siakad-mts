<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradmin'    => \App\Filters\FilterAdmin::class,
        'filtersiswa'    => \App\Filters\FilterSiswa::class,
        'filterguru'    => \App\Filters\FilterGuru::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'filteradmin'    => [ 'except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            'filtersiswa'    => [ 'except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            'filterguru'    => [ 'except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'filteradmin'    => [ 'except' => [
                'admin', 'admin/*',
                'home', 'home/*',
                '/',
                'fakultas', 'fakultas/*',
                'gedung', 'gedung/*',
                'ruangan', 'ruangan/*',
                'ta', 'ta/*',
                'mapel', 'mapel/*',
                'status', 'status/*',
                'guru', 'guru/*',
                'siswa', 'siswa/*',
                'user', 'user/*',
                'kelas', 'kelas/*',
                'romkel', 'romkel/*',
                'jadwalpelajaran', 'jadwalpelajaran/*',
            ]],

            'filtersiswa'    => [ 'except' => [
                'murid', 'murid/*',
                'home', 'home/*',
                'romkel', 'romkel/*',
                'krs', 'krs/*',
                '/',
            ]],
            'filterguru'    => [ 'except' => [
                'pengajar', 'pengajar/*',
                'home', 'home/*',
                '/',
            ]],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
