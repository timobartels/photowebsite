FROM tbartels/php:7

MAINTAINER Timo Bartels <timo@bartels-online.net>

LABEL "language"="php" "type"="photography"

# Specify document root
ENV DR /var/www/html

# Copy application code
ADD ./gallery $DR/gallery/
ADD ./images $DR/images/
ADD ./html $DR/
ADD ./php $DR/
ADD ./styles $DR/styles/
ADD ./scripts $DR/scripts/
ADD ./media $DR/media/

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
