# Yii 2 Starter Kit

Yii2 应用模板, 基于 [Yii 2 Starter Kit](https://github.com/yii2-starter-kit/yii2-starter-kit) .

## 目录
- [演示](#demo)
- [功能](#features)
- [安装](docs/installation.md)
    - [手动安装](docs/installation.md#manual-installation)
    - [Docker 安装](docs/installation.md#docker-installation)
    - [Vagrant 安装](docs/installation.md#vagrant-installation)
- [组件](docs/components.md)
- [控制台命令](docs/console.md)
- [测试](docs/testing.md)
- [FAQ](docs/faq.md)
- [How to contribute?](#how-to-contribute)
- [Have any questions?](#have-any-questions)

## 开始
1. [安装 composer](https://getcomposer.org)
2. [安装 docker](https://docs.docker.com/install/)
3. [安装 docker-compose](https://docs.docker.com/compose/install/)
4. 运行
    ```bash
    composer create-project yii2-starter-kit/yii2-starter-kit myproject.com --ignore-platform-reqs
    cd myproject.com
    composer run-script docker:build
    ```
5. 打开 [http://yii2-starter-kit.localhost](http://yii2-starter-kit.localhost)

## 功能
### 管理后台
- 后台前端使用 [AdminLTE 3](https://adminlte.io/themes/v3/) 框架
- 内容管理组件: 文章, 分类, 静态页面, 前台菜单, 轮播, 文本块
- 基于键值管理的应用设置
- [文件管理](https://github.com/MihailDev/yii2-elfinder)
- 用户, RBAC 权限管理
- 事件
- 日志
- 系统监控

### I18N
- 内置语言:
    - English
    - Spanish
    - Russian
    - Ukrainian
    - Chinese
    - Vietnamese
    - Polish
    - Portuguese (Brazil)
    - Indonesian (Bahasa)
- 语言切换
- 翻译管理

### 用户
- 登陆
- 注册
- 资料管理
- 邮件激活
- 授权
- RBAC 预定义 `guest`, `user`, `manager` and `administrator` 角色
- RBAC 迁移

### 开发
- Ready-to-use Docker-based stack (php, nginx, mysql, mailcatcher)
- .env support
- [Webpack](https://webpack.js.org/) build configuration
- Key-value storage service
- Ready to use REST API module
- [File storage component + file upload widget](https://github.com/trntv/yii2-file-kit)
- On-demand thumbnail creation [trntv/yii2-glide](https://github.com/trntv/yii2-glide)
- Built-in queue component [yiisoft/yii2-queue](https://github.com/yiisoft/yii2-queue)
- Command Bus with queued and async tasks support [trntv/yii2-command-bus](https://github.com/trntv/yii2-command-bus)
- `ExtendedMessageController` with ability to replace source code language and migrate messages between message sources
- [Some useful shortcuts](https://github.com/yii2-starter-kit/yii2-starter-kit/blob/master/common/helpers.php)

### 其它
- Useful behaviors (GlobalAccessBehavior, CacheInvalidateBehavior)
- Maintenance mode support ([more](#maintenance-mode))
- [Aceeditor widget](https://github.com/trntv/yii2-aceeditor)
- [Datetimepicker widget](https://github.com/trntv/yii2-bootstrap-datetimepicker),
- [Imperavi Reactor Widget](https://github.com/asofter/yii2-imperavi-redactor),
- [Xhprof Debug panel](https://github.com/trntv/yii2-debug-xhprof)
- Sitemap generator
- Extended IDE autocompletion
- Test-ready
- Docker support and Vagrant support
- Built-in [mailcatcher](http://mailcatcher.me/)
- [Swagger](https://swagger.io/) for API docs.

## 演示
Demo is hosted by awesome [Digital Ocean](https://m.do.co/c/d7f000191ea8)
- Frontend: [http://yii2-starter-kit.terentev.net](http://yii2-starter-kit.terentev.net)
- Backend: [http://backend.yii2-starter-kit.terentev.net](http://backend.yii2-starter-kit.terentev.net)

`administrator` role account
```
Login: admin    
Password: admin
```

`manager` role account
```
Login: manager
Password: manager
```

`user` role account
```
Login: user
Password: user
```

## How to contribute?
You can contribute in any way you want. Any help appreciated, but most of all i need help with docs (^_^)

## Have any questions?
Mail to [eugene@terentev.net](mailto:eugene@terentev.net) or [victor@vgr.cl](mailto:victor@vgr.cl)

## 更多
- [Yii2](https://github.com/yiisoft/yii2/tree/master/docs)
- [Docker](https://docs.docker.com/get-started/)


### NOTE
This template was created mostly for developers NOT for end users.
This is a point where you can start your application, rather than creating it from scratch.
Good luck!

