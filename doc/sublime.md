# Sublime Text 2 编辑器使用说明


### 安装包管理器

----------------------------

    (可以搜索 Sublime Text2安装Package Control 找教程)
    
    Ctrl + `
    
    import urllib2,os; pf='Package Control.sublime-package'; ipp=sublime.installed_packages_path(); os.makedirs(ipp) if not os.path.exists(ipp) else None; urllib2.install_opener(urllib2.build_opener(urllib2.ProxyHandler())); open(os.path.join(ipp,pf),'wb').write(urllib2.urlopen('http://sublime.wbond.net/'+pf.replace(' ','%20')).read()); print 'Please restart Sublime Text to finish installation'

    Ctrl + Shift + P -> 输入 install 确定，打开包安装器

    需要安装的插件:
        PHPBeautiful
        PHPTwig

### 菜单选项

----------------------------
    
    
    添加项目 project -> add folder to project


### 快捷键

----------------------------

    Ctrl + k + b    打开左侧菜单
    Ctrl + `        打开命令行
    Ctrl + P        查找