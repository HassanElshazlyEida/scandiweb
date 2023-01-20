# Scandiweb Project

This project is a simple PHP framework that allows you to easily set up a database, create and seed tables, and implement models, repositories, and controllers.

## Database Configuration

In order to connect to a database, you will need to create a **`.env`** file and insert the following keys:

- `DB_DATABASE`: The name of the database you want to connect to.
- `DB_USERNAME`: The username to use when connecting to the database.
- `DB_PASSWORD`: The password to use when connecting to the database.
- `DB_HOST`: The hostname or IP address of the database server.
-  `DB_PORT`: The port number to use when connecting to the database.

Example
```
DB_DATABASE=scandiweb
DB_USERNAME=root
DB_PASSWORD=root
DB_HOST=127.0.0.1
DB_PORT=8000
```


## Seeding the Database

To seed the database with sample data, you can run the db_seed.php file located in the root of the project. This will create the necessary tables and insert sample data into them.
``` 
php db_seed.php
```
## Creating Models

To create a new model, you can extend the Model class where have default **CRUD** options and define the table name in the $table property.
For example:
```
class NewModel extends Model {
    public $table = "new_model";
}
```


## Validation

For validation, you can extend the RuleValidation class and set the available validation rules in the $rules property. For example:

```
class NewModelValidation extends RuleValidation {
    protected $rules = [

        'field1' => ['required'],
        'field2' => ['required', 'in:book,dvd,furniture']

        "field3"  =>     ['required','array'],
        "field3.*"=>     ['required',"numeric"]
    ];
}
```
## Implementing Repositories

To implement a repository for your model, you can create a new class that implements the Repository interface and attach any necessary properties and functions. 
For example:

```
class NewModelRepository implements Repository {

    public  function model()
    {
        return new NewModel();
    }
    public  function views()
    {
       return "new-models/";
    }
    public  function Validator()
    {
      return new NewModelValidation();
    }
    public  function redirect()
    {
       return "/newModels";
    }
}
```
## Creating Controllers

To create a new controller, you can extend the Controller class and implement any necessary CRUD operations.

Controllers can also be easily created by extending the Controller class and specifying the associated repository and whether pagination is needed.
```
class NewModelController extends Controller {
     public function __construct() {
        $this->repository = new NewModelRepository();
        $this->with_paginate = true;
    }
}
```
## Routing

Routes can be registered and triggered using the Router class, similar to how it is done in Laravel.

```
Router::get("/newmodel",'NewModelController',"index");
Router::post("/newmodel/store",'NewModelController',"store");
```

Make sure to run the project in a PHP server, and you are good to go!
Please let me know if you have any question or need any help.