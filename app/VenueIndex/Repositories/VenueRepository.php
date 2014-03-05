<?php namespace VenueIndex\Repositories;

use Venue;

class VenueRepository {


	public function getPaginated() {
			
		return Venue::paginate(15);
	}

	public function storeNew($input) {

		$create = Venue::create($input);

		if($create) return true;

		return false;
	
	}

	public function storeUpdated($id, $input) {

		$venue = $this->findById($id);
		$update = $venue->update($input);
		
		if($update) return true;

		return false;
	
	}

	public function findById($id) {

		return Venue::findOrFail($id);	
	}
}