---
title: Java 打包
date: 2020-06-11 14:13 +0800
categories: [Java]
tags: [Java]
---

## 本功能使用 exe4J工具实现，自行百度下载。

本文仅为`HelloWorld`式演示，适合只是用一两次此功能额而不去系统了解的博友们

- 实际为exe4j的默认操作流程(HelloWorld玩法).

  ![img](..\picture\将jar打包为exe\将jar打包为exe1.png)

- 选择“JAR in EXE” mode 单选按钮,next.

  ![img](..\picture\将jar打包为exe\将jar打包为exe2.png)

- 输入exe程序简短的描述和输出exe文件的地址,next.

  ![img](..\picture\将jar打包为exe\将jar打包为exe3.png)

- 图片上exe的名称，ico后缀的图片,4个勾全选，Advanced Options选择Service options，里面有项配置操作位数的，请打勾，next.

  ![img](..\picture\将jar打包为exe\将jar打包为exe4.png)

  ![img](..\picture\将jar打包为exe\将jar打包为exe41.png)

- 配置VM 根据图上内容 照抄，`-Dappdir=${}EXE4J_EXEDIR}`。空白框里如果有内容的直接清空然后点击绿色+号，弹出框里面 选择第三个单选按钮，把需要被转换的jar放进去，

  ![img](..\picture\将jar打包为exe\将jar打包为exe5.png)
  
- 操作8完成后，选择 main class,next.

  ![img](..\picture\将jar打包为exe\将jar打包为exe6.png)

- 配置jre,next.

  ![img](..\picture\将jar打包为exe\将jar打包为exe7.png)

- 在 search sequence 弹出的页面里 点击 绿色+ 号 ，配置jre运行环境,next.

  ![img](..\picture\将jar打包为exe\将jar打包为exe8.png)

- 看图 ,next.

  ![img](..\picture\将jar打包为exe\将jar打包为exe9.png)

- 不需操作直接 next

  ![img](..\picture\将jar打包为exe\将jar打包为exe10.png)

- 如图不需操作，直接next，成功后，至此jar 转 exe 到此结束，在之前添加的输出目录即可找到。

  ![img](..\picture\将jar打包为exe\将jar打包为exe11.png)

- 如图.方框内的按钮点击即可执行启动生成的exe文件。

  ![img](..\picture\将jar打包为exe\将jar打包为exe12.png)

## ps

自此已完成所有操作，但本质是只是一次封装而已，依旧需要jre运行环境。