# Raspberry PI as a home server
## Services
- Transmission Daemon for torrents
- Apache Webserver
- PHP Media Center to watch downloaded videos
- Samba Daemon to access downloaded files via Windows Share
- MariaDB Database

## Prerequisites
- Raspberry PI with network access
- additional hard drive or USB Stick attached to Raspberry

# How to access raspberry to configure wlan
- You need to be able to connect it to a machine via network cable
in my example I'm using an Ubuntu laptop with network jack


```bash
cat /var/lib/mis/dnsmasq.leases
```
Which gives you an output like:
`1602834200 dc:a6:32:5a:c1:84 10.42.0.181 piserver 01:dc:a6:32:5a:c1:84`

```bash
ssh pi@10.42.0.181
```


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

## Install PHPmyAdmin interface
Navigate to version under https://www.phpmyadmin.net/downloads/ and copy the link to the latest version.
```bash
wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-english.tar.gz
tar -xvf phpMyAdmin-5.0.2-english.tar.gz
mkdir -p /var/www/html/pma
mv phpmyadmin /var/www/html/pma
systemctl restart apache2
```
