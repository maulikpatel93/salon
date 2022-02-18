<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalonPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('salon_permissions')->delete();
        
        \DB::table('salon_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salon_module_id' => 6,
                'panel' => 'Staff',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'clients',
                'action' => 'index',
                'is_active' => '1',
            ),
            1 => 
            array (
                'id' => 2,
                'salon_module_id' => 6,
                'panel' => 'Staff',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'clients',
                'action' => 'create',
                'is_active' => '1',
            ),
            2 => 
            array (
                'id' => 3,
                'salon_module_id' => 6,
                'panel' => 'Staff',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'clients',
                'action' => 'update',
                'is_active' => '1',
            ),
            3 => 
            array (
                'id' => 4,
                'salon_module_id' => 6,
                'panel' => 'Staff',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'clients',
                'action' => 'view',
                'is_active' => '1',
            ),
            4 => 
            array (
                'id' => 5,
                'salon_module_id' => 6,
                'panel' => 'Staff',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'clients',
                'action' => 'delete',
                'is_active' => '1',
            ),
            5 => 
            array (
                'id' => 6,
                'salon_module_id' => 6,
                'panel' => 'Staff',
                'title' => 'Import',
                'name' => 'import',
                'controller' => 'clients',
                'action' => 'import',
                'is_active' => '1',
            ),
            6 => 
            array (
                'id' => 7,
                'salon_module_id' => 6,
                'panel' => 'Staff',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'clients',
                'action' => 'export',
                'is_active' => '1',
            ),
            7 => 
            array (
                'id' => 8,
                'salon_module_id' => 16,
                'panel' => 'Staff',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'suppliers',
                'action' => 'index',
                'is_active' => '1',
            ),
            8 => 
            array (
                'id' => 9,
                'salon_module_id' => 16,
                'panel' => 'Staff',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'suppliers',
                'action' => 'create',
                'is_active' => '1',
            ),
            9 => 
            array (
                'id' => 10,
                'salon_module_id' => 16,
                'panel' => 'Staff',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'suppliers',
                'action' => 'update',
                'is_active' => '1',
            ),
            10 => 
            array (
                'id' => 11,
                'salon_module_id' => 16,
                'panel' => 'Staff',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'suppliers',
                'action' => 'delete',
                'is_active' => '1',
            ),
            11 => 
            array (
                'id' => 12,
                'salon_module_id' => 9,
                'panel' => 'Staff',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'products',
                'action' => 'index',
                'is_active' => '1',
            ),
            12 => 
            array (
                'id' => 13,
                'salon_module_id' => 9,
                'panel' => 'Staff',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'products',
                'action' => 'create',
                'is_active' => '1',
            ),
            13 => 
            array (
                'id' => 14,
                'salon_module_id' => 9,
                'panel' => 'Staff',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'products',
                'action' => 'update',
                'is_active' => '1',
            ),
            14 => 
            array (
                'id' => 15,
                'salon_module_id' => 9,
                'panel' => 'Staff',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'products',
                'action' => 'view',
                'is_active' => '1',
            ),
            15 => 
            array (
                'id' => 16,
                'salon_module_id' => 9,
                'panel' => 'Staff',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'products',
                'action' => 'delete',
                'is_active' => '1',
            ),
            16 => 
            array (
                'id' => 17,
                'salon_module_id' => 17,
                'panel' => NULL,
                'title' => 'List',
                'name' => 'list',
                'controller' => 'categories',
                'action' => 'index',
                'is_active' => '1',
            ),
            17 => 
            array (
                'id' => 18,
                'salon_module_id' => 17,
                'panel' => NULL,
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'categories',
                'action' => 'create',
                'is_active' => '1',
            ),
            18 => 
            array (
                'id' => 19,
                'salon_module_id' => 17,
                'panel' => NULL,
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'categories',
                'action' => 'update',
                'is_active' => '1',
            ),
            19 => 
            array (
                'id' => 20,
                'salon_module_id' => 17,
                'panel' => NULL,
                'title' => 'View',
                'name' => 'view',
                'controller' => 'categories',
                'action' => 'view',
                'is_active' => '1',
            ),
            20 => 
            array (
                'id' => 21,
                'salon_module_id' => 17,
                'panel' => NULL,
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'categories',
                'action' => 'delete',
                'is_active' => '1',
            ),
            21 => 
            array (
                'id' => 22,
                'salon_module_id' => 8,
                'panel' => 'Staff',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'services',
                'action' => 'list',
                'is_active' => '1',
            ),
            22 => 
            array (
                'id' => 23,
                'salon_module_id' => 8,
                'panel' => NULL,
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'services',
                'action' => 'create',
                'is_active' => '1',
            ),
            23 => 
            array (
                'id' => 24,
                'salon_module_id' => 8,
                'panel' => NULL,
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'services',
                'action' => 'update',
                'is_active' => '1',
            ),
            24 => 
            array (
                'id' => 25,
                'salon_module_id' => 8,
                'panel' => NULL,
                'title' => 'View',
                'name' => 'view',
                'controller' => 'services',
                'action' => 'view',
                'is_active' => '1',
            ),
            25 => 
            array (
                'id' => 26,
                'salon_module_id' => 8,
                'panel' => NULL,
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'services',
                'action' => 'delete',
                'is_active' => '1',
            ),
            26 => 
            array (
                'id' => 27,
                'salon_module_id' => 13,
                'panel' => NULL,
                'title' => 'List',
                'name' => 'list',
                'controller' => 'pricetiers',
                'action' => 'index',
                'is_active' => '1',
            ),
            27 => 
            array (
                'id' => 28,
                'salon_module_id' => 13,
                'panel' => NULL,
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'pricetiers',
                'action' => 'create',
                'is_active' => '1',
            ),
            28 => 
            array (
                'id' => 29,
                'salon_module_id' => 13,
                'panel' => NULL,
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'pricetiers',
                'action' => 'update',
                'is_active' => '1',
            ),
            29 => 
            array (
                'id' => 30,
                'salon_module_id' => 13,
                'panel' => NULL,
                'title' => 'View',
                'name' => 'view',
                'controller' => 'pricetiers',
                'action' => 'view',
                'is_active' => '1',
            ),
            30 => 
            array (
                'id' => 31,
                'salon_module_id' => 13,
                'panel' => NULL,
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'pricetiers',
                'action' => 'delete',
                'is_active' => '1',
            ),
            31 => 
            array (
                'id' => 32,
                'salon_module_id' => 7,
                'panel' => NULL,
                'title' => 'List',
                'name' => 'list',
                'controller' => 'staff',
                'action' => 'index',
                'is_active' => '1',
            ),
            32 => 
            array (
                'id' => 33,
                'salon_module_id' => 7,
                'panel' => NULL,
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'staff',
                'action' => 'create',
                'is_active' => '1',
            ),
            33 => 
            array (
                'id' => 34,
                'salon_module_id' => 7,
                'panel' => NULL,
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'staff',
                'action' => 'update',
                'is_active' => '1',
            ),
            34 => 
            array (
                'id' => 35,
                'salon_module_id' => 7,
                'panel' => NULL,
                'title' => 'View',
                'name' => 'view',
                'controller' => 'staff',
                'action' => 'view',
                'is_active' => '1',
            ),
            35 => 
            array (
                'id' => 36,
                'salon_module_id' => 7,
                'panel' => NULL,
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'staff',
                'action' => 'delete',
                'is_active' => '1',
            ),
            36 => 
            array (
                'id' => 37,
                'salon_module_id' => 14,
                'panel' => NULL,
                'title' => 'List',
                'name' => 'list',
                'controller' => 'roster',
                'action' => 'index',
                'is_active' => '1',
            ),
            37 => 
            array (
                'id' => 38,
                'salon_module_id' => 14,
                'panel' => NULL,
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'roster',
                'action' => 'create',
                'is_active' => '1',
            ),
            38 => 
            array (
                'id' => 39,
                'salon_module_id' => 14,
                'panel' => NULL,
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'roster',
                'action' => 'update',
                'is_active' => '1',
            ),
            39 => 
            array (
                'id' => 40,
                'salon_module_id' => 14,
                'panel' => NULL,
                'title' => 'View',
                'name' => 'view',
                'controller' => 'roster',
                'action' => 'view',
                'is_active' => '1',
            ),
            40 => 
            array (
                'id' => 41,
                'salon_module_id' => 14,
                'panel' => NULL,
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'roster',
                'action' => 'delete',
                'is_active' => '1',
            ),
            41 => 
            array (
                'id' => 42,
                'salon_module_id' => 18,
                'panel' => 'Staff',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'clientphotos',
                'action' => 'list',
                'is_active' => '1',
            ),
            42 => 
            array (
                'id' => 43,
                'salon_module_id' => 18,
                'panel' => 'Staff',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'clientphotos',
                'action' => 'create',
                'is_active' => '1',
            ),
            43 => 
            array (
                'id' => 44,
                'salon_module_id' => 18,
                'panel' => 'Staff',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'clientphotos',
                'action' => 'delete',
                'is_active' => '1',
            ),
            44 => 
            array (
                'id' => 45,
                'salon_module_id' => 18,
                'panel' => 'Staff',
                'title' => 'Profile Image',
                'name' => 'profileimage',
                'controller' => 'clientphotos',
                'action' => 'profileimage',
                'is_active' => '1',
            ),
            45 => 
            array (
                'id' => 46,
                'salon_module_id' => 20,
                'panel' => 'Staff',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'clientdocuments',
                'action' => 'list',
                'is_active' => '1',
            ),
            46 => 
            array (
                'id' => 47,
                'salon_module_id' => 20,
                'panel' => 'Staff',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'clientdocuments',
                'action' => 'create',
                'is_active' => '1',
            ),
            47 => 
            array (
                'id' => 48,
                'salon_module_id' => 20,
                'panel' => 'Staff',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'clientdocuments',
                'action' => 'delete',
                'is_active' => '1',
            ),
            48 => 
            array (
                'id' => 49,
                'salon_module_id' => 20,
                'panel' => NULL,
                'title' => 'Download',
                'name' => 'download',
                'controller' => 'clientdocuments',
                'action' => 'download',
                'is_active' => '1',
            ),
            49 => 
            array (
                'id' => 50,
                'salon_module_id' => 19,
                'panel' => 'Staff',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'clientnotes',
                'action' => 'index',
                'is_active' => '1',
            ),
            50 => 
            array (
                'id' => 51,
                'salon_module_id' => 19,
                'panel' => 'Staff',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'clientnotes',
                'action' => 'create',
                'is_active' => '1',
            ),
            51 => 
            array (
                'id' => 52,
                'salon_module_id' => 19,
                'panel' => 'Staff',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'clientnotes',
                'action' => 'update',
                'is_active' => '1',
            ),
            52 => 
            array (
                'id' => 53,
                'salon_module_id' => 19,
                'panel' => 'Staff',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'clientnotes',
                'action' => 'delete',
                'is_active' => '0',
            ),
        ));
        
        
    }
}