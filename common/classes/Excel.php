<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 03.11.2016
 * Time: 11:46
 */

namespace common\classes;


use PHPExcel;
use PHPExcel_Writer_Excel5;

class Excel
{
    public static function php_excel()
    {
        include_once ('PHPExcel.php');


        $obj = new PHPExcel();
        return $obj;

    }

    public static function php_write_excel($xls){
        include_once ('PHPExcel/Writer/Excel5.php');
        $objWriter = new PHPExcel_Writer_Excel5($xls);
        return $objWriter;
    }
}