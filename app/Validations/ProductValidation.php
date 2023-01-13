<?php 

require_once 'app/config/Database.php';

class ProductValidation extends  Database {
    public function validate($data) {
        if(empty($data)){
            return 'Please, submit required data';
        }
     
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