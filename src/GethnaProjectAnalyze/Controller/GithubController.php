<?php
namespace GethnaProjectAnalyze\Controller;

use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Console\ColorInterface as Color;
use Zend\Console\Request as ConsoleRequest;
// use Zend\Http\Client as HttpClient;
use Zend\Mvc\Controller\AbstractActionController;

class GithubController extends AbstractActionController
{
    public function debugAction()
    {
        $sl = $this->getServiceLocator();
        $github = $sl->get('GethnaProjectAnalyze\Service\GithubProject');

        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from the console!');
        }

        $params = $this->request->getParams();

        $github->storeContributors($params->owner, $params->repo);
        //$ = $githubClient->api('repos')->contributors($contributors, $);
        //var_dump($githubClient);
    }
}
