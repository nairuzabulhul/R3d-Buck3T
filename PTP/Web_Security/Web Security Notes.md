## Module 1 : Info Gathering 

#### HTTP Request :


  - Host: header allows a web server to host a multiple wesbites on a single IP address 

  - User-Agent that reveals the browser version, operatign system and language to the remote web server

  - Accept: is used by the browser to specify which document type is expected. In this example, it is an httml file

  - Accept-Encoding: restrcits the content codings that are acceptable in the response. 

  - Keep-alive: indicares that all requests  to the web server will continue to be send through the 
     established connection without initiating a new connection every time 


 &nbsp;	
 &nbsp; 
 &nbsp; 
 
#### HTTP Response:


  - HTT/1.1 Status Code : the status code indicates the status response 

  - Date: the date and time of the response

  - Cache-Control: it shows the caching rule by the web server. 

  - Content-Type: end outpt format of the web pages 

  - Conent-Encoding: has to do with how the web server process the web pags [compressing]

  - Server: shows the type of the host web server   
    
  - Content-Length: shows reponse length in bytes

 &nbsp;	
 &nbsp; 
 &nbsp; 
 
#### Encoding:


   - Charsets : ASCII, Unicode

   - Unicode: Universal Charset Set allows the use of computers in any language



 &nbsp;	
 &nbsp; 
 &nbsp; 
 
#### Same Origin Policy: 


The policy prevents scripts or a documents from getting and setting properties of another 

document from different origin. 


The policy is requested when cross-site HTTP requests are initiated from within client side scripts,

or when AJAX is running 

 

 &nbsp;	
 &nbsp; 
 &nbsp; 
 
#### Cookies:

__HTTP__ by itself is a stateless protocol means that it cannot retain the connection by its own. It needs a session 

or cookie to keep the connection established

 &nbsp;	
 
__HostOnlyFlag:__

when a cookie does not contain a domain value, it is assumed that the host-only-flag is set to true.  The cookie

with the host-only-flag value will be sent only to the target domain that set it.


 &nbsp;	

 
__HttpOnlyFlag__: 

is used to force the browser to send the cookie only through HTTP

This flag prevents the cookie from being read via JS, Flash, Java or any other non-HTML technology.

 &nbsp;	

 
__Secure flag__:

The browser forces the cookie to be sent only through HTTPS. This prevents from sending the cookie in clear text



 &nbsp;	
 &nbsp;
#### Session:

  - Session IDs are sometimes determined by the platform :
	
	- PHP ID 

	- JS ID 

	- Session ID


__Each development language has it own default session parameter name and ID__



 &nbsp;	
 &nbsp;


#### The difference between Session and Cookie :


    - Cookie : variables are stored on the client side


    - Session: variabeles are stored on the server side



Also, sessions expire shorter than cookies



 &nbsp;	
 &nbsp;
 &nbsp
------------------------------------------------------------------------------------------------------------------------

## Section 2: Gathering information :


- Finding the target IP address, domain and emails :

    - __Whois :__ 
    
         - lookups are used to look up domain ownership details from different databases. it uses WHOIS protocol. 
          
         -  There are web interface clients as well as command line. Ex: www.whois.com
                
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


    - nslookup -type=NS microsoft.com  --> retrieves Name server information about the website   


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
---------------------------------------------------------------------------------------------------------------------------------
### Infrastructure:

