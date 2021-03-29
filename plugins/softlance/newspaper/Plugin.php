<?php namespace Softlance\Newspaper;

use Backend;
use Softlance\Newspaper\Controllers\Orders;
use Softlance\Newspaper\FormWidgets\ArticleSelector;
use Softlance\Newspaper\FormWidgets\BannerSelector;
use Softlance\Newspaper\FormWidgets\ImageSelector;
use Softlance\Newspaper\Models\Order;
use System\Classes\PluginBase;

/**
 * newspaper Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'newspaper',
            'description' => 'No description provided yet...',
            'author'      => 'softlance',
            'icon'        => 'icon-pencil'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

//        Orders::extendFormFields(function($form, $model, $context)
//        {
//            if (!$model instanceof Order) {
//                return;
//            }
////            dd($form);
//            $form->removeField('user');
////            dd($form);
////            $form->addFields([
////                'my_field' => [
////                    'label'   => 'My Field',
////                    'comment' => 'This is a custom field I have added.',
////                ],
////            ]);
//
//        });



    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Softlance\Newspaper\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'softlance.newspaper.some_permission' => [
                'tab' => 'newspaper',
                'label' => 'Some permission'
            ],
        ];
    }


    public function registerFormWidgets()
    {
        return [
            ArticleSelector::class => 'articleSelector',
            ImageSelector::class => 'imageSelector',
            BannerSelector::class => 'bannerSelector'
        ];
    }


    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'newspaper' => [
                'label'       => 'Настроики',
                'url'         => Backend::url('softlance/newspaper/newspapers'),
                'icon'        => 'icon-cogs',
                'order'       => 500,
                'sideMenu' => [
                    'newspapers' => [
                        'label'       => 'Газеты',
                        'icon'        => 'icon-newspaper-o',
                        'url'         => Backend::url('softlance/newspaper/newspapers'),
                    ],
                    'type' => [
                        'label'       => 'Заказы',
                        'icon'        => 'icon-cart-arrow-down',
                        'url'         => Backend::url('softlance/newspaper/orders'),
                    ],
                ]

            ],
        ];
    }
}
