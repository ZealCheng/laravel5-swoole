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

* 配置.env文件

* 在终端打开websocket服务器

`项目目录$ php swoole/Websocket/websocket.php`

* 打开项目即可

### License

[MIT License](https://opensource.org/licenses/mit-license.html). ©  [Running Lee](mailto:lihui870920@gmail.com)

