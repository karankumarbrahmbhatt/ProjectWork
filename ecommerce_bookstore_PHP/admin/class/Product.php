<?php
	include_once 'DbConfig.php';
	
	
	class Product extends DbConfig {
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
        
		
        function register_product($cat_id,$subcat_id,$name, $description, $reg,$sales,$status,$image){
            
            $cat_id_clean = (int)$cat_id;
            $subcat_id_clean = $this->prepare_string($subcat_id);
            $name_clean = $this->prepare_string($name);
            $description_clean = $this->prepare_string($description);
            $regular_price_clean = $this->prepare_string($reg);
            $sales_price_clean = $this->prepare_string($sales);
			$status_clean = $this->prepare_string($status);
			
			$query = "INSERT INTO products(cat_id,subcat_id,name,description,image,regular_price,sales_price,status) VALUES (?,?,?,?,?,?,?,?)";
			
			$stmt = mysqli_prepare($this->connection, $query);
			
			mysqli_stmt_bind_param(
			$stmt,
			'ssssssss',
			$cat_id_clean,
			$subcat_id_clean,
			$name_clean,
			$description_clean,
			$image,
			$regular_price_clean,
			$sales_price_clean,
			$status_clean,
			);
			
			$result = mysqli_stmt_execute($stmt);
			
			return $result;
			
		}
        
        function get_products() {
            $query = 'SELECT * FROM products;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
		}
		
		function get_category_by_id($cat_id) {
			
            $cat_id_clean = (int)$cat_id;
			
            $query = "SELECT * FROM categories WHERE ID = ?;";
			
            $stmt = mysqli_prepare($this->connection, $query);
			
            mysqli_stmt_bind_param(
			$stmt,
			's',
			$cat_id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return $result;
			
		}
		
		function get_catgories_parent() {
            $query = 'SELECT * FROM categories where Parent_ID=0;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
		}
		
		function get_catgories_by_parent_id($id) {
            $id_clean = (int)$id;
            $query = "SELECT * FROM categories WHERE Parent_ID = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			's',
			$id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
			return $result;
		}
        
        function get_product_by_id($id) {
            $user_id_clean = (int)$id;
            $query = "SELECT * FROM products WHERE id = ?;";
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
        
        function update_product($product_id, $name, $description, $reg,$sales,$status,$image){
            
            $product_id_clean = (int)$product_id;
            $name_clean = $this->prepare_string($name);
            $description_clean = $this->prepare_string($description);
            $regular_price_clean = $this->prepare_string($reg);
            $sales_price_clean = $this->prepare_string($sales);
			$status_clean = $this->prepare_string($status);
			
			if($image=='')
			{
				$query = "UPDATE products SET name = ?, description = ?, regular_price = ?, sales_price = ?, status = ? WHERE  id = ?;";
				
				$stmt = mysqli_prepare($this->connection, $query);
				
				mysqli_stmt_bind_param(
				$stmt,
				'ssssss',
				$name_clean,
				$description_clean,
				$regular_price_clean,
				$sales_price_clean,
				$status_clean,
				$product_id_clean
				);
				
			}else{
				$query = "UPDATE products SET name = ?, description = ?, regular_price = ?, sales_price = ?, image = ?, status = ? WHERE  id = ?;";
				
				$sourcePath = $_FILES['image']['tmp_name'];       // Storing source path of the file in a variable
				$targetPath = "../uploads/".$_FILES['image']['name']; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath);  // Moving Uploaded file
				
				
				$stmt = mysqli_prepare($this->connection, $query);
				
				mysqli_stmt_bind_param(
				$stmt,
				'sssssss',
				$name_clean,
				$description_clean,
				$regular_price_clean,
				$sales_price_clean,
				$image,
				$status_clean,
				$product_id_clean
				);
			}
			
            $result = mysqli_stmt_execute($stmt);
            return $result;
		}
        
        function delete_product_by_id($product_id) {
            
            $product_id_clean = (int)$product_id;
            $query = "DELETE FROM products WHERE id = ? ;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			's',
			$product_id_clean
            );
            
            $result = mysqli_stmt_execute($stmt);
			
            return $result;
		}
	}
?>