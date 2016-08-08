<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#上传图片的配置信息

$config['upload_path']      = './upload/';
$config['allowed_types']    = 'gif|jpg|png|jpeg|xls';
$config['max_size']     = 3072;
$config['file_name']     =date("Y-m-d_His");







?>