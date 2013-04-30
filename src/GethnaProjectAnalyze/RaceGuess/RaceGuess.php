<?php

class RaceGuess
{
    public function guess($account, Result $result = null)
    {
        $result = ($result) ?: new Result;

        foreach($this->guessChain as $guessor) {
            $guessor->guess($account, $result);
        }

        return $result;
    }
}

interface RaceGuessInterface
{
    // @return Result
    public function guess($account) {}
}

class Result
{

    public function guessRace()
    {
        if ($this->getCounty()) {
            return ;
        }

        return ;// japan or false;
    }

    public function getReason()
    {
    
    }
}


// strategy

class AlreadyIKnow
{
    public function guess($account, $result)
    {
       $result->setCountry($country, 100, __METHOD__); // with priority
    
    }
}

class GithubCountry
{
    public function guess($account, $result)
        $result->setCountry($country, 50, __METHOD__); // with priority
    }
}

class TwitterTweet
{

    public function guess($account)
    {
        if ($tweet = $this->mapper->findTweet($account->getLogin())) {
            // strip link
            // language detector

            $result->setCountry($country, 10, __METHOD__); // with priority
            $result->setLanguage($lang, 10, __METHOD__); // with priority

            return $result;
        }
    }
}

// service
class Twitter
{
    public function enqueTweetsFetch()
    {
    
    }

    public function dequeTweetsFetch()
    {
        foreach ($githubAccounts as $githubAccount) {
            $tweets = $this->twitterApi->foo($githubAccount);
            $this->mapper->save([$githubAccount, $tweets]);
        }
    }
}
// entity

/**
class Account
{
    public function getTwitter

}*/



