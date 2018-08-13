FROM node:9.11-alpine

#add user for security
#shadow: you can use useradd on alpine
RUN apk --update add shadow &&\
    rm -rf /var/cache/apk/* &&\
    useradd --user-group --create-home app
ENV HOME=/home/app
COPY ./src/app/package.json $HOME/nuxt/
RUN chown -R app:app $HOME/*
ENV HOST 0.0.0.0
USER app
WORKDIR $HOME/nuxt
# if you want clear cache, npm cache clean --force or npm install --no-cache
RUN npm install --no-cache