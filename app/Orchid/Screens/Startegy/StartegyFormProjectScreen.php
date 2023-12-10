<?php

namespace App\Orchid\Screens\Startegy;

use App\Orchid\Layouts\AreaContextTabMenu;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class StartegyFormProjectScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }
    /**
     * Permission
     *
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'userType.isArea',
            'userType.isEVA',
            'userType.isManager',
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'ส่งแผน : โครงการ';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            AreaContextTabMenu::class,
            Layout::columns([
                Layout::rows([])->title('ข้อมูลโครงการ'),
                Layout::rows([])->title('ความสอดคล้อง'),
            ]),
            Layout::rows([])->title('กิจกรรม')
        ];
    }
}
