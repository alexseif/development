<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Menu;

use App\Dictrionary\Types;
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'navbar-nav me-auto mb-2 mb-lg-0',
            ],
        ]);

        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('Calendar', ['route' => 'app_calender_home']);
        $menu->addChild('Items', ['route' => 'app_item_index']);
        $menu->addChild('Item Lists', ['route' => 'app_item_list_index']);
        $menu->addChild('Expenses Inbox', ['route' => 'app_expense_inbox_index']);
        // ... add more children

        return $menu;
    }

    public function createTypesMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'nav justify-content-end',
            ],
        ]);
        $types = Types::$typeLabels;
        foreach ($types as $type) {
            $menu->addChild(ucwords($type), ['route' => 'app_item_index', "routeParameters" => ['type' => $type]]);

        }
        return $menu;
    }
}