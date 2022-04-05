<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'module_id' => 3,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'modules',
                'action' => 'index',
            ),
            1 => 
            array (
                'id' => 2,
                'module_id' => 3,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'modules',
                'action' => 'create',
            ),
            2 => 
            array (
                'id' => 3,
                'module_id' => 3,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'modules',
                'action' => 'update',
            ),
            3 => 
            array (
                'id' => 4,
                'module_id' => 3,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'modules',
                'action' => 'view',
            ),
            4 => 
            array (
                'id' => 5,
                'module_id' => 3,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'modules',
                'action' => 'delete',
            ),
            5 => 
            array (
                'id' => 6,
                'module_id' => 3,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'modules',
                'action' => 'isactive',
            ),
            6 => 
            array (
                'id' => 7,
                'module_id' => 3,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'modules',
                'action' => 'export',
            ),
            7 => 
            array (
                'id' => 8,
                'module_id' => 4,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'permissions',
                'action' => 'index',
            ),
            8 => 
            array (
                'id' => 9,
                'module_id' => 4,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'permissions',
                'action' => 'create',
            ),
            9 => 
            array (
                'id' => 10,
                'module_id' => 4,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'permissions',
                'action' => 'update',
            ),
            10 => 
            array (
                'id' => 11,
                'module_id' => 4,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'permissions',
                'action' => 'view',
            ),
            11 => 
            array (
                'id' => 12,
                'module_id' => 4,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'permissions',
                'action' => 'delete',
            ),
            12 => 
            array (
                'id' => 13,
                'module_id' => 4,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'permissions',
                'action' => 'isactive',
            ),
            13 => 
            array (
                'id' => 14,
                'module_id' => 4,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'permissions',
                'action' => 'export',
            ),
            14 => 
            array (
                'id' => 15,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'roles',
                'action' => 'index',
            ),
            15 => 
            array (
                'id' => 16,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'roles',
                'action' => 'create',
            ),
            16 => 
            array (
                'id' => 17,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'roles',
                'action' => 'update',
            ),
            17 => 
            array (
                'id' => 18,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'roles',
                'action' => 'view',
            ),
            18 => 
            array (
                'id' => 19,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'roles',
                'action' => 'delete',
            ),
            19 => 
            array (
                'id' => 20,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'roles',
                'action' => 'isactive',
            ),
            20 => 
            array (
                'id' => 21,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'roles',
                'action' => 'export',
            ),
            21 => 
            array (
                'id' => 22,
                'module_id' => 5,
                'panel' => 'Backend',
                'title' => 'Access',
                'name' => 'access',
                'controller' => 'roles',
                'action' => 'index',
            ),
            22 => 
            array (
                'id' => 23,
                'module_id' => 7,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'emailtemplates',
                'action' => 'index',
            ),
            23 => 
            array (
                'id' => 24,
                'module_id' => 7,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'emailtemplates',
                'action' => 'create',
            ),
            24 => 
            array (
                'id' => 25,
                'module_id' => 7,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'emailtemplates',
                'action' => 'update',
            ),
            25 => 
            array (
                'id' => 26,
                'module_id' => 7,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'emailtemplates',
                'action' => 'view',
            ),
            26 => 
            array (
                'id' => 27,
                'module_id' => 7,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'emailtemplates',
                'action' => 'delete',
            ),
            27 => 
            array (
                'id' => 28,
                'module_id' => 7,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'emailtemplates',
                'action' => 'isactive',
            ),
            28 => 
            array (
                'id' => 29,
                'module_id' => 8,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'settings',
                'action' => 'index',
            ),
            29 => 
            array (
                'id' => 30,
                'module_id' => 8,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'settings',
                'action' => 'create',
            ),
            30 => 
            array (
                'id' => 31,
                'module_id' => 8,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'settings',
                'action' => 'update',
            ),
            31 => 
            array (
                'id' => 32,
                'module_id' => 8,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'settings',
                'action' => 'view',
            ),
            32 => 
            array (
                'id' => 33,
                'module_id' => 8,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'settings',
                'action' => 'delete',
            ),
            33 => 
            array (
                'id' => 34,
                'module_id' => 8,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'settings',
                'action' => 'isactive',
            ),
            34 => 
            array (
                'id' => 35,
                'module_id' => 8,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'settings',
                'action' => 'export',
            ),
            35 => 
            array (
                'id' => 36,
                'module_id' => 9,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'custompages',
                'action' => 'index',
            ),
            36 => 
            array (
                'id' => 37,
                'module_id' => 9,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'custompages',
                'action' => 'create',
            ),
            37 => 
            array (
                'id' => 38,
                'module_id' => 9,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'custompages',
                'action' => 'update',
            ),
            38 => 
            array (
                'id' => 39,
                'module_id' => 9,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'custompages',
                'action' => 'view',
            ),
            39 => 
            array (
                'id' => 40,
                'module_id' => 9,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'custompages',
                'action' => 'delete',
            ),
            40 => 
            array (
                'id' => 41,
                'module_id' => 9,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'custompages',
                'action' => 'isactive',
            ),
            41 => 
            array (
                'id' => 42,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'users',
                'action' => 'index',
            ),
            42 => 
            array (
                'id' => 43,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'users',
                'action' => 'create',
            ),
            43 => 
            array (
                'id' => 44,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'users',
                'action' => 'update',
            ),
            44 => 
            array (
                'id' => 45,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'users',
                'action' => 'view',
            ),
            45 => 
            array (
                'id' => 46,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'users',
                'action' => 'delete',
            ),
            46 => 
            array (
                'id' => 47,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'users',
                'action' => 'isactive',
            ),
            47 => 
            array (
                'id' => 48,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'users',
                'action' => 'export',
            ),
            48 => 
            array (
                'id' => 49,
                'module_id' => 10,
                'panel' => 'Backend',
                'title' => 'Access',
                'name' => 'access',
                'controller' => 'users',
                'action' => 'access',
            ),
            49 => 
            array (
                'id' => 50,
                'module_id' => 11,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'salons',
                'action' => 'index',
            ),
            50 => 
            array (
                'id' => 51,
                'module_id' => 11,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'salons',
                'action' => 'create',
            ),
            51 => 
            array (
                'id' => 52,
                'module_id' => 11,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'salons',
                'action' => 'update',
            ),
            52 => 
            array (
                'id' => 53,
                'module_id' => 11,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'salons',
                'action' => 'view',
            ),
            53 => 
            array (
                'id' => 54,
                'module_id' => 11,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'salons',
                'action' => 'delete',
            ),
            54 => 
            array (
                'id' => 55,
                'module_id' => 11,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'salons',
                'action' => 'isactive',
            ),
            55 => 
            array (
                'id' => 56,
                'module_id' => 11,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'salons',
                'action' => 'export',
            ),
            56 => 
            array (
                'id' => 57,
                'module_id' => 12,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'salonmodules',
                'action' => 'index',
            ),
            57 => 
            array (
                'id' => 58,
                'module_id' => 12,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'salonmodules',
                'action' => 'create',
            ),
            58 => 
            array (
                'id' => 59,
                'module_id' => 12,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'salonmodules',
                'action' => 'update',
            ),
            59 => 
            array (
                'id' => 60,
                'module_id' => 12,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'salonmodules',
                'action' => 'view',
            ),
            60 => 
            array (
                'id' => 61,
                'module_id' => 12,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'salonmodules',
                'action' => 'delete',
            ),
            61 => 
            array (
                'id' => 62,
                'module_id' => 12,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'salonmodules',
                'action' => 'isactive',
            ),
            62 => 
            array (
                'id' => 63,
                'module_id' => 12,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'salonmodules',
                'action' => 'export',
            ),
            63 => 
            array (
                'id' => 64,
                'module_id' => 13,
                'panel' => 'Backend',
                'title' => 'List',
                'name' => 'list',
                'controller' => 'salonpermissions',
                'action' => 'index',
            ),
            64 => 
            array (
                'id' => 65,
                'module_id' => 13,
                'panel' => 'Backend',
                'title' => 'Create',
                'name' => 'create',
                'controller' => 'salonpermissions',
                'action' => 'create',
            ),
            65 => 
            array (
                'id' => 66,
                'module_id' => 13,
                'panel' => 'Backend',
                'title' => 'Update',
                'name' => 'update',
                'controller' => 'salonpermissions',
                'action' => 'update',
            ),
            66 => 
            array (
                'id' => 67,
                'module_id' => 13,
                'panel' => 'Backend',
                'title' => 'View',
                'name' => 'view',
                'controller' => 'salonpermissions',
                'action' => 'view',
            ),
            67 => 
            array (
                'id' => 68,
                'module_id' => 13,
                'panel' => 'Backend',
                'title' => 'Delete',
                'name' => 'delete',
                'controller' => 'salonpermissions',
                'action' => 'delete',
            ),
            68 => 
            array (
                'id' => 69,
                'module_id' => 13,
                'panel' => 'Backend',
                'title' => 'Is active',
                'name' => 'isactive',
                'controller' => 'salonpermissions',
                'action' => 'isactive',
            ),
            69 => 
            array (
                'id' => 70,
                'module_id' => 13,
                'panel' => 'Backend',
                'title' => 'Export',
                'name' => 'export',
                'controller' => 'salonpermissions',
                'action' => 'export',
            ),
        ));
        
        
    }
}