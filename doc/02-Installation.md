# Installation <a id="installation"></a>

The preferred way of installing Icinga Web 2 is to use the official package repositories depending on which operating
system and distribution you are running.

In case you are upgrading from an older version of Icinga Web 2
please make sure to read the [upgrading](80-Upgrading.md#upgrading) section
thoroughly.

Source and automated setups are described inside the [advanced topics](20-Advanced-Topics.md#advanced-topics)
chapter.

<<<<<<< HEAD
* A web server, e.g. Apache or nginx
* PHP >= 5.3.0 w/ gettext, intl and OpenSSL support
=======
## Installing Requirements <a id="installing-requirements"></a>

* [Icinga 2](https://www.icinga.com/products/icinga-2/) with the IDO database backend (MySQL or PostgreSQL)
* A web server, e.g. Apache or Nginx
* PHP >= 5.3.2 with the following modules installed: cURL, gettext, intl, mbstring, OpenSSL and xml
>>>>>>> upstream/master
* Default time zone configured for PHP in the php.ini file
* LDAP PHP library when using Active Directory or LDAP for authentication
* MySQL or PostgreSQL PHP libraries
* cURL PHP library when using the Icinga 2 API for transmitting external commands


## Installing Icinga Web 2 from Package <a id="installing-from-package"></a>

Below is a list of official package repositories for installing Icinga Web 2 for various operating systems.

| Distribution  | Repository |
| ------------- | ---------- |
<<<<<<< HEAD
| Debian        | [Icinga Repository](http://packages.icinga.org/debian/) |
| Ubuntu        | [Icinga Repository](http://packages.icinga.org/ubuntu/) |
| RHEL/CentOS   | [Icinga Repository](http://packages.icinga.org/epel/) |
| openSUSE      | [Icinga Repository](http://packages.icinga.org/openSUSE/) |
| SLES          | [Icinga Repository](http://packages.icinga.org/SUSE/) |
| Gentoo        | [Upstream](https://packages.gentoo.org/packages/www-apps/icingaweb2) |
| FreeBSD       | [Upstream](http://portsmon.freebsd.org/portoverview.py?category=net-mgmt&portname=icingaweb2) |
| ArchLinux     | [Upstream](https://aur.archlinux.org/packages/icingaweb2) |
=======
| Debian        | [Icinga Repository](http://packages.icinga.com/debian/) |
| Ubuntu        | [Icinga Repository](http://packages.icinga.com/ubuntu/) |
| RHEL/CentOS   | [Icinga Repository](http://packages.icinga.com/epel/) |
| openSUSE      | [Icinga Repository](http://packages.icinga.com/openSUSE/) |
| SLES          | [Icinga Repository](http://packages.icinga.com/SUSE/) |
| Gentoo        | [Upstream](https://packages.gentoo.org/packages/www-apps/icingaweb2) |
| FreeBSD       | [Upstream](http://portsmon.freebsd.org/portoverview.py?category=net-mgmt&portname=icingaweb2) |
| ArchLinux     | [Upstream](https://aur.archlinux.org/packages/icingaweb2) |
| Alpine Linux  | [Upstream](http://git.alpinelinux.org/cgit/aports/tree/community/icingaweb2/APKBUILD) |
>>>>>>> upstream/master

Packages for distributions other than the ones listed above may also be available.
Please contact your distribution packagers.

### Setting up Package Repositories <a id="package-repositories"></a>

You need to add the Icinga repository to your package management configuration for installing Icinga Web 2.
If you've already configured your OS to use the Icinga repository for installing Icinga 2, you may skip this step.
Below is a list with **examples** for various distributions.

<<<<<<< HEAD
**Debian Jessie**:
```
wget -O - http://packages.icinga.org/icinga.key | apt-key add -
echo 'deb http://packages.icinga.org/debian icinga-jessie main' >/etc/apt/sources.list.d/icinga.list
=======
**Debian Stretch**:
```
wget -O - http://packages.icinga.com/icinga.key | apt-key add -
echo 'deb http://packages.icinga.com/debian icinga-stretch main' >/etc/apt/sources.list.d/icinga.list
>>>>>>> upstream/master
apt-get update
```
> INFO
>
> For other Debian versions just replace `stretch` with your distribution's code name.

<<<<<<< HEAD
> INFO
>
> For other Debian versions just replace jessie with your distribution's code name.

**Ubuntu Xenial**:
```
wget -O - http://packages.icinga.org/icinga.key | apt-key add -
add-apt-repository 'deb http://packages.icinga.org/ubuntu icinga-xenial main'
=======
**Ubuntu Xenial**:
```
wget -O - http://packages.icinga.com/icinga.key | apt-key add -
add-apt-repository 'deb http://packages.icinga.com/ubuntu icinga-xenial main'
>>>>>>> upstream/master
apt-get update
```
> INFO
>
> For other Ubuntu versions just replace xenial with your distribution's code name.

<<<<<<< HEAD
**RHEL and CentOS**:
=======
**RHEL and CentOS 7**:
>>>>>>> upstream/master
```
yum install https://packages.icinga.com/epel/icinga-rpm-release-7-latest.noarch.rpm
```

**Fedora 26**:
```
dnf install https://packages.icinga.com/fedora/icinga-rpm-release-26-latest.noarch.rpm
```

**SLES 12**:
```
zypper ar http://packages.icinga.com/SUSE/ICINGA-release.repo
zypper ref
```

**openSUSE**:
```
zypper ar http://packages.icinga.com/openSUSE/ICINGA-release.repo
zypper ref
```

<<<<<<< HEAD
#### <a id="package-repositories-rhel-notes"></a> RHEL/CentOS Notes

The packages for RHEL/CentOS depend on other packages which are distributed as part of the
[EPEL repository](http://fedoraproject.org/wiki/EPEL). Please make sure to enable this repository by following
[these instructions](http://fedoraproject.org/wiki/EPEL#How_can_I_use_these_extra_packages.3F).

> Please note that installing Icinga Web 2 on **RHEL/CentOS 5** is not supported due to EOL versions of PHP and PostgreSQL.

### <a id="installing-from-package-example"></a> Installing Icinga Web 2

You can install Icinga Web 2 by using your distribution's package manager to install the `icingaweb2` package.
Below is a list with examples for various distributions. The additional package `icingacli` is necessary on RPM based systems for being able to follow further steps in this guide. In DEB based systems, the icingacli binary is included in the icingaweb2 package.

**Debian and Ubuntu**:
=======
**Alpine Linux**:
>>>>>>> upstream/master
```
echo "http://dl-cdn.alpinelinux.org/alpine/edge/community" >> /etc/apk/repos
apk update
```
<<<<<<< HEAD

**RHEL, CentOS and Fedora**:
```
yum install icingaweb2 icingacli
```
For RHEL/CentOS please read the [package repositories notes](#package-repositories-rhel-notes).
=======
> INFO
>
> Latest version of Icinga Web 2 is in the edge repository, which is the -dev branch.
>>>>>>> upstream/master

#### RHEL/CentOS Notes <a id="package-repositories-rhel-notes"></a>

Our packages are build on and with packages from the **[EPEL repository](https://fedoraproject.org/wiki/EPEL)**.
Please enable it prior installing the Icinga packages.

CentOS 7/6:
```
yum install epel-release
```

RedHat 7:
```
yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
```

If you are using RHEL you need enable the **optional repository** in order to use some
contents of EPEL.

RedHat:
```
subscription-manager repos --enable rhel-7-server-optional-rpms
# or
subscription-manager repos --enable rhel-6-server-optional-rpms
```

Since version 2.5.0 we also require a **newer PHP version** than what is available
in RedHat itself. You need to enable the SCL repository, so that the dependencies
can pull in the newer PHP.

CentOS:
```
yum install centos-release-scl
```

RedHat:
```
subscription-manager repos --enable rhel-server-rhscl-7-rpms
# or
subscription-manager repos --enable rhel-server-rhscl-6-rpms
```

Make sure to also read the chapter on [Setting up FPM](02-Installation.md#setting-up-fpm).

#### Alpine Linux Notes <a id="package-repositories-alpine-notes"></a>

The example provided suppose that you are running Alpine edge, which is the -dev branch and is a rolling release.
If you are using a stable version, in order to use the latest Icinga Web 2 version you should "pin" the edge repository.
In order to correctly manage your repository, please follow
[these instructions](https://wiki.alpinelinux.org/wiki/Alpine_Linux_package_management).

### Installing Icinga Web 2 <a id="installing-from-package-example"></a>

You can install Icinga Web 2 by using your distribution's package manager to install the `icingaweb2` package.
Below is a list with examples for various distributions. The additional package `icingacli` is necessary on RPM based systems for being able to follow further steps in this guide. In DEB based systems, the icingacli binary is included in the icingaweb2 package.

**Debian and Ubuntu**:
```
apt-get install icingaweb2 icingacli
```

**RHEL, CentOS and Fedora**:
```
yum install icingaweb2 icingacli
```

If you have [SELinux](90-SELinux.md) enabled, the package `icingaweb2-selinux` is also required.
For RHEL/CentOS please read the [package repositories notes](02-Installation.md#package-repositories-rhel-notes).

**SLES and openSUSE**:
```
zypper install icingaweb2 icingacli
```

**Alpine Linux**:
```
apk add icingaweb2
```
For Alpine Linux please read the [package repositories notes](02-Installation.md#package-repositories-alpine-notes).

### Setting up FPM <a id="setting-up-fpm"></a>

If you are on CentOS / RedHat 6 or 7, or just want to run Icinga Web 2 with PHP-FPM instead
of the Apache module.

| Operating System    | FPM configuration path            |
|---------------------|-----------------------------------|
| RedHat 7 (with SCL) | `/etc/opt/rh/rh-php71/php-fpm.d/` |
| RedHat 6 (with SCL) | `/etc/opt/rh/rh-php70/php-fpm.d/` |
| Debian/Ubuntu       | `/etc/php*/*/fpm/pool.d/`         |

The default pool `www` should be sufficient for Icinga Web 2.

On RedHat you need to start and enable the FPM service.

RedHat / CentOS 7 (SCL package):
```
systemctl start rh-php71-php-fpm.service
systemctl enable rh-php71-php-fpm.service
```

RedHat / CentOS 6 (SCL package):
```
service rh-php70-php-fpm start
chkconfig rh-php70-php-fpm on
```

All module packages for PHP have this SCL prefix, so you can install a
database module like this:
```
yum install rh-php71-php-mysqlnd
# or
yum install rh-php71-php-pgsql

# on el6
yum install rh-php70-php-mysqlnd
# or
yum install rh-php70-php-pgsql
```

On RedHat / CentOS 6 you also need to install `mod_proxy_fcgi` for httpd:
```
yum install mod_proxy_fcgi
```

Depending on your web server installation, we might have installed or
updated the config file for icingaweb2 with defaults for FPM.

Check `/etc/httpd/conf.d/icingaweb2.conf` or `/etc/apache2/conf.d/icingaweb2.conf`.
And `*.rpm*` `*.dpkg*` files there with updates.

Make sure that the `FilesMatch` part is included for Apache.

Also see the example from icingacli:
```
icingacli setup config webserver apache
```

### Upgrading to FPM <a id="upgrading-to-fpm"></a>

Valid for:

* RedHat / CentOS 6
* RedHat / CentOS 7

Other distributions are also possible if preferred, but not included here.

Some upgrading work needs to be done manually, while we install PHP FPM
as dependency, you need to start the service, and configure some things.

Please read [Setting up FPM](02-Installation.md#setting-up-fpm) first.

**php.ini settings** you have tuned in the past needs to be migrated to a SCL installation
of PHP.

Check these directories:

* `/etc/php.ini`
* `/etc/php.d/*.ini`

Most important for icingaweb2 is `date.timezone`.

PHP settings should be stored to:

* RedHat / CentOS 7: `/etc/opt/rh/rh-php71/php.d/`
* RedHat / CentOS 6: `/etc/opt/rh/rh-php70/php.d/`

Make sure to **install the required database modules**

RedHat / CentOS 7:
```
yum install rh-php71-php-mysqlnd
# or
yum install rh-php71-php-pgsql
```

RedHat / CentOS 6:
```
yum install rh-php70-php-mysqlnd
# or
yum install rh-php70-php-pgsql
```

After any PHP related change you now need to **restart FPM**:

RedHat / CentOS 7:
```
systemctl restart rh-php71-php-fpm.service
```

RedHat / CentOS 6:
```
service rh-php70-php-fpm restart
```

If you don't need mod_php for other apps on the server, you should disable it in Apache.

Disable PHP in Apache httpd:
```
cd /etc/httpd
cp conf.d/php.conf{,.bak}
: >conf.d/php.conf

# ONLY on el7!
cp conf.modules.d/10-php.conf{,.bak}
: >conf.modules.d/10-php.conf

systemctl restart httpd.service
# or on el6
service httpd restart
```

You can also uninstall the mod_php package, or all non-SCL PHP related packages.
```
yum remove php
# or
yum remove php-common
```

### Preparing Web Setup <a id="preparing-web-setup-from-package"></a>

You can set up Icinga Web 2 quickly and easily with the Icinga Web 2 setup wizard which is available the first time
you visit Icinga Web 2 in your browser. When using the web setup you are required to authenticate using a token.
In order to generate a token use the `icingacli`:
```
icingacli setup token create
```

In case you do not remember the token you can show it using the `icingacli`:
```
icingacli setup token show
```

<<<<<<< HEAD
#### <a id="web-setup-manual-from-source-login"></a> Icinga Web 2 Manual Setup Login

Finally visit Icinga Web 2 in your browser to login as `icingaadmin` user: `/icingaweb2`.


## <a id="upgrading"></a> Upgrading Icinga Web 2

### <a id="upgrading-to-2.4.0"></a> Upgrading to Icinga Web 2 2.4.0

* Icinga Web 2 version 2.4.0 does not introduce any backward incompatible change.

### <a id="upgrading-to-2.3.x"></a> Upgrading to Icinga Web 2 2.3.x

* Icinga Web 2 version 2.3.x does not introduce any backward incompatible change.

### <a id="upgrading-to-2.2.0"></a> Upgrading to Icinga Web 2 2.2.0

* The menu entry `Authorization` beneath `Config` has been renamed to `Authentication`. The role, user backend and user
  group backend configuration which was previously found beneath `Authentication` has been moved to `Application`.
  
### <a id="upgrading-to-2.1.x"></a> Upgrading to Icinga Web 2 2.1.x

* Since Icinga Web 2 version 2.1.3 LDAP user group backends respect the configuration option `group_filter`.
  Users who changed the configuration manually and used the option `filter` instead
  have to change it back to `group_filter`.

### <a id="upgrading-to-2.0.0"></a> Upgrading to Icinga Web 2 2.0.0

* Icinga Web 2 installations from package on RHEL/CentOS 7 now depend on `php-ZendFramework` which is available through
  the [EPEL repository](http://fedoraproject.org/wiki/EPEL). Before, Zend was installed as Icinga Web 2 vendor library
  through the package `icingaweb2-vendor-zend`. After upgrading, please make sure to remove the package
  `icingaweb2-vendor-zend`.

* Icinga Web 2 version 2.0.0 requires permissions for accessing modules. Those permissions are automatically generated
  for each installed module in the format `module/<moduleName>`. Administrators have to grant the module permissions to
  users and/or user groups in the roles configuration for permitting access to specific modules.
  In addition, restrictions provided by modules are now configurable for each installed module too. Before,
  a module had to be enabled before having the possibility to configure restrictions.

* The **instances.ini** configuration file provided by the monitoring module
  has been renamed to **commandtransports.ini**. The content and location of
  the file remains unchanged.

* The location of a user's preferences has been changed from
  **&lt;config-dir&gt;/preferences/&lt;username&gt;.ini** to
  **&lt;config-dir&gt;/preferences/&lt;username&gt;/config.ini**.
  The content of the file remains unchanged.

### <a id="upgrading-to-rc1"></a> Upgrading to Icinga Web 2 Release Candidate 1

The first release candidate of Icinga Web 2 introduces the following non-backward compatible changes:

* The database schema has been adjusted and the tables `icingaweb_group` and
  `icingaweb_group_membership` were altered to ensure referential integrity.
  Please use the upgrade script located in **etc/schema/** to update your
  database schema
=======
#### Preparing Web Setup on Debian <a id="preparing-web-setup-from-package-debian"></a>

On Debian, you need to manually create a database and a database user prior to starting the web wizard.
This is due to local security restrictions whereas the web wizard cannot create a database/user through
a local unix domain socket.

```
MariaDB [mysql]> CREATE DATABASE icingaweb2;
>>>>>>> upstream/master

MariaDB [mysql]> GRANT ALL ON icingaweb2.* TO icingaweb2@localhost IDENTIFIED BY 'CHANGEME';
```

You may also create a separate administrative account with all privileges instead.

<<<<<<< HEAD
### <a id="upgrading-to-beta3"></a> Upgrading to Icinga Web 2 Beta 3
=======
> Note: This is only required if you are using a local database as authentication type.
>>>>>>> upstream/master

### Starting Web Setup <a id="starting-web-setup-from-package"></a>

<<<<<<< HEAD
### <a id="upgrading-to-beta2"></a> Upgrading to Icinga Web 2 Beta 2
=======
Finally visit Icinga Web 2 in your browser to access the setup wizard and complete the installation:
`/icingaweb2/setup`.
>>>>>>> upstream/master

> **Note for Debian**
>
> Use the same database, user and password details created above when asked.

The setup wizard automatically detects the required packages. In case one of them is missing,
e.g. a PHP module, please install the package, restart your webserver and reload the setup page.

<<<<<<< HEAD
If you delegated authentication to your web server using the `autologin` backend, you have to switch to the `external`
authentication backend to be able to log in again. The new name better reflects 
what's going on. A similar change
affects environments that opted for not storing preferences, your new backend is `none`.
=======
If you have SELinux enabled, please ensure to either have the selinux package for Icinga Web 2
installed, or disable it.
>>>>>>> upstream/master
