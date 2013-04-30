<?php
namespace GethnaProjectAnalyze\Storage;
use Zend\Cache\Storage\StorageInterface as ZendCacheStorage;

class CacheStorage implements StorageInterface
{
    private $storage;

    public function __construct(ZendCacheStorage $zendCacheStorage)
    {
        $this->storage = $zendCacheStorage;
    }

    public function get($key)
    {
        return $this->storage->getItem($key);
    }

    public function save($key, $value)
    {
        return $this->storage->setItem($key, $value);
    }
}
