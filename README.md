

# 环境要求
- 建议`Nginx`
- PHP7以上


# 服务器配置：
在`common/nginx`中有已经设置好的示例，但是需要在`nginx.conf`中增加引用：
```apacheconfig
include 此项目的绝对路径/common/nginx/host/*.conf
```
此目录下几个文件中的路径需要改为自己实际的真实绝对路径。
在`php.conf`中`fastcgi_pass`要注意与实际sock路径是否相同






