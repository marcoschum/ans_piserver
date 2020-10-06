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
- Install Ansible + git (on your raspberry)
```bash
apt get install ansible git
```
- clone git repo
```bash
git clone https://github.com/marcoschum/ans_piserver
```

## Run Ansible locally (fix command)
sudo ansible-playbook -i inventory -b -u ansible books/copy.yml
