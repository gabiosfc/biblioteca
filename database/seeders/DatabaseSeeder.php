<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeding users
        $this->call([UserSeeder::class]);

        // Seeding permissions
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'Administrator']);
        $managerRole = Role::create(['name' => 'Manager']);

        foreach (Permission::all() as $permission) {
            $permission->assignRole($adminRole);
        }

        // Verifica se o usuário já existe antes de atribuir o papel
        $adminUser = User::firstOrCreate(
            ['email' => 'usera@example.com'],
            [
                'name' => 'UserA',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Mude para a senha que preferir
                'remember_token' => \Str::random(10),
            ]
        );
        $adminUser->assignRole('Administrator');

        $managerUser = User::firstOrCreate(
            ['email' => 'userb@example.com'],
            [
                'name' => 'UserB',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Mude para a senha que preferir
                'remember_token' => \Str::random(10),
            ]
        );
        $managerUser->assignRole('Manager');

        // Seeding livros
        $this->call([LivroSeeder::class]);
    }
}
