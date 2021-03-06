<?php
	//	$id['EvalCompModel_id']=$row->EvalCompModel_id;
	//	$id['EvalModelContext_id']=$row->EvalModelContext_id;
		
 


namespace Models\Smarteducation\Model;

use Zend\Db\TableGateway\AbstractTableGateway,
    Zend\Db\Adapter\Adapter,
    Zend\Db\ResultSet\ResultSet,
    Zend\Db\Sql\Select;

class EvalhirarchicalmodelTable extends AbstractTableGateway
{
    protected $table ='evalhirarchicalmodel';
    protected $tableName ='evalhirarchicalmodel';

    public function qi($name)  { return $this->adapter->platform->quoteIdentifier($name); }
    
    public function fp($name) { return $this->adapter->driver->formatParameterName($name); }

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet(new Evalhirarchicalmodel);

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
   	public function newSelect() {
    	return new Select;
    }
    
    public function getSelect(&$select,$columnsArray=array()) 
    {
    	$select = new Select;
    	return $select->from('evalhirarchicalmodel')->columns($columnsArray);    	
    }
    

}
