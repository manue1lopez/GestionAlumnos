<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\ResulSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;


class TutorController extends AbstractActionController
{
    //public $adaptador;
    
    public function indexAction()
    {   
        /*$adaptador= new Adapter(array(
            'driver'=>'Pdo_Mysql',
            'database'=>'pzend',
            'host'=>'localhost',		No es necesario que este aqui.
            'username'=>'root',
            'password'=>''
        ));*/
        // Lo siguiente es un Método del ServiceManager que lo instancia
        $this->adaptador=$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $consultaprofesor=$this->adaptador->query("select usuario from usuarios where id=1",Adapter::QUERY_MODE_EXECUTE);
        $consultaalumnos=$this->adaptador->query("SELECT * from alumnos order by id asc",Adapter::QUERY_MODE_EXECUTE);
        $alumnos=$consultaalumnos->toArray();
        $user=$consultaprofesor->toArray();
        return new ViewModel(array("usuario"=>$user,"alumno"=>$alumnos));

    }
}