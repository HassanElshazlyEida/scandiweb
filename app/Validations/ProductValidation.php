<?php 

require_once 'app/config/Database.php';

class ProductValidation extends  Database {
    public function validate($data) {
        if(empty($data)){
            return 'Please, submit required data';
        }
        print_r($data);
        if(empty($data['sku'])) {
            return 'SKU is required.';
        }
        if(empty($data['name'])) {
            return 'Name is required.';
        }
        if(empty($data['price'])) {
            return 'Price is required.';
        }
        if(!is_numeric($data['price'])) {
            return 'Price must be a number.';
        }
        $type = $data['type'];
        if ($type["type"] === "book") {
          if (empty($type['size'])) {
                return 'Size is required.';
          }
        } else if ($type["type"]=== "furniture") {
          if (empty($type['height']) || empty($type['width']) || empty($type['length'])) {
                return 'fill all dimensions';
          }
        } else if ($type["type"] === "dvd") {
          if (empty($type['weight'])) {
                return 'Weight is required.';
          }
        }else {
            return 'Please select product type';
        }
     
        // Check if the sku is unique
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM products WHERE sku = ?');
        $stmt->execute([$data['sku']]);
        $count = $stmt->fetchColumn();
         
        if($count > 0) {
            return 'SKU already exists.';
        }
        return true;
    }
}