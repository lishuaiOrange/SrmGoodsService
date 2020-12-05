FROM alpine:3.11
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
  && apk add  \
    gcc g++ libc-dev  vim  openssl-dev pcre-dev libxslt-dev zlib-dev make  linux-headers gd-dev geoip-dev perl-dev libedit-dev mercurial bash alpine-sdk findutils \
  && rm -rf /var/cache/apk/*

COPY nginx-1.17.4.tar nginx-1.17.4.tar

COPY v2.1.0.tar.gz v2.1.0.tar.gz
#通过选择更小的镜像，删除不必要文件清理不必要的安装缓存，从而瘦身镜像
#创建相关目录能够看到日志信息跟数据跟配置文件  sh
RUN   mkdir -p /nginx/data \
      && mkdir -p /nginx/conf \
      && mkdir -p /nginx/logs   \
      && tar -xvf nginx-1.17.4.tar  \
      && tar -xvf v2.1.0.tar.gz \
      && rm -rf nginx-1.17.4.tar \
      && rm -rf v2.1.0.tar.gz \
      && cd nginx-1.17.4 \
      && ./configure --add-module=/nginx-upsync-module-2.1.0 && make  && make install \
      && ln -s /usr/local/nginx/sbin/* /usr/local/bin

EXPOSE 80

WORKDIR /nginx/conf

CMD ["nginx", "-c", "/nginx/conf/nginx.conf","-g","daemon off;"]
