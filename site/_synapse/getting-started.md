---
layout: page
title: Qlik Replicate Test Drive for Microsoft Azure Synapse Analytics
tutorialtype: synapse
permalink: /synapse/getting-started/getting-started.php
---

This test drive will demonstrate how to use Qlik Replicate to ingest and 
deliver data in real-time to your Microsoft Azure Synapse Analytics environment. Follow the step-by-step 
tutorial to quickly load sample data from a MySQL database into your Azure Synapse Analytics 
data warehouse, then watch as data updates happen in real time.

While the tutorial scenario quickly highlights the concept of data ingestion and 
streaming to Microsoft Azure Synapse Analytics, Qlik Replicate can deliver any data from popular 
relational database systems, mainframes, or SAP applications that you might have 
in your enterprise.

In addition, at the end of the tutorial you should check out Qlik Compose, 
our Data Warehousing Automation solution that can automate the process of creating 
and updating analytics-ready data sets in Azure Synapse Analytics. Click the “Contact Us” tab and 
complete the form to request more information about Qlik Replicate connectivity 
options or Qlik Compose for Data Warehouses.


{% include figure.html url='/images/synapse/mysql-to-synapse.png' description='Database-to-Synapse Replication' %}

### Log In to Qlik Replicate to Start the Tutorial

> Note: All of the moving parts that make up this test drive are built using Docker.
It can take several minutes for all of the infrastructure to initialize. If you are 
unable to access Replicate when you click on the link below, wait a couple of minutes 
and try again.

First things first, we need to open Qlik Replicate. Click the following link to open Replicate 
in a new tab in your browser. 

<div id="replurl" align="center" style="font-size:30px"></div>
<script type="text/javascript">{% include getReplicateURL.js %}</script>

and then log in when requested and click `OK`. The **User Name** is `admin` and 
the **Password** is {% include getPassword.php %}.

![Replicate Login Image]({{ "/images/synapse/login.png" | prepend: base }}){: .center-image }

Once you are logged in you will see the main screen for Qlik Replicate.


![Replicate Main Image]({{ "/images/synapse/replicate1.png" | prepend: base }}){: .center-image }

### Navigating the Tutorial

To navigate the test drive tutorial, it is best to follow the steps in order. You can do this by 
pressing the `NEXT` button at the bottom of each page. If for some reason you want to skip 
to a particular section of the test drive, you can navigate via the table of contents on the right
side of the page.

You can get to the Tutorial by clicking on `Tutorial` at the top of the page, or by clicking 
[here]({{ base }}/synapse/tutorial/db-mysql-source.php "Tutorial").
