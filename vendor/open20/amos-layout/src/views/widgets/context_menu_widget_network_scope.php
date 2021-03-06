<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\community
 * @category   CategoryName
 */

/**
 * @var boolean $atLeastOnePermission
 * @var array $buttons
 * @var string $mainDivClasses
 */

use open20\amos\core\icons\AmosIcons;

?>
<?php if ($atLeastOnePermission): ?>
    <div class="manage <?= $mainDivClasses ?>">
        <div class="dropdown">
            <a class="manage-menu btn btn-outline-tertiary" data-toggle="dropdown" href="" aria-expanded="true"
               title="<?= Yii::t('amoscore', 'Menu contestuale') ?>">
               <?= AmosIcons::show('settings', ['class' => 'pull-left']) ?>
                <span class="caret"></span>
                <span class="sr-only"><?= Yii::t('amoscore', 'Menu contestuale') ?></span>
            </a>
            <ul class="dropdown-menu pull-right">
                <?php foreach ($buttons as $button): ?>
                    <li><?= $button ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
