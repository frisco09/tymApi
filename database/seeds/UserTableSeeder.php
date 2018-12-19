<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::flushEventListeners();
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->user_psp = 'userPsp1';
        $user->phone = '02203456';
        $user->status = "no disponible";
        $user->credito = '0';
        $user->verified = '0';
        $user->user_img_pr = 'user.jgp';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        
        $user1 = new User();
        $user1->name = 'User';
        $user1->email = 'user_2@example.com';
        $user1->user_psp = 'userPsp2';
        $user1->phone = '02303456';
        $user1->status = "no disponible";
        $user1->credito = '0';
        $user1->verified = '0';
        $user1->user_img_pr = 'user.jgp';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($role_user);

        $user2 = new User();
        $user2->name = 'User';
        $user2->email = 'user_3@example.com';
        $user2->user_psp = 'userPsp3';
        $user2->phone = '02403456';
        $user2->status = "no disponible";
        $user2->credito = '0';
        $user2->verified = '0';
        $user2->user_img_pr = 'user.jgp';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->user_psp = 'userPsp1';
        $user->phone = '02034560';
        $user->status = "no disponible";
        $user->credito = '0';
        $user->verified = '0';
        $user->user_img_pr = 'http://via.placeholder.com/150x150';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
     }
}
