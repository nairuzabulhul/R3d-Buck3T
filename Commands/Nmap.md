### Active:

>> Get IP address:
#### Host discovery 
    - Ping all the hosts
    - Check all the hosts without pinging 
    - Check if the hosts are protected with firewalls
    - Evade the firewall by stop pinging or fragment the packets
    - save the result in HTML format / txt 
    
__List of hosts on the network__

        >> nmap -sL  IP_address

__List of hosts on the network without ping:__

    >> nmap -Pn  -n IP_address

__Scan from a list of addresses:__

    >> nmap -n -iL ip-addresses.txt 

- __Firewalls IDS Evasion by fragmentation__

    >> nmap -n IP_address -f -mtu VALUE        

__Find out if a host/network is protected by a firewall__

    >> nmap -sA 192.168.1.254
    
__Save in HTML format__

    >>  nmap -Pn -n 10.0.1.99 --webxml -oX - | xsltproc --output file.html -
    
__n__: No DNS resolution 
__f__: fragmentation of packets
__Pn:__ No Pings
__iL__: list of IPs
__sL__: return a list of up hosts

#### Port discovery / enumeration: 
- Check list of Common ports (faster)
- Check all the ports (slow)
- Save the output in HTML format or Text 
    
    
__List of Common ports__:

    >> nmap -F IP_address

__List of all ports:__

    >> nmap -p "*" IP_address

__Display the reason a port is in a particular state__

    >> nmap  --reason IP_address
    
__Save the output in HTML format or Text__:


__F__: commonm ports
__p__: ports
    

#### Service discovery
- Probe open ports to determine service/version info
- Service version detection

__Probe Services__
    
    >> nmap -sV IP_address

__sV__: service detection


#### Operating system version detection

__Fingerprint the OS__:

    >> nmap -O IP_address

#### Scanning Sevices with Scripts
- check the returned services
- Return all scripts that relate with the open services
- Pick the right script
- Run the script
- Locate the .nse files for vulnerabilities 


    
        nmap nmap  --script nbstat.nse -p Port_number IP_address
        
        nmap -p 80 --script dns-brute.nse vulnweb.com

#### Vulnerability / exploit detection, using Nmap scripts (NSE)
- locate all vulns.nse files
- Pick the vulnerability that related to the service 


    >> nmap --script-args=unsafe=1 --script smb-check-vulns.nse -p 445 10.0.0.1
    
    >> nmap --script smb-check-vulns.nse -p 445 10.0.0.1
