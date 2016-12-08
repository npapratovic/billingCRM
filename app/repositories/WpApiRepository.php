<?php

/*
*	WpApiRepositoryRepository
*
*	Handles backend functions
*/



class WpApiRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created WpApi(es) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $description)
	{
		try {

			$entry = new WpApi;
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->description = $description;

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Update the specified WpApi(es) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $description)
	{
    	
    		try {

			$entry = WpApi::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->description = $description;

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}


	/**
	 * Remove the specified WpApi(es) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = WpApi::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
