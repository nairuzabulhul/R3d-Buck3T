### Host Discovery : 

__Ping and No Ping Scans__

>> nmap –PE –sn -n 10.50.96.0/23 –oX /root/Desktop/scan.xml

>> nmap –sn 10.50.96.0/23

>> nmap -sn -n 192.168.70.0/24

>> nmap -sn -n -PS22,25,80,135 192.168.70.0/24  | specific port and less traffic

>> nmap -PE 192.168.70.0/24   |  Ping sweep echo requests ICMP

### NMAP Scans

__TCP Scan__

>> nmap -sS -iL /root/Desktop/list.txt            | SYN Scan with specific list of hosts


__UDP Scan__

>> nmap -sU 10.50.97.5


### DNS Enumeration 


>> nmap -sS -sU -p53 -n 192.168.2.0/24


__DNS Records:___

>> nslookup & dig



hpin3 -S -p 23 192.168.79.7


hping3 10.80.97.6 -S --scan known | getting known ports










 


