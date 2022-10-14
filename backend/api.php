<?php

require_once(realpath(dirname( __FILE__ )) . "/classes/db.php");

Class Api {
    public static $instance;
    
    public static function get_instance(){
		
		if (!isset(self::$instance))
			self::$instance = new Api();
			
			return  self::$instance;
	}
    

    public static function register ($inputs)
	{
		$output = array();
		$error = false;
		
        $db = new db();

		try {
			
            $db->start_transaction();

            $unique_code_id = $inputs["unique_code_id"];
            
            $sql = "INSERT INTO
                    customers_data (first_name, last_name, email, unique_code_id)
                VALUES (
                    " . ($inputs["first_name"] ? "'" . $db->sql_escape_string($inputs["first_name"]) . "'" : "null") . ",
                    " . ($inputs["last_name"] ? "'" . $db->sql_escape_string($inputs["last_name"]) . "'" : "null") . ",
                    " . ($inputs["email"] ? "'" . $db->sql_escape_string($inputs["email"]) . "'" : "null") . ",
                    " . $unique_code_id . ")";
            
                    
            if ($db->update($sql) == -1) {
                $error = true;
                $errorMsg = "Register SQL ERROR";
            }
            
            $id = $db->get_last_inserted_id();
            
			if (!$error) {
				$output["success"] = true;
				$output["message"] = "Registered With Success \n Good Luck!!!!";
				$db->commit();
			} else {
				$output["success"] = false;
				$output["message"] = "Register Error";
				$db->rollback();
            }
            
            self::update_unique_code($unique_code_id);
			
		} catch (Exception $e) {
			return false;
		}
		
		return $output;
	}
	
	// Check if unique code is valid
	public static function check_unique_code($code=null) {
        $output = array();
	    
	    try {
	        $db = new db();
	        
	        $sql = "SELECT
                        DISTINCT item_id,
                        used
                    FROM
						unique_codes
					WHERE
                        codes = " . $code . "";
	        
	        $result = $db->query($sql);
	        
	        while ($result && $row=$db->get_next_row($result)) {
                $unique_code_id = $row["item_id"];
                $used = ($row["used"] > 0 ? true : false);
            }

            if ($unique_code_id && !$used) {
                $output["unique_code_id"] = $unique_code_id;
                $output["success"] = true;
            } else {
	            $output["success"] = false;
	            $output["message"] = "Unique Code Invalid or Already Registered!\n\nPlease Try Again.";
	        }
	        
	    } catch (Exception $e) {
            return false;
	    }
	    
	    return $output;
    }
    
    // Update unique code
	public static function update_unique_code($unique_code_id) {
        $output = array();
	    try {
	        $db = new db();
	        
	        $sql = "UPDATE
						unique_codes
					SET
                        used = 1
                    WHERE
                        item_id = " . $unique_code_id;
	        
	    
	        if ($db->update($sql) == -1) {
				$error = true;
			} 

            if (!$error) {
				$output["success"] = true;
				$db->commit();
			} else {
				$output["success"] = false;
				$db->rollback();
			}
	        
	    } catch (Exception $e) {
            return false;
	    }
	    
	    return $output;
	}
}