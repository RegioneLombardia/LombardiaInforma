<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\myactivities\views\my-activities
 * @category   CategoryName
 */

use open20\amos\admin\AmosAdmin;
use open20\amos\admin\widgets\UserCardWidget;
use open20\amos\core\helpers\Html;
use open20\amos\core\icons\AmosIcons;
use open20\amos\myactivities\AmosMyActivities;

/**
 * @var \open20\amos\myactivities\basic\RequestToJoinOrganizzazioniForReferees $model
 */

$userProfile = $model->createdUserProfile;
$profilo = $model->profilo;

?>
<?php if (Yii::$app->user->can('CONFIRM_ORGANIZZAZIONI_OR_SEDI_USER_REQUEST', ['model' => $model]) && !empty($userProfile)): ?>
    <?php
    $nomeCognome = $userProfile->getNomeCognome();
    $linkText = AmosIcons::show('search', [], 'dash') . ' ' . AmosMyActivities::t('amosmyactivities', '#view_organization');
    ?>
    <div class="wrap-activity">
        <div class="col-md-1 col-xs-2 icon-plugin">
            <?= AmosIcons::show('building', [], 'dash') ?>
        </div>
        <div class="col-md-3 col-xs-5 wrap-user">
            <?= UserCardWidget::widget(['model' => $userProfile]) ?>
            <span class="user"><?= $nomeCognome ?></span>
            <br>
            <?php if (!AmosAdmin::instance()->bypassWorkflow): ?>
                <?= AmosAdmin::t('amosadmin', $userProfile->workflowStatus->label) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-5 col-xs-5 wrap-report">
            <div class="col-lg-12 col-xs-12">
                <strong><?= AmosMyActivities::t('amosmyactivities', 'Request for organization membership'); ?></strong>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Yii::$app->formatter->asDatetime($model->getUpdatedAt()) ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <p class="user-report"><?= $nomeCognome ?></p>
                <?= AmosMyActivities::t('amosmyactivities', 'asks you to accept the invitation to participate to the organization:'); ?>
                <?= $model->profilo->name; ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Html::a($linkText, $profilo->getFullViewUrl()) ?>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 wrap-action">
            <?= Html::a(AmosIcons::show('check') . ' ' . AmosMyActivities::t('amosmyactivities', 'Accept'),
                Yii::$app->urlManager->createUrl([
                    '/organizzazioni/profilo/join-organization',
                    'organizationId' => $model->profilo_id,
                    'userId' => $model->user_id,
                    'accept' => true,
                    'redirectAction' => '/myactivities/my-activities/index'
                ]),
                ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a(AmosIcons::show('close') . ' ' . AmosMyActivities::t('amosmyactivities', 'Reject'),
                Yii::$app->urlManager->createUrl([
                    '/organizzazioni/profilo/join-organization',
                    'organizationId' => $model->profilo_id,
                    'userId' => $model->user_id,
                    'accept' => false,
                    'redirectAction' => '/myactivities/my-activities/index'
                ]),
                ['class' => 'btn btn-secondary']
            ) ?>
        </div>
    </div>
    <hr>
<?php endif; ?>
