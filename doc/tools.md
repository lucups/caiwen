### 工具列表

--------------------
    
    运行、开发环境
    Nginx  	http server
	PHP     	
    MySQL 	Database    

    开发框架：
    Symfony 2.4 		PHP framework
	Bootstrap2/3		Web front-end framework    

    开发工具
    Sublime Text 2


### Symfony 简介

-------------------

    MVC Model View Controller

    Symfony 框架 Controller
    Doctrine 数据持久化框架（访问数据库） 
    Twig 模板引擎 View

### 项目结构

-------------------

    bin win/linux 脚本（导入数据库）
    codes/ 源码目录(symfony root)
    	app/ 项目配置、缓存、日志
    		cache/
    		config/
    		logs/
    		Resources/
    	bin/ 不用管
    	src/ 源码
    		Acme/ symfony自带的 demo
    		Caiwen/
    			CoreBundle/
    				Common/  公共函数库
    				Controller/ 控制器
    				DI/ 依赖注入
    				Entity/ 实体，模型
    				Resource/ 资源
    					config/
    					doc/
    					public/
    					trans../
    					views/ 	视图， Twig模板引擎 （其他模板引擎：Smarty, http://www.zhihu.com/question/21452677/answer/19466884）
    				Tests    
        vendor/ 框架所需要的模块
    	web/ js css image


    config/ 项目部署配置
    doc/ 文档
    sql/ 数据库设计文件
    webfront/ 前台

