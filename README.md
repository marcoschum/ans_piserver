# Raspberry PI as a home server
## Overview
| Services  | Description |
| ------------- | ------------- |
| Apache Webserver  | To use for all services  |
| Transmission Daemon  | Run torrents through transmission  |
| PHP Media Center  | Watch downloaded videos directly in your browser  |
| Samba Daemon  | Access downloaded files through SMB share  |
| MariaDB Database  |  For further projects  |

## Prerequisites
- Raspberry PI with network access
- Installed Raspbian OS on SD card (https://www.raspbian.org/)
- additional hard drive or USB Stick attached to Raspberry

## How to access raspberry to configure wlan
You need to be able to connect it to a machine via network cable.

In my example I'm using an Ubuntu laptop with network jack

- Connect cable to both laptop and Raspberry
- Set network connection to `shared connection`
- Run following command

```bash
cat /var/lib/mis/dnsmasq.leases
```
Which gives you an output like:
`1602834200 dc:a6:32:5a:c1:84 10.42.0.181 piserver 01:dc:a6:32:5a:c1:84`

```bash
ssh pi@10.42.0.181
```

Now that you are on your Raspberry, to setup your wifi with passphrase, follow the guide at
(https://www.raspberrypi.org/documentation/configuration/wireless/wireless-cli.md)

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

## Run specific playbook again
You can find all of them in the `books` folder.
In this example we run copy.yml again
```bash
sudo ansible-playbook --connection=local --inventory=127.0.0.1, books/copy.yml
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
