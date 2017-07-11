<?php
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class AdminRolesPerms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin Roles
        $admin = new Role();
        $admin->name 			= 'admin';
        $admin->display_name	= 'User Administrator';
        $admin->description 	= 'User is allowed to manage and edit other users';
        $admin->save();

        $others = new Role();
        $others->name 			= 'others';
        $others->display_name 	= 'Other user';
        $others->description 	= 'The default user';
        $others->save();

        //Permissions
        $manageSites = new Permission();
        $manageSites->name 		   = 'manage-sites';
        $manageSites->display_name = 'Manage Sites and Channels';
        $manageSites->description  = 'Can add edit or delete sites and channels';
        $manageSites->save();

        $editUser = new Permission();
        $editUser->name 		   = 'manage-user';
        $editUser->display_name    = 'Edit Users';
        $editUser->description     = 'edit existing users';
        $editUser->save();
        
        //attaching permission(s) to roles
        $admin->attachPermissions(array($manageSites,$editUser));

        //$root = User::where('name','=','admin')->first();
        //$root->attachRole($admin);
        //$root->roles()->attach($admin->id);


     //    $hash  = App::make('hash');
     //    $root = new User();
     //    $root->name  = 'root';
     //    $root->type  = 'admin';
     //    $root->email = 'veeraprasadsmart@gmail.com';
     //    $root->password = $hash->make('12345678');
     //    $root->save();

    	// $adminrole = Role::where('name', '=', 'admin')->first();
    	// $rootuser = User::where('type','=','admin')->first();
    	// //echo $adminrole->name;
    	// //echo $adminrole->description;
    	// //echo $rootuser->name;
     //    $rootuser->attachRole($adminrole);
        //$rootuser->roles()->attach($adminrole->id);
        //$rootuser->attachRole($adminrole);
        //$rootuser->roles()->attach($adminrole->id);
    }
}
