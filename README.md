# Gatsby - Wordpress - Docker Compose

## Install Docker for your OS
  - I am using this stack with WSL2 for Windows 11 and Docker for Windows. Works pretty ok.

## WSL2 network issue
  - WSL2 seems to have some issue with network that makes npm install very painfull so here it goes what solved to me

  `sudo rm /etc/resolv.conf`\
  `sudo bash -c 'echo "nameserver 8.8.8.8" > /etc/resolv.conf'`\
  `sudo bash -c 'echo "[network]" > /etc/wsl.conf'`\
  `sudo bash -c 'echo "generateResolvConf = false" >> /etc/wsl.conf'`\
  `sudo chattr +i /etc/resolv.conf`

## For local development run:
  - cd gatsby-ts
  - npm install --verbose --network-timeout 100000

## Docker
  - set to root folder
  - docker-compose up

## Access
  - Gatsby runs on localhost:3000
  - Wordpress runs on localhost: 8000
