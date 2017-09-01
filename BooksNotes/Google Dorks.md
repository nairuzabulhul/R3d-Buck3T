__Chapter 1: Google Search Basics__

- __OR__ 

        Ex: Linux OR Windows ---> either the first part OR the second part of search 
    
- __AND__ 
            
         Ex: Linux AND Unix commands ---> show result of both mentioned 
            in the url or the title of the  sites

- __NOT__: 

        EX: cnn.com NOT ccn_report.com


__Advanced Searching__

- __intitle__

- __allintitle__


- inurl
- allinurl

- __filetype__

        Ex: filetype:doc linuxcommands
- allintext

- __site__

        Ex: site:cnn.com 

- __link__

    The link operator allows you to search for pages that link to other pages
    
        EX: 
        
        
- __inanchor__

        <A HREF = “http://dmoz.org/Computers/Software/Operating_Systems/Linux/” >           current page < /A>The inanchor operator helps search the anchor, or the             displayed text on the link, which in this case is the phrase “current page.”

        EX:
        
- __Numrange__:

        EX: Numrange:12344..12346
        
        
- __daterange__

        Ex: datarange: 2007 "search item"


- __info__  show Google’s summary information. pass it hostname or complete url

        EX: info:twitter.com
        
         
-  __related__ The related operator displays sites that Google has determined are related to a site. Passing hostname or url 

        Ex: related:google.com
        
        
-   phonebook
-   authord
-   groupd
-   msgid
-   insubject
-    stocks

-  __define__: The define operator returns definitions for a search term

        EX:  define:term
        
#### Combing Queries:

> The query below shows that the results that comes from __cnn__ site, __execluding__ any microsoft enties in the url

            site:cnn.com  -inurl:microsoft
        
        

### Chapter 3: [Needs Review]

__Locating directory listings:__

        Ex: intitle:index of "search term"
        
__Finding Specific Directory:__:

    Ex: intitle:index.of.admin 
        
       intitle:index.of inurl:admin 


__Finding specific files__

    Ex:  filetype:log inurl:ws_ftp.log
    
        
__Server versioning__

    Ex:  intitle:index.of “Apache/1.3.27 Server at”
        
         intitle:index.of “server at”
    

__Directory Traversal__      

>> --

__Extension Walking__

>> -


### Documenting Grinding

 __Configuration Files:__ #Module
 
 > Configuration files can reveal sensitive information.
  Extensions: __ini, conf,config, cfg, wp_ftp__
  
  
    EX:  inurl:ws_ftp  hsotname        --> condfigure file used by FTP 
         filetype:init SearchItem     ---> ini is installation file for windows that has key-value pairs 

        filtype:conf inurl:firewall
        
        inurl:config OR inurl:ini OR iurl:cfg OR iurl:wp_ftp  searchItem
        
        intitle:config OR inurl:ini OR iurl:cfg OR iurl:wp_ftp searchItem
        
        filteype:config OR inurl:ini OR iurl:cfg OR iurl:wp_ftp searchItem
        
        link:config OR inurl:ini OR iurl:cfg OR iurl:wp_ftp 
        
        filetype:ini searchItem "target[*]"---> TEST
        
       
__Note__: Know the extension type of the program you are searching for 

__To-do__: 
- add most of the configuration files 
- Filter out common words or phrases such as exmaple, test, how-to, sample
- Filter out CVS files to execlude files that are not config 
- Exploit-DB has good queries for configuration file 


__Locating files:__

        Ex: filetype:ini inurl:searchItem inurl:index.of ini
        
            intitle: searchItem AND inurl:searchItem
            
            intitle:index.of seachItem  AND intitle: searchItem OR inurl:searchItem
        
__Log Files__

> log file show all the connections, timestamp and information about certain services


        Ex: filetype:log programName inrul:fileName 
        
            filetype:log userNames puTTY
    


__Office Documents__

> searching for files that goes with search item 
  __Microsoft Extension__: doc xsl ppt 
  __Mac Extension__ 

    Ex:  filetype:doc OR filetype:xsl OR filetype:txt intitle:"searchITEM"


__Database Digging___

>One way to locate login portals is to focus on the word login. Another way is to focus on the copyright at the bottom of a page. Most big-name portals put a copyright notice at the bottom of the page. Combine this with the product name, and a welcome or two, and you’re off to a good start.


Extra: 

- site:github.com filetype: pdf Nmap 6 
