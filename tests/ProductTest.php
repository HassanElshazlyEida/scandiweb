bo<?php
require_once 'app/config/Database.php';
require_once 'app/Models/Product.php';
require_once 'app/Models/Book.php';
require_once 'app/Models/DVD.php';
require_once 'app/Models/Furniture.php';
require_once 'app/Validations/ProductValidation.php';

Class ProductTest extends \PHPUnit\Framework\TestCase {
    
    protected function setUp():void{
        parent::setUp();
        $this->product = new Product();
        $this->validator = new ProductValidation();
    }
    
    public function test_insert_product_with_type_book()
    {
      
    
        $data = [
            "sku"=>  'SKU01',
            "name"=>"Product 1",
            "price"=>20.00,
            "type"=>"book",
            "product_type"=>[
                json_encode(
                    [
                        "weight"=>20.0
                    ]
                )
            ]
        ];
        

      
        $result = $this->product->store($data);

        // Assert
        $this->assertTrue($result);
    }
    public function test_insert_product_with_type_dvd()
    {
      
    
        $data = [
            "sku"=>  'SKU02',
            "name"=>"Product 1",
            "price"=>20.00,
            "type"=>"dvd",
            "product_type"=>[
                json_encode(
                    [
                        "size"=>20.0
                    ]
                )
            ]
        ];
        

      
        $result = $this->product->store($data);

        // Assert
        $this->assertTrue($result);
    }
    public function test_insert_product_with_type_furniture()
    {
      
    
        $data = [
            "sku"=>  'SKU03',
            "name"=>"Product 1",
            "price"=>20.00,
            "type"=>"furniture",
            "product_type"=>[
                json_encode(
                    [
                        "length"=>20.0,
                        "width"=>20.0,
                        "height"=>20.0
                    ]
                )
            ]
        ];
        

      
        $result = $this->product->store($data);

        // Assert
        $this->assertTrue($result);
    }
    public function test_invalid_inputs_for_product()
    {
        $data = [
            "sku"=> '',
            "name"=>"",
            "price"=>"string",
            "type"=>"music",
            "product_type"=>[
                "length"=>"ABC"
            ]
        ];
        
        $this->validator->validate($data);

        $expected=[
            "sku" =>
            [
                "Sku is required."
            ]
            ,
            "name" => 
            [
                "Name is required."
            ]
            ,
            "price" => 
            [
                "Price must be numeric."
            ],
            "type"=>
            [
                "Type is not in the list of allowed values."
            ]
            ,
            "product_type" => 
            [
                "Length must be numeric."
            ]
        
        ];
        $this->assertIsArray($this->validator->errors());

        $this->assertEquals($expected,$this->validator->errors());
        
    }
    public function test_unique_sku_product()
    {
        $data = [
            "sku"=>  'SKU03',
            "name"=>"Product 1",
            "price"=>20.00,
            "type"=>"furniture",
            "product_type"=>[
                json_encode(
                    [
                        "length"=>20.0,
                        "width"=>20.0,
                        "height"=>20.0
                    ]
                )
            ]
        ];
        
        $this->validator->validate($data);
        $this->assertEquals($this->validator->firstError(),"SKU03 already exist on the products table.");
        
    }
  
}