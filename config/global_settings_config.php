<?php

/**
 * Global settings use-case-specific configuration may be specified here.
 *
 * @var array
 *
 * @key string database
 * @key string routes
 */
return [
    /*
    |--------------------------------------------------------------------------
    | Global Settings - Database Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for the database where the global settings are stored.
    |
    */
    'database' => [
        // The connection used where the global settings table is stored.
        // Set to null to use the default database configuration, or a string of the specific connection to use.
        'connection' => null,

        // Name of the table that stores the global settings.
        'table_name' => 'global_settings',

        // Column names of the individual global setting attributes.
        'key_column' => 'key',
        'value_column' => 'value',
        'type_column' => 'type',
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Settings - Routes Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for the routes of where the global settings may be managed/updated.
    |
    */
    'routes' => [
        // List of middleware that are checked before the global settings routes may be enabled.
        'middleware' => [
            'mastermind'
        ],

        // A string to prepend global settings named routes by.
        'name_prefix' => 'web.global_settings.',

        // Namespace where the global settings controllers are stored.
        'namespace' => 'Skcin7\LaravelGlobalSettings\Http\Controllers',

        // A prefix to prepend all global settings routes by in the HTTP request.
        'prefix' => 'global_settings',
    ],

];

//return [
//
//    /*
//    |--------------------------------------------------------------------------
//    | Global Settings - Routes Configuration
//    |--------------------------------------------------------------------------
//    |
//    |
//    |
//    */
//
//    /**
//     * List of middleware to be checked to access the global settings routes.
//     *
//     * @var array
//     *
//     * @param
//     */
//
//    'routes' => [
//        'middleware' => [
//            'mastermind'
//        ],
//
//        'names_prefix' => 'web.global_settings.',
//
//        'namespace' => 'Skcin7\LaravelGlobalSettings\Http\Controllers',
//
//        'prefix' => 'global_settings',
//    ],
//
////
////    /**
////     * List of middleware to be checked to access the global settings routes.
////     * @var array
////     */
////    'route_middleware' => [
////        'mastermind'
////    ],
////
////    /**
////     * Prefix that all named routes are prepended with.
////     * @var string
////     */
////    'route_names_prefix' => 'web.global_settings.',
////    'route_namespace' => 'Skcin7\LaravelGlobalSettings\Http\Controllers',
////
////
////    'route_prefix' => 'global_settings',
//
//	/*
//	|--------------------------------------------------------------------------
//	| Default Settings Store
//	|--------------------------------------------------------------------------
//	|
//	| This option controls the default settings store that gets used while
//	| using this settings library.
//	|
//	| Supported: "json", "database"
//	|
//	*/
////	'store' => 'database',
//
//	/*
//	|--------------------------------------------------------------------------
//	| JSON Store
//	|--------------------------------------------------------------------------
//	|
//	| If the store is set to "json", settings are stored in the defined
//	| file path in JSON format. Use full path to file.
//	|
//	*/
////	'path' => storage_path() . '/global_settings.json',
//
//	/*
//	|--------------------------------------------------------------------------
//	| Database Store
//	|--------------------------------------------------------------------------
//	|
//	| The settings are stored in the defined file path in JSON format.
//	| Use full path to JSON file.
//	|
//	*/
//	// If set to null, the default connection will be used.
//	'database_connection' => null,
//	// Name of the table used.
//	'table_name' => 'global_settings',
//
//	// If you want to use custom column names in database store you could
//	// set them in this configuration
//	'key_column' => 'key',
//    'value_column' => 'value',
//    'type_column' => 'type',
//
//    /*
//    |--------------------------------------------------------------------------
//    | Cache settings
//    |--------------------------------------------------------------------------
//    |
//    | If you want all global setting calls to go through Laravel's cache system.
//    |
//    */
//	'enable_cache' => false,
//	// Whether to reset the cache when changing a setting.
//	'forget_cache_by_write' => true,
//	// TTL in seconds.
//	'cache_time_to_live' => 15,
//
//    /*
//    |--------------------------------------------------------------------------
//    | Default Settings
//    |--------------------------------------------------------------------------
//    |
//    | Define all default settings that will be used before any settings are set,
//    | this avoids all settings being set to false to begin with and avoids
//    | hardcoding the same defaults in all 'Settings::get()' calls
//    |
//    */
//    'defaults' => [
//        'foo' => 'bar',
//    ]
//];
