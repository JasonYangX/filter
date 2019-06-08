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
        $res = trie_filter_save($trie, $this->treeFilePath);
        if ($res) {
            echo '树生成成功，<a href="/">前往过滤</a>';
        } else {
            echo '树生成失败，<a href="GenTrie/gen">重新生成</a>';
        }
    }
}
