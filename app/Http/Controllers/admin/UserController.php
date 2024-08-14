<?php

namespace App\Http\Controllers\admin;

use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\user\changePassword\RequestChangePassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\RequestRegister;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $this->userService = $userService;
    }

    public function indexUser()
    {

        $users = $this->userService->getAllUser()->where("id", "!=", auth()->user()->id);

        return view("admin.userControl.user.lihat", [
            "title" => "User",
            "action" => "user",
            "users" => $users->paginate(5),
        ]);
    }

    public function showUser($id)
    {
        $user = $this->userService->getDataUserById($id);

        return view("admin.userControl.user.edit", [
            "title" => "Detail User",
            "action" => "user",
            "user" => $user,
        ]);
    }

    public function storeUser($id)
    {
        $user = $this->userService->getDataUserById($id);

        return view("admin.userControl.user.detail", [
            "title" => "User",
            "action" => "user",
            "user" => $user,
        ]);
    }

    public function updateUser(RequestRegister $request, $id)
    {
        $validation = $request->validated();
        $user = $this->userService->updateUser($validation, $id);
        $user = $this->userService->getDataUserById($id);

        return redirect()->route("user.index")->with("successForm", "Berhasil mengubah " . $user->email);
    }

    public function changePasswordUserIndex()
    {

        return view("admin.userControl.ubahPassword.lihat", [
            "title" => "Ubah password user",
            "action" => "user",
        ]);
    }

    public function changePasswordUser(RequestChangePassword $request)
    {
        $validation = $request->validated();

        if (!Hash::check($validation["password_lama"], auth()->user()->password)) {
            return back()->with("error", "Password lama tidak cocok !");
        }

        $this->userService->updateUser([
            "password" => Hash::make($validation["password"]),
        ], auth()->user()->id);

        return back()->with("success", "Berhasil mengubah password");
    }

    public function indexLogActiviy()
    {

        $activityLog = $this->userService->getAllActivityLogWithUser();

        return view("admin.userControl.logActivity.lihat", [
            "title" => "User",
            "action" => "user",
            "activityLog" => $activityLog->paginate(5),
        ]);
    }
}
