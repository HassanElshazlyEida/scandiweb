<?php
require_once 'app/config/Database.php';

class RuleValidation extends  Database  {
    protected array $rules=[];
    protected array $errors=[];
    public function __construct()
    {
        parent::__construct();
    }
    public function validate($data){

        foreach ($this->rules as $field => $field_rules) {
            if(strpos($field, '.*')!== false) { 
                $field = str_replace(".*", "", $field);
                if(!empty($data[$field]) && (is_array($data[$field]))){
                    foreach ($data[$field] as $key => $val) {
                        foreach ($field_rules as $rule) {
                            if ($rule === 'required') {
                                $error = $this->required($val, $key);
                                if(!empty($error)){
                                    $errors[$field][] = $error;
                                }
                            } else if ($rule === 'numeric') {
                                $error = $this->numeric($val,$key);
                                if(!empty($error)){
                                    $errors[$field][] = $error;
                                }

                            } else if (strpos($rule, 'exists:') !== false) {
                                $error =$this->exists($key,$val,$rule,$field) ;
                                if(!empty($error)){
                                    $errors[$field][] = $error;
                                }
                            }
                        }
                    }
                }else {
                    $errors[$field][] = 'Require all inputs of '. str_replace("_"," ",ucfirst($field));
                }
            }else{
                foreach ($field_rules as $key=>$rule) {
                    if ($rule === 'required') {
                        $error =$this->required($data[$field],$field)  ;
                        if(!empty($error)){
                            $errors[$field][] = $error;
                        }
                    } else if ($rule === 'numeric') {
                        $error =$this->numeric($data[$field],$field) ;
                        if(!empty($error)){
                            $errors[$field][] = $error;
                        }
                        
                    } else if (strpos($rule, 'exists:') !== false) {
                        $error =$this->exists($data[$field],$rule,$field) ;
                        if(!empty($error)){
                            $errors[$field][] = $error;
                        }
                    }
                    else if (strpos($rule, 'array') !== false) {
                        $error =$this->is_field_array($data[$field],$field,$rule) ;
                        if(!empty($error)){
                            $errors[$field][] = $error;
                        }
                    }
                }
            }
        }
        $this->errors = $errors ?? [];
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
    // Available rules [required,exists:table,numeric,array]

    public function numeric($val,$field){
        if (!is_numeric($val)) {
            return str_replace("_"," ",ucfirst($field)) . ' must be numeric.';
        }
    }
    public function exists($val,$rule,$field){
        $table = str_replace("exists:", "", $rule);
        if (!$this->exist_on_db($field,$val,$table)) {
            return str_replace("_"," ",ucfirst($val)) . ' already exist on the '.$table.' table.';
        }
    }
    public function required($val,$field){
        if (empty($val)) {
            return str_replace("_"," ",ucfirst($field)) . ' is required.';
        }
    }
    public function is_field_array($val,$field){
        if (!is_array($val)) {
            return  'Require all inputs of '. str_replace("_"," ",ucfirst($field)) ;
        }
    }
    public function is_in_array($val,$field,$rule){
        $list = str_replace("in:", "", $rule);
        $list = explode(',', $list);
        if (!in_array($val, $list)) {
            return str_replace("_"," ",ucfirst($field)) . ' is not in the list of allowed values.';
        }
    }
    public function exist_on_db($field,$val,$table)
    {   
      
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $table WHERE $field = ? ");
        $stmt->execute([$val]);
        $count = $stmt->fetchColumn();
         
        if($count > 0)
            return false;
        return true;
    }
    public function firstError() {
        return reset($this->errors)[0];
    }
    public function errors() {
        return $this->errors;
    }
    
}