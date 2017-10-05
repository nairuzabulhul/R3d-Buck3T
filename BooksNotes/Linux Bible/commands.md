### Common Commands:



### Virtual Console :

> Ctrl &nbsp; + Alt + &nbsp; F3

> Ctrl &nbsp; + Altf + &nbsp; F1, F2, F3 

### Common Commands:

> date  &nbsp;&nbsp; | get the date

> pwd  &nbsp;&nbsp; | current path 

> hostname &nbsp;&nbsp; | get the box host name

> -t &nbsp;&nbsp; &nbsp;&nbsp; | time

> -a  &nbsp;&nbsp;&nbsp; | show hidden files

>  tar &nbsp; &nbsp; -cfv &nbsp; &nbsp; NameDir &nbsp; 

> uname &nbsp; -a  &nbsp; &nbsp; | show OSversion

> id &nbsp;&nbsp;  | show infos about the identity


###  Linux Default Directories:

> echo &nbsp; $PWD

> echo &nbsp; $HOME

> echo &nbsp; $OSTYPE

> echo &nbsp; $PATH

### Change Directories:

> cd &nbsp; ../../../&nbsp;folderName

### Matching Patterns:
> ls &nbsp; appName*

### Creating files with patterns :

> touch &nbsp; memo{1,2,3,4}
    
  __memo1, memo2,memo3,memo4__

### Change Permission: p112

> unmask &nbsp;

### Finding Files:

- __locate__: to look for commands

    > locate &nbsp; command
    
- __grep__: get text from a file 

    > grep &nbsp; string
    
- __Find__: find specific files by name 

    > find &nbsp; folederPath &nbsp; -name &nbsp;  fileName
    
    > find &nbsp; folderPath &nbsp; -iname &nbsp;  fileName
    
    > find &nbsp; folderPath &nbsp; &nbsp; ' * *fileName* *'      
    
    __Gets all files that have the inside string__  

    > find &nbsp; folderName &nbsp; -size &nbsp; +number(10M)
    
    > find &nbsp; folderPath &nbsp; -user &nbsp; userName &nbsp; -ls 
    
    > find &nbsp; folderPath -group &nbsp; groupName &nbsp; -ls 
    
    > find &nbsp; folderPath -not &nbsp; -user &nbsp; root &nbsp; -ls 
    
    > find &nbsp; folderPath &nbsp; -perm &nbsp; number -type &nbsp; d  &nbsp; -ls 
    
    > find &nbsp; folderPath &nbsp; -iname &nbsp; iptables &nbsp; -exec &nbsp; command &nbsp; "Found it{}" \\;
    
    __Ex: find &nbsp; /etc/ &nbsp; -iname &nbsp; iptables &nbsp; -exec &nbsp;echo &nbsp; "Found it {}"  \\;__
    

    
&nbsp;
__Note__:
When searching files that are in root directories or need root permission, add /dev/null at the end to redirect the error messages 

Ex: find /etc /dev/null

### 









