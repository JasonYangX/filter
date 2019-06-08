<?php
namespace app\controllers;

use vendor\Controller;

class Gentrie extends Controller
{
    public $dirtFilePath = APP_PATH.'app/config/tree/mingan.txt';
    public $treeFilePath = APP_PATH.'app/config/tree/word.tree';

    public function gen()
    {   
        $trie = trie_filter_new();

        $handle = fopen($this->dirtFilePath, 'r');
        while (!feof($handle)) {
            $item = trim(fgets($handle));
            if (!empty($item)) {
                trie_filter_store($trie, $item);
            }
        }
        trie_filter_save($trie, $this->treeFilePath);
    }
}
