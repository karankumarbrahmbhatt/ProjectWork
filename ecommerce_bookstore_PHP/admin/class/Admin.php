<?php
	include_once 'DbConfig.php';
	
	class Admin extends DbConfig {

		public function __construct() {
			parent::__construct();
		}

		function prepare_string($string) {
			$string = strip_tags($string);
			$string = mysqli_real_escape_string($this->connection, trim($string));
			return $string;
		}

		function get_dbc() {
			return $this->connection;
		}
        
		function check_email($email) {
		
            $email_clean = $this->prepare_string($email);
			
            $query = "SELECT * FROM register_admin WHERE email = ?;";
			
            $stmt = mysqli_prepare($this->connection, $query);
			
            mysqli_stmt_bind_param(
                $stmt,
                's',
                $email_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return $result;
			
        }
		
        function register_user($name, $email, $password){
            
            $name_clean = $this->prepare_string($name);
            $email_clean = $this->prepare_string($email);
            $password_clean = $this->prepare_string($password);
            
            $query = "INSERT INTO register_admin(name , email, password) VALUES (?,?,?)";
        
            $stmt = mysqli_prepare($this->connection, $query);

            mysqli_stmt_bind_param(
                $stmt,
                'sss',
                $name_clean,
                $email_clean,
                $password_clean
            );

            $result = mysqli_stmt_execute($stmt);

            return $result;
        }
        
        
        function get_user_by_id($user_id) {
            $user_id_clean = (int)$user_id;
            $query = "SELECT * FROM register_admin WHERE ID = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
                $stmt,
                's',
                $user_id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return $result;
        }
        
       
	}
?>