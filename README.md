# Codeigniter3CrudMiddlevare
Codeigniter v3 Crud Middlevare

## How to add project
Copy this file in Application/Core folder. Ready to use!

## Usage
First, create a model class and extend MY_Model. Next step construction, add __construct() function your class. The function body must call parent constructor. But give single string parameter table name. For example;

```
public class Mytable_model extends MY_Model {

    public function __construct() {
        parent::__construct('mytable');
    }

}
```

Second step load your model in your Controller class and call functions in MY_Model. For example;

```
$this->load->model("mytable_model");
$data = $this->mytable_model->find(array('title' => 'hello'));
```

find method declare in MY_Model class.

**Very important! Your table PK name must 'id'**

## Function Referances

### find([$where = NULL, [$like = NULL, [$order = NULL, [$limit = NULL, [$as_array = FALSE]]]]])
Find method accept three paramter and return result array (object in array or array in array).

* $where as key pair column name and value based filter 
* $like as key pair column name and value based filter by text containing
* $order as either array of columns or string based order clause
* $limit as array, first element length second element start position
* $as_array as boolean. TRUE is return array in array result, FALSE is return object in array result

### query_count([$where = NULL, [$like = NULL]])
This function same as find, but return query total record count!

### get($id)
This function only single record by id. Record as object.

### updte($model, $where)
This function update record(s). Accept 2 paramters

* $model as key pair column and value array
* $where as key pair column and value based filter to affect row(s)

### insert($model, [$get_id = FALSE])
This function add single record. $model as key pair column and value array. Accept 2 params

* $model as key pair column and value array
* $get_id as bool to return inserted record id if use TRUE that

### delete($id)
This function delete record from gived id value
