
<details>
<summary>Notes on Enumeration</summary>
 [+] This is a test <br>
 [+] This is a test
</details>

<details>
<summary>Domain LDAP Functions</summary>

```powershell
Get-DomainDNSZone               -   enumerates the Active Directory DNS zones for a given domain
Get-DomainDNSRecord             -   enumerates the Active Directory DNS records for a given zone
Get-Domain                      -   returns the domain object for the current (or specified) domain
Get-DomainController            -   return the domain controllers for the current (or specified) domain
Get-Forest                      -   returns the forest object for the current (or specified) forest
Get-ForestDomain                -   return all domains for the current (or specified) forest
Get-ForestGlobalCatalog         -   return all global catalogs for the current (or specified) forest
Find-DomainObjectPropertyOutlier-   inds user/group/computer objects in AD that have 'outlier' properties set
Get-DomainUser                  -   return all users or specific user objects in AD
New-DomainUser                  -   creates a new domain user (assuming appropriate permissions) and returns the user object
Set-DomainUserPassword          -   sets the password for a given user identity and returns the user object
Get-DomainUserEvent             -   enumerates account logon events (ID 4624) and Logon with explicit credential events
Get-DomainComputer              -   returns all computers or specific computer objects in AD
Get-DomainObject                -   returns all (or specified) domain objects in AD
Set-DomainObject                -   modifies a given property for a specified active directory object
Get-DomainObjectAcl             -   returns the ACLs associated with a specific active directory object
Add-DomainObjectAcl             -   adds an ACL for a specific active directory object
Find-InterestingDomainAcl       -   finds object ACLs in the current (or specified) domain with modification rights set to non-built in objects
Get-DomainOU                    -   search for all organization units (OUs) or specific OU objects in AD
Get-DomainSite                  -   search for all sites or specific site objects in AD
Get-DomainSubnet                -   search for all subnets or specific subnets objects in AD
Get-DomainSID                   -   returns the SID for the current domain or the specified domain
Get-DomainGroup                 -   return all groups or specific group objects in AD
New-DomainGroup                 -   creates a new domain group (assuming appropriate permissions) and returns the group object
Get-DomainManagedSecurityGroup  -   returns all security groups in the current (or target) domain that have a manager set
Get-DomainGroupMember           -   return the members of a specific domain group
Add-DomainGroupMember           -   adds a domain user (or group) to an existing domain group, assuming appropriate permissions to do so
Get-DomainFileServer            -   returns a list of servers likely functioning as file servers
Get-DomainDFSShare              -   returns a list of all fault-tolerant distributed file systems for the current (or specified) domain
```
</details>



# Active Directory 

This is a test 

## Domain Enumeration

 - User, Group, Computer 
 - 
