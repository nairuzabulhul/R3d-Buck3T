### Web Severs:

__Fingerprinting web servers means detecting__:

- Daeomons that provide web service to the server such as __IIS__ , __Apache__, __nginx__
- The version of the running service 
- Open ports
- Operating system of the host

__General Notes__:

- Fingerprinting results should NOT be taken with 100 accuracy

- The banners that sent back to the client can be customizable by the sysadmins to hide essential information

- However; most automatic tools for fingerprinting do not depend only on banner grabbing, they check small implementation details such as __Header ordering in response messages and Error handling__


__Tools used in web fingerprinting__:

- __Netcat__:
  >> Ex: __nc <host_name/ IP> port_number__
         
        GET / HTTP/1.1
        Host: www.example.com

    >>> Netcat is used with HTTP requests 
   
 &nbsp;
- __OpenSSL__:
   >>>  Ex: __oepnsssl s_client -connect <target site>:443__
    
        HEAD / HTTP/1.1

    >>> OpenSSL works with HTTPS requests 

&nbsp;
- __HTTP PRINT__:

    >>> __httprint -P0 -h <target web> -s <signature file>__

    - __P0__: avoind pinging the host
    - __h__ : use a list of hosts
    - __s__ : use a signature file

__HTTP Verbs__:

- GET
     >>> GET / HTTP/1.1
    Host: www.example.com

    __GET used to request a page, a path can be added to the request__

- POST
    >>> POST /login.php HTTP/ 1.1
        Host:wwww.example.com
        username=john&password=pass

    __POST verb is to send infromation to the webs server__

- HEAD
    >>> HEAD / HTTP/1.1
        Host:www.example.com

    __HEAD is requesting the head ONLY__

- PUT
    >>> PUT /path/to/destination &nbsp;   HTTP/1.1
        Host:www.example.com
        
        <PUT data>

    __PUT allows for file upload (shell) is included__\


- DELETE
    >>> DELTE /path/to/destion HTTP/1.1
        Host:www.example.site

    __DELET allows to remove files from the site__

- OPTIONS:
    >>> OPTIONS / HTTP/1.1
    Host: www.example.com

    __Options returns the set of HTTP verbs in which can be     used with the server__
    
__Enumerating with OPTIONS__

    >>> This can be done with Netcat
        Then use OPTIONS requests

__Exploiting with DELETE:__

    >>> This can be done with Netcat
        Then use DELETE requests

__Exploiting PUT:__

>>> PUT considers more complex it needed to know the file size that is going to be uploaded to the server

- First know the size of the file __wc (Word Count)__

        wc -m file.php

- Second build customize PUT request to send to the server:
        
        nc www.example.com 80
        PUT /payload.php HTTP/1.1
        Content-type:text/html
        Content-length: 20 --> any number you get from wc

        <?php phpinfo();?>
        

        
__Cross Site Scripting__:

- A vulnerability that let's an attacker control some content of a web application 
    - Modify the content on the run-time 
    - inject malicious content
    - Steal cookies, thus session

__XXS vulnerability__ happens when a web application uses unfiltered user input to build the output content 

__User Input__:

- Head requets
- Cookies
- POST parameters
- GET parameters

__Types of XSS__:

- __Reflected__ 

>>> happens when the injection of a malicious payload carried inside the request that is sent to the vulnerable website

- Persistsent
