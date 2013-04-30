<?php
namespace GethnaProjectAnalyze\Service;

use EdpGithub\Client as GithubClient;
use Zend\EventManager\EventManagerInterface as EventManager;
use GethnaProjectAnalyze\Storage\StorageInterface as Storage;

class GithubProject
{
    private $githubClient;
    private $em;
    private $storage;

    public function __construct(GithubClient $githubClient, EventManager $em, Storage $storage)
    {
        $this->githubClient = $githubClient;
        $this->em = $em;
        $this->storage = $storage;
    }

    public function getEventManager()
    {
        return $this->em;
    }

    public function storeContributors($owner, $repo)
    {
        $this->em->trigger(__FUNCTION__.'.pre', $this, func_get_args());

        try {
            $contributors = $this->githubClient->api('repos')->contributors($owner, $repo);
            $this->storage->save('github_'.$owner.'_'.$repo, $contributors);
        } catch (\Exception $e) {
            $this->em->trigger(__FUNCTION__.'.exception', $this, func_get_args());
            return false;
        }

        return true;
    }

    public function getContributors($owner, $repo)
    {
        
    }
}
