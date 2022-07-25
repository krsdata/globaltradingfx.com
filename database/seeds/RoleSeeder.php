<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();

        foreach ($data as $value){
            Role::create([
                'name' => $value['name']
            ]);
        }
    }

    public function data()
    {
        return [
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'customer'],
        ];
    }
}
