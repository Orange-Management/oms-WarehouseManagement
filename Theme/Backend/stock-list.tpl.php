<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\WarehouseManagement
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

use phpOMS\Uri\UriFactory;

$stocks = $this->getData('stocks') ?? [];

echo $this->getData('nav')->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="portlet">
            <div class="portlet-head"><?= $this->getHtml('Stocks'); ?><i class="fa fa-download floatRight download btn"></i></div>
            <table id="stockList" class="default">
                <thead>
                <tr>
                    <td><?= $this->getHtml('ID', '0', '0'); ?>
                    <td><?= $this->getHtml('Type'); ?>
                    <td class="wf-100"><?= $this->getHtml('Name'); ?>
                <tbody>
                <?php $count = 0; foreach ($stocks as $key => $value) :
                    ++$count;
                    $url = UriFactory::build('{/prefix}warehouse/stock?{?}&id=' . $value->getId());
                ?>
                    <tr data-href="<?= $url; ?>">
                        <td><a href="<?= $url; ?>"><?= $value->getId(); ?></a>
                        <td><a href="<?= $url; ?>"><?= $value->type; ?></a>
                        <td><a href="<?= $url; ?>"><?= $value->name; ?></a>
                <?php endforeach; ?>
                <?php if ($count === 0) : ?>
                    <tr><td colspan="3" class="empty"><?= $this->getHtml('Empty', '0', '0'); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
