
## Differences between the A, CNAME, ALIAS and URL records

__A, CNAME, ALIAS and URL records__ are all possible solutions to point a host name (name hereafter) to your site. However, they have some small differences that affect how the client will reach your site.

Before going further into the details, it’s important to know that A and CNAME records are standard DNS records, whilst ALIAS and URL records are custom DNS records provided by DNSimple’s DNS hosting. Both of them are translated internally into A records to ensure compatibility with the DNS protocol.


#### Understanding the differences

Here’s the main differences:

- __The A record__ maps a name to one or more IP addresses, when the IP are known and stable.

- __The CNAME record__ maps a name to another name. It should only be used when there are no other records on that name.

- __The ALIAS record__ maps a name to another name, but in turns it can coexist with other records on that name.

- __The URL record__  redirects the name to the target name using the HTTP 301 status code.
                      Some important rules to keep in mind:

The A, CNAME, ALIAS records causes a name to resolve to an IP. Vice-versa, the URL record redirects the name to a destination. The URL record is simple and effective way to apply a redirect for a name to another name, for example to redirect www.example.com to example.com.
The A name must resolve to an IP, the CNAME and ALIAS record must point to a name.


#### Which one to use

Understanding the difference between the A name and the CNAME records will help you to decide.

__The general rule is:__

- use an __A record__ if you manage what IP addresses are assigned to a particular machine or if the IP are fixed (this is the most common case)

- use a __CNAME record__ if you want to alias a name to another name, and you don’t need other records (such as MX records for emails) for the same name


(sub)Domain / Hostname | Record Type | Target / Destination |
---------------------- | ------------| -------------------- | 
mydomain.com	         |  A	         |   111.222.333.444
www.mydomain.com	     |  CNAME	     |   mydomain.com
ftp.mydomain.com	     |  CNAME	     |   mydomain.com
mail.mydomain.com	     |  CNAME	     |   mydomain.com

- use an __ALIAS record__ if you are trying to alias the root domain (apex zone) or if you need other records for the same name

- use the __URL record__ if you want the name to redirect (change address) instead of resolving to a destination.
You should never use a CNAME record for your root domain name (i.e. example.com).



