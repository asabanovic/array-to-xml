<?php

/**
 * XML Class used to define the XML structure
 */

class Sample_Two extends XML_Feed
{
    protected function get_values(){
 		$data = [
 			'tag-1' => [
 				['tag-1-child' => 'value 1'],
 				['tag-2-child' => 'value 2'],
 				['tag-3-child' => 'value 3'],
 				['tag-4-child' => 'value 4']
 			],
 			'?' => [
 				'picture' => [
 					'jpg',
 					'png',
 					'gif'
 				]
 			],
 			'newElement*param1*value1*param2*value2*param3*value3*param4*value4' => [
 				'post1',
 				'post2',
 				'post3',
 				'post4'
 			],
 			'abc' => 'def',
 			'ball*type*soccer' => [
 				['player1' => 'value 1'],
 				['player2' => 'value 2'],
 				['player3' => 'value 3'],
 				['player4' => 'value 4']
 			]
 		];

 		$return = [
 			'root' => [
 				'elements' => $data
 			]
 		];

 		return $return;
	}
}