<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Database connection group to use if none specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => '127.0.0.1',
        'username'     => '',
        'password'     => '',
        'database'     => '',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'     => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'foundRows'    => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8mb4',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        // Sinusubukan ang iba't ibang paraan para makuha ang Environment Variables sa Render/Docker
        $this->default['hostname'] = getenv('MYSQLHOST') 
            ?: getenv('database.default.hostname') 
            ?: $_ENV['database.default.hostname'] 
            ?: $_SERVER['database.default.hostname'] 
            ?: env('database.default.hostname', $this->default['hostname']);

        $this->default['username'] = getenv('MYSQLUSER') 
            ?: getenv('database.default.username') 
            ?: $_ENV['database.default.username'] 
            ?: $_SERVER['database.default.username'] 
            ?: env('database.default.username', $this->default['username']);

        $this->default['password'] = getenv('MYSQLPASSWORD') 
            ?: getenv('database.default.password') 
            ?: $_ENV['database.default.password'] 
            ?: $_SERVER['database.default.password'] 
            ?: env('database.default.password', $this->default['password']);

        $this->default['database'] = getenv('MYSQLDATABASE') 
            ?: getenv('database.default.database') 
            ?: $_ENV['database.default.database'] 
            ?: $_SERVER['database.default.database'] 
            ?: env('database.default.database', $this->default['database']);

        $port = getenv('MYSQLPORT') 
            ?: getenv('database.default.port') 
            ?: $_ENV['database.default.port'] 
            ?: $_SERVER['database.default.port'] 
            ?: env('database.default.port', $this->default['port']);

        $this->default['port'] = (int) $port;

        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}