<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class CompanyRolesPerms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        $company = new Role();
        $company->name 			= 'company';
        $company->display_name  = 'Company';
        $company->description   = 'User is allowed to manage and edit members';
        $company->save();

        $member  = new Role();
        $member->name 			= 'member';
        $member->display_name   = 'Member';
        $member->description    = 'User is allowed to manage and edit posts';
        $member->save();

        $others = new Role();
        $others->name           = 'others';
        $others->display_name   = 'Other user';
        $others->description    = 'The default user';
        $others->save();
        
        //Permissions
        $editMember = new Permission();
        $editMember->name 		   = 'manage-member';
        $editMember->display_name  = 'Edit member';
        $editMember->description   = 'can add edit or delete memeber';
        $editMember->save();

        $managePosts = new Permission();
        $managePosts->name 		   = 'manage-posts';
        $managePosts->display_name = 'Manage Posts';
        $managePosts->description  = 'Can add edit posts';
        $managePosts->save();

        //attaching permission(s) to roles
        $member->attachPermissions(array($managePosts));
        $company->attachPermissions(array($editMember));


        //$root = User::where('name','=','admin')->first();
        //$root->attachRole($admin);
        //$root->roles()->attach($admin->id);
        
    }
}