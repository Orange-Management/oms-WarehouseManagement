<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Profile
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

$stock = $this->getData('stock');

echo $this->getData('nav')->render();
?>
<div class="row">
    <div class="col-xs-12">
        <section class="portlet">
            <div class="portlet-head"><?= $this->printHtml($stock->name); ?></div>
            <div class="portlet-body">
        </section>
    </div>
</div>