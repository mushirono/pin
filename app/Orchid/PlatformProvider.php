<?php

declare(strict_types=1);

namespace App\Orchid;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        $menu = [
            Menu::make('Get Started')
                ->icon('bs.book')
                ->title('Navigation')
                ->route(config('platform.index'))
                ->permission('userType.isAdmin')
                ->list([
                    Menu::make('Sample Screen')
                        ->icon('bs.collection')
                        ->route('platform.example')
                        ->badge(fn () => 6),

                    Menu::make('Form Elements')
                        ->icon('bs.card-list')
                        ->route('platform.example.fields')
                        ->active('*/examples/form/*'),

                    Menu::make('Overview Layouts')
                        ->icon('bs.window-sidebar')
                        ->route('platform.example.layouts'),

                    Menu::make('Grid System')
                        ->icon('bs.columns-gap')
                        ->route('platform.example.grid'),

                    Menu::make('Charts')
                        ->icon('bs.bar-chart')
                        ->route('platform.example.charts'),

                    Menu::make('Cards')
                        ->icon('bs.card-text')
                        ->route('platform.example.cards')
                        ->divider(),
                ]),



            Menu::make('รายงานความก้าวหน้า')
                ->title("รายงานแผน/ความก้าวหน้า")
                ->icon('bs.card-text')
                ->route('startegy.index')
                ->list([
                    Menu::make('Startegy map')
                        ->icon('bs.card-text')
                        ->route('startegy.map'),
                    Menu::make('โครงการ')
                        ->icon('bs.card-text')
                        ->active([
                            'startegy.project'
                        ])
                        ->route('startegy.project'),
                    Menu::make('ส่งแผน')
                        ->icon('bs.card-text')
                        ->route('startegy.contex.form')
                        ->active([
                            'startegy.contex.form',
                            'startegy.project.form'
                        ])
                        ->list([
                            Menu::make('สภาพบริบท')
                                ->icon('bs.card-text')
                                ->route('startegy.contex.form'),
                            Menu::make('โครงการ')
                                ->icon('bs.card-text')
                                ->route('startegy.project.form'),
                        ]),
                ]),
            Menu::make('รายงานผล รอบ 12 เดือน')
                ->icon('bs.card-text')
                ->route('startegy.report'),


            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('users.users')
                ->permission('manage.users')
                ->title(__('Access Controls')),

            Menu::make("ปรับปรุงข้อมูล สพท")
                ->icon('bs.pen')
                ->route('profile.area')
                ->permission('userType.isArea')
                ->title("ข้อมูล สพท."),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('roles.roles')
                ->permission('manage.roles')
                ->divider(),

            Menu::make('Tasks')
                ->icon('bag')
                ->route('platform.task')
                ->permission('userType.isAdmin')
                ->title('Tools'),
        ];
        if (Auth::guest()) {
            array_push($menu, Menu::make('เข้าสู่ระบบ')
                ->icon('person-vcard')
                ->route('platform.login')
                ->title('บัญชี'));
        }
        return $menu;
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('manage.roles', __('Roles Manage'))
                ->addPermission('manage.users', __('Users Manage'))
                ->addPermission('userType.isManager', __('is Manager'))
                ->addPermission('userType.isEVA', __('is EVA'))
                ->addPermission('userType.isArea', __('is Area'))
                ->addPermission('userType.isAdmin', __('is Admin'))
        ];
    }
}
