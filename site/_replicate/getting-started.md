---
layout: page
title: Qlik Replicate Test Drive
tutorialtype: replicate
permalink: /replicate/getting-started/getting-started.php
---

Thank you for giving the Qlik Replicate Test Drive a go.  By following the steps outlined in 
this tutorial, you will build out two use cases.

{% include figure.html url='/images/replicate/use-cases-db.png' description='Database-to-Database Replication' %}
{% include figure.html url='/images/replicate/use-cases-kafka.png' description='Streaming Data to Kafka' %}

### Connect to Qlik Replicate 

> Note: All of the moving parts that make up this test drive are built using Docker.
It can take several minutes for all of the infrastructure to initialize. If you are 
unable to access Replicate when you click on the link below, wait a couple of minutes 
and try again.

First things first, we need to open Qlik Replicate. Click the following link to open Replicate 
in a new tab in your broswer. 

<div id="replurl" align="center" style="font-size:30px"></div>
<script type="text/javascript">{% include getReplicateURL.js %}</script>

and then log in when requested and click `OK`. The **User Name** is `admin` and 
the **Password** is {% include getPassword.php %}.

![Replicate Login Image]({{ "/images/replicate/login.png" | prepend: base }}){: .center-image }

Once you are logged in you will see the main screen for Qlik Replicate.


![Replicate Main Image]({{ "/images/replicate/replicate1.png" | prepend: base }}){: .center-image }

Qlik Replicate is configured by linking together a **source endpoint** and a **target endpoint** to create
a Replicate **task**. We will see how to do that in the following sections.

### Navigating the Tutorial

To navigate the test drive tutorial, it is best to follow the steps in order. You can do this by 
pressing the `NEXT` button at the bottom of each page. If for some reason you want to skip 
to a particular section of the test drive, you can navigate via the table of contents on the right
side of the page.

You can get to the Tutorial by clicking on `Tutorial` at the top of the page, or by clicking 
[here]({{ base }}/replicate/tutorial/db-mysql-source.php "Tutorial").
