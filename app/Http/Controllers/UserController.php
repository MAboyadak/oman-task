<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\File;
use App\Http\Requests\FileUploadRequest;


class UserController extends Controller
{

    public function usersInAGivenCountry()
    {
        $country = 'Canada';
        $country = Country::where('name',$country)->firstOrFail();
        $companies = $country->companies;
        $users = User::all();
        
        return view('test', compact('country','companies','users'));
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function store(FileUploadRequest $request)
    {
        if($request->file('file')) {
            $uploadedFile = $request->file('file');

            if($this->searchFor('Proposal',$uploadedFile) != true){ // if file doesn't contain "Proposal" it should return false
                return false;
            }

            $fileName = $uploadedFile->getClientOriginalName();
            $filePath = $uploadedFile->storeAs('files', $fileName, 'public');
            $fileSize = \File::size(public_path('storage/'.$filePath));
            $fileSize = round($fileSize / 1024/1024);

            $result = $this->checkDuplicatedFile($fileName,$fileSize);

            if(! $result){ // if the file isn't exist, create new
                $file = new File();
                $file->name = $fileName;
                $file->path = '/storage/' . $filePath;
                $file->size = $fileSize;
                $file->save();
            }

            return true;
        }
    }

    private function searchFor($needle,$heap)
    {
        // here should go the searching
        return true;
    }

    private function checkDuplicatedFile($name,$size)
    {
        $file = new File();
        // $_size = round($size / 1024/1024) ;
        $file = $file->where('name','=',"$name")
                     ->where('size','=',"$size")->first();
        if($file){return $file;} else{return false;}
    }
}
