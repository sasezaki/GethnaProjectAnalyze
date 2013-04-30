<?php
namespace GethnaProjectAnalyze;

use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;

use GethnaProjectAnalyze\Service\GithubProject;

use Zend\Cache\StorageFactory;
use GethnaProjectAnalyze\Storage\CacheStorage;

class Module implements ConsoleUsageProviderInterface
{

    public function getConsoleUsage(Console $console)
    {
        return array(
            'projectanalyze debug' => 'debug',
        );
    }

    public function getControllerConfig()
    {
        return array('factories' => array(
            'GethnaProjectAnalyze\Controller\Github' => function ($sm) {
                return new Controller\GithubController;
            }
        ));
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array('factories' => array(
            'GethnaProjectAnalyze\Storage\StorageInterface' => function ($sl) {
                $config = $sl->get('Config');
                return new CacheStorage(StorageFactory::factory($config['gethna-project-analyze']['cache']));
            },
            'GethnaProjectAnalyze\Service\GithubProject' => function ($sl){
                return new GithubProject(
                    $sl->get('EdpGithub\Client'),
                    $sl->get('EventManager'),
                    $sl->get('GethnaProjectAnalyze\Storage\StorageInterface')
                );
            },
        ));
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                    'GethnaGithub' => __DIR__ . '/src/' . 'GethnaGithub',
                ),
            ),
        );
    }
}
