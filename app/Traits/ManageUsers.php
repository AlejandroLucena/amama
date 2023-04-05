<?php
namespace App\Traits;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait ManageUsers {
    
    use ManageFiles;

    protected function userInput(string $file = null): array {
        
        return [
            "name" => request("name"),
            "surname_1" => request("surname_1"),
            "surname_2" => request("surname_2"),
            "phone" => request("phone"),
            "city" => request("city"),
            "address" => request("address"),
            "postal_code" => request("postal_code"),
            "work" => request("work"),
            "email" => request("email"),
            'acceptTermUse' => request('acceptTermUse'),
            'acceptTermAgreement' => request('acceptTermAgreement'),
            'password' => bcrypt(request('password')),
            'token' => sha1(time()),
        ];
    }

    public function updateUserProfile(Request $request, User $user, $obj_type){
        try {
            DB::beginTransaction();

            $user->fill($this->userInput())->save();

            DB::commit();

            if ($request->hasFile('image')) {
                $media = $this->storeFile($request, 'image', Config::get('filesystems.disks.s3.rootfolder') . Media::MEDIA_TYPE_IMAGE . '/' . $obj_type . '/' . sha1($user->id) );
                $user->media()->attach($media->id);
                $user->save();
            }
            session()->flash("message", ["success", __("Perfil actualizado satisfactoriamente")]);
            return $user;
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash("message", ["danger", $e->getMessage()]);
            return false;
        }
    }

}
