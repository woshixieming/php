### Title:该文档为每日工作总结，并不仅限于PHP技术

    
### 11.26 
##### Navicat for Mysql 导出中文数据乱码：
* 版本：11.0.19
* 数据库编码：UTF8
* 方法：在第二步时，选择 `高级` -> `编码`-> `Current Windows Codepage`



#### Excel最大容量
* Excel2003 最大支持65536行，256列
* Excel2007 最大支持1048576行，16384列
* CSV实际为文本格式，没有行数及列数限制

#### 11.27
##### 增加数据表主键
* `ALTER TABLE table_name ADD INDEX IDX_INDEX (field)`

#### 11.30
##### Mysql `FIND_IN_SET(str,strlist)`
* 假如字符串str 在由N 子链组成的字符串列表strlist 中， 则返回值的范围在 1 到 N 之间 。一个字符串列表就是一个由一些被‘,’符号分开的自链组成的字符串。如果第一个参数是一个常数字符串，而第二个是type SET列，则   FIND_IN_SET() 函数被优化，使用比特计算。如果str不在strlist 或strlist 为空字符串，则返回值为 0 。如任意一个参数为NULL，则返回值为 NULL。 这个函数在第一个参数包含一个逗号(‘,’)时将无法正常运行。
* `mysql> SELECT FIND_IN_SET('b','a,b,c,d');`
* `->2`

