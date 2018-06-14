# Laravel5.6 + Swoole2.1.2 + Redis + Supervisor
    Laravel   : 系统业务处理以及页面渲染
    Swoole    : 提供WebSocket服务
    Redis     : 基于发布订阅模式，实现数据通信
    Supervisor: Swoole进程管理或使用nginx反向代理模式

### 安装方式

git clone 本仓库

composer install

npm install


### 访问方式

配置.env文件

在终端打开websocket服务器
项目目录$ php swoole/websocket.php

打开项目即可

### 截图

![截图](/demo.png)

> 如果一个promise对象处在fulfilled或rejected状态而不是pending状态，那么它也可以被称为settled状态。你可能也会听到一个术语resolved ，它表示promise对象处于settled状态，或者promise对象被锁定在了调用链中。关于promise的状态， Domenic Denicola 的 States and fates 有更多详情可供参考。

### License

[MIT License](https://opensource.org/licenses/mit-license.html). ©  [Running Lee](mailto:lihui870920@gmail.com)

