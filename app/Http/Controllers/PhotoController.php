<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Image;
use App\Models\Photo;
use Response;

class PhotoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return 'create';
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $request = \Request::all();
        $file = new Image($request['file']);
        $photo = new Photo(['photo' => $file]);
        $photo->put();
        $photo->save();
        $photoLinks = [
            'untouched' => url() .'/'. str_replace('\\', '/', $photo->getUntouched()),
            'medium'    => url() .'/'. str_replace('\\', '/', $photo->getMedium()),
            'thumb'     => url() .'/'. str_replace('\\', '/', $photo->getThumb()),
            'id'        => $photo->id
        ];

        return $photoLinks;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
