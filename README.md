### 基于 [ext-trie-filter](https://github.com/wulijun/php-ext-trie-filter) 扩展过滤敏感词

---

* 使用PHP扩展 [ext-trie-filter](https://github.com/wulijun/php-ext-trie-filter)
* 依赖库 libdatrie 
* 字典库 存放路径 app/config/tree/mingan.txt
* 生成trie树 存放路径 app/config/tree/mingan.txt

---

1、生成trie树
```
trie_filter_new()
trie_filter_store()
trie_filter_save()
```

2、匹配敏感词
```
trie_filter_load()
trie_filter_search_all()
```
