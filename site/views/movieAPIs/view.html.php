<?php



/**
 * @package     Joomla.Administrator
 * @subpackage  com_movieAPI
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * movieAPIs View
 *
 * @since  0.0.1
 */
class movieAPIViewmovieAPIs extends JViewLegacy
{
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}


        // API endpoint URL and API key
        $api_url = $this->items[0]->url;
        $api_key = $this->items[0]->key;
//        var_dump($this->listMovies($api_url, $api_key));

        // Make HTTP request to external API & create movie card to display
//        $this->createMovieCard($this->listMovies($api_url, $api_key));

        $content = [];


        $this->content['movies'] = $this->createMovieCard($this->listMovies($api_url, $api_key));

        // var_dump($this->content['movies']);



        // Display the template
        parent::display($tpl);
}

    function listMovies($api_url, $api_key){

        // Build the URL with the API key as a query parameter
        $url_with_key = "$api_url?api_key=$api_key";
        // echo $url_with_key;

        // Set up curl with the API endpoint URL and API key
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_with_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        // Execute the curl request and store the response in a variable
        $response = curl_exec($ch);

        // Check for any errors
        if(curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close the curl session
        curl_close($ch);

        // Output the JSON response
        // var_dump($response);

        // var_dump(json_decode($response));


        $obj = json_decode($response);
        // echo json_last_error_msg();
        // var_dump($obj);
//        return $movie_list->results;

        if (!empty(($obj->results))){
            return $obj->results;
        }

        // if (!empty(($obj))){
        //     return $obj;
        // }
        return[];

        

}

    function getImageURL($image_path){
        return 'https://image.tmdb.org/t/p/w500'. $image_path; //
    }

    public function createMovieCard($obj){

        $movieCards = [];

        //loop over movies
        $movies = $obj;

        if (!empty($movies)){
            foreach ($movies as $movie){
                $content = [
                    'title' => $movie->title,
                    'description' => $movie->overview,
                    'movie_id' => $movie->id,
                    'image' => $this->getImageURL($movie->poster_path) //
                ];

                $movieCards[] = [
                    '#theme' => 'movie-card',
                    '#content' => $content,
                ];
            //    var_dump($content);
            }
        }

        return $movieCards;
    }





}