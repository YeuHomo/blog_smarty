<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24
 * Time: 15:48
 */

//引入smarty核心类文件
include_once('libs/smarty.class.php');

//创建smarty对象
$smarty = new Smarty;

//配置smarty的相关项
$smarty->template_dir = "templates/";

$smarty->compile_dir = 'templates_c';

$smarty->config_dir = "configs/";

$smarty->cache_dir = "cache/";

$smarty->left_delimiter = '<{';

$smarty->right_delimiter = '}>';

session_start();

include 'mysql/mysql_conn.php';
