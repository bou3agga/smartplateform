<?php
namespace SmartCursus\V1\Rest\Elementmetapassruls;

use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;
use Models\ExSmarteducation\ElementmetapassrulsTable;
use Laminas\Db\Adapter\AdapterInterface;
class ElementmetapassrulsResource extends AbstractResourceListener
{
    private $adapter;
    public function __construct(AdapterInterface $adapter)
    { 
        $this->adapter = $adapter;
        
        
    }
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    { $List= new ElementmetapassrulsTable($this->adapter);
        $fetch=$List->fetch($data->Pass_id);
        $array=(array)$data;
          if (empty($fetch))
        {  return $List->Create($array);
          
        }
        else{
        return new ApiProblem(405, $data->Pass_id.' already taken');}
    
        
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {  $List= new ElementmetapassrulsTable($this->adapter);
        $fetch=$List->fetch($id);
        if (empty($fetch))
      {
        return new ApiProblem(405, $id.' dont exist');
      }
      else{
        return $List->Delete($id);
      }
        //return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $List= new ElementmetapassrulsTable($this->adapter);
        return $List->fetch($id);

    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $List= new ElementmetapassrulsTable($this->adapter);
        return $List->fetchAll();
    }
    

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id,$data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {   $List= new ElementmetapassrulsTable($this->adapter);
        $fetch=$List->fetch($id);
        $array=(array)$data;
      if (empty($fetch))
      {
        return new ApiProblem(405, $id.' dont exist');
      }
      else{
        
        return $List->Update($array,$id);
    }
    }
}
