---
layout: post
title:  "Buffer OverFlow - Stack2"
description: It's easy Buffer OverFlow all thing in env.
tags: pwn buffer-overFlow
img: "/images/BoF/stack2/stack2.jpg"
---
# Previous Post

If you haven’t read my previous [Post](/2019/08/17/Buffer-OverFlow-Stack1.html) yet I recommend reading it before this.  

---

# Code Review
I will not review all the code because there is one thing only new of last post, So i think you should to go back and the see it :D  
So let's see What's the new part  

![image](/images/BoF/stack2/1.png)

What that mean idk ? - So let's run the program

![image](/images/BoF/stack2/2.png)

I got it he need need me to setup the "GREENIE", So let's setup it

![image](/images/BoF/stack2/3.png)

Nothing happened !! So let's resetup it with big number

![image](/images/BoF/stack2/4.png)

He printed `43` that's mean he taked the `C`
so What will happen if we gived him the address let's see what will happen

![image](/images/BoF/stack2/5.png)

Damn thats so easy  
And we did it  

---

I hope u enjoyed with this writeup. You can follow me on the twitter [@Mrx_Exploit](https://twitter.com/MRX_Exploit)

