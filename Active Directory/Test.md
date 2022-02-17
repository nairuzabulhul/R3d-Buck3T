# Domain Enumeration with PowerShell Active Directory Module

# 🛠️$_Perquisites

- Microsoft Active Directory Management DLL
- PowerShell Active Directory module ***[ActiveDirectory.psd1](https://github.com/samratashok/ADModule/blob/master/ActiveDirectory/ActiveDirectory.psd1)***
- [ActiveDirectory.Format.ps1xm](https://github.com/samratashok/ADModule/blob/master/ActiveDirectory/ActiveDirectory.Format.ps1xml) file from

**📍 *No Admin Privileges needed to import the DLL or use it***

🔔**`Domain enumeration can be done with unprivileged user`** 

<p>&nbsp;</p>

# Import Modules

**`Import Microsoft Active Directory Management DLL`**

> **Import-Module C:\Active-Directory-Module\Microsoft.ActiveDirectory.Management.dll**
> 

**`Import PowerShell Active Directory module *[ActiveDirectory.psd1](https://github.com/samratashok/ADModule/blob/master/ActiveDirectory/ActiveDirectory.psd1)*`**

> **Import-Module  C:\Active-Directory-Module\ActiveDirectory\ActiveDirectory.psd1**
> 

<p>&nbsp;</p>

# Domain Enumeration

**`Get Current Domain`**

> **Get-ADDomain**
> 

`**Get object of another domain**`

- We can extract information with the **Get-ADDomain** command from another trusted domain that we have privileges on

> **Get-ADDomain -Identity [DOMAIN NAME]**
> 

> **Get-ADDomain -Identity moneycorp.local**
> 

`**Get domain SID for the current domain**`

> **(Get-ADDomain).DomainSID**
> 

<p>&nbsp;</p>

### **Domain Controller Information**

**`The command shows information about the domain controller`**

> **Get-ADDomainController**
> 

`**Get domain controllers for another domain**`

> **Get-ADDomainController -DomainName megabank.local -Discover**


<p>&nbsp;</p>

### **User Enumeration**

**`Filter with a wildcard (*) is used to return all users from the DC`**

> **Get-ADUser -Filter ***
> 

**`The command shows the properties of all users. It is always recommended to specify the identity parameter to limit the returned results`**

> **Get-ADUser -Filter*  -Properties ***
> 

> **Get-AdUser -Filter * -Properties * | Select Name**
> 

> **Get-ADUser -Identity UserName  -Properties ***
> 

`**The command returns sam accounts**`

> **Get-ADUser -Filter * -Properties *| Select Name, SamAccountName, Description**
> 

`**The command filters for all users and returns enabled ones**` 

> **Get-ADUser -Filter * | ?{ $_.Enabled -eq "true" }**
> 

`**The command searches for the description properties for built account. The search Term is built**`

> **Get-ADUser -Filter 'Description -like "*built*"' -properties description | select name, description**
> 
- **`Sometimes the description property contain sensitive information like passwords`**

**`The command returns all users with their  name and logout counts`**

> **Get-AdUser -Filter * -Properties * | Select Name, logonCount**
> 
- `**Always choose the user that has a reasonable logon count to create a Golden Ticket**`
- `**Decoy users either have very high *logoncount* or very low**`

<p>&nbsp;</p>

### Properties Enumeration

**`The command searches for all users and returns all of the users and the last time their password were reset`**

> **Get-ADUser -Filter * -Properties * | Select -First 1 | Get-Member -MemberType *Property | select Name**
> 

> **Get-ADUser -Filter * -Properties * | Select Name,@{expression={[datetime]::fromFileTime($_.pwdlastset)}}**
> 
- **In an assessment, passwords that were not reset for a long time could be a decoy, honey account. Try avoiding them during the post-exploitation phase.**

`**The badpwdcount property can show active users from the non-active or decoy accounts. The higher the number of bad password counts, the chances that the account is real, and the lower is a decoy or not active.**`

> **Get-ADUser -Filter * -Properties * | select Name,badpwdcount**


<p>&nbsp;</p>

### **Computer Enumeration**

> **Get-ComputerInfo**
> 

*`***gets information about the authenticated computer objects**`*

> **Get-AdComputer -Filter ***
> 
- `**Not all returned computer objects are actual active computers - keep this in mind when pivoting**`
- **`To check for computers that are active, filter the results for lastLogonDate and Lastlogon properties to see which their the computer activity`**

**`The command returns all computers names`**

> **Get-AdComputer -Filter * | select Name**
> 

**`The command returns all computer names, last logon time and their IP address`** 

> **Get-AdComputer -Filter * -Properties * | select Name, LastLogonDate, lastLogon, IPv4Address**
> 

**`The command checks for all computers and filters down the machines that have Windows 2016 systems`**

> **Get-ADComputer -Filter 'OperatingSystem -like "*Server 2016*"' -Properties OperatingSystem | select Name, OperatingSystem**
> 

**`The command do a dnslooup for all of the machine of the domain and return the active ones similar to ping command but with dns`**

> **Get-ADComputer -Filter * -Properties DNSHostName | %{Test-Connection -Count 1 -ComputerName $_.DNSHostName }**
> 

> **GetADComputer -Filter * -Properties ***


<p>&nbsp;</p>

### Group Enumeration

> **Get-ADGroup -Filter * | select name**
> 

> **Get-ADGroup -Filter *  -Properties ***
> 

**`The command returns groups containing admin`** 

> **Get-ADGroup -Filter ‘Name like "*admin*"’ | select Name**
> 

> **Get-ADGroup -Filter * | where {$_.Name -like '**admin**'} | select Name**
> 

<p>&nbsp;</p>

### **Group Members**

`**The comamnd retuns all member of the DNSAdmins group**`

> **Get-ADGroupMember -Identity "DNSAdmins" -Recursive**
> 

> **Get-ADGroupMember -Identity "DNSAdmins" -Recursive**
> 
- **`Recrusive is a good parameter to search nested groups`**

**`The command returns all member of the domain admins group`**

> **Get-ADGroupMember -Identity "Domain Admins" -Recursive**
> 

**`The command searches for the groups that belongs to a user/member i.e. Ryan`**

> **Get-ADPrincipalGroupMembership  -Identity  Ryan**
> 
- **`Identity name like Ryan without quotes`**

**`Enumerate the Enterprise Administrators using the Active Directory Module`**

> **Get-ADGroupMember -Identity 'Enterprise Admins' -Server [Forest Name]**
> 
- **`Get the forest name by running Get-AdDomain | select forest`**

<p>&nbsp;</p>

# Enumerating Organizational Units [OU]

**The command returns all of the available organizational units**

> **Get-ADOrganizationalUnit -Filter * -Properties * **


<p>&nbsp;</p>

### 🔔 Follow R3d Buck3t Publication on Medium - [https://medium.com/r3d-buck3t](https://medium.com/r3d-buck3t)

<p>&nbsp;</p>

# 📚$_Resources

[Domain Enumeration with Active Directory PowerShell Module](https://medium.com/r3d-buck3t/domain-enumeration-with-active-directory-powershell-module-7ce4fcfe91d3)

[Deploy PowerShell ActiveDirectory Module without installing the remote server tools](https://janikvonrotz.ch/2015/09/09/deploy-powershell-activedirectory-module-without-installing-the-remote-server-tools/)

[How to Install and Import the PowerShell Active Directory Module](https://adamtheautomator.com/powershell-import-active-directory/)

[ActiveDirectory Module](https://docs.microsoft.com/en-us/powershell/module/activedirectory/?view=windowsserver2019-ps)

[How to install the PowerShell Active Directory module?](https://www.tutorialspoint.com/how-to-install-the-powershell-active-directory-module)

[ADModule/ActiveDirectory.Format.ps1xml at master · samratashok/ADModule](https://github.com/samratashok/ADModule/blob/master/ActiveDirectory/ActiveDirectory.Format.ps1xml)

[ADModule/ActiveDirectory.psd1 at master · samratashok/ADModule](https://github.com/samratashok/ADModule/blob/master/ActiveDirectory/ActiveDirectory.psd1)
