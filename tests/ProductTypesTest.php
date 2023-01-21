bo<?php
require_once 'app/config/Database.php';
require_once 'app/Models/Book.php';
require_once 'app/Models/DVD.php';
require_once 'app/Models/Furniture.php';

Class ProductTypesTest extends \PHPUnit\Framework\TestCase {
    
    protected function setUp():void{
        parent::setUp();
    }
    public function test_insert_new_book()
    {
        $book = new Book();
        $data=[
            [
                "weight"=> 12.55
            ] 
        ];
        $result = $book->store($data[0]);

        // Assert
        $this->assertTrue($result);
    }
    public function test_insert_new_dvd()
    {
        $book = new DVD();
        $data=[
            [
                "size"=> 12.55
            ] 
        ];
        $result = $book->store($data[0]);

        // Assert
        $this->assertTrue($result);
    }
    public function test_insert_new_furniture()
    {
        $book = new Furniture();
        $data=[
            [
                "length"=>20.0,
                "width"=>20.0,
                "height"=>20.0
            ] 
        ];
        $result = $book->store($data[0]);

        // Assert
        $this->assertTrue($result);
    }
   
  
}