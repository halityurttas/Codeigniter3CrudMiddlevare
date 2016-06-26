# Codeigniter3CrudMiddlevare
Codeigniter v3 Crud Middlevare

## How to add project
Copy this file in Application/Core folder. Ready to use!

## Usage
First, create a model class and extend MY_Model. Next step construction, add __construct() function your class. The function body must call parent constructor. But give single string parameter table name. For example;

public class Mytable_model extends MY_Model {

    public function __construct() {
        parent::__construct('mytable');
    }

}