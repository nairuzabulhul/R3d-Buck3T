
## Table of Contents:

- [__Web Security__](https://github.com/nairuzabulhul/RoadMap/blob/master/PTP/XXL_Commands.md#web-security-)



&nbsp;
&nbsp;
&nbsp;

## Web Security : 

### Information Gathering 

__NSlookup:__
    
- nslookup &nbsp; google.com   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  |  __forward lookup hostname to IP__ 
		
		
- nslookup &nbsp; -type=PTR 127.98.56.34 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; |  __reverse lookup IP to hostname__  
			
			
- nslookup &nbsp; -querytype =ANY  google.com  &nbsp;  &nbsp; &nbsp; &nbsp; |  __retrive all the records__ 


- nslookup &nbsp; -type=NS microsoft.com &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | __retrieves Name server information about the website__   

- nslookup &nbsp; -type=NS &nbsp; domain.com &nbsp; | &nbsp; Zone Transfer

&nbsp;
&nbsp;
&nbsp;

__dig:__

- dig &nbsp; @nameserverofSite axfr &nbsp; domain.com  |  &nbsp; perform a zone transfer 



&nbsp;
&nbsp;
&nbsp;

__Whois:__

- whois www.google.com  &nbsp; &nbsp; &nbsp; | __retreives information about the domain__

- whois -h  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | __shows all WHOIS options__


&nbsp;
&nbsp;
&nbsp;

__Netcat:__

- __nc IPaddress  PortNumber__ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |  &nbsp;  &nbsp; EX:  &nbsp; nc 162.124.56.44 80 

- __HEAD / HTTP /1.0__  


&nbsp;
&nbsp;
&nbsp;

__Whatweb:__

- whatweb &nbsp; -h  &nbsp; &nbsp; | &nbsp; Help Summary 

- whatweb &nbsp; IPaddress  | &nbsp; Ex: whatweb  &nbsp; 228.98.35.56

- whatweb &nbsp; URL &nbsp; |  &nbsp; Ex: whatweb  &nbsp;  www.google.com

- whatweb &nbsp; -v  &nbsp; IPaddress  &nbsp; |  &nbsp; shows readable output Ex: whatweb  &nbsp; -v  &nbsp; 228.98.35.56

&nbsp;
&nbsp;
&nbsp;

__Httprint:__

- 

&nbsp;
&nbsp;
&nbsp;
----------------------------------------------------------------------------------------------------------------------------------------

### DNS Enumeration : 

__subbrute:__


- python &nbsp; subbrute.py  &nbsp; -h &nbsp; | &nbsp;Help

- __name.txt__ &nbsp; |  &nbsp; the default wordlist for the script 

- subbrtue &nbsp; microsoft &nbsp; 

- subbrute &nbsp; -h &nbsp; -s &nbsp; [path ro the custom_wordlist.txt] &nbsp; | &nbsp; Use custom wordlist 

&nbsp;
&nbsp;
&nbsp;

__dnsrecon:__

- dnsrecon &nbsp; -d &nbsp; microsoft.com &nbsp; | &nbsp; perfroms a general enumeration  

- dnsrecon &nbsp; -d &nbsp; microsoft &nbsp; -g &nbsp; | &nbsp; performs a Google search 



&nbsp;
&nbsp;
&nbsp;

__theharvester:__

- theharvester &nbsp; -d website  &nbsp; -b &nbsp; google &nbsp; -l &nbsp; 200 &nbsp; -f &nbsp; output.html &nbsp;|&nbsp; Google 

- - theharvester &nbsp; -d website  &nbsp; -b &nbsp; linkedin &nbsp; -l &nbsp; 200 &nbsp; -f &nbsp; output.html &nbsp; |&nbsp; Linkedin

- d &nbsp; search the domain 

- l &nbsp; limit the results to work with 

- f &nbsp; output to HTML or XML file 

- b &nbsp; data source (bing, google, linkedin, pgp, all..)


&nbsp;
&nbsp;
&nbsp;


__dnsenum:__

- dnsenum &nbsp; -p &nbsp; 20 -s &nbsp; 100 &nbsp; --threads 5 &nbsp; website.com 

- __s__ &nbsp; | &nbsp; maxium numbers of sub domains 

- __threads__ &nbsp; | &nbsp; for speeding up the crawling process 

- __p__ &nbsp; | &nbsp; for pages 

&nbsp;
&nbsp;
&nbsp;
--------------------------------------------------------------------------------------------------------------------------------------
