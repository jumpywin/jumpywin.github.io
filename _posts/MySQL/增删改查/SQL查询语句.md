# SQL 查询相关
## 基本语句
```sql
select #需要打印的列名

from #从哪张表里面打印  

where #条件关系式 筛选打印条件 
        #where 语句可以使用逻辑连词 and or not
group by #列名 按照哪个列为标准分组  

having #分组语句的谓语，对分组后结果进行筛选

distinct #
```
## 聚合函数
- avg()平均  
- min()最小  
- max()取最大  
- sum()加起来  
- count()计个数  

sum和avg的输入必须是数字集，其他的聚合函数的输入可以是别的，比如字符串

#### 示例代码
```
select core,count(*) as count
from AMD_YES
#where tdp >65
group by core having core <16
```
输出结果为：  
core | count
:-:|:-: 
12 | 1  
8 | 3  
6 | 2  
4 | 2  
### 对结果排序
- 基本语句  
    `order by column_name limit number`  
    `column_name` #以此列为基准排序  
    `number` #打印出前number个数据  
    `desc` #置顶升序排序  
    `asc` #指定升序排序  

    你可以在select语句的`order by`语句 里面使用列的位置来指定列，而不是列的名称。（但是，一听就知道不是推荐做法）例如：
```
select core, name  
from AMD_YES  
#where tdp >65
order by 2 asc
limit 8
```