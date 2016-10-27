<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 27.10.2016
 * Time: 16:01
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run()
    {
        return $this->render('header');
    }
}