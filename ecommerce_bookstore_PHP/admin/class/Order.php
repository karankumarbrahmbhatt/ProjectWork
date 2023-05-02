<?php
	include_once 'DbConfig.php';
	
	class Order extends DbConfig {

		public function __construct() {
			parent::__construct();
		}
		
		function prepare_string($string) {
			$string = strip_tags($string);
			$string = mysqli_real_escape_string($this->connection, trim($string));
			return $string;
		}
		
        function get_orders() {
            $query = 'SELECT * FROM orders;';
            $result = @mysqli_query($this->connection,$query);
            return $result;
        }
		
		function get_order_by_id($order_id) {
		
            $order_id_clean = (int)$order_id;
            $query = "SELECT * FROM orders WHERE id = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
                $stmt,
                's',
                $order_id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return $result;
        }
		
		function get_orderitem_by_orderid($order_id) {
            $order_id_clean = (int)$order_id;
            $query = "select * from order_items left join products on products.id=order_items.product_id where order_items.order_id = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param(
                $stmt,
                's',
                $order_id_clean
            );
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return $result;
        }
       
	}
?>