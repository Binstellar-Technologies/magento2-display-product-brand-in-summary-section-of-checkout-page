## Magento2 Display Product Brand in summary section of Checkout page

> Magento2 an open-source e-commerce platform written in PHP.

> Here in this extension we are going to learn how to show any additional attribute like brand etc.. value on checkout page & cart page summary section

> In this extension we have first created a new attribute named as Brand & then displayed it's product respective value on cart page & checkout page summary section. 

> In order to achieve this we have using Plugin method of Magento2, here we have used afterGetConfig method to load the product details first from products Id & then fetched the product brand attribute value based on the product Id. Later, passed this brand attribute value in the same array which contains product information in order show the brand value.

> We have also used checkout page layout to add the Brand label & fetch the value of brand using knockout js to display it on checkout & cart page summary sections.


## Installation Steps

##### Step 1 : Download the Zip file from Github & Unzip it
##### Step 2 : Create a directory under app/code/Binstellar/CheckoutBrand
##### Step 3 : Upload the files & folders from extracted package to app/code/Binstellar/CheckoutBrand
##### Step 4 : Go to the Magento2 Root directory & run following commands

php bin/magento setup:upgrade

php bin/magento setup:di:compile

php bin/magento setup:static-content:deploy -f

php bin/magento cache:flush


## Note : We have tested this option in Magento ver. 2.4.5-p1