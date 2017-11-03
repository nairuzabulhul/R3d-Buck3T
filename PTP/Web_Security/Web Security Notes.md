#### HTTP Request :


- Host: header allows a web server to host a multiple wesbites on a single IP address 

- User-Agent that reveals the browser version, operatign system and language to the remote web server

- Accept: is used by the browser to specify which document type is expected. In this example, it is an httml file

- Accept-Encoding: restrcits the content codings that are acceptable in the response. 

- Keep-alive: indicares that all requests  to the web server will continue to be send through the 
		
	      established connection without initiating a new connection every time 



#### HTTP Response:


- HTT/1.1 Status Code : the status code indicates the status response 

- Date: the date and time of the response

- Cache-Control: it shows the caching rule by the web server. 

- Content-Type: end outpt format of the web pages 

- Conent-Encoding: has to do with how the web server process the web pags [compressing]

- Server: shows the type of the host web server 

- Content-Length: shows reponse length in bytes


#### Encoding:


- Charsets : ASCII, Unicode

- Unicode: Universal Charset Set allows the use of computers in any language




#### Same Origin Policy: 


The policy prevents scripts or a documents from getting and setting properties of another 

document from different origin. 


The policy is requested when cross-site HTTP requests are initiated from within client side scripts,

or when AJAX is running 

 

 
#### Cookies:

__HTTP__ by itself is a stateless protocol means that it cannot retain the connection by its own. It needs a session 

or cookie to keep the connection established


__HostOnlyFlag:__

when a cookie does not contain a domain value, it is assumed that the host-only-flag is set to true.  The cookie

with the host-only-flag value will be sent only to the target domain that set it.



__HttpOnlyFlag__: 

is used to force the browser to send the cookie only through HTTP

This flag prevents the cookie from being read via JS, Flash, Java or any other non-HTML technology.


__Secure flag__:

The browser forces the cookie to be sent only through HTTPS. This prevents from sending the cookie in clear text




#### Session:

- Session IDs are sometimes determined by the platform :
	
	- PHP ID 

	- JS ID 

	- Session ID


__Each development language has it own default session parameter name and ID__





#### The difference between Session and Cookie :


- Cookie : variables are stored on the client side


- Session: variabeles are stored on the server side



Also, sessions expire shorter than cookies



 &nbsp;
------------------------------------------------------------------------------------------------------------------------

## Section 2: Gathering information :


- Finding the target IP address, domain and emails :

    - __Whois :__ 
    
              - lookups are used to look up domain ownership details from different databases. it uses WHOIS protocol. 
          
                There are web interface clients as well as command line. Ex: www.whois.com
                
              - The protocol runs on TCP PORT 43
               
              - __Whois command__: whois www.google.com
	      
	      - __Web Interface:___ http://whois.domaintools.com/ 
	      
 &nbsp;	
 &nbsp;
 &nbsp;
 __DNS__:
    
    	     - TLD : Top Level Domain: e.g --> com, net.gov, fri, uk, us
	     
	     - DNS queries produce a list of records: A, AAAA, NS, SOA, CNAME, MX, PTR 
	     
	     - TTL [Time to Live]: is the minimum time determined in SOA record 
	     
	     - DNS records :
	     
	     	- __SOA:__ Start of Authority is a type of record that defined certain values like serial numbers, TTL values 
		
		
		- __NS:__  Name Server allow using domains instead of IP addresses.
		
		
		- __A__: maps the hostname to IP address . Zone with A records is called __forward Zone___
		
		- __AAAA__: maps the hostname to IPv6
		
		- __PTR:__ maps the IP address to the hostname. .Zone with PTR is calledd __reverse zone__

		- __MX:__ specifies a host that accepts emails 
		
		- __CNAME:__ maps alias hostname to A record 
		
		- __DNS Advantages:__
		
			- resolves IP address to hostnames. 
			
			- one name has refer to multiple hosts to share the load 
    
 &nbsp;	
 &nbsp;
 &nbsp;
 __NSlookup:__
    
- nslookup google.com   --> __forward lookup hostname to IP 
		
		
- nslookup -type=PTR 127.98.56.34 --> __reverse lookup IP to hostname 
			
			
- nslookup -querytype =ANY  google.com --> retrive all the records 
		    
		    
- Check domain, per-domain, and sub-domians as sometimes they poin to different IP addresses
			
	Ex: google.com --> Domain 
			
	Ex: www.google.com --> pre-domain
				
				
	
&nbsp;
&nbsp;
&nbsp;
__Finding ISP organization__:
    
    
- arin.net, whoisdomaintools.com, rip.net 

		     
- __Netcraft__ provides a wealth of information about cetain domains 
		     


&nbsp;
&nbsp;
&nbsp;
__Infrastructure:__
  
- 
  
