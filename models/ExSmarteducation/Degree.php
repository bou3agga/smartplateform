<?php
 
namespace Models\ExSmarteducation;

    use Laminas\Db\TableGateway\TableGateway;
    use Laminas\Db\Adapter\Adapter;
    use Laminas\Db\Sql\Sql;

class Degree
{   protected $adapter; 
    protected $TableGateway; 
    public function __construct(Adapter $adapter)
    {        $this->adapter = $adapter;
             $this->TableGateway= new TableGateway('degree',$adapter);

    }
    
    public function fetchAll()
    {
$results=$this->adapter->query(
    'SELECT * FROM  degree  AS d 
    LEFT JOIN elementmetaprocess  AS e ON d.Model_id =e.id ',
    Adapter::QUERY_MODE_EXECUTE
);
return $results;
    }

    public function fetchByEveryThing($data)
    {   
        $sql    = new Sql($this->adapter);
$select = $sql->select();
$select->from('degree');
$select->where([$data['name'] => $data['value']]);


$selectString = $sql->buildSqlString($select);
$results = $this->adapter->query($selectString, $this->adapter::QUERY_MODE_EXECUTE);
        return $results = $results->current();
    }
    public function fetch($id)
    {    
        $rowset  = $this->TableGateway->select(['idDegree' => $id]);
        return $Row   = $rowset->current();
    }
    public function Create($data)
    { 
        return $this->TableGateway->insert($data);
    }
    public function Update($data,$id)
    {   
        
        return $this->TableGateway->update($data,['idDegree' => $id],null);
    }
    public function Delete($id)
    {
      
          return  $this->TableGateway->delete(['idDegree' => $id]);
           
    }
    public function FindLastElement()
    {
     $rowset = $this->TableGateway->select();
     $results = $rowset->toArray();
     $max=0;
     foreach ($results as $key => $row) {
       $id=$row['idDegree'];
       $n=intval($id);
       if($max<$n)
       {$max=$n;}
     }
     return $max;
    }


}
