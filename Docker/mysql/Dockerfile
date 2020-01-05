FROM mysql:5.7

RUN apt-get update \
    && apt-get install -y \
    vim \
    locales \
    locales-all

ADD ./Docker/mysql/etc/locale.gen /etc/locale.gen

RUN locale-gen \
    update-locale

ADD ./Docker/mysql/conf.d/my.cnf /etc/mysql/conf.d/my.cnf

RUN echo "export LANG=ja_JP.UTF-8" >> ~/.bashrc \
    source ~/.bashrc

CMD ["mysqld"]