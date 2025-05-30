<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            1 => [
                'roles' => [1], // User ID 1 (admin) diberi role ID 1 (admin)
            ],
            2 => [
                'roles' => [2], // User ID 2 (user) diberi role ID 2 (user)
            ],
        ];

        foreach ($roles as $id => $role) {
            $user = User::find($id);

            if (!$user) {
                $this->command->warn("User dengan ID {$id} tidak ditemukan.");
                continue;
            }

            foreach ($role as $relation => $ids) {
                if (method_exists($user, $relation)) {
                    $user->{$relation}()->sync($ids);
                } else {
                    $this->command->warn("Relasi '{$relation}' tidak ditemukan di model User.");
                }
            }
        }
    }
}
