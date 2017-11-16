### Notes from The Web Application Hacker Handbook


### Gather Information 



### Web Spridering 

- Use web spidering to show all the files 

- Many web servers contain a fi le named robots.txt in the web root that
 contains a list of URLs that the site does not want web spiders to visit or search
 engines to index
 
- __User-Directed Spidering__ : is wallking through the website normally and manually while the interception/spidering tool is on 


__Note__Try to avoid automatic spidering instead use User-directed Spidering . Automatic spidering can cause damage to the application 
      backend

- Use browser extensions that can perform HTTP and HTML analysis from within the browser interface


__Tips:___


- Configure your browser to use either Burp or WebScarab as a local proxy

- Browse the entire application normally, attempting to visit every link/URL
you discover, submitting every form


- Try browsing with JavaScript enabled and disabled, and with cookies enabled and disabled (the output might be different)


- Last if needed : try automatic spidering
  
  
 &nbsp; 
 &nbsp; 
 &nbsp; 
 
### Discovering Hidden Content

- Backup copies of live files, Backup archives that contain a full snapshot of files, Old versions of fi les that have not 
  been removed from the server, Log fi les that may contain sensitive information such as valid usernames,
 session tokens, URLs visited, and actions performed
 
- __Brute-Force Techniques:__

  - Burp Intruder can be used to iterate through a list of common directory
    names and capture details of the server’s responses
    


__Status Code:__


- __302 Found__ — If the redirect is to a login page, the resource may be
              accessible only by authenticated users. If the redirect is to an error message,
              this may indicate a different reason. 
              
              
- __400 Bad Request__ — The application may use a custom naming scheme
                for directories and fi les within URLs, which a particular request has not
                complied with. More likely, however, is that the wordlist you are using
                contains some whitespace characters or other invalid syntax.
                
__401 Unauthorized or 403 Forbidden__ — This usually indicates that
the requested resource exists but may not be accessed by any user

- __500 Internal Server Error__ — During content discovery, this usually
indicates that the application expects certain parameters to be submitted
when requesting the resource.


