<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FormElementTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('form_element_type')->delete();
        
        \DB::table('form_element_type')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'First Name',
                'icon' => 'User-Name.png',
                'section_type' => 'ClientDetail',
                'can_repeat' => 0,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'text',
                'questionholder' => '',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Last Name',
                'icon' => 'User-Name.png',
                'section_type' => 'ClientDetail',
                'can_repeat' => 0,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'text',
                'questionholder' => '',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Email',
                'icon' => 'Email.png',
                'section_type' => 'ClientDetail',
                'can_repeat' => 0,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'text',
                'questionholder' => '',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Mobile',
                'icon' => 'Mobile.png',
                'section_type' => 'ClientDetail',
                'can_repeat' => 0,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'text',
                'questionholder' => '',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Address Name',
                'icon' => 'Address.png',
                'section_type' => 'ClientDetail',
                'can_repeat' => 0,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'textarea',
                'questionholder' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Birthday',
                'icon' => 'Birthday.png',
                'section_type' => 'ClientDetail',
                'can_repeat' => 0,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'date',
                'questionholder' => '',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Heading',
                'icon' => 'Heading.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 1,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'texthead',
                'questionholder' => 'Add heading for the section',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Text Block',
                'icon' => 'Text-Block.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 1,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'textblock',
                'questionholder' => 'Add text',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Drop Down',
                'icon' => 'Drop-Down.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 1,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'select',
                'questionholder' => 'Add Question',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Multiple-Choice',
                'icon' => 'Multiple-Choice.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 1,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'multicheckbox',
                'questionholder' => 'Add Question',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Short Answer',
                'icon' => 'Short-Answer.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'text',
                'questionholder' => '',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Long Answer',
                'icon' => 'Long-Answer.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 0,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'textarea',
                'questionholder' => '',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Yes or No',
                'icon' => 'Yes-or-No.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 1,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'radio',
                'questionholder' => 'Add Question',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Checkbox',
                'icon' => 'Checkbox.png',
                'section_type' => 'FormSection',
                'can_repeat' => 1,
                'is_edit' => 1,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'form_type' => 'checkbox',
                'questionholder' => 'Ask to confirm something',
            ),
        ));
        
        
    }
}