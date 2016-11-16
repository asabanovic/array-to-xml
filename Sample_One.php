<?php

/**
 * XML Class used to define the XML structure
 */

class Sample_One extends XML_Feed
{
    protected function get_values(){
 		$data = $this->process_ws_data();

 		$return = [
 			'root' => [
 				'element' => $data
 			]
 		];

 		return $return;
	}
}