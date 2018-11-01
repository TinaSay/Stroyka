<?php
/**
 * Created by PhpStorm.
 * User: elfuvo
 * Date: 27.12.17
 * Time: 16:02
 */

/** @var $this yii\web\View */
/** @var $tree [] */

use elfuvo\menu\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


if (!empty($tree)) : ?>
    <div id="navbar">
        <ul class="list-show nav-list clearfix">
            <?php foreach ($tree as $model): ?>
                <li class="nav-ell dropdown">
                    <a href="#" <?php if (isset($model['children'])): ?> class="dropdown-toggle" data-toggle="dropdown"<?php endif; ?> ><?= Html::encode($model['title']) ?><?php if (isset($model['children'])): ?>
                            <i class="icon-drop-down"></i><?php endif; ?></a>
                    <?php if (isset($model['children'])): ?>
                        <ul class="dropdown-menu">
                            <?php foreach ($model['children'] as $child): ?>
                                <li>
                                    <?php if ($child['type'] == Menu::TYPE_VOID): ?>
                                        <span class="menu-item"><?= Html::encode($child['title']) ?></span>
                                    <?php elseif ($child['type'] == Menu::TYPE_LINK): ?>
                                        <a class="menu-item" href="<?= $child['extUrl']; ?>"
                                           target="_blank"><?= Html::encode($child['title']) ?></a>
                                    <?php else: ?>
                                        <a class="menu-item"
                                           href="<?= Url::to(['/' . $child['url']]); ?>"><?= Html::encode($child['title']) ?></a>
                            <?php endif; ?>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
            <li class="nav-ell fix-navbar">
                <ul class="list-hide dropdown-menu"></ul>
            </li>
        </ul>
    </div>
    <div class="side-navbar-wrap drpdown-icon-wrap">
        <div class="icon-drpdown"><i class="icon-all"></i></div>
        <div class="side-navbar">
            <div class="side-navbar-body">
                <div class="side-navbar__header">
                    Карта портала
                    <div class="close-side">
                        <i class="icon-close"></i>
                    </div>
                </div>
                <div class="masonry-grid side-menu">
                    <div class="grid-sizer"></div>
                    <?php foreach ($tree as $model): ?>
                        <div class="side-nav-ell grid-item">
                            <span><?= Html::encode($model['title']) ?></span>
                            <?php if (isset($model['children'])): ?>
                                <ul class="sub-menu">
                                    <?php foreach ($model['children'] as $child): ?>
                                        <li>
                                            <?php if ($child['type'] == Menu::TYPE_VOID): ?>
                                                <span><?= Html::encode($child['title']) ?></span>
                                            <?php elseif ($child['type'] == Menu::TYPE_LINK): ?>
                                                <a href="<?= $child['extUrl']; ?>"
                                                   target="_blank"><?= Html::encode($child['title']) ?></a>
                                            <?php else: ?>
                                                <a href="<?= Url::to(['/' . $child['url']]); ?>"><?= Html::encode($child['title']) ?></a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>                   
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



                  
                    
              
                  
