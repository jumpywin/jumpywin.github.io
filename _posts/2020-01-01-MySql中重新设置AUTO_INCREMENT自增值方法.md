---
title: 重置自增 auto_increment
date: 2019-09-16 11:50 +0800
categories: [MySQL]
tags: [MySQL]
---

# 重置自增 auto_increment

## 自增简述

一般来说，自增值主要是数据表主键或者具有唯一性的字段，在MySQL中可通过数据列的AUTO_INCREMENT属性来自动生成。

- 如果把一个NULL插入到一个AUTO_INCREMENT数据列里去，MySQL将自动生成下一个序列编号。编号从1开始，并1为基数递增。

- 把0插入AUTO_INCREMENT数据列的效果与插入NULL值一样。但不建议这样做，还是以插入NULL值为好。

- 当插入记录时，没有为AUTO_INCREMENT明确指定值，则等同插入NULL值。

- 当插入记录时，如果为AUTO_INCREMENT数据列明确指定了一个数值，则会出现两种情况，情况一，如果插入的值与已有的编号重复，则会出现出错信息，因为AUTO_INCREMENT数据列的值必须是唯一的；情况二，如果插入的值大于已编号的值，则会把该值插入到数据列中，并使在下一个编号将从这个新值开始递增。也就是说，可以跳过一些编号。
- 如果用UPDATE命令更新自增列，如果列值与已有的值重复，则会出错。如果大于已有值，则下一个编号从该值开始递增。

## 重置自增

- 目的：删除一行数据后，希望自增字段随着现有数据连续增长

有两种方法可以做到这一点：

### 修改当前自增的id（说法有问题，也不知道怎么说比较合适）

`- alter table table_name auto_increment = 0`即下一行数据的自增字段从0开始自增,据说数据多的时候，效率很低下

### 重建

```
--- 删除原表数据,并重置自增列
truncate table tablename  --truncate方式也可以重置自增字段
--重置表的自增字段,保留数据
DBCC CHECKIDENT (tablename,reseed,0) 
```

- 来自网友博客，不知是否好用