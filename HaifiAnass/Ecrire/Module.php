<?php
// module/Ecrire/Module.php
namespace Ecrire;

use Ecrire\Model\EcrireTable;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
	 public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Ecrire\Model\EcrireTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table     = new EcrireTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }
	
}