[![new.png](https://s1.postimg.org/4zq9t9jjvj/new.png)](https://postimg.org/image/5dwpk4ruqj/)
  
&nbsp;
&nbsp;

- Web Servers behind hosting of web applications : Mirecosoft IIS, Apache 


- Knowing the backend servers [version] helps predicting the hosting OS and its version  


- IIS components usually called ISAPI extensions works as Dynamic libraries, extending the functionalies of the web server


- HTTP Headers can reveal some of the backend technologies of the server [GET Requests/ Responses]


- Netcraft can help in giving information about the web server and its top level technologies as well as some histrorical information
  about the site


- __Servers Checklist__ : 

	- Server IP
	
	- Server OS
	
	- Uptime stats
	
	- IP address owners 
	
	- Host provider
	
	- Cookies PHPID, JSID, ASPID [technologies]

- Internal Fingerprinting when a web server is not connected to the internet :
 
 	- __Whatweb__ : a command line tool that helps recognizing the technologies, Web server versio, blogging platforms, JS libs
			
	
	- __Wappalyzer__ is a web plugin-based tool that works both on Chrome and Firefox. The plugin shows the information about the 
			 web server, JavaScript, OS and frameworks 
	
	
	- __Netcat__: allows to establish connection to the web server . once it is establish, use __HEAD HTTP__ to get web server 			      inforamtion. __Server , X-Powered and Cookies are the most important fields that can reveal the server type,
		     version and the technology__ 
	
	
	- __Httprint__: 
 
 
- __Mod Security:__ is a firewall for web application
 


- __Ugly URL:__ are the ones that carry srting parameters and values that are meaningful to the web server but not representative
		of the content of the page. Ex: www.example.com/read_doc.php?id=100
		
		
		
- __Engine friendly URL:__ Ex: www.example.com/read/Buffer_Overflow.html
 
 
 
- URL Write Rule on Apache : __mod_rewrite, .htaccess__ 


- URL Write Rule on IIS: __Ionic Isapi Rewrite , Helicon Isapi Rewrite__


- __Enumerating Sub-domains :__

	- Search sub domain by using Netcraft Search Engine 
	
	- Google Operators: __site, &nbsp;  inurl, &nbsp; -site , &nbsp; -inurl , &nbsp; -inurl:www__ 
	
	  Ex: site:microsoft  &nbsp; -site:subdomain1.microsoft.com  &nbsp; -site:subdomain2.microsot.com  &nbsp; 
		 -inurl:subdomain3.microsot.com

	- Enumeration with tools: __dnsrecon, &nbsp; dnsenum, &nbsp; subbrute, &nbsp; theHarvester, &nbsp;fierce, &nbsp; recon-ng, 					&nbsp; knock__
	
	- __Zone Transfer:__ is the term used to refer to the process by which the contents of a DNS Zone file are copied
			     from a primary DNS server to a secondary DNS server"
			    

- __Finding Virtual hosts:__ 

	- Virtual hosts is a website that shares an IP address with one or more virtual hosts . One server[one IP address] with multple 
	 websites
	 


&nbsp;
&nbsp;
&nbsp;
--------------------------------------------------------------------------------------------------------------------------------------
### Fingerprinting Frameworks and Application :

- Common Applications :

	- forums (phpBB, vBulletin)
	
	- CMS'S (Joomlam Drupal)
	
	- CRM'S, blogging platforms(WordPress, Movable)
	
- Web scripts are available at www.hostscripts.com 

 - A basic step for pentesting a website, look at the website itself, its URLs. appearances and logic 
 
 - Add-ons are very important to inspect as they might be vulnerable to certain common vulnerabilites 
 
 
&nbsp;
&nbsp;
&nbsp;
--------------------------------------------------------------------------------------------------------------------------------------
### Fingerprinting Custom Applications:

[Web App Mapping diagram ] !!

- __Scoping the application :__

	- What is the applicaiton for ?
	
	- Does the application allow user registration ?
	
	- Does the applicaiton take input from the user?
	
	- What kind of input ?
	
	- Does the application accept file uploads?
	
	- Does the applicaiton use JS or Ajax or Flash ?

- __Analyzing the header :__

	- Use Burp Proxy to analzye the get requests and responses 
	

- __Mapping the application :__

	- __Client Side Validation__ : check user input validation against SQL, XSS, or general logical flaws. __Firebug__ is
	                               recommended for the test 
	
	 - __Database Interaction__ 
	
	- __File Uploading and Downloading__ 
	
	- __Display of User Spplied Data__ 
	
	- __Access Controls, Logins and protected Pages__
	
	- __Redirections__ : focus on the 300 status codes as they part of HTTP response manipulation 
	
	- __Error Messages__ 
	
	- __Charting__ 


&nbsp;
&nbsp;
&nbsp;
--------------------------------------------------------------------------------------------------------------------------------------
### Enumerating Resources:

- Crawling website for different types of files . Crawling only shows publicly available files --> BurpSuite Spider 

- Finding hidden files such as backup or configuration files --> Dirbuster 

- __Dirbuster__ can be customizable on what to search based on the wsbsite technologies 

- Directory listing, configuration files and logs are relevant in the process of enumeration 

- File extension such &nbsp; .old, &nbsp; .bak, &nbsp; .php.old, &nbsp; .php.bak | &nbsp; can reveal infromation about the database 


&nbsp;
&nbsp;
&nbsp;
--------------------------------------------------------------------------------------------------------------------------------------
### Shodan :

- Shodan is a search engine that probs ports and services on devices and serevrs 

- Shodan uses:
	- Devices with default usrername and passes
	
	- Viewing the configuration of devices
	
	- Detect server versions 
	
	
- [__Shodan Filters:__](http://www.shodanhq.com/help/filters)

- [Google Operaters](http://www.googleguide.com/advanced_operators.html)

- [Google Operators 2](http://www.hackersforcharity.org/ghdb/)


&nbsp;
&nbsp;
&nbsp;
--------------------------------------------------------------------------------------------------------------------------------------

## Module 3: Cross Site Scripting:

__Introduction:__

- __XSS__: Cross Site Scripting is an attack where the JavaScript is run on a web browser

- XSS attacks can :

	- Steal Cookies 
	
	- Inject a keylogger into the browser
	
	- Getting complete control over the browser 
	
	- Intiaite different types of attacks by injecting JS in plugin 

- XSS checklist :

	- check every user input for XSS vulnerability 
	
	- Once the fields are found, create the JS payload 
	
	- send it to the user 
	
&nbsp;
&nbsp;
&nbsp;

__XSS Types:__

- __Reflected XSS__: 
	
	- the most common and visible XSS,as it echos back to the user the ouput of the injection. This type of vulnerability
	   deals with the server side  
		
	- The user brings the payload in their HTTP request to the vulnerable website. This payload will be executed on their 
	  browser
		  
	- Links in this type of attack are designed creatively [can send direct link or embded in services]
		

- __Stored XSS__ : 

	- it is also known as __persistent xss__, the malicious input is stored withinthe web application. once this occurs, 			  the web application will vulnerable to all users who access it . This type of attack does not require user
	   interactions. it is deals directly with the website.
		  
	- The payload is saved on the web browser once the user accesed the vulnerable website. Itcan be rendered to one or muplitle
	   pages in the same website

- __DOM XSS__: is a client-side attack that infects the user's current page only and does not reach server-side code 




&nbsp;
&nbsp;
&nbsp;


__Finding XSS:__

- 
