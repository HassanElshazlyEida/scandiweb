<?php 


require_once 'app/Repositories/ProductRepository.php';
require_once 'app/config/RuleValidation.php';
class ProductValidation extends RuleValidation {
   protected array $rules=[];
   public function __construct()
   {
        parent::__construct();
        $this->rules= 
        [
            'sku'        =>     ['required','exists:products'],
            'name'       =>     ['required'],
            'price'      =>     ['required', 'numeric'],
            "type"       =>     ['required','in:book,dvd,furniture'],
            "product_type"  =>     ['required','array'],
            "product_type.*"=>     ['required',"numeric"]
        ];
   }


}  