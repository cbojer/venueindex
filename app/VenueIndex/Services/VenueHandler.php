<?php namespace VenueIndex\Services;

use Venue;
use VenueIndex\Repositories\VenueRepository;

class VenueHandler {

	public function __construct(Venue $venue, VenueRepository $repo) {
		
		$this->venue = $venue;
		$this->repo = $repo;
	
	}

	public function createVenue($input) {
		
		$isValidForCreation = $this->venue->validateForCreation($input);

		if($isValidForCreation) {
			$storeNewVenue = $this->repo->storeNew($input);

			if($storeNewVenue) return true;

			throw new VenueNotStoredException;
		}

		return $errors;
	}

	public function updateVenue($input, $id) {

		$isValidForUpdate = $this->venue->validateForUpdate($input, $id);

		if($isValidForUpdate) {
			$storeUpdatedVenue = $this->repo->storeUpdatedVenue($input, $id);

			if($storeUpdatedVenue) return true;

			throw new VenueNotStoredException;

		}
		
		return $errors;
	}



}