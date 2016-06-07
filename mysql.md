# Title:Mysql相关知识
##mysql索引
###名词解释
* 索引是一个单独的、物理的数据库结构，它是某个表中一列或若干列值的集合和相应的指向表中物理标识这些值的数据页的逻辑指针清单。
###索引的使用
* 如果经常使用表中的某一列或某几列为条件进行查询，且表中的数据量比较大时，可以创建索引，以提高查询的速度。
* 索引是与表关联的可选结构。
* 通过有目的的创建索引，可以加快对表执行SELECT语句的速度。
* 不管索引是否存在，都无需修改任何SQL语句的书写方式。索引只是一种快速访问数据的途径，它只影响查询执行的效率。
* 可以使用CREATE INDEX命令在一列或若干列的组合上创建索引。
* 创建索引时，将获取要创建索引的列，并对其进行排序。然后，将一个指针连同每一行的索引值存储起来，组成键值对（目录名和页码）。使用索引时，系统首先通过已排序的列值执行快速搜索，然后使用相关联的指针值来定位具有所要查找值的行。
* 一旦创建了索引，MySQL会自动维护和使用它们。
* 只要修改了数据，如添加新行、更新现有行或删除行， MySQL都会自动更新索引。
* 但是为表创建过多的索引会降低更新、删除以及插入的性能，因为MySQL还必须更新与该表关联的索引。
###创建索引
* ALTER TABLE table\_name ADD [UNIQUE] INDEX index\_name (col_name,…) 
* CREATE [UNIQUE] INDEX index\_name ON tabel\_name (col_name,…)
###查看/删除索引
* SHOW INDEX|KEYS FROM table_name 
* DROP INDEX index\_name ON table_name	

##视图
###概念
* 视图是由查询结果形成的一张虚拟表.
###概述
* 视图以经过定制的方式显示来自一个或多个表的数据
* 视图是一种数据库对象，用户可以象查询普通表一样查询视图。
* 视图内其实没有存储任何数据，它只是对表的一个查询。
* 视图的定义保存在数据字典内。创建视图所基于的表为“基表”。
* 视图一经定义以后，就可以像表一样被查询、修改、删除和更新
###作用	
* 简化数据查询语句
* 使用户能从多角度看到同一数据
* 提高了数据的安全性
* 提供了一定程度的逻辑独立性
* 减少带宽流量、优化后还可提高执行效率
###优点
* 提供了另外一种级别的表安全性
* 隐藏的数据的复杂性
* 简化的用户的SQL命令
* 通过重命名列，从另一个角度提供数据
###视图创建
* CREATE [OR REPLACE] [ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}] VIEW view\_name [(column\_list)]  AS select\_statement [WITH [CASCADED | LOCAL] CHECK OPTION]
* `OR REPLACE`：给定了OR REPLACE子句，语句能够替换已有的同名视图。
* `ALGORITHM`：可选的mysql算法扩展，算法会影响MySQL处理视图的方式。有以下三个值：`UNDEFINED`--MySQL将选择所要使用的算法。如果可能，它倾向于MERGE而不是TEMPTABLE，这是因为MERGE通常更有效，而且如果使用了临时表，视图是不可更新的。`MERGE`--会将引用视图的语句的文本与视图定义合并起来，使得视图定义的某一部分取代语句的对应部分。`TEMPTABLE`--视图的结果将被置于临时表中，然后使用它执行语句。
* `veiw_name`：视图名。`column_list`：要想为视图的列定义明确的名称，列出由逗号隔开的列名。column\_list中的名称数目必须等于SELECT语句检索的列数。若使用与源表或视图中相同的列名时可以省略column\_list。`select_statement`：用来创建视图的SELECT语句，可在SELECT语句中查询多个表或视图。但对SELECT语句有以下的限制：
1.定义视图的用户必须对所参照的表或视图有查询（即可执行SELECT语句）权限；2.在定义中引用的表或视图必须存在；
* `WITH [cascaded|local] CHECK OPTION`：在关于可更新视图的WITH CHECK OPTION子句中，当视图是根据另一个视图定义的时，LOCAL和CASCADED关键字决定了检查测试的范围。LOCAL关键字对CHECK OPTION进行了限制，使其仅作用在定义的视图上，CASCADED会对将进行评估的基表进行检查。如果未给定任一关键字，默认值为CASCADED。WITH CHECK OPTION指出在可更新视图上所进行的修改都要符合select_statement所指定的限制条件，这样可以确保数据修改后，仍可通过视图看到修改的数据。
* 限制：SELECT语句不能包含FROM子句中的子查询、不能引用系统或用户变量、不能引用预处理语句参数。在存储子程序内，定义不能引用子程序参数或局部变量。在定义中引用的表或视图必须存在。但是，创建了视图后，能够舍弃定义引用的表或视图。要想检查视图定义是否存在这类问题，可使用CHECK TABLE语句。在定义中不能引用TEMPORARY表，不能创建TEMPORARY视图。在视图定义中命名的表必须已存在。不能将触发程序与视图关联在一起。
###修改视图
* ALTER [ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}] VIEW view\_name [(column\_list)] AS select\_statement [WITH [CASCADED | LOCAL] CHECK OPTION]


###参考文章：
* [MYSQL数据库的索引、视图、触发器、游标和存储过程](http://blog.csdn.net/panfengyun12345/article/details/9187693)