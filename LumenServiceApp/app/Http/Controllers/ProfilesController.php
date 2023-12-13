<?php 

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Add this line to import the Validator class
class ProfilesController extends Controller{
    public function getAll(){
        $profiles = Profile::all();
        return response()->json($profiles);
    }
    
    public function store(Request $request){
        $input = $request->all();

        $validationRules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'summary' => 'required',
        ];

        $validator = Validator::make($input, $validationRules); // Fix the undefined type and unknown class error

        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $profile = Profile::where(['user_id' => Auth::user()->id])->first();
        if (!$profile){
            $profile = new Profile;
            $profile->user_id = Auth::user()->id;
        }

        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->summary = $request->input('summary');

        // jika ada file yang diupload
        if ($request->hasFile('image')){
            $imageExtension = $request->file('image')->getClientOriginalExtension();
            $firstName = str_replace(' ', '-', $request->input('first_name'));
            $lastName = str_replace(' ', '-', $request->input('last_name'));
            $imageName = Auth::user()->id . '-' . $firstName . '-' . $lastName . '.' . $imageExtension;
            $request -> file('image')->move(storage_path('uploads/image_profile'), $imageName);

            $current_image_path = storage_path('avatar'). '/' . $profile->image;
            if (file_exists($current_image_path)){
                unlink($current_image_path);
            }
            $profile->image = $imageName;
        }

        $profile->save();
        return response()->json($profile,200);

    } 

    public function show($userId)
    {
        $profile = Profile::where('user_id', $userId)->first();

        if (!$profile) {
            abort(404);
        }

        return response()->json($profile, 200);
    }

    public function image($imageName)
    {
        $imagePath = storage_path('uploads/image_profile') . '/' . $imageName . '.jpeg' ?? storage_path('uploads/image_profile') . '/' . $imageName . '.jpg' ?? storage_path('uploads/image_profile') . '/' . $imageName . '.png';

        if (!file_exists($imagePath)) {
            return response()->json(['message' => 'Image not found'], 404);
        } 
        $file = file_get_contents($imagePath);
        return response($file, 200)->header('Content-Type', 'image/jpeg' ?? 'image/jpg' ?? 'image/png');
    }
}