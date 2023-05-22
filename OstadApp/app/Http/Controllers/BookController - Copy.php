<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookController extends Controller
{
   private $books=[
    [
    'author'=>'Jane Auston',
    'title'=>'Pride and Prejudice'
    ],

    [
    'author'=>'Nazrul',
    'title'=>'Bidrohi'
    ],
    [
    'author'=>'Robindro',
    'title'=>'Gitanjoli'
    ],
    [
    'author'=>'Test',
    'title'=>'Pride and Prejudice'
    ],
    [
    'author'=>'Testing',
    'title'=>'Pride and Prejudice'
    ],
];

// function books(){

//     return $this->books;
// }

function getBook($id){

    $bookId=$id-1;
    return $this->books[$bookId];

}


// function createBook( Request $request){
   
//    $author=$request->get('author');
//    $title=$request->get('title');

//    return "Author={$author} Title={$title}";
// }


 function getBoooksField($id,$field){

    $bookId=$id-1;
    $books=$this->books[$bookId];
    return $books[$field];
 }


 function books( Request $request){

  $limit=$request->query('limit',0);

    if($limit==0){
        return $this->books;
    }else{
        return array_splice($this->books,0,$limit);
    }
    
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

       return "Cookie is Here";
    }else{
        echo "Cookie is Null" ;
    }



 }

// header code 
 function userAgent(Request $request){

    $userAgent=$request->header('User-Agent');

    return "User-Agent={$userAgent}";

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


function createName( Request $request){
   
    $name=$request->get('name');
 
    return "Name={$name}";
 }



}




