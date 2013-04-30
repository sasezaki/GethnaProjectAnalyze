<?php
namespace GethnaProjectAnalyze\Storage;

interface StorageInterface
{
    public function get($key);
    public function save($key, $value);
}
