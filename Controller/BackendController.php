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

namespace Modules\WarehouseManagement\Controller;

use Modules\WarehouseManagement\Models\StockMapper;
use Modules\WarehouseManagement\Models\StockLocationMapper;
use phpOMS\Contract\RenderableInterface;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;
use phpOMS\Views\View;

/**
 * WarehouseManagement class.
 *
 * @package Modules\WarehouseManagement
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
final class BackendController extends Controller
{
	/**
     * Routing end-point for application behaviour.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param mixed            $data     Generic data
     *
     * @return RenderableInterface Returns a renderable object
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewStockList(RequestAbstract $request, ResponseAbstract $response, $data = null) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);

        $view->setTemplate('/Modules/WarehouseManagement/Theme/Backend/stock-list');
        $view->addData('nav', $this->app->moduleManager->get('Navigation')->createNavigationMid(1001302001, $request, $response));

        if ($request->getData('ptype') === 'p') {
            $view->setData('stocks',
                StockMapper::withConditional('language', $response->getLanguage())
                    ::getBeforePivot((int) ($request->getData('id') ?? 0), limit: 25)
            );
        } elseif ($request->getData('ptype') === 'n') {
            $view->setData('stocks',
                StockMapper::withConditional('language', $response->getLanguage())
                    ::getAfterPivot((int) ($request->getData('id') ?? 0), limit: 25)
            );
        } else {
            $view->setData('stocks',
                StockMapper::withConditional('language', $response->getLanguage())
                    ::getAfterPivot(0, limit: 25)
            );
        }

        return $view;
    }

    /**
     * Routing end-point for application behaviour.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param mixed            $data     Generic data
     *
     * @return RenderableInterface Returns a renderable object
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewStock(RequestAbstract $request, ResponseAbstract $response, $data = null) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);

        $view->setTemplate('/Modules/WarehouseManagement/Theme/Backend/stock');
        $view->addData('nav', $this->app->moduleManager->get('Navigation')->createNavigationMid(1001302001, $request, $response));

        $view->setData('stock', StockMapper::get((int) $request->getData('id')));


        return $view;
    }

    /**
     * Routing end-point for application behaviour.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param mixed            $data     Generic data
     *
     * @return RenderableInterface Returns a renderable object
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewStockLocationList(RequestAbstract $request, ResponseAbstract $response, $data = null) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);

        $view->setTemplate('/Modules/WarehouseManagement/Theme/Backend/stock-location-list');
        $view->addData('nav', $this->app->moduleManager->get('Navigation')->createNavigationMid(1001302001, $request, $response));

        if ($request->getData('ptype') === 'p') {
            $view->setData('locations',
                StockLocationMapper::withConditional('language', $response->getLanguage())
                    ::getBeforePivot((int) ($request->getData('id') ?? 0), limit: 25)
            );
        } elseif ($request->getData('ptype') === 'n') {
            $view->setData('locations',
                StockLocationMapper::withConditional('language', $response->getLanguage())
                    ::getAfterPivot((int) ($request->getData('id') ?? 0), limit: 25)
            );
        } else {
            $view->setData('locations',
                StockLocationMapper::withConditional('language', $response->getLanguage())
                    ::getAfterPivot(0, limit: 25)
            );
        }

        return $view;
    }

    /**
     * Routing end-point for application behaviour.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param mixed            $data     Generic data
     *
     * @return RenderableInterface Returns a renderable object
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewStockLocation(RequestAbstract $request, ResponseAbstract $response, $data = null) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);

        $view->setTemplate('/Modules/WarehouseManagement/Theme/Backend/stock-location');
        $view->addData('nav', $this->app->moduleManager->get('Navigation')->createNavigationMid(1001302001, $request, $response));

        $view->setData('location', StockLocationMapper::get((int) $request->getData('id')));


        return $view;
    }
}
