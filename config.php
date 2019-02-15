<?php
/**
 * Created by PhpStorm.
 * User: lccccc
 * Date: 2019-01-30
 * Time: 9:56
 */

return [
    'db1'=>[
        'host'  =>  'localhost',
        'username'  =>  'root',
        'password'  =>  'root',
        'database'  =>  'localtest',
        'table'     =>  ['user','group']
    ],

    'db2'=>[
        'host'  =>  '192.168.127.254',
        'username'  =>  'root',
        'password'  =>  'cloud_4009123456',
        'database'  =>  'localtest',
        'table'     =>  ['user','group']
    ],

    /**
     * 同步选项
     * 0：双向同步
     * 1：数据库1单向同步到数据库2，
     * 2：数据库2单向同步到数据库1
     */
    'opt_type' =>  0
];