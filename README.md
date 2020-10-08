# Raspberry PI as a home server
## Services
- Transmission Daemon for torrents
- Apache Webserver
- PHP Media Center to watch downloaded videos
- Samba Daemon to access downloaded files via Windows Share
- MySQL Database
- PHPmyAdmin interface

## Prerequisites
- Raspberry PI with network access
- additional hard drive or USB Stick attached to Raspberry

## Installation
Install Ansible and git on your raspberry
```bash
apt get install ansible git
```
Clone git repo and change into cloned one
```bash
git clone https://github.com/marcoschum/ans_piserver
cd ans_piserver
```

## Run Ansible locally
Apply Ansible configuration by running `setup.yml` locally
```bash
sudo ansible-playbook --connection=local --inventory=127.0.0.1, setup.yml
```
