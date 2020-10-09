<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->authorizeResource(User::class, 'user');
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userCompanies = $user->companies()->get();
        $user->companies()->detach();
        foreach($userCompanies as $company) {
            $company->delete();
        }
        $this->userRepository->delete($user);

        return redirect('/')->with('success', 'User successfully deleted.');;
    }
}
