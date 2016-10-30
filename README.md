# Laravel5.3 + Swoole1.8.11 + Redis + Supervisor
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

CLI： php /项目/swoole/websocket.php

打开项目即可

### 截图

![截图](/demo.png)



### License

[MIT License](https://opensource.org/licenses/mit-license.html). ©  [Running Lee](mailto:lihui870920@gmail.com)

