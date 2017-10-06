## Power User

### Virtual Console :

> Ctrl &nbsp; + Alt + &nbsp; F3

> Ctrl &nbsp; + Altf + &nbsp; F1, F2, F3 

### Common Commands:

> date  &nbsp;&nbsp; | get &nbsp;the &nbsp;date

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
    
&nbsp;    
- __grep__: get text from a file 

    > grep &nbsp; string &nbsp; filePath

    __Ex: grep test /etc/services__
    
    > grep &nbsp; string &nbsp; folderPath
    
    __Ex: grep  &nbsp; -rli &nbsp; desktop &nbsp; folderPath__
    
    > grep &nbsp; -vi &nbsp; string &nbsp; folderPath 
    
    __Display everything except the string provided__

    > ip &nbsp; addr &nbsp; show &nbsp; | &nbsp; grep &nbsp;net 
    
    __extracts net from the result of the first command__
    
    
&nbsp;
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

### Managing Running Processes:

> ps &nbsp; u 

__u to show username__

> ps &nbsp; aux &nbsp; | &nbsp;less 

### Killing processes:

> kill &nbsp; PID#

> kill &nbsp;-9 &nbsp; PID#



