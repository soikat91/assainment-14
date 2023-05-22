<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookController extends Controller
{

    function createName( Request $request){
   
        $name=$request->get('name');
    
        return "Name={$name}";
    }
    
    // header code 
    function userAgent(Request $request){

        $userAgent=$request->header('User-Agent');

        return "User-Agent={$userAgent}";

    }



    //  create Json File

    function CreateJson(){

        $data=[  
            'name'=>'John Doe',
            'age'=>25,     
        ];

        $response=[
            'message'=>'success',
            'data'=>$data
        ];

        return response()->json($response);    

    }


    // file uploaded

    function photo(Request $request){

        if($request->hasFile('avatar')){

            $avatar=$request->file('avatar');
            $newAvatar=$avatar->getClientOriginalName();
            $path=public_path('uploads');
            
            $avatar->move($path,$newAvatar);
            return response()->json([
                'message' => 'File uploaded successfully',
                'file' => $newAvatar
            ]);
        }

        return response()->json([
            'message' => 'No file was uploaded'
        ], 400);

        }


    // cookie 

    function rememberToken(Request $request){

        $rememberToken=$request->cookie('remember_token',null);

        if($rememberToken !== null){

             return "Cookie Set";
        }else{
            return "Cookie Null";
        }

    }

    // query parameter code
    function page(Request $request){

        $page=$request->query('page',null);

        if($page===null){
            $page=null;

        }else{
            return $page;
        }
    }



    // email input post in route

    function createPost(Request $request){

        $email=$request->input('email');

        return response()->json([

            'data'=>$email,
            'success'=>true,
            'message'=>'Form Submitted Successfully', 
        
        ]);

    }





}




