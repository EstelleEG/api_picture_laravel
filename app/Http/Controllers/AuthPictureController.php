<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthPictureController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(request $request)   //Pour paginer l api
    // {
    //     $page = $request->has('page') ? $request->get('page'): 1;
    //     $limit = $request->has('limit') ? $request->get('limit'): 1;
    //     //offset : decalage when we start a pagination
    //     $offset = ($page-1)*$limit;
    //     return Picture::orderBy('created_at','Asc')
    //     ->limit($limit)
    //     ->offset($offset)
    //     ->get();
    //     //return $request->all();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)   //'create' of the crud
    {
        $input = $request->all();
        $validator = Validator::make($input,[  //validator to check if input fields are well filled out
            'title'=>'required',
            'url'=>'required'
        ]);
        if ($validator->fails()){ 
            return $this->sendError('Validation Error.',$validator->errors());
        }

        $picture = Picture::create( $input );
            return "Picture created successfully!";
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    // public function show(Picture $picture)    //'show' of the crud
    // {
    //         return $picture;
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Picture  $picture
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Picture $picture)   //'update' of the crud
    // {
    //     if ($picture->update($request->all() ) ){ 
    //         return "Picture updated successfully!";
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)    //'delete' of the crud
    {
        if ($picture->delete()){ 
            return "Picture deleted successfully!";
        }
    }
}
