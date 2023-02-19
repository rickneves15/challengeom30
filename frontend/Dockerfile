FROM node:lts-alpine
WORKDIR /app
COPY package.json ./
RUN  npm install
EXPOSE 5173
CMD ["npm", "run", "dev"]


# docker-composer up # to start the compilation process
# to install npm package run
# docker-compose exec web npm i bootstrap