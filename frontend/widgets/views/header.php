<?php
use yii\helpers\Url;
?>

<header class="header">
    <div class="wrap">
        <h1 class="title title_header header__title"><span>iOrder</span> Control System</h1>
        <?php
        if(!Yii::$app->user->isGuest): ?>
            <a data-method="post" href="<?= Url::to(['/user/security/logout'])?>" class="link link_logout">Log Out <span class="fa fa-sign-out"></span></a>
        <?php endif; ?>
    </div>
</header>
