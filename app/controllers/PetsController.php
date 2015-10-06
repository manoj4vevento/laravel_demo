<?php

class PetsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the Pets
        $Pets = Pet::all();

        // load the view and pass the Pets
        return View::make('pets.index')
            ->with('pets', $Pets);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pets.create');
	}

	/**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'pet_name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
            return Redirect::to('pets/create')
                ->withErrors($validator);
        } else {
            // store
            $Pet = new Pet;
            $Pet->pet_name       = Input::get('pet_name');
            $Pet->save();

            // redirect
            Session::flash('message', 'Successfully created Pet!');
            return Redirect::to('pets');
        }
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
		// get the Pet
        $pet = Pet::find($id);

        // show the edit form and pass the Pet
        return View::make('pets.edit')
            ->with('pet', $pet);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'pet_name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('pets/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $Pet = Pet::find($id);
            $Pet->pet_name       = Input::get('pet_name');
            $Pet->save();

            // redirect
            Session::flash('message', 'Successfully updated Pet!');
            return Redirect::to('pets');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
        $Pet = Pet::find($id);
        $Pet->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Pet!');
        return Redirect::to('pets');
	}

}