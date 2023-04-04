<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usergroup;
use App\Models\UserUserGroup;
use Mail;
use App\Http\Controllers\MailController;

class UserController extends Controller
{
    /**
     * Get all user with their group
     */
        public function index()
        { 
            $users = User::with('userGroups')->get();
            $userCount = $users->count();
            return view('users.usersList', compact('users', 'userCount'));
        }

        /**
         * Delete the user if exist
         */

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete(); 
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    /**
     * Deactive  the user
     */

    public function deactivate($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->status = 0;
            $user->save();
            return redirect()->back()->with('success', 'User deactivated successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    /**
     * Delete the user from the user group
     */

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $usergroups = $user->usergroups;

        if (count($usergroups) > 0) {
            return redirect()->back()->with('error', 'Cannot delete user as they belong to usergroups');
        } else {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User has been deleted');
        }
    }

    /**
     * return users in each group
     */
    public function usergroups()
    {
        $usergroups = Usergroup::with('users')->get();
        return view('usergroups.index', compact('usergroups'));
    }

    /**
     * find user if user exist then return  
     */

    public function edit($id)
    {
        $user = User::with('userGroups')->findOrFail($id);
        $userGroups = Usergroup::all();
        if($user)
        {
            return view('users.editUserForm', compact('user','userGroups'));
        }
        
    }

    /**
     * Update the record
     */
        public function update(Request $request)
        {
            
            $validatedData = $request->validate([
                'title' => 'required|string',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required|string',
                'birthday' => 'required|date',
            ]);
            
            $user = User::find($request->input('user_id'));
         
            $user->title = $validatedData['title'];
            $user->first_name = $validatedData['first_name'];
            $user->last_name = $validatedData['last_name'];
            $user->gender = $validatedData['gender'];
            $user->birthday = $validatedData['birthday'];
            $user->save();
            
            $user->userGroups()->sync($request->input('user_group_ids'), ['created_at' => now(), 'updated_at' => now()]); 
            return redirect()->route('user.list', ['id' => $user->id])->with('success', 'User updated successfully.');
        }

        /**
         * change status active or deactive
         */

        public function activateUser(Request $request) {
            $id = $request->input('id');
            $status = $request->input('is_active');
        
            User::where('id', $id)->update(['is_active' => $status]);
        
            
        }

        /**
         * after add new user show all user in list
         */
        public function add(){
            $userGroups = Usergroup::all();
            if($userGroups)
            {
                return view('users.addUserForm', compact('userGroups'));
            }
        }

        /**
         * add new user
         */

        public function store(Request $request){
           
           
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'birthday' => 'required|date_format:Y-m-d',
                'title' => 'required|string|max:255',
                'user_group_ids' => 'required|array',
                'user_group_ids.*' => 'exists:user_groups,id',
                'gender' => 'nullable|string|in:male,female,other',
            ]);
           
           
            $user = new User();
            $user->first_name = $validatedData['first_name'];
            $user->last_name = $validatedData['last_name'];
            $user->email = $validatedData['email'];
            $user->birthday = $validatedData['birthday'];
            $user->title = $validatedData['title'];
            $user->gender = $validatedData['gender'];   
            $user->save();
            
            foreach($validatedData['user_group_ids'] as $user_group_id){
                $user->userGroups()->attach($user_group_id, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

           
            MailController::index($user->email,$validatedData);

           
            return redirect()->back()->with('success', 'User added successfully');
        }

        /**
         * to retreive all users and groups
         */

    public function getAllUsergroupsAndUsers()
    {
        
        $usergroups = Usergroup::with('users')->get();
        $usergroupsArray = [];

        foreach ($usergroups as $usergroup) {
            $usergroupArray = [
                'id' => $usergroup->id,
                'name' => $usergroup->name,
                'users' => $usergroup->users->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ];
                })->toArray(),
            ];

            array_push($usergroupsArray, $usergroupArray);
        }
        echo'<pre>';
        print_r($usergroupsArray);
    }
    
}
