FROM node:alpine

WORKDIR /app

COPY . ./

RUN npm ci

RUN npm i pm2 -g

EXPOSE 3000

CMD ["pm2-runtime", "start", "index.js"]