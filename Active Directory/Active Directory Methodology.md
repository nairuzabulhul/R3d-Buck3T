# Active Directory Attack Methodology

### Scanning

- **Perform a network scan with Invoke-PortScan**
    - [AD - Objectives](https://www.notion.so/AD-Objectives-4069f2c5e06d46d695ad3e383589df24)

### Escalating to Local Admin (if possible)

- **Escalate your privileges Locally to run the tools properly**
    - Look for service misconfiguration **and elevate privileges to local administrator**
        - **Check for unique Service like Jenkins**
        - [Misconfigures Service ](https://www.notion.so/Misconfigures-Service-53cececd97f24f95852d109bbb7fac85)
        - [Service Registry ACLs](https://www.notion.so/Service-Registry-ACLs-121aad23baf942058300775a37fae13f)
        - [AD - Objectives](https://www.notion.so/AD-Objectives-4069f2c5e06d46d695ad3e383589df24)
    - Disable the Firewall and Defender & Bypass the Executionpolicy
        - [Bypass Restrictions ](https://www.notion.so/Bypass-Restrictions-2ed81ac369694d499ee2bf64ef32e50c)
    - Disable the firewall om the testing machine too

### Enumeration

- **Identify a machine in the domain where the current user has local administrative access.**
    - **Find-LocalAdminAccess**
    - **Find-PSRemotingLocalAdminAccess**
    - I**nvoke-UserHunter - check privs of the current user**
    - **Find-WMILocalAdminAcces**
        - [Find Local domain Admins ](https://www.notion.so/Find-Local-domain-Admins-20937936f81b4ab49356faa12c9de3cb)
    - **Looking for services to abuse and obtain administrator privileges**
    - Check of the has access to a server where a domain admin is logged in.
        - [Find Local domain Admins ](https://www.notion.so/Find-Local-domain-Admins-20937936f81b4ab49356faa12c9de3cb)
- **Conduct Domain Enumeration**
    - **Users, Computer, Groups Memberships, Group Policies**
        - [Domain Enumeration with PowerView](https://www.notion.so/Domain-Enumeration-with-PowerView-1a4ee693c4514f48bf9b54688a56aaed)
        - [Domain Enumeration with PowerView](https://www.notion.so/Domain-Enumeration-with-PowerView-1a4ee693c4514f48bf9b54688a56aaed)
    - **Access Control Lists (ACLs)**
        - Invoke ACL
        - [Access Control List (ACL) Enumeration with PowerView](https://www.notion.so/Access-Control-List-ACL-Enumeration-with-PowerView-c59e7a54b0c342d9a08008e04147b344)
        - [Domain Enumeration with PowerShell Active Directory Module](https://www.notion.so/Domain-Enumeration-with-PowerShell-Active-Directory-Module-a6d901bd09ce46f9a4be4bcb85b9d6df)

- **Run BloodHound (if detection is not an issue)**
    - **Map possible vectors for lateral movement**
    - **Map possible vectors for escalation to Domain Admin or Enterprise Admin**

- Enumerate those users where studentx has GenericWrite or GenericAll rights.
    - Check what users are part of the RDP group or other group
    - [Access Control List (ACL) Enumeration with PowerView](https://www.notion.so/Access-Control-List-ACL-Enumeration-with-PowerView-c59e7a54b0c342d9a08008e04147b344)

### Lateral Movement & Privilege Escalation

- **Things to do when compromising a machine:**
    - Check your privileges if admin, you can dump credentials/hashes
        - Hashes
        - Password
    - Perform over pass the hash
- **Identify the next machine to hop on**
- **If you obtain a user with domain admin privileges:**
    - Check if user has Replication (DCSync) rights.
    - If yes, execute the DCSync attack to pull hashes of the krbtgt user.
    - If no, add the replication rights for the user and execute the DCSync attack to pull hashes of the krbtgt user.
- **Check Available SPNs, and if there is a possibility to perform Kerberoasting against user accounts**
    - [Kerberoasting service accounts ](https://www.notion.so/Kerberoasting-service-accounts-53ed72f817ba4f248a4c2e60d1ae70c2)
- **Enumerate users that have Kerberos Preauth disabled.**
    - Get-ASREPHash from ASREPRoast to request the crackable encrypted part
        - [AS-REP Roasting Attack ](https://www.notion.so/AS-REP-Roasting-Attack-44559794040f4116b29c6bdd21021e50)
- Check the (GenericAll/GenericWrite) rights of the current user.
    - We can then request a TGS without special privileges. The TGS can then
    be "Kerberoasted".
    - Determine if user has permissions to set UserAccountControl flags for any user.
        - If yes, force set a SPN on the user and obtain a TGS for the user.
            - [https://www.notion.so/r3dbuck3t/AD-Objectives-4069f2c5e06d46d695ad3e383589df24#df94e0b93465440387b5c18eea38bae9](https://www.notion.so/AD-Objectives-4069f2c5e06d46d695ad3e383589df24)
- Find a server in the dcorp domain where Unconstrained Delegation is enabled.
    - Access that server, wait for a Domain Admin to connect to that server and get Domain Admin
    privileges.

### Persistence

- Golden ticket if the krbtgt hash is compromised
- Silver Ticket
- Skeleton Key
- DSRM Hash
    - [DSRM](https://www.notion.so/DSRM-6df87d44ef9e4dcaa874e03aa455b454)
- Modifying ACLs
    - Modify security descriptors on dcorp-dc to get access using PowerShell remoting and WMI
    without requiring administrator access.
    - Retrieve machine account hash from dcorp-dc without using administrator access and use that
    to execute a Silver Ticket attack to get code execution with WMI.
