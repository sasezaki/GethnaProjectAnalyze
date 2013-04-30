<?php
namespace GethnaGithub\Api;

use EdpGithub\Api\Repos as BaseRepos;

class Repos extends BaseRepos
{
    public function contributors($owner, $repo)
    {
        return $this->get('repos/'.$owner.'/'.$repo.'/contributors');
    }
}
