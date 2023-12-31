<?php

namespace App\Http\Controllers\User;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponser;
use App\Http\Requests\User\AdminUserCreateRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Mail\AdminCreateUser;
use App\Mail\RegistrarUser;
use App\Models\Role;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Services\Employee\EmployeeCreator;
use App\Services\User\UserGetter;
use App\Services\User\UserCreator;
use App\Services\User\UserUpdater;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use ApiResponser;

    protected $userRepository, $userFilter;

    public function __construct(UserRepository $userRepository, UserFilter $userFilter)
    {
        $this->userRepository = $userRepository;
        $this->userFilter = $userFilter;
    }

    public function index(Request $request)
    {
        $this->authorize('read', $this->userRepository->getModel());
        $user = User::distinct();
        $data = $request->all();
        $this->userFilter->applyFilters($user, $data);
        $users = $user->paginate(50);
        $roles = Role::all();
        return view('admin.pages.user.index', compact('users', 'request', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user.create', compact('roles'));
    }


    public function store(AdminUserCreateRequest $request)
    {
        $this->authorize('store', $this->userRepository->getModel());
        $data = $request->all();
        try {
            $data['token'] = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $role = Role::where('name', $data['role'])->first();
            $data['password'] = $this->generateRandomAlphabeticString(8);
            $data['reference'] = $data['password'];
            $data['password'] = bcrypt($data['password']);
            $data['phone_number'] = $data['token'];
            $user = $this->userRepository->create($data);
            if ($user == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $user->roles()->attach($role);
            Mail::to($user->email)->send(new AdminCreateUser($user));
            session()->flash('success', 'Account has been created successfully.');
            return redirect()->route('dashboard.user.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->userRepository->getModel());
        $user = $this->userRepository->findById($id);
        $roles = Role::all();
        return view('admin.pages.user.edit', compact('user', 'roles'));
    }

    public function show(UserGetter $userGetter, $id)
    {
        return $userGetter->show($id);
    }

    public function destroy(UserUpdater $userUpdater, $id)
    {
        return $userUpdater->delete($id);
    }

    public function update(UserUpdateRequest $userUpdateRequest, $id)
    {
        $this->authorize('update', $this->userRepository->getModel());
        $data = $userUpdateRequest->all();
        try {
            $role = Role::where('name', $data['role'])->first();
            $user = $this->userRepository->update($data, $id);
            if ($user == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $user->roles()->sync([$role->id]);
            session()->flash('success', 'Account has been updated successfully.');
            return redirect()->route('dashboard.user.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    private function generateRandomAlphabeticString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}
