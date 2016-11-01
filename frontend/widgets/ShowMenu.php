<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 27.10.2016
 * Time: 15:59
 */

namespace frontend\widgets;


use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class ShowMenu extends Widget
{
    public function run()
    {
        echo \yii\widgets\Menu::widget(
            [
                'items' => [
                    [
                        'label' => 'Waiting',
                        'url' => '/',
                        'active' => Yii::$app->controller->module->id == 'waiting',

                    ],
                    [
                        'label' => 'In Stock',
                        'url' => Url::to(['/stock/stock']),
                        'active' => Yii::$app->controller->module->id == 'stock',
                    ],
                    [
                        'label' => 'Packed',
                        'url' => Url::to(['/packed/packed']),
                        'active' => Yii::$app->controller->module->id == 'packed',
                    ],
                    [
                        'label' => 'Shipped',
                        'url' => '#'
                    ],

                ],
                'activateItems' => true,
                'activateParents' => true,
                'activeCssClass' => 'active',
                'encodeLabels' => false,
                'itemOptions'=>['class'=>'nav__item'],
                'linkTemplate' => '<a class="nav__link" href="{url}">{label}</a>',
                /*'dropDownCaret' => false,*/
                'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",
                'options' => [
                    'class' => 'nav__list',
                    'template' => 'naw'
                ]
            ]
        );
    }

}