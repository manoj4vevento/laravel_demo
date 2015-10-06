<?php



class ServicesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the services
        $services = Service::all();
		// load the view and pass the services
        return View::make('services.index')->with('services', $services);
	}
	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('services.create');
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
            'service_name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
            return Redirect::to('services/create')
                ->withErrors($validator);
        } else {
            // store
            $service = new Service;
            $service->service_name       = Input::get('service_name');
            $service->save();

            // redirect
            Session::flash('message', 'Successfully created Service!');
            return Redirect::to('services');
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
		// get the service
        $service = service::find($id);

        // show the edit form and pass the service
        return View::make('services.edit')
            ->with('service', $service);
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
            'service_name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('services/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $service = Service::find($id);
            $service->service_name       = Input::get('service_name');
            $service->save();

            // redirect
            Session::flash('message', 'Successfully updated service!');
            return Redirect::to('services');
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
        $service = Service::find($id);
        $service->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the service!');
        return Redirect::to('services');
	}
		
	/**
	 * Display a listing of the services by their pet types.
	 *
	 * @return Response
	 */
	public function petTypes()
	{
		// get all the services
        $services = DB::table('pet_service')
            ->leftjoin('pets', 'pets.id', '=', 'pet_service.pet_id')
            ->leftjoin('services', 'services.id', '=', 'pet_Service.service_id')
			->select('pet_service.pet_id', 'pets.id', 'services.id','services.service_name')
			->get();
		// load the view and pass the services
        return View::make('services.petType')->with('services', $services);
	}
	
	
	/**
	 * Pet type allocation to service
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function allocate($id){
	
		$service = Service::find($id);
		$pets = Pet::all();
		return View::make('services.allocate')->with(array('service'=>$service,'pets'=>$pets));
	}
	
	/**
	 * Pet type allocation insert to db
	 *
	 * @param  post array
	 */
	public function add() {
			$name = Input::get('pets');
			$petservice = new PetService;
            $petservice->service_id       = Input::get('service_id');
			$petArry    = implode(",",$name);
			//print_r($petArry);die;
			$petservice->pet_id  = $petArry;
            $petservice->save();
			return Redirect::to('services/petTypes');
		
	}

}