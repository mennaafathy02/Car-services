<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persimmons = [
            // sections
            [
                'display_name' => 'create',
                'name' => 'sections_create',
                'routes' => 'sections.create,sections.store',
                'guard_name' => 'web',
                'group' => 'sections',
            ],
            [
                'display_name' => 'read',
                'name' => 'sections_read',
                'routes' => 'sections.index,sections.show,subsections.index',
                'guard_name' => 'web',
                'group' => 'sections',
            ],
            [
                'display_name' => 'update',
                'name' => 'sections_update',
                'routes' => 'sections.edit,sections.update',
                'guard_name' => 'web',
                'group' => 'sections',
            ],
            [
                'display_name' => 'delete',
                'name' => 'sections_delete',
                'routes' => 'sections.destroy',
                'guard_name' => 'web',
                'group' => 'sections',
            ],
            // roles
            [
                'display_name' => 'create',
                'name' => 'roles_create',
                'routes' => 'roles.create,roles.store',
                'guard_name' => 'web',
                'group' => 'roles',
            ],
            [
                'display_name' => 'read',
                'name' => 'roles_read',
                'routes' => 'roles.index,roles.show',
                'guard_name' => 'web',
                'group' => 'roles',
            ],
            [
                'display_name' => 'update',
                'name' => 'roles_update',
                'routes' => 'roles.edit,roles.update',
                'guard_name' => 'web',
                'group' => 'roles',
            ],
            [
                'display_name' => 'delete',
                'name' => 'roles_delete',
                'routes' => 'roles.destroy',
                'guard_name' => 'web',
                'group' => 'roles',
            ],
            // admins
            [
                'display_name' => 'create',
                'name' => 'admins_create',
                'routes' => 'admins.create,admins.store',
                'guard_name' => 'web',
                'group' => 'admins',
            ],
            [
                'display_name' => 'read',
                'name' => 'admins_read',
                'routes' => 'admins.index,admins.show',
                'guard_name' => 'web',
                'group' => 'admins',
            ],
            [
                'display_name' => 'update',
                'name' => 'admins_update',
                'routes' => 'admins.edit,admins.update',
                'guard_name' => 'web',
                'group' => 'admins',
            ],
            [
                'display_name' => 'delete',
                'name' => 'admins_delete',
                'routes' => 'admins.destroy',
                'guard_name' => 'web',
                'group' => 'admins',
            ],
            // governorates
            [
                'display_name' => 'create',
                'name' => 'governorates_create',
                'routes' => 'governorates.create,governorates.store',
                'guard_name' => 'web',
                'group' => 'governorates',
            ],
            [
                'display_name' => 'read',
                'name' => 'governorates_read',
                'routes' => 'governorates.index,governorates.show',
                'guard_name' => 'web',
                'group' => 'governorates',
            ],
            [
                'display_name' => 'update',
                'name' => 'governorates_update',
                'routes' => 'governorates.edit,governorates.update',
                'guard_name' => 'web',
                'group' => 'governorates',
            ],
            [
                'display_name' => 'delete',
                'name' => 'governorates_delete',
                'routes' => 'governorates.destroy',
                'guard_name' => 'web',
                'group' => 'governorates',
            ],
            // plans
            [
                'display_name' => 'create',
                'name' => 'plans_create',
                'routes' => 'plans.create,plans.store',
                'guard_name' => 'web',
                'group' => 'plans',
            ],
            [
                'display_name' => 'read',
                'name' => 'plans_read',
                'routes' => 'plans.index,plans.show',
                'guard_name' => 'web',
                'group' => 'plans',
            ],
            [
                'display_name' => 'update',
                'name' => 'plans_update',
                'routes' => 'plans.edit,plans.update',
                'guard_name' => 'web',
                'group' => 'plans',
            ],
            [
                'display_name' => 'delete',
                'name' => 'plans_delete',
                'routes' => 'plans.destroy',
                'guard_name' => 'web',
                'group' => 'plans',
            ],

            // areas
            [
                'display_name' => 'create',
                'name' => 'areas_create',
                'routes' => 'areas.create,areas.store',
                'guard_name' => 'web',
                'group' => 'areas',
            ],
            [
                'display_name' => 'read',
                'name' => 'areas_read',
                'routes' => 'areas.index,areas.show',
                'guard_name' => 'web',
                'group' => 'areas',
            ],
            [
                'display_name' => 'update',
                'name' => 'areas_update',
                'routes' => 'areas.edit,areas.update',
                'guard_name' => 'web',
                'group' => 'areas',
            ],
            [
                'display_name' => 'delete',
                'name' => 'areas_delete',
                'routes' => 'areas.destroy',
                'guard_name' => 'web',
                'group' => 'areas',
            ],

            // banners
            [
                'display_name' => 'create',
                'name' => 'banners_create',
                'routes' => 'banners.create,banners.store',
                'guard_name' => 'web',
                'group' => 'banners',
            ],
            [
                'display_name' => 'read',
                'name' => 'banners_read',
                'routes' => 'banners.index,banners.show',
                'guard_name' => 'web',
                'group' => 'banners',
            ],
            [
                'display_name' => 'update',
                'name' => 'banners_update',
                'routes' => 'banners.edit,banners.update',
                'guard_name' => 'web',
                'group' => 'banners',
            ],
            [
                'display_name' => 'delete',
                'name' => 'banners_delete',
                'routes' => 'banners.destroy',
                'guard_name' => 'web',
                'group' => 'banners',
            ],
            // payment-accounts
            [
                'display_name' => 'create',
                'name' => 'payment-accounts_create',
                'routes' => 'payment-accounts.create,payment-accounts.store',
                'guard_name' => 'web',
                'group' => 'payment account',
            ],
            [
                'display_name' => 'read',
                'name' => 'payment-accounts_read',
                'routes' => 'payment-accounts.index,payment-accounts.show',
                'guard_name' => 'web',
                'group' => 'payment account',
            ],
            [
                'display_name' => 'update',
                'name' => 'payment-accounts_update',
                'routes' => 'payment-accounts.edit,payment-accounts.update',
                'guard_name' => 'web',
                'group' => 'payment account',
            ],
            [
                'display_name' => 'delete',
                'name' => 'payment-accounts_delete',
                'routes' => 'payment-accounts.destroy',
                'guard_name' => 'web',
                'group' => 'payment account',
            ],
            // subscribes

            [
                'display_name' => 'read',
                'name' => 'subscribes_read',
                'routes' => 'subscribes.index,subscribes.show',
                'guard_name' => 'web',
                'group' => 'subscribes',
            ],
            [
                'display_name' => 'update',
                'name' => 'subscribes_update',
                'routes' => 'subscribes.edit,subscribes.update',
                'guard_name' => 'web',
                'group' => 'subscribes',
            ],
            [
                'display_name' => 'delete',
                'name' => 'subscribes_delete',
                'routes' => 'subscribes.destroy',
                'guard_name' => 'web',
                'group' => 'subscribes',
            ],
            // users

            [
                'display_name' => 'read',
                'name' => 'users_read',
                'routes' => 'users.index,users.show,users.toggle-block',
                'guard_name' => 'web',
                'group' => 'users',
            ],
            // supervisors
            [
                'display_name' => 'read',
                'name' => 'supervisors_read',
                'routes' => 'supervisors.index,supervisors.show,supervisors.toggle-block,supervisor.accept',
                'guard_name' => 'web',
                'group' => 'providers',
            ],

            // notification centers
            [
                'display_name' => 'create',
                'name' => 'notification-centers_create',
                'routes' => 'notification-centers.create,notification-centers.store',
                'guard_name' => 'web',
                'group' => 'notification center',
            ],
            // settings
            [
                'display_name' => 'update',
                'name' => 'settings_update',
                'routes' => 'settings.show,settings.update',
                'guard_name' => 'web',
                'group' => 'settings',
            ],
            // contact us
            [
                'display_name' => 'read',
                'name' => 'contact-us_read',
                'routes' => 'contact-us.index,contact-us.toggle-read',
                'guard_name' => 'web',
                'group' => 'contact us',
            ],
            // offers
            [
                'display_name' => 'read',
                'name' => 'offers_read',
                'routes' => 'offers.index,offers.action',
                'guard_name' => 'web',
                'group' => 'offers',
            ],
            [
                'display_name' => 'delete',
                'name' => 'offers_delete',
                'routes' => 'offers.destroy',
                'guard_name' => 'web',
                'group' => 'offers'],

            // orders
            [
                'display_name' => 'read',
                'name' => 'orders_read',
                'routes' => 'orders.index',
                'guard_name' => 'web',
                'group' => 'orders',
            ],
            [
                'display_name' => 'delete',
                'name' => 'orders_delete',
                'routes' => 'orders.destroy',
                'guard_name' => 'web',
                'group' => 'orders'],

        ];

        foreach ($persimmons as $item) {
            Permission::create(
                [
                    'name' => $item['name'],
                    'display_name' => $item["display_name"],
                    'routes' => $item['routes'],
                    'guard_name' => $item['guard_name'],
                    'group' => $item['group'],
                ]
            );
        }
    }
}
