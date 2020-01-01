# 触发器_MySQL

MySQL包含对触发器的支持。触发器是一种与表操作有关的数据库对象，当触发器所在表上出现指定事件时，将调用该对象，即表的操作事件触发表上的触发器的执行。

## 创建触发器

在MySQL中，创建触发器语法如下：

```
CREATE TRIGGER trigger_name
trigger_time
trigger_event ON tbl_name
FOR EACH ROW
trigger_stmt
```

其中：

- trigger_name：标识触发器名称，用户自行指定；
- trigger_time：标识触发时机，取值为 BEFORE 或 AFTER；
- trigger_event：标识触发事件，取值为 INSERT、UPDATE 或 DELETE；
- tbl_name：标识建立触发器的表名，即在哪张表上建立触发器；
- trigger_stmt：触发器程序体，可以是一句SQL语句，或者用 BEGIN 和 END 包含的多条语句。

由此可见，可以建立6种触发器，即：BEFORE INSERT、BEFORE UPDATE、BEFORE DELETE、AFTER INSERT、AFTER UPDATE、AFTER DELETE。

另外有一个限制是不能同时在一个表上建立2个相同类型的触发器，因此在一个表上最多建立6个触发器。



## trigger_event 详解

- MySQL 除了对 INSERT、UPDATE、DELETE 基本操作进行定义外，还定义了LOAD DATA 和 REPLACE 语句，这两种语句也能引起上述6中类型的触发器的触发。

- LOAD DATA 语句用于将一个文件装入到一个数据表中，相当与一系列的 INSERT 操作。

- REPLACE 语句一般来说和 INSERT 语句很像，只是在表中有 primary key 或 unique 索引时，如果插入的数据和原来 primary key 或 unique 索引一致时，会先删除原来的数据，然后增加一条新数据，也就是说，一条 REPLACE 语句有时候等价于一条。

- INSERT 语句，有时候等价于一条 DELETE 语句加上一条 INSERT 语句。

- INSERT 型触发器：插入某一行时激活触发器，可能通过 INSERT、LOAD DATA、REPLACE 语句触发；
- UPDATE 型触发器：更改某一行时激活触发器，可能通过 UPDATE 语句触发；
- DELETE 型触发器：删除某一行时激活触发器，可能通过 DELETE、REPLACE 语句触发。



## BEGIN … END 详解

在MySQL中，BEGIN … END 语句的语法为：

```mysql
BEGIN
[statement_list]
END
```

​		其中，statement_list 代表一个或多个语句的列表，列表内的每条语句都必须用分号（;）来结尾。
​		而在MySQL中，分号是语句结束的标识符，遇到分号表示该段语句已经结束，MySQL可以开始执行了。因此，解释器遇到statement_list 中的分号后就开始执行，然后会报出错误，因为没有找到和 BEGIN 匹配的 END。

​		这时就会用到 DELIMITER 命令（DELIMITER 是定界符，分隔符的意思），它是一条命令，不需要语句结束标识，语法为：
`DELIMITER new_delemiter`
`new_delemiter` 可以设为1个或多个长度的符号，默认的是分号（;），我们可以把它修改为其他符号，如$：
`DELIMITER $`
在这之后的语句，以分号结束，解释器不会有什么反应，只有遇到了$，才认为是语句结束。注意，使用完之后，我们还应该记得把它给修改回来。



## 一个完整的创建触发器示例

假设系统中有两个表：
班级表 class(班级号 classID, 班内学生数 stuCount)
学生表 student(学号 stuID, 所属班级号 classID)
要创建触发器来使班级表中的班内学生数随着学生的添加自动更新，代码如下：

```MySQL
DELIMITER $
create trigger tri_stuInsert after insert
on student for each row
begin
declare c int;
set c = (select stuCount from class where classID=new.classID);
update class set stuCount = c + 1 where classID = new.classID;
end$
DELIMITER ;
```



## 变量详解

MySQL 中使用 DECLARE 来定义一局部变量，该变量只能在 BEGIN … END 复合语句中使用，并且应该定义在复合语句的开头，

即其它语句之前，语法如下：

```MySQL
DECLARE var_name[,...] type [DEFAULT value]
```

其中：
`var_name` 为变量名称，同 SQL 语句一样，变量名不区分大小写；`type` 为 MySQL 支持的任何数据类型；可以同时定义多个同类型的变量，用逗号隔开；变量初始值为 NULL，如果需要，可以使用 `DEFAULT` 子句提供默认值，值可以被指定为一个表达式。

对变量赋值采用 `SET` 语句，语法为：

```
SET var_name = expr [,var_name = expr] ...
```



## NEW 与 OLD 详解

上述示例中使用了NEW关键字，和 MS SQL Server 中的 INSERTED 和 DELETED 类似，MySQL 中定义了 NEW 和 OLD，用来表示

触发器的所在表中，触发了触发器的那一行数据。
具体地：
在 INSERT 型触发器中，NEW 用来表示将要（BEFORE）或已经（AFTER）插入的新数据；
在 UPDATE 型触发器中，OLD 用来表示将要或已经被修改的原数据，NEW 用来表示将要或已经修改为的新数据；
在 DELETE 型触发器中，OLD 用来表示将要或已经被删除的原数据；
使用方法： NEW.columnName （columnName 为相应数据表某一列名）
另外，OLD 是只读的，而 NEW 则可以在触发器中使用 SET 赋值，这样不会再次触发触发器，造成循环调用（如每插入一个学生前，都在其学号前加“2013”）。



## 查看触发器

和查看数据库`show databases`查看表格`show tables`一样，查看触发器的语法如下：

```MySQL
SHOW TRIGGERS [FROM schema_name];
```

其中，`schema_name` 即 Schema 的名称，在 MySQL 中 Schema 和 Database 是一样的，也就是说，可以指定数据库名，这样就

不必先`USE database_name`了。



## 删除触发器

和删除数据库、删除表格一样，删除触发器的语法如下：

```MySQL
DROP TRIGGER [IF EXISTS] [schema_name.]trigger_name
```



## 触发器的执行顺序

我们建立的数据库一般都是 InnoDB 数据库，其上建立的表是事务性表，也就是事务安全的。这时，若SQL语句或触发器执行失败，MySQL 会回滚事务，有：

- 如果 BEFORE 触发器执行失败，SQL 无法正确执行。
- SQL 执行失败时，AFTER 型触发器不会触发。
- AFTER 类型的触发器执行失败，SQL 会回滚。

