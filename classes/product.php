<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        // Kiem tra hinh anh va lay hinh anh cho vao folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif', 'heic');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;


        if ($productName=='' || $category=='' || $brand=='' || $product_desc=='' 
                || $price=='' || $type=='' || $file_name=='') {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,catID,brandID,product_desc,type,price,image) 
                VALUES('$productName', '$category', '$brand', '$product_desc','$type', '$price',  '$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Insert Product Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Product Not Success</span>";
                return $alert;
            }
        }
    }

    public function show_product()
    {
        // $query = "SELECT * FROM tbl_product,tbl_category,tbl_brand 
        //             WHERE tbl_product.catID=tbl_category.catID AND tbl_product.brandID=tbl_brand.brandID  ORDER BY tbl_product.productID DESC";
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
            INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
            ORDER BY tbl_product.productID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        // Kiem tra hinh anh va lay hinh anh cho vao folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif', 'heic');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if ($productName=='' || $category=='' || $brand=='' || $product_desc=='' 
                || $price=='' || $type=='') {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            if(!empty($file_name)) {
                // Neu nguoi dung chon anh
                if($file_size > 20480) {
                    $alert = "<span class='error'>Image size should be less than 2MB!</span>";
                    return $alert;
                } elseif (in_array($file_ext, $permited)===false) {
                    $alert = "<span class='error'>You can upload only: ".implode(', ', $permited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_product SET productName = '$productName', brandID = '$brand', 
                    catID = '$category', price = '$price', product_desc = '$product_desc', 
                    type = '$type', image = '$unique_image' WHERE productID='$id'";
            } else {
                // Neu nguoi dung khong chon anh
                $query = "UPDATE tbl_product SET productName = '$productName', brandID = '$brand', 
                    catID = '$category', price = '$price', product_desc = '$product_desc', 
                    type = '$type' WHERE productID='$id'";
            }

            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Product updated successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Product updated not successfully</span>";
                return $alert;
            }
        }
    }

    public function del_product($id) {
        $query = "DELETE FROM tbl_product WHERE productID='$id'";
        $result = $this->db->delete($query);
        if($result) {
            $alert = "<span class='success'>Product deleted successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Product deleted not successfully</span>";
            return $alert;

        }
        
    }


    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>



