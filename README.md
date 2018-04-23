## 基于Yaf的应用示例

Yaf文档较少且缺乏开发需要的各种组件，但有了composer一切都很方便。
这个应用示例使用Yaf、Laravel Database等组件搭建一个基础的快速开发环境，在开发API类应用时可做参考。

## Features

* Yaf配置优化
* Laravel Illuminate\Database 数据库组件
* AWS S3 client类封装
* 与Android客户端通信的AES加密示例类
* 其他如Monolog等组件待加入

## Yaf 配置优化

在php.ini设置

	opcache.enable=1
	opcache.enable_cli=1
	yaf.use_namespace=1
	yaf.use_spl_autoload=0
	yaf.environ=test

* yaf.use_namespace 默认0，开启的情况下, Yaf将会使用命名空间方式注册自己的类, 比如Yaf_Application将会变成Yaf\Application。
* yaf.use_spl_autoload 默认0， 开启的情况下, Yaf在加载不成功的情况下, 会继续让PHP的自动加载函数加载, 从性能考虑, 除非特殊情况, 否则保持这个选项关闭。
* yaf.environ,默认值product， 环境名称, 当用INI作为Yaf的配置文件时, 这个指明了Yaf将要在INI配置中读取的节的名字。




