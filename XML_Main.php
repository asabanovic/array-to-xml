<?php

/**
 * @description Main XML Class used to convert PHP to XML
 *
 * @author Adnan Sabanovic <adnanxteam@gmail.com>
 */

abstract class XML_Main 
{

	protected $xml = '';	
    
    /**
     * This method needs to return an array from a child class to be processed by this class
     * @return [array] [Multi-dimensional array]
     */
	abstract protected function get_values();

	protected function print_xml()
	{
		$array = $this->get_values();
		$this->xml .= '<?xml version="1.0" encoding="UTF-8"?>';
		$this->print_array_in_recursion($array, null);
		return $this->xml;
	}

	protected function print_array_in_recursion($array, $repetable_key = null)
	{
		foreach ($array as $key => $value) {
			$param1 = $param2 = $param3 = $param4 = '';
		    $unprocessed_key = $key;

			// Special case when adding tag parameters
			if($key == '?' && $key != 0) {
				$this->print_array_in_recursion($value);
			}

			if($attributes = $this->check_for_tag_attributes($key)) {
				if(isset($attributes[0])) {
				    $key = $attributes[0];
				}
				if(isset($attributes[1])) {
				    $attr1 = $attributes[1];
				}
				if(isset($attributes[2])) {
				    $attr_val1 = $attributes[2];
				}
				if(isset($attributes[3])) {
				    $attr2 = $attributes[3];
				}
				if(isset($attributes[4])) {
				    $attr_val2 = $attributes[4];
				}
				if(isset($attributes[5])) {
				    $attr3 = $attributes[5];
				}
				if(isset($attributes[6])) {
				    $attr_val3 = $attributes[6];
				}
				if(isset($attributes[7])) {
				    $attr4 = $attributes[7];
				}
				if(isset($attributes[8])) {
				    $attr_val4 = $attributes[8];
				}
  			}

			if($repetable_key){
 				if($attributes = $this->check_for_tag_attributes($repetable_key)){
 					if(isset($attributes[0])) {
				    	$repetable_key_val = $attributes[0];
					}
					if(isset($attributes[1])) {
					    $attr1 = $attributes[1];
					}
					if(isset($attributes[2])) {
					    $attr_val1 = $attributes[2];
					}
					if(isset($attributes[3])) {
					    $attr2 = $attributes[3];
					}
					if(isset($attributes[4])) {
					    $attr_val2 = $attributes[4];
					}
					if(isset($attributes[5])) {
					    $attr3 = $attributes[5];
					}
					if(isset($attributes[6])) {
					    $attr_val3 = $attributes[6];
					}
					if(isset($attributes[7])) {
					    $attr4 = $attributes[7];
					}
					if(isset($attributes[8])) {
					    $attr_val4 = $attributes[8];
					}
			    } else {
					$repetable_key_val = $repetable_key;
				}
			}

			if(isset($attr1) && !empty($attr_val1)) {
				$param1 = "$attr1='$attr_val1'";
			} 
				
			if(isset($attr2) && !empty($attr_val2)) {
				$param2 = "$attr2='$attr_val2'";
			} 
				
			if(isset($attr3) && !empty($attr_val3)) {
				$param3 = "$attr3='$attr_val3'";
			}
				
			if(isset($attr4) && !empty($attr_val4)) {
				$param4 = "$attr4='$attr_val4'";
			}
            
			if(!is_array($value)) {
				if($repetable_key) {
					if($attributes) {
						$this->xml .= "<$repetable_key_val $param1 $param2 $param3 $param4>$value</$repetable_key_val>";	
					} else {
						$this->xml .= "<$repetable_key_val>$value</$repetable_key_val>";
					}
				} else {
					if($attributes) {
						$this->xml .= "<$key $param1 $param2 $param3 $param4>$value</$key>";
					} else {
						$this->xml .= "<$key>$value</$key>";
				    }
				}
			} else if(is_array($value)) {
				if(!$this->is_assoc($value)) {
					$this->print_array_in_recursion($value, $unprocessed_key);
				} else {
					if($repetable_key) {
						if($attributes) {
							$this->xml .= "<$repetable_key_val $param1 $param2 $param3 $param4>";
							$this->print_array_in_recursion($value);
							$this->xml .= "</$repetable_key_val>";
						} else {
							$this->xml .= "<$repetable_key_val>";
							$this->print_array_in_recursion($value);
							$this->xml .= "</$repetable_key_val>";	
						}
							
					} else {
						if($key == '?') {
							$this->print_array_in_recursion($value);
						} else {
							if($attributes) {
								$this->xml .= "<$key $param1 $param2 $param3 $param4>";
								$this->print_array_in_recursion($value);
								$this->xml .= "</$key>";
							} else {
								$this->xml .= "<$key>";
								$this->print_array_in_recursion($value);
								$this->xml .= "</$key>";
							}
						}
					} 
				}
			}
		}
	}

	protected function check_for_tag_attributes($key)
	{
		if (strpos($key, '*') !== false) {
			return explode('*', $key);
		}
		return false;
	}

	/**
	 * Check if an array is associative or not
	 */
	protected function is_assoc(array $arr)
	{
		if (array() === $arr) return false;
		return array_keys($arr) !== range(0, count($arr) - 1);
	}

	/**
	 * Save XML to the root
	 */
	protected function save_file($name)
	{
		if(empty($name)){
			return false;
		}
		
		$filename = $name.'.xml';
		$fh = fopen($filename, "w");
		fwrite($fh, $this->xml);
		fclose($fh);
	}

}