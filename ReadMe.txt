Freeshipping module

Work flow:
	If admin sets all params in admin part and turned method on, it will checks all checkout processes to find if total value of process is greater than max value.
	On shipping method available block all shipping methods allowed for this checkout will be check if our new freeshipping method is presents and pass it to the private field. In overridden block of layout than field will be checked. In case of its existence the message will be shown and name of shipping method will be hidden.

Contains:
•	backend part to set params and set it on
•	shipping model to add shipping method and check conditions
•	overridden block shipping method available – to catch the newshipping shipping method
•	frontend layout to hide all shipping methods and show message only if method on and conditions ok
•	sql migration – no direct access to db needed, left blank 

Workaround: 
•	Got troubles naming shipping method as freeshipping, its already exists so named it as newshipping
•	Complicated with overriding blocks and layout
