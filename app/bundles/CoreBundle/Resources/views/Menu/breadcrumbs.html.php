<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

$lastCrumb = count($crumbs) - 1;
?>
<div class="page-header page-header-block">
    <div class="page-header-section">
        <div class="path">
            <ol class="breadcrumb breadcrumb-transparent">
                <?php
                foreach ($crumbs as $crumbCount => $crumb):
                    if ($crumb["label"] == "admin"):
                    ?>
                    <li>
                        <a id="bc_mautic_core_index"
                           href="<?php echo $view['router']->generate("mautic_core_index"); ?>"
                           data-toggle="ajax" data-menu-link="#bc_mautic_core_index">
                            <span><?php echo $view['translator']->trans('mautic.core.menu.index'); ?></span>
                        </a>
                    </li>
                    <li>
                        <span><?php echo $view['translator']->trans('mautic.core.menu.admin'); ?></span>
                    </li>
                    <?php
                    else:
                    $id    = ($crumb["label"] == "root") ? "mautic_core_index" : $crumb["item"]->getLinkAttribute("id");
                    $label = ($crumb["label"] == "root") ? "mautic.core.menu.index" : $crumb["label"];
                    $route = ($crumb["label"] == "root") ? $view['router']->generate("mautic_core_index") : $crumb["uri"];
                    ?>
                    <li>
                        <?php if ($lastCrumb === $crumbCount): ?>
                            <?php echo $view['translator']->trans($label); ?>
                        <?php else: ?>
                            <a id="bc_<?php echo $id; ?>"
                               href="<?php echo $route; ?>" data-toggle="ajax" data-menu-link="#<?php echo $id; ?>">
                                <span><?php echo $view['translator']->trans($label); ?></span>
                            </a>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</div>