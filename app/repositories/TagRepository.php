<?php

/*
*	TagRepositoryRepository
*
*	Handles backend functions
*/



class TagRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created dispatch(es) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $description)
	{
		try {

			$entry = new Tag;
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
	 * Update the specified dispatch(es) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $description)
	{
    	
    		try {

			$entry = Tag::find($id);
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
	 * Remove the specified dispatch(es) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Tag::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
