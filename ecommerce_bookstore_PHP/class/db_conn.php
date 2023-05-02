<?php
		include_once 'DbConfig.php';
	
		class DatabaseConnection extends DbConfig {

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
        
		function get_products(){
            
            $query = 'select * from products;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
        }
		
        function get_new_products(){
            
            $query = 'select * from products order BY id desc LIMIT 8;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
        }
        
        function get_best_seller_products() {
            $query = 'select name,regular_price,sales_price, price,total,image,product_id, sum(quantity) as totalquantity from order_items  left join products on products.id=order_items.product_id group by product_id ORDER BY SUM(Quantity) DESC limit 6;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
        }
        
       function get_categories_parent() {
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
		
		function get_products_by_cat_id($id){
            
			$id_clean = (int)$id;
			
            $query = "SELECT * FROM products WHERE cat_id = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			'i',
			$id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
			return $result;
			
			
        }
		
		function get_product_category_by_id($id) {
            $id_clean = (int)$id;
            $query = "select products.*,categories.Name as category_name from products join categories on products.subcat_id = categories.id where products.id= ?;";
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
            $id_clean = (int)$id;
            $query = "SELECT * FROM products WHERE id = ?;";
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
		
		function get_user_by_id($id) {
            $id_clean = (int)$id;
            $query = "SELECT * FROM register_user WHERE ID = ?;";
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
		
		function get_order_by_id($id) {
            $id_clean =(int)$id;
            $query = "SELECT * FROM orders WHERE id = ?;";
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
		
		function get_order_by_customerid($id) {
            $id_clean =(int)$id;
            $query = "SELECT * FROM orders WHERE customer_id = ?;";
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
		
		
		function get_order_by_orderid($id) {
            $id_clean =$this->prepare_string($id);
            $query = "SELECT * FROM orders WHERE order_id = ?;";
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
		
		function get_orderitem_by_id($id) {
		
            $id_clean =$this->prepare_string($id);
			
            $query = "SELECT order_items.product_id,order_items.quantity,order_items.total,order_items.price,products.name as book_title FROM order_items, products where products.id = order_items.product_id and order_id = ?;";
			
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
		
		function get_order_id() {
	
            $query = 'select substr(max(order_id),5) as mid from orders;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
		}
		
		
		function check_email($email) {
		
            $email_clean = $this->prepare_string($email);
			
            $query = "SELECT * FROM register_user WHERE email = ?;";
			
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
            
            $query = "INSERT INTO register_user(name , email, password) VALUES (?,?,?)";
        
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
		
		
		function insert_order($cart,$order_id,$sub,$discount,$total,$customer_id,$email,$b_name,$b_phone,$b_street,$b_area,$b_city,$b_state,$b_pincode,$s_name,$s_phone,$s_street,$s_area,$s_city,$s_state,$s_pincode){
            
            $sub_clean = (int)$sub;
            $discount_clean = (int)$discount;
            $total_clean = (int)$total;
            $customer_id_clean = (int)$customer_id;
            $order_id_clean = $this->prepare_string($order_id);
            $b_name_clean = $this->prepare_string($b_name);
            $b_phone_clean = $this->prepare_string($b_phone);
            $b_street_clean = $this->prepare_string($b_street);
            $b_area_clean = $this->prepare_string($b_area);
            $b_city_clean = $this->prepare_string($b_city);
            $b_state_clean = $this->prepare_string($b_state);
            $b_pincode_clean = $this->prepare_string($b_pincode);
            $s_name_clean = $this->prepare_string($s_name);
            $s_phone_clean = $this->prepare_string($s_phone);
            $s_street_clean = $this->prepare_string($s_street);
            $s_area_clean = $this->prepare_string($s_area);
            $s_city_clean = $this->prepare_string($s_city);
            $s_state_clean = $this->prepare_string($s_state);
            $s_pincode_clean = $this->prepare_string($s_pincode);
            $email_clean = $this->prepare_string($email);
            
            $query = "INSERT INTO orders(order_id,sub_total,discount,total,customer_id,email,b_name,b_phone,b_street,b_area,b_city,b_state,b_pincode,s_name,s_phone,s_street,s_area,s_city,s_state,s_pincode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
            $stmt = mysqli_prepare($this->connection, $query);

            mysqli_stmt_bind_param(
                $stmt,
                'ssssssssssssssssssss',
                $order_id_clean,
                $sub_clean,
                $discount_clean,
                $total_clean,
                $customer_id_clean,
                $email_clean,
                $b_name_clean,
                $b_phone_clean,
                $b_street_clean,
                $b_area_clean,
                $b_city_clean,
                $b_state_clean,
                $b_pincode_clean,
                $s_name_clean,
                $s_phone_clean,
                $s_street_clean,
                $s_area_clean,
                $s_city_clean,
                $s_state_clean,
                $s_pincode_clean
            );

            $result = mysqli_stmt_execute($stmt);
			
			if($result){
				foreach($cart as $data)
				{	
					$res=$this->get_product_by_id($data['id']);
					$roww=mysqli_fetch_array($res);
					$qty=(int)$data['qty'];			
					$pro_id=(int)$roww{'id'};
					$price=$roww['sales_price'];
					$total=$price * $qty;
					
					
					$query_item = "INSERT INTO order_items(order_id,product_id,quantity,price,total) VALUES (?,?,?,?,?)";
			
					$stmt_item = mysqli_prepare($this->connection, $query_item);

					mysqli_stmt_bind_param(
						$stmt_item,
						'sssss',
						$order_id_clean,
						$pro_id,
						$qty,
						$price,
						$total
					);

					mysqli_stmt_execute($stmt_item);
				}	
			}
			
            return $result;
        }
		
		/* Books Page */
		function get_products_by_cat_id_page($id,$startFrom,$perPage){
            
			$id_clean = (int)$id;
			$startFrom = (int)$startFrom;
			$perPage = (int)$perPage;
            $query = "SELECT * FROM products WHERE cat_id = ? LIMIT ?, ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			'iii',
			$id_clean,
			$startFrom,
			$perPage
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
			return $result;
			
			
        }
		
		function get_products_by_sub_cat_id_page($id,$startFrom,$perPage){
            
			$id_clean = (int)$id;
			$startFrom = (int)$startFrom;
			$perPage = (int)$perPage;
            $query = "SELECT * FROM products WHERE subcat_id = ? LIMIT ?, ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			'iii',
			$id_clean,
			$startFrom,
			$perPage
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
			return $result;
			
			
        }
		
		function get_products_page($startFrom,$perPage){
           
			$startFrom = (int)$startFrom;
			$perPage = (int)$perPage;
            $query = "SELECT * FROM products LIMIT ?, ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			'ii',
			$startFrom,
			$perPage
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
			return $result;

        }
		
		function get_products_by_subcat_id($id){
            
			$id_clean = (int)$id;
            $query = "SELECT * FROM products WHERE subcat_id = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			'i',
			$id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
			return $result;
			
			
        }
		
		
		function get_products_by_price($min,$max){
            
			$min_clean = $this->prepare_string($min);
			$max_clean = $this->prepare_string($max);
            $query = "SELECT * FROM products WHERE sales_price BETWEEN (?) AND (?);";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
			$stmt,
			'ss',
			$min_clean,
			$max_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
			return $result;
			
        }
		
		function get_products_sort($type){
            
			if($type == 1){
				$query = 'select * from products order by sales_price;';
			}else{
				$query= "select * from products order by sales_price desc" ;
			}
			
            $result = @mysqli_query($this->connection,$query);
            return $result;
        }
		
	}
?>