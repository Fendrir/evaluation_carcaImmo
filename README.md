evaluation_carcaImmo
====================

This is a Symfony Project Evaluation.

# **Presentation** :


My project is about the creation of a website for real estate sale.

We have a page where we can see all the real estate sales or rentals.
We can see the title of the announcement, the category of the announcement, the number of rooms, the price, a photo and the owner.

If we click on the title, we go to the page of the announcement. and we can see all the  caracteristics about the announcement. We have the same caracteristics with the description.

All the announcements are created only by the administrator. He has a back office panel when he logs with his account.
The administrator can create the client who wants an announcement, a new type of category if he needs one more. He can administrate the accounts saved in the website and he can also create new announcements.

When he **creates** a **new announcement** he must enter many items.
hereafter :

* the title of the announcement
* the photo file (1.5 Mo or less )
* the number of rooms
* the price
* a description
* the client ( This item was created before the creation of the announcement )
* the type of the announcement ( which was created before the creation of the announcement too )
* the link of the administrator who has created the announcement.

When all this is done he can save the data and the announcement is created.

The admin panel can **__edit__** the announcement, the client and the type of category.
He can edit accounts saved in the website.

# **Annex**

In the folders of this repository we have two things :

First we have a folder in which there are four files : the two wireframes and two photos.

You can find the folder at /web/annexes :

* the first wireframe is the page where we can see all the announcements
* the second wireframe is the page of the announcement.
* the first photo is the MCD
* the second photo is the MPD

Next we have another folder with the dump of my database.
You can find the folder at /web/sql


# **How to use this repository**

first clone this repository

* do a **__composer update__**
* you can go to app/config/config.yml and change what you want to change for your database informations
* next do a **__php bin/console doctrine:database:create__**
* next step you can do **__php bin/console doctrine:schema:update -- force__** to create all columns and foreign key
* next you can use the dump of the database in **/web/sql** you have four files. You can take them and add these files to your database.
* and finaly in your terminal you can do: **__php bin/console server:start__** or **__server:run__**
