# Scandiweb Project

This project is a simple PHP framework that allows you to easily set up a database, create and seed tables, and implement models, repositories, and controllers.

## Database Configuration

To set up the database, you will need to edit the `app/config/Database.php` file and update the following fields with your database credentials:

- `$db_name`: The name of your database
- `$username`: Your database username
- `$password`: Your database password
- `$host`: The hostname or IP address of your database server

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

## Implementing Repositories

To implement a repository for your model, you can create a new class that implements the Repository interface and attach any necessary properties and functions. 
For example:

```
class NewModelRepository implements Repository {

    public  function model()
    {
      
    }
    public  function views()
    {
       
    }
    public  function Validator()
    {
      
    }
    public  function redirect()
    {
       
    }
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