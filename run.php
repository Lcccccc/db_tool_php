<?php
/**
 * Created by PhpStorm.
 * User: lccccc
 * Date: 2019-01-30
 * Time: 9:57
 */
$env = include "config.php";

$con1 = mysqli_connect($env['db1']['host'],$env['db1']['username'],$env['db1']['password']);
if (!$con1)
{
    die('Could not connect: ' . mysqli_error($con1));
}

$con2 = mysqli_connect($env['db2']['host'],$env['db2']['username'],$env['db2']['password']);
if (!$con2)
{
    die('Could not connect: ' . mysqli_error($con2));
}

//根据配置文件查询所有字段的数据库信息
$con1->select_db('information_schema');
if(empty($env['db1']['table'])){
    $result1 = $con1->query("select `TABLE_NAME`,`COLUMN_NAME` from `COLUMNS` where `TABLE_SCHEMA` = '{$env['db1']['database']}'");
}else{
    $tables1 = '(\''.implode('\',\'',$env['db1']['table']).'\')';
    $result1 = $con1->query("select `TABLE_NAME`,`COLUMN_NAME` from `COLUMNS` where `TABLE_SCHEMA` = '{$env['db1']['database']}' and `TABLE_NAME` in {$tables1}");
}
while($row = mysqli_fetch_array($result1))
{
    $table1_columns[$row['TABLE_NAME']][] = $row['COLUMN_NAME'];
//    var_dump($row);
//    echo "<br />";
}


$con2->select_db('information_schema');
if(empty($env['db2']['table'])){
    $result2 = $con2->query("select `TABLE_NAME`,`COLUMN_NAME` from `COLUMNS` where `TABLE_SCHEMA` = '{$env['db2']['database']}'");
}else{
    $tables2 = '(\''.implode('\',\'',$env['db2']['table']).'\')';
    $result2 = $con2->query("select `TABLE_NAME`,`COLUMN_NAME` from `COLUMNS` where `TABLE_SCHEMA` = '{$env['db2']['database']}' and `TABLE_NAME` in {$tables2}");
}
while($row = mysqli_fetch_array($result2))
{
    $table2_columns[$row['TABLE_NAME']][] = $row['COLUMN_NAME'];
//    var_dump($row);
//    echo "<br />";
}
var_dump($table1_columns);
echo "<br />";
var_dump($table2_columns);exit;
mysqli_close($con1);
mysqli_close($con2);

