---
title: MySQL_视图浅析
date: 2020-01-01 05:25:00 +0800
categories: [MySQL,视图]
tags: [MySQL]
---

# MySQL 视图浅析


MySQL视图可以看作一个虚拟表，其内容由查询定义。同真实的表一样，视图包含一系列带有名称的列和行数据。但是，视图并不在数据库中以存储的数据值集形式存在。行和列数据来自由定义视图的查询所引用的表，并且在引用视图时动态生成。

对其中所引用的基础表来说，MySQL视图的作用类似于筛选。定义视图的筛选可以来自当前或其它数据库的一个或多个表，或者其它视图。通过视图进行查询没有任何限制，通过它们进行数据修改时的限制也很少。

视图是存储在数据库中的查询的sql 语句，它主要出于两种原因：安全原因，视图可以隐藏一些数据，如：社会保险基金表，可以用视图只显示姓名，地址，而不显示社会保险号和工资数等，另一原因是可使复杂的查询易于理解和使用。

案列测试：

- 测试表:user有id，name，age，sex字段

- 测试表:goods有id，name，price字段

- 测试表:ug有id，userid，goodsid字段

## 可以通过视图更新的条件

- `from` 子句中只有一个数据库关系
- `select`语句中只包含关系的属性名，而不包括任何表达式，聚合函数和distinct声明
- 任何不在`select`语句上属性不能有 `not null`约束，也不构成主码的一部分
- 查询中不含有`group by`和`having`子句
在这些条件下 可以对视图使用`update`,`inserrt`,`delete`操作


## 作用一：

提高了重用性，就像一个函数。如果要频繁获取user的name和goods的name,应该使用以下sql语言。示例：
```sql
select a.name as username, b.name as goodsname    from user as a, goods as b, ug as c 
where a.id=c.userid and c.goodsid=b.id;
```


但有了视图就不一样了，创建视图other。示例
```sql
create view other as select a.name as username, b.name as goodsname 
from user as a, goods as b, ug as c 
where a.id=c.userid and c.goodsid=b.id;
```


创建好视图后，就可以这样获取user的name和goods的name。示例：

```sql
select * from other;
```

以上sql语句，就能获取user的name和goods的name了。

## 作用二：

对数据库重构，却不影响程序的运行。假如因为某种需求，需要将user拆房表usera和表userb，该两张表的结构如下：

- 测试表:usera有id，name，age字段

- 测试表:userb有id，name，sex字段

这时如果php端使用sql语句：select * from user;那就会提示该表不存在，这时该如何解决呢。解决方案：创建视图。以下sql语句创建视图：
```sql
create view user as select a.name,a.age,b.sex
from usera as a, userb as b 
where a.name=b.name;
```

以上假设name都是唯一的。此时php端使用sql语句：select * from user;就不会报错什么的。这就实现了更改数据库结构，不更改脚本程序的功能了。


## 作用三：

提高了安全性能。可以对不同的用户，设定不同的视图。例如：某用户只能获取user表的name和age数据，不能获取sex数据。则可以这样创建视图。示例如下：

```sql
create view other as select a.name, a.age 
from user as a;
```
这样的话，使用sql语句：select * from other; 最多就只能获取name和age的数据，其他的数据就获取不了了。

## 作用四：

让数据更加清晰。想要什么样的数据，就创建什么样的视图。经过以上三条作用的解析，这条作用应该很容易理解了吧