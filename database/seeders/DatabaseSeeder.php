<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = Role::create(['name' => 'Super admin', 'guard_name' => 'web']);
        $user = User::factory()->create([
            'name' => 'Ijaz ul haq',
            'email' => 'dev.ijazulhaq@gmail.com',
        ]);
        $user->syncRoles($role);
    }
}
