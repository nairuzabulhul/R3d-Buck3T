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

- 
