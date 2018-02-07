evaluation_carcaImmo
====================

This is a Symfony Project Evaluation.

# **Presentation** :

This is about a website of real estate sale.

We have a page where we can see all the real estates sales or rentals.
We can see the title of the announce, the category of the announce, the number of room, the price, a photo and the owner.

If you clic on the title, we go to the page of the announce. and we can see all the caracteristics about the announce. We have the same caracteristics with the description.

All announces are created only by the administrator. He have a back office panel when he is log with his account.
The administrator can create the client who want an announce, a new type of category if he need one more, he can administrate the accounts saves in the website and he can create new announces.

When he **create** a **new announce** he must enter many things :
 * the title of the announce
 * the photo file (1.5 Mo or less )
 * the number of rooms
 * the price
 * a description
 * the client ( who was created before the creation of the announce )
 * the type of the announce ( who was created before the creation of the announce too )
 * link the administrator who create the announce

When all of it is done he can save and the announce is created.

The admin panel can **__edit__** the announce, the client and the type of categorie.
He can edit accounts saves in the website.

# **Annex**

In the folders of this repository we have two things

First we have a folder where there is  four files : the two wireframes and two photos.
You can find the folder at /web/annexes

..* the first wireframe is the page where we can see all the announces
..* the second wireframe is the page of the announce.
..* the first photo is the MCD
..* the second photo is the MPD

Next we have another folder with the dump of my database.
You can find the folder at /web/sql


# **How use this repository**

first clone this repository

  * do a **__composer update__**
 * you can go to app/config/config.yml and change what you want to change for your database information
 * next do a **__php bin/console doctrine:database:create__**
 * next step you can do **__php bin/console doctrine:schema:update --force__** to create all columns and foreign key
 * next you can you the dump of the database in **/web/sql** you have four files you can take it and mount this files in your database.
 * and finly you can do in your terminal : **__php bin/console server:start__** or **__server:run__**
