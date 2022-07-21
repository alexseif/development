<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Menu;

use App\Dictrionary\Types;
use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;
    private $navClass = 'nav justify-content-end';

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

//    public function createMainMenu()
    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'navbar-nav me-auto mb-2 mb-lg-0',
            ],
        ]);

        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('Routine Builder', ['route' => 'app_routine']);
        $menu->addChild('Calendar', ['route' => 'app_calendar_home']);
        $menu->addChild('Items', ['route' => 'app_item_index']);
        $menu->addChild('Item Lists', ['route' => 'app_item_list_index']);
        $menu->addChild('Expenses Inbox', ['route' => 'app_expense_inbox_index']);
        $menu->addChild('Weight Log', ['route' => 'app_weight_log_index']);
        $menu->addChild('Intention', ['route' => 'app_intention_index']);
        // ... add more children

        return $menu;
    }

    public function createHomeMenu()
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => $this->navClass,
            ],
        ]);
        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('Marslow', ['route' => 'app_home_marslow']);
        $menu->addChild('Routines', ['route' => 'app_home_routines']);
        $menu->addChild('Color', ['route' => 'app_home_colors']);
        $menu->addChild('Aspirations', ['route' => 'app_home_aspirations']);
        return $menu;
    }

    public function createTypesMenu()
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => $this->navClass,
            ],
        ]);
        $types = Types::$typeLabels;
        foreach ($types as $type) {
            $menu->addChild(ucwords($type), ['route' => 'app_item_index', "routeParameters" => ['type' => $type]]);

        }
        return $menu;
    }

    public function createCalendarMenu()
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => $this->navClass,
            ],
        ]);
        $menu->addChild('Month', ['route' => 'app_calendar_month']);
        $menu->addChild('Week', ['route' => 'app_calendar_week']);
        return $menu;
    }
}