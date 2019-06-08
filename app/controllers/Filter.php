<?php
namespace app\controllers;

use vendor\Controller;

class Filter extends Controller
{
    public function filterWord()
    {
        $keyWord = $this->_request['input'];
        $tree    = $this->getTire(APP_PATH.'app/config/tree/word.tree');
        $ret     = trie_filter_search_all($tree, $keyWord);
        $result  = $this->getFilterWord($keyWord, $ret);

        if (!empty($result)) {
            foreach ($result as $word) {
                $keyWord = str_replace($word, '*', $keyWord);
            }
        }
        echo '替换文本:'.$keyWord;
    }

    public function getTire($treeFile)
    {
        return $trie = trie_filter_load($treeFile);;
    }

    public function getFilterWord($str, $res)
    {
        $result = array();
        foreach ($res as $key => $val) {
            $word = substr($str, $val[0], $val[1]);
            if (!in_array($word, $result)) {
                $result[] = $word;
            }
        }
        return $result;
    }
}
