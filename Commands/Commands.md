
### Telent :

    >>> telent hostName portNumber






### SSH

    >>> ssh usernmae@hostname -p portNumber -i ssh_key_file
    
    >>> ssh username@hostName -p portNumber 
    
    >>>  ssh userName@hostName -t /bin/sh -p portNumber  --> log with out .bashrc file
    
    .bashrc file: 
    
    
    
    
### OpenSSL:

    >>> openssl s_client -connect hostName:portNumber
    
    
__s_client__: establishes SSL/TLS connection



### Linux:
 
    >>>  ls -ld .?*    ----> Show hidden files 


### Nmap :

    >>> nmap -sT IP_address             ----> TCP scan (active scanning), complete handshake
    
    >>> namp -sS Ip_address            -----> Stealth scan(No logs), as the handshakes is NOT completed 
    
    >>> nmap -sV IP_address           ------> probing services on the ports
    
    >>> nmap -Pn IP_address           ------> scanning without sending pings 
    
    >>> nmap -O IP_address           ------> scan with OS fingerprinting 
    
    >>> nmap -A IP_address         --------> 
    
