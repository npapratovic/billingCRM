<?php

/*
*	AttributeRepository
*
*	Handles backend functions
*/



class AttributeRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created tag(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink)
	{
		try {

			$entry = new Attribute;
			$entry->title = $title;
			$entry->permalink = $permalink;

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Update the specified tag(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink)
	{
    	
    		try {

			$entry = Attribute::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}


	/**
	 * Remove the specified tag(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Attribute::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
