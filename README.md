

# 环境要求
- 建议`Nginx`
- PHP7以上


# Nginx服务器配置：
在`common/nginx`中有已经设置好的示例，但是需要在`/usr/local/nginx/conf/nginx.conf`中增加引用：
```
include {PATH}/common/nginx/host/*.conf
```
此目录下几个文件中的路径需要改为自己实际的真实绝对路径。
在`php.conf`中`fastcgi_pass`要注意与实际sock路径是否相同

# 文件权限
###　/runtime目录
- 此目录为框架运行时产生的临时文件保存位置；
- 此目录需有读写权限，除此之外的所有目录不必要有写入权限；
- 应该将此目录放入`.gitignore`中；

### 运行时需要写入的配置文件
- 框架及程序的配置文件原则上建议放在`/common/config`中(默认值)
- 若程序有存在运行时写入配置，可以在`/common`中新建一个目录，并赋于此目录写入权限，当然也可以放在其他目录，比如`/runtime`中；

### 操作示例
```bash
chown -R www:www *
chmod -R 540 *
chmod -R 740 runtime
chmod -R 740 common/custom
```
假设`custom`为程序运行中需要写入的目录



