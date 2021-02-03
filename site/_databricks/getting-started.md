---
layout: page
title: Qlik Replicate Test Drive for Databricks
tutorialtype: databricks
permalink: /databricks/getting-started/getting-started.php
---

This test drive will demonstrate how to use Qlik Replicate to ingest and 
deliver data in real-time to your Databricks environment. Follow the step-by-step 
tutorial to quickly load sample data from a MySQL database into your Databricks 
environment, then watch as data updates happen in real time.

Although the tutorial scenario highlights the concept of data ingestion and 
streaming to Databricks, Qlik Replicate can deliver any data from popular 
relational database systems, mainframes, or SAP applications that you might have 
in your enterprise.

{% include figure.html url='/images/databricks/mysql-to-databricks.png' description='Database-to-Databricks Replication' %}

While the test drive tutorial focuses on the movement of data into Databricks using
Qlik Replicate, you should note that we also support end-to-end movement of data
into Delta Lake using another data integration product in the Qlik portfolio, Qlik Compose for 
Data Lakes. In this scenario, Replicate first creates external tables on the metadata 
store, and when running Full Load and Store Changes tasks, it writes the files to 
Azure storage. Similar to other endpoints, Replicate creates change data partitions 
in the Partition Control Table and in the metadata store which is read by Compose. 
Compose creates delta tables for the ODS which includes inserted, modified and deleted 
data that is updated on every Compose task run.

{% include figure.html url='/images/databricks/mysql-to-delta-lake.png' description='Database-to-Delta-Lake Replication' %}

If this sceniario is of interest to you, use the 
[Contact us](https://www.qlik.com/us/try-or-buy/buy-now?campaignid=7013z000000jSeg){:target="_blank" rel="noopener noreferrer"}
link to arrange a customized trial using your data.


### Log In to Qlik Replicate to Start the Tutorial

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

![Replicate Login Image]({{ "/images/databricks/login.png" | prepend: base }}){: .center-image }

Once you are logged in you will see the main screen for Qlik Replicate.


![Replicate Main Image]({{ "/images/databricks/replicate1.png" | prepend: base }}){: .center-image }

### Navigating the Tutorial

To navigate the test drive tutorial, it is best to follow the steps in order. You can do this by 
pressing the `NEXT` button at the bottom of each page. If for some reason you want to skip 
to a particular section of the test drive, you can navigate via the table of contents on the right
side of the page.

You can get to the Tutorial by clicking on `Tutorial` at the top of the page, or by clicking 
[here]({{ base }}/databricks/tutorial/db-mysql-source.php "Tutorial").
