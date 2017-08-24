### Networking 

#### Contents:

- [Routing Tables](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#routing-tables)
- [MAC Addresses](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#mac-addresses)
- [Hubs](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#hubs)
- [Switches](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#switches)
- [TCP/UDP](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#tcpudp)
- [Common Ports](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#common-ports)
- [Netstat](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#netstat)
- [ARP](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#arp)
- [Firewalls]
- [IDS vs IPS]
- [Wireless Protocols]
- [Promiscuous vs Montior Mode]
- [Kerbros ]
- [Wireshark Filtering ]
- [Nmap](https://github.com/nairuzabulhul/General-Commands/blob/master/Netwokring/Networking%20Commands.md#nmap)
- [Ping]
- [nslookup]

__OSI Model__
        
        - Application 
        - Presentation 
        - Session
        - Transport 
        - Network
        - Data Link
        - Physical 
    
    
### Routing Tables: 

   __Windows__ : 
        
        route print 

   __Linux__ :
    
        ip route 
        
        route -r  --> display all the routing tables  
        
        rout add  -host IP_address  -gw Degfault_Gateway Interface_Name    
        
        rout del -host IP_address  -gw Degfault_Gateway Interface_Name  
        
   __OSX__:
    
        netstat -r 
        

### MAC Addresses: 

>> Physical Address of the Network Interface Card (NIC)

 __Windows__:
    
        ipconfig /all
        

__Linux__:

        ip addr
        
__OSX__:

      ifconfig 
        
        


### Hubs:

>> are repeaters forward packets by repeating electrical signals. Hubs send packets to all clients on the network 


### Switches : 

>>  

- __Forwarding Tables__ used to forward packet to the specific client via MAC address
- 


### TCP/UDP

- __TCP__ Transport Control Protocol 
    
    - Slow 
    - Performs handshakes 
    - Checks the arrival of packert
    - Handshake:
            - __SYN__ : a flag to start the connection . The __sequence number __is a random number
            - __SYN/ACK__ : once the connection is establish, a syn/ack flag is sent to the recipient client, the Ack __sequence number__ is +1 increment of __Syn__ 
            - __ACK__ : this is where packets are transferred as a result of establishing connection 
            

    __Ex: Sending emails, sharing files__

- __UDP__ User Datagram Protocl 

    - Fast 
    - No checking mechanism 


    __Ex: Streaming videos: Nertflix , Skype calls__


### Common Ports:
| Port Number  | Service  |
|---|---|
| 25   | SMTP   |
| 21   |  FTP |
| 22   | SSH |
| 110  |  POP3 |
| 23   |  Telnet |
| 80   | HTTP   |
| 443  |  HTTPS |
| 143  | IMAP   |
| 137 - 139| NetBIOS   |
| 3389 |  RDP |
| 3306 | SQL |
|  1433| MS SQL |


### Netstat
    
__Windows__:
    
        netstat -ano 
        

__Linux__:

    nestat -tunp 
    

__OSX__:

    netstat -p --> review this 
        
    
### ARP: 

>> Binding IP address with MAC address

   - __ARP Request__ 
   - __ARP Reply__ 

__Windows__

        arp -a
        
__Linux__

    ip neighbor 
    
    arp 
    
__OSX__

    arp 
    

### Firewalls
### IDS VS IPS

### Wireless Protocols

    IEEE 802.3 --> Ethernet
    IEEE 802.11 --> Wireless
    IEEE 802.1x --> Entreprise Wireless (requires authentication)
    
### Promiscuous vs Montior Mode :


### Kerbros 

>> Authentication Protocol 
    
### Wireshark Filtering :   

| Display Filter  | Functionality  |
|-----------------|----------------|
| ip                | filtering for IP protocol ONLY   |
| not ip            |  exclude IP protocol |
| arp               | filtering for ARP protocol ONLY |
| tcp port 80       | filtering for TCP protocol that uses port 80   |
| tcp port 443       |  filtering for TCP that uses secure socket layer SSL |
| dns                     | filtering for DNS protocol ONLY |
| net   192.168.12.133/24 | filtering for packets from specific network scr & dst |
| scr 192.168.12.133/24   |  filtering for packets from specific source  |
| scr port 443            |  filetring for specific source port |
| host 192.168.12.133     | filtering for specific host |
| host www.example.com    | filtering for speific host name |  

### Nmap


### Ping

### nslookup 




