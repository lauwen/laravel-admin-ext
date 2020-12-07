#### 扩展生成命令
 ```php artisan admin:extend lauwen/phpinfo --namespace=Lauwen\PHPInfo```
 
## 本地扩展安装

#### composer.json中添加以下内容
```
"repositories": [
    {
        "type": "path",
        "url": "app/Admin/Extensions/lauwen/phpinfo"
    }
]
```

#### 运行以下命令进行本地安装
```
composer require lauwen/phpinfo
```

#### 发布静态文件
```
php artisan vendor:publish --provider=Lauwen\PHPInfo\PHPInfoServiceProvider
```
