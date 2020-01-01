---
title: 合并表中某连几个字段_MySQL
date: 2019-09-16 11:50 +0800
categories: [MySQL]
tags: [MySQL]
---

## 将元组中的某两个元素进行合并： concat()
假如对于user表，如下：  

id|class|name|age
:-:|:-:|:-:|:-:
1 | 1001 | zh | 18
2 | 1001 | en | 19  
3 | 1002 | cs | 18  
4 | 1002 | jp | 19  

如果想将name 和age 作为一个字段显示， 有：
``` sql
select id, class, concat(name, ": ", age) as name_age from user;
```

结果：
i|class|name_age
:-:|:-:|:-:
1 | 1001 | zh:18
2 | 1001 | en:19
3 | 1002 | cs: 18
4 | 1002 | jp: 19


## 将多个元组中的某些某些元素合并：group_coacat()

依然对上面user表， 若根据年级分组， 并将name和age全部合并在一列中显示， 有：
class | name_age
:-|:-
1001 | zh:18,en:19
1002 | cs:18,jp:19

使用group_coacat() 方法默认是以“,”进行分割， 如果希望以其他字符进行分割可使用“separator”， 如：
```sql
select class, group_concat(name, ":", age separator ";") as name_age 
from user 
group by class;
```
结果为：
class | name_age
:-|:-
1001 | zh:18;en:19
1002 | cs:18;jp:19