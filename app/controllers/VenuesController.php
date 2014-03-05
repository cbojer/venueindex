<?php

use VenueIndex\Repositories\VenueRepository;
use VenueIndex\Services\VenueHandler;

class VenuesController extends BaseController {

	protected $repo;

	public function __construct(VenueRepository $repo,  VenueHandler $handler) {
		
		$this->repo = $repo;
		$this->handler = $handler;
	}

	public function index()
	{

		$venues = $this->repo->getPaginated();

		return View::make('venue.index', compact('venues'));


	}

	public function show($id) {

		$venue = $this->repo->findById($id);

		return View::make('venue.show', compact('venue'));
	
	}
 
	public function create() {

		return View::make('venue.create');
	
	}

	public function store() {

		$input = Input::all();

		$createVenue = $this->handler->createVenue($input);

		if($createVenue) {

			return Redirect::route('venues.index')->withFlashMessage('Venue ' . $input['name'] . ' was created succesfully');
		}

		return Redirect::route('venues.create')->withInput()->withErrors($errors);
	}

	public function edit($id) {
		
		$venue = $this->repo->findById($id);

		return View::make('venue.edit', compact('venue'));
	
	}

	public function update($id) {

		$input = Input::all();

		$updateVenue = $this->handler->updateVenue($input, $id);

		if($updateVenue)  {

			return Redirect::route('venues.index')->withFlashMessage('Venue ' . $input['name'] . ' was succesfully updated');
		}

		return Redirect::route('venues.edit')->withInput()->withErrors($errors);
	}

	public function destroy($id) {

		$deleteVenue = $this->repo->deleteVenue($id);

		if($deleteVenue) {

			return Redirect::route('venues.index')->withFlashMessage('Venue was succesfully deleted');

		}

		return Redirect::route('venues.index')->withFlashMessage('Venues was not deleted. Please check that you provided a valid venue id.');

	}

}