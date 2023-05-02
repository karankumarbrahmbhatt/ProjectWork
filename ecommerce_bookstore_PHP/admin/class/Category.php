<?php
	include_once 'DbConfig.php';
	
	class Category extends DbConfig {

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
        
		function get_catgories_parent() {
            $query = 'SELECT * FROM categories where Parent_ID=0;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
		}

        function register_category($parent, $name, $description){
            
            $name_clean = $this->prepare_string($name);
            $description_clean = $this->prepare_string($description);
            $parent_id_clean = $this->prepare_string($parent);
            
            $query = "INSERT INTO categories(Parent_ID , Name, Description) VALUES (?,?,?)";
        
            $stmt = mysqli_prepare($this->connection, $query);

            mysqli_stmt_bind_param(
                $stmt,
                'sss',
				$parent_id_clean,
                $name_clean,
                $description_clean
            );

            $result = mysqli_stmt_execute($stmt);

            return $result;
        }
        
        function get_categories() {
            $query = 'SELECT * FROM categories;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
        }
        
        function get_category_by_id($user_id) {
            $category_id_clean = $this->prepare_string($user_id);
            $query = "SELECT * FROM categories WHERE ID = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
                $stmt,
                's',
                $category_id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return $result;
        }
        
        function update_category($category_id,$parent, $name, $description,$status){
            
            $category_id_clean = (int)$category_id;
            $parent_id_clean = $this->prepare_string($parent);
            $name_clean = $this->prepare_string($name);
            $description_clean = $this->prepare_string($description);
            $status_clean = $this->prepare_string($status);
          
            $query = "UPDATE categories SET Parent_ID = ?, Name = ?, Description = ?, Status = ? WHERE  ID = ?;";

            $stmt = mysqli_prepare($this->connection, $query);

            mysqli_stmt_bind_param(
                $stmt,
                'sssss',
				$parent_id_clean,
                $name_clean,
                $description_clean,
                $status_clean,
				$category_id_clean
            );

            $result = mysqli_stmt_execute($stmt);
            return $result;
        }
        
        function delete_category_by_id($category_id) {
            
            $category_id_clean = (int)$category_id;
            $query = "DELETE FROM categories WHERE ID = ? ;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
                $stmt,
                's',
                $category_id_clean
            );
            
            $result = mysqli_stmt_execute($stmt);

            return $result;
        }
	}
?>