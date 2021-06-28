<?php
    //Class Product
    class Product
    {
        public $db = null;
        public function __construct(DBcontroller $db)
        {
            if(!isset($db->con)) return null;
            $this->db = $db;
        }

        //Get All of Product data
        public function getData($table = 'product'){
            $result = $this->db->con->query("SELECT * FROM {$table}");

            $resultArray = array();

            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }

        //Get 4 latest product
        public function getLatest($table = 'product'){
            $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY item_register DESC LIMIT 4");

            $resultArray = array();

            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }

        //get data form cart table
        public function getCartProduct($table = null, $userid = null){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE _user_id = {$userid}");

            $resultArray = array();

            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }

        //get product using item_id
        public function getProduct($item_id = null, $table = 'product'){
            if(isset($item_id)){
                $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");

                $resultArray = array();
                
                while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $resultArray[] = $item; 
                }
                return $resultArray;
            }
        }

        //get user using user_id
        public function getUser($user_id = null, $table = 'users'){
            if(isset($user_id)){
                $result = $this->db->con->query("SELECT * FROM {$table} WHERE _user_id = {$user_id}");

                $resultArray = array();
                
                while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $resultArray[] = $item; 
                }
                return $resultArray;
            }
        }
        
        //search product
        public function Search($product_name, $table = 'product'){
            if(isset($product_name)){
                $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_name LIKE '%$product_name%' OR item_brand LIKE '%$product_name%'");

                $resultArray = array();

                while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    $resultArray[] = $item;
                }
                             
                return $resultArray;              
            }
        }
    }

    //Class Cart
    class Cart
    {
        public $db = null;

        public function __construct(DBcontroller $db)
        {
            if(!isset($db->con)) return null;
            $this->db = $db;
        }

        //insert into cart table
        /*public function insertIntoCart($params = null, $table = "cart")
        {
            if($this->db->con!=null){
                if($params!=null){
                    $column = implode(',',array_keys($params));
                    $values = implode(',',array_values($params));

                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$column,$values);
 
                    $result = $this->db->con->query($query_string);
                    if($result){
                        header("Location: cart.php");
                    }
                    return $result;
                }
            }
        }*/

        /*public function addToCart($userid, $itemid){
            if(isset($userid) && isset($itemid)){
                $params = array(
                    "_user_id" => $userid,
                    "item_id" => $itemid
                );

                $result = $this->insertIntoCart($params);               
            }
        }*/
        public function insertIntoCart($params = null, $table = "cart")
        {
            if($this->db->con!=null){
                if($params!=null){
                    $column = implode(',',array_keys($params));
                    $values = implode(',',array_values($params));

                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$column,$values);
 
                    $result = $this->db->con->query($query_string);
                    if($result){
                        header("Location: test-cart.php");
                    }
                    return $result;
                }
            }
        }

        public function addToCart($userid, $itemid, $itemquantity){
            if(isset($userid) && isset($itemid) && isset($itemquantity)){
                $params = array(
                    "_user_id" => $userid,
                    "item_id" => $itemid,
                    "item_quantity" => $itemquantity
                );

                $result = $this->insertIntoCart($params);               
            }
        }

        //Delete Cart
        public function deleteCart($cart_id = null, $table = 'cart'){
            if($cart_id != null){
                $result = $this->db->con->query("DELETE FROM {$table} WHERE cart_id = {$cart_id}");
                
                if($result){
                    header("Location:". $_SERVER['PHP_SELF']);
                }
                return $result;
            }
        }

        public function deleteUser($user_id = null, $table= 'users'){
            if($user_id != null){
                $result = $this->db->con->query("DELETE FROM {$table} WHERE _user_id = {$user_id}");
                
                if($result){
                    header("Location:". $_SERVER['PHP_SELF']);
                }
                return $result;
            }
        }

        public function deleteItem($item_id = null, $table= 'product'){
            if($item_id != null){
                $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");
                
                if($result){
                    header("Location:". $_SERVER['PHP_SELF']);
                }
                return $result;
            }
        }

        //Insert into Product table
        public function insertIntoProduct($params = null, $table = "product"){
            if($this->db->con != null){
                if($params != null){
                    $column = implode(',',array_keys($params));
                    $values = implode(',',array_values($params));

                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$column,$values);

                    $result = $this->db->con->query($query_string);
                    if($result){
                        header("Location:". $_SERVER['PHP_SELF']);
                    }

                    return $result;
                }
            }
        }

        public function addToProduct($item_brand, $item_name, $item_price, $item_image, $item_type){
            if(isset($item_brand) && isset($item_name) && isset($item_price) && isset($item_image) && isset($item_type)){
                $params = array(
                    "item_brand" => "'". $item_brand ."'",
                    "item_name" => "'". $item_name . "'",
                    "item_price" => $item_price,
                    "item_image" => "'". $item_image . "'",
                    "item_type" => "'". $item_type ."'"
                );

                $result = $this->insertIntoProduct($params);
            }
        }
    }    
?>