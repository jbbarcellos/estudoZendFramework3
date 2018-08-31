<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Aluno;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Aluno\Controller\AlunoController;
use Aluno\Model\AlunoTable;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    public function getServiceConfig(){
        return[
            'factories' =>[
                Model\AlunoTable::class => function($container){
                    $tableGateway = $container->get(Model\AlunoTableGateway::class);
                    return new AlunoTable($tableGateway);
                },
                Model\AlunoTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Aluno());
                    return new tablegateway('aluno', $dbAdapter, null, $resultSetPrototype);
                },
                ]
        ];
    }
    
    public function getControllerConfig(){
        return[
            'factories' =>[
                AlunoController::class => function($conteiner){
                    $tableGateway = $conteiner->get(Model\AlunoTable::class);
                    return new AlunoController($tableGateway);
                },
            ]
        ];
    }
}
