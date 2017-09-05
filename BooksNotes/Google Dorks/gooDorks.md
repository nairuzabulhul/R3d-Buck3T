
__Chapter 1: Google Search Basics__


|  Operator |  Functionality | Example  | 
|-----------|----------------|----------|
| __intitle:__| searches for words in the title of the page | intitle:"searchItem" "searchItem"| 
| __allintext:__  | searches for text words in the page |  allintext:"searchItem" |
| __inurl:__   | search for words in the URL  | inurl:"searchItem" | 
|__site:__     | search a specific domain fro a keyword| site:twitter.com "keyword"|
| __Filetype:__ |serach for specific type of files | filetype:pdf "seachItem"|
|__link__|The link operator allows you to search for pages that link to other pages| link:"website/domain"|
|__inacnchor__|Inanchor: locate text within link text| inanchor:"searchItem"|
|__cache__|Cache: show the cached version of a page|cache:domain/website|
|__numrange:__|Numrange: search for a number|numrange:1234-1456|
|__Daterange:__|Daterange: search for pages published within a certain date(convert to Julian Dates) range|Daterange:12456-45697|
|__info:__|Info: show Google’s summary information|info:www.cnn.com|
|__related:__|Related: show related sites| related:www.cnn.com|
|__Define:__|Define: show the definition of a term|define:"searchItem"|


__Notes__


__Intitle__ [*****]

▪ Finds strings in the title of a page

▪ Mixes well with other operators▪ Best used with Web, Group, Images, and News searches

__Allintitle__

▪ Finds all terms in the title of a page

▪ Does not mix well with other operators or search terms

▪ Best used with Web, Group, Images, and News searches

__Inurl__

▪ Finds strings in the URL of a page

▪ Mixes well with other operators

▪ Best used with Web and Image searches

__Allinurl__

▪ Finds all terms in the URL of a page


▪ Does not mix well with other operators or search terms


▪ Best used with Web, Group, and Image searches

__Filetype__

▪ Finds specific types of files based on file extension

▪ Synonymous with ext

▪ Requires an additional search term

▪ Mixes well with other operators

▪ Best used with Web and Group searches

__Allintext__

▪ Finds all provided terms in the text of a page

▪ Pure evil – don’t use it

▪ Forget you ever heard about allintext

__Site__

▪ Restricts a search to a particular site or domain

▪ Mixes well with other operators

▪ Can be used alone▪ Best used with Web, Groups and Image searchse

__Link__

▪ Searches for links to a site or URL

▪ Does not mix with other operators or search terms


▪ Best used with Web searches

__Inanchor__

▪ Finds text in the descriptive text of links

▪ Mixes well with other operators and search terms

▪ Best used for Web, Image, and News searches

__Daterange__

▪ Locates pages indexed within a specific date range

▪ Requires a search term

▪ Mixes well with other operators and search terms

▪ Best used with Web searches

▪ Might be phased out to make way for as_qdr

__Numrange__

▪ Finds a number in a particular range▪ Mixes well with other operators and search terms

▪ Best used with Web searches▪ Synonymous with ext.

__Cache__

▪ Displays Google’s cached copy of a page

▪ Does not mix with other operators or search terms

▪ Best used with Web searches

__Info__

▪ Displays summary information about a page

▪ Does not mix with other operators or search terms

▪ Best used with Web searches

__Related__

▪ Shows sites that are related to provided site or URL

▪ Does not mix with other operators or search terms

▪ Best used with Web searches

__Stocks__

▪ Shows the Yahoo Finance stock listing for a ticker symbol

▪ Does not mix with other operators or search terms

▪ Best provided as a Web query

__Define__

▪ Shows various definitions of a provided word or phrase

▪ Does not mix with other operators or search terms

▪ Best provided as a Web query


### Booleans:

- __OR__ 

        Ex: Linux OR Windows ---> either the first part OR the second part of search 
    
- __AND__ 
            
         Ex: Linux AND Unix commands ---> show result of both mentioned 
            in the url or the title of the  sites

- __NOT__: 

        EX: cnn.com NOT ccn_report.com



        
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
