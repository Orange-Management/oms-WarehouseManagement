<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\WarehouseManagement\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\WarehouseManagement\Models;

use phpOMS\DataStorage\Database\DataMapperAbstract;

/**
 * WarehouseManagement mapper class.
 *
 * @package Modules\WarehouseManagement\Models
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
final class StockMapper extends DataMapperAbstract
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    protected static array $columns = [
        'warehousemgmt_stock_id'    => ['name' => 'warehousemgmt_stock_id',    'type' => 'int',    'internal' => 'id'],
        'warehousemgmt_stock_name' => ['name' => 'warehousemgmt_stock_name', 'type' => 'string', 'internal' => 'name'],
        'warehousemgmt_stock_type'  => ['name' => 'warehousemgmt_stock_type',  'type' => 'int',    'internal' => 'type'],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $table = 'warehousemgmt_stock';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $primaryField = 'warehousemgmt_stock_id';
}
