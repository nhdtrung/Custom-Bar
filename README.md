# CustomBar for Magento 2.4

This module will display the group's name of current user on the top bar of every pages.

## Requirements
- The content of this bar must be associated with a customer group when the current visitor is logged in or not.
- The content should be different for each customer group.
- The module must have an admin option to enable or disable the new feature, it must work with FPC enabled (e.g. Varnish).
- It must work in a Luma installation without extra theme customization out of the module, which means that all the files must be inside a folder app/code/WdevsCustomBar.

## Installation

- Clone this module and put in `app/code/Wdevs/CustomBar` directory.
- Enter following commands to enable module:
```
php bin/magento module:enable Wdevs_CustomBar
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
```

## How to use

- Login to Magento Admin `Stores > Configuration`
- Open `Wdevs > Custom Bar` section
      - Stores > Configuration > Wdevs > Custom Bar
- Enable the module by choosing “Yes” in the required field.
- Save config.


![configuration page](https://i.imgur.com/Ap4sqmq.png)

## Final result

When customer logged in, the small top bar will show up with current customer group

![Final result](https://i.imgur.com/EJ77a4Z.png)

