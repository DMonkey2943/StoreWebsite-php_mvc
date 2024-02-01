<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function add_to_cart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $ID = mysqli_real_escape_string($this->db->link, $id);
        $s_ID = session_id();

        $query_pd = "SELECT * FROM tbl_product WHERE productID = '$ID'";
        $result_pd = $this->db->select($query_pd)->fetch_assoc();


        $pdName = $result_pd['productName'];
        $price = $result_pd['price'];
        $image = $result_pd['image'];
        
        $query_check_cart = "SELECT * FROM tbl_cart WHERE productID = '$ID' AND sessionID = '$s_ID'";
        $check_cart = $this->db->select($query_check_cart);
        if(mysqli_num_rows($check_cart) > 0) {
            $result_check = $check_cart->fetch_assoc();
            $quantity_update = $result_check['quantity'] + $quantity;
            $query_update_quantity = "UPDATE tbl_cart SET quantity='$quantity_update' WHERE productID = '$ID' AND sessionID = '$s_ID'";
            $result_update_quantity = $this->db->update($query_update_quantity);
            if ($result_update_quantity) {
                header('Location: cart.php');
            } else {
                header('Location: 404.php');
            }
        } 
        // if(mysqli_num_rows($check_cart)>0){
        //     $alert = "<span style='color:red; font-size: 18px;'>Product already added</span>";
        //     return $alert;
        // }
        else {
            $query_ct = "INSERT INTO tbl_cart(productID,sessionID,productName,price,quantity,image) 
                    VALUES('$id', '$s_ID', '$pdName', '$price','$quantity', '$image')";
            $result = $this->db->insert($query_ct);
            if ($result) {
                header('Location: cart.php');
            } else {
                header('Location: 404.php');
            }
        }

        
    }

    public function get_product_cart() {
        $s_ID = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sessionID='$s_ID'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_quantity_cart($quantity, $cartID) {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartID = mysqli_real_escape_string($this->db->link, $cartID);

        $query = "UPDATE tbl_cart SET quantity='$quantity' WHERE cartID = '$cartID'";
        $result = $this->db->update($query);
        if($result) {
            $msg = "<span class='success'>Product quantity updated successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product quantity updated not successfully</span>";
            return $msg;
        }


    }



}
?>