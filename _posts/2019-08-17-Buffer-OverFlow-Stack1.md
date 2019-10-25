---
layout: post
title:  "Buffer OverFlow - Stack1"
description: It's easy Buffer OverFlow all thing in offset.
tags: Buffer-OverFlow Stack
img: "/images/BoF/stack1/stack1.jpg"
---


# Source Code

In this part i will read the code and i will try to get any bug on it, So see what will happen 

![image](/images/BoF/stack1/code.png)

# Code Review

![image](/images/BoF/stack1/first.png)

In this part he just Creating variable easy. 

![image](/images/BoF/stack1/second.png)

There is if condition What to do ??  
It's just to check if there argument after the program name or not  
if not it will print "please specify an argument" 

![image](/images/BoF/stack1/third.png)

In this part he put value in the "modified" so now it's equal "ZERO" Then its take anything will be in the argument and will put it in the "buffer" variable 

![image](/images/BoF/stack1/last.png)

Last part in the code there is another if condition it's compare if "modified" == "0x61626364" or not 

> Solution time

Let's see Who can we get this addr in the if condition  
Here i will use "r2" to read the functions as assembly but you can use anytool you love, np :D 

![image](/images/BoF/stack1/1.png)

![image](/images/BoF/stack1/2.png)

Here we go we got the addr without source code, So what's mean "cmp" that's mean compare  
What next...!?  
Let's full the "buffer" variable How can we do that with python

![image](/images/BoF/stack1/3.png)

That's mean run the program then print "A * 76" so now "buffer" was full to be sure let's do .... 

![image](/images/BoF/stack1/4.png)

Now we can see our "C" as hex, So we are in the right way, So what will happen if we did that... 

![image](/images/BoF/stack1/5.png)

Damn thats so easy  
And we did it 

---

I hope u enjoyed with this writeup. You can follow me on the twitter [@Mrx_Exploit](https://twitter.com/MRX_Exploit)

Thanks for reading.