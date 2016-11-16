<?php

/**
 * @description This class is used for writing additional methods to aid your XML class object,
 * in case there are multiple XML files that would be based off the same engine
 *
 * @author  Adnan Sabanovic <adnanxteam@gmail.com>
 * 
 */

abstract class XML_Feed extends XML_Main 
{
	public function __construct($name = 'default_rss')
	{
		echo $this->print_xml();
		$this->save_file($name);
	}

	/**
	 * Example method
	 */
	public function capitalize_each_word_in_sentence($sentence)
	{
		return ucwords($sentence);
	}

	/**
	 * Example method
	 */
	public function get_ws_data()
	{
		$ws_url = 'https://jsonplaceholder.typicode.com/comments?postId=1';

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $ws_url
			));
		$ws_response = curl_exec($curl);

		return json_decode($ws_response);
	}

	/**
	 * Example method
	 */
	public function process_ws_data()
	{
		$data = $this->get_ws_data();
		$edited_data = [];

		foreach ($data as $key => $value) {
			if(isset($value->name)) {
				$value->name = $this->capitalize_each_word_in_sentence($value->name);
			}
			$value = (array)$value;
			array_push($edited_data, $value);
		}

		return $edited_data;
	}
}