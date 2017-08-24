### Web Application :

- HTTP Analysis
- HTTPS Analysis 
- BurpSuite


#### HTTP Analysis:

- __netcat__
    
        EX: nc www.google 80 

- When connecting with netcat:

        EX:
            GET / HTTP/1.1
            HOST: www.google.com




### HTTPS Analysis:

- __OpenSSL__
    
        EX:
            openssl -s_client -connect www.cnn.com:443  --> connect with HTTPS

             openssl -s_client -connect www.cnn.com:443 -debug --> for analysis and debugging of SSL handshake 
             
             openssl -s_client -connect www.cnn.com:443  --> Check the status of the handshake 
             
              openssl -s_client -connect www.cnn.com:443 -quiet >> to reduce the verbosity of the output 


__Kismet__ packet sniffer for IEEE 802.11

__HTTP Cookie__:

- __Host Only__ the server will only send a cookie for the specific hostname

- __HTTP Only__ when a server installs a cookie with HTTP-only attribute, the client will set HTTP only flag for the cookie.

__secure cookie__: cookies that only sent over HTTPS connection

__Session__: is a mechanism that lets the website store variables specific to the visitor server side
>>> Includes ---------------> Session ID, Session Value
        
__Same Origin Policy__:
>>> the same-origin policy is an important concept in the web application security model. Under the policy, a web browser permits scripts contained in a first web page to access data in a second web page, but only if both web pages have the same origin.

__Intercept Proxy__:

>>> is a tool that lets you analyze and modify requets and responses between HTTP client and server


### Tools:

- BurpSuite : __Target, Scope, Proxy, Spider, Repearter__
- FireBug
- OWASP (ZAP)
-


### BurpSuite Tools:

- __Proxy:___
        - intercepts every request 
        - Multiple actions can be performed on requests
        - Setting a scope is very important to weed out irrelevant requests
        - Filter the  scope to show only relevant URLs
        - Add the scope to the proxy "Intercept" by checking the URL box 
        - Any other URLs that are not included in the scope would be ignored by the
          proxy intercept
        - HTTP logins are shown in BurpSuite and can be modified via proxy 
        
    __Target__
        - Bold objects are objects that are reguested by BurpSuite user
        - Grey objects are pobjects that are automatically pull out by the program
    
    __Spider__:
         - Crawls web pages within the speciifc scope
         - For forums it is better to choose the option prompot for guidance to avoid uncessary form submissions
    
    __Repeater__: 
            - Checks how the application behaves 


### [HTTP Status Codes:](https://www.cheatography.com/kstep/cheat-sheets/http-status-codes/)

|  __Code__ | __Status__   |  
|-----------|--------------|
| __200__   |  OK          |  
| __202__   | Accept       | 
| __301__   | Moved Permenantly   | 
| __302__   |  Found          |  
| __304__   | Not Modified       | 
| __305__   | Use Proxy   | 
| __400__   | Bad Request|
| __401__    | Unauthorized|
| __402__    | Forbidden  |
| __404__   | Not FOund  | 
| __407__   | Proxy Authentication Required|
| __408__   | Requets Timeout |
| __500__   |  Intrernal Server Error          |  
| __501__   |  Not Implemented      | 
| __502__   | Bad Gateway  | 
| __503__   | Service Unavailable | 
| __504__   | Gateway Timeout | 
