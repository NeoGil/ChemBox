<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert(
            [

                [
                    'title' => 'Dashboard',
                    'path' => '/',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Form',
                    'path' => 'form',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Users',
                    'path' => 'users',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Sources',
                    'path' => 'sources',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Units',
                    'path' => 'units',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Lead Archive',
                    'path' => 'archives',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Analitics',
                    'path' => 'analitics',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Tasks',
                    'path' => 'tasks',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],
                [
                    'title' => 'Task Archive',
                    'path' => 'task_archives',
                    'parent' => 0,
                    'type' => 'front',
                    'sort_order' => 100,
                ],

            ]
        );
    }
}
