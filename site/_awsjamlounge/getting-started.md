---
layout: page
title: Qlik Replicate Steps for the Jam Lounge
tutorialtype: awsjamlounge
permalink: /awsjamlounge/getting-started/getting-started.php
---

This is your starting point for the Qlik Replicate portion of the AWS Jam Lounge
sponsored by Qlik. In this section you will configure Qlik Replicate to deliver
some sample data from a source database into a target database running in AWS, emulating 
the steps you would go through to migrate an on-prem database into AWS.

For the Jam, our source database will be a MySQL instance and our target will be
the AWS RDS PostgreSQL database configured for you when you initiated this Jam Lounge
challenge. The source data
is being loaded and actively changed behind the scenes, so you will be able to witness
not only the use of Qlik Replicate to load data into a target database, but also keep
it current as changes continue to occur on the source.

Although this AWS Jam exercise highlights the concept of replicating data in real-time
between MySQL and Postgres, Qlik Replicate can deliver data from virtually any 
relational database, (legacy) mainframes, or SAP applications that you might have 
in your enterprise to a wide variety of target platforms, whether on-prem or in the cloud.

{% include figure.html url='/images/awsjamlounge/use-cases-db.png' description='MySQL-to-RDS PostgreSQL Replication' %}


### Step 1: Log In to Qlik Replicate 

> Note: All of the moving parts that make up this test drive are built using Docker.
It can take several minutes for all of the infrastructure to initialize. If you are 
unable to access Replicate when you click on the link below, wait a couple of minutes 
and try again.

First things first, we need to open Qlik Replicate. Click the following link to open Replicate 
in a new tab in your browser. 

<div id="replurl" align="center" style="font-size:30px"></div>
<script type="text/javascript">{% include getReplicateURL.js %}</script>

and log in when requested:

* User Name: `admin`
* Password: {% include getPassword.php %}

 and click `OK`. 

Replicate is based on the idea of combining source and target endpoint configurations into
a "task". In short, a Replicate task is made up of the following:

* A source endpoint
* A target endpoint
* The tables we want to replicate from the source to the target
* Any transformations to the data that we might want to configure

### Step 2: Configure your MySQL Source

In this step, you need to configure your MySQL source endpoint in Replicate.
Begin by selecting MySQL as a source and fill in the remaining blanks:

* Server: `mysqldb`
* Port: `3306`
* User: `root`
* Password: {% include getPassword.php %}
* Security/SSL Mode: `Preferred` (the default) or `None`

and then click on `Test Connection`. You should see a green highlight indicating
that all is OK.

### Step 3: Configure your PostgreSQL Target

In this step, you need to configure your PostgreSQL target. Use the server and credentials for the
AWS RDS PostgreSQL database you created previously. 

> NOTE: when you are selecting the type of target,
simply select `PostgreSQL`. There is not an endpoint specific to RDS.

To configure your RDS PostgreSQL target, use the information from the **Output Properties** tab
on the Jam Lounge page for this challenge.

For example:

* Host: will look something like `mytestdb.conbhqy6uahv.us-east-2.rds.amazonaws.com` 
* Port: `5432`
* User: `postgres`
* Password: `QlikRocks`
* Database: `postgres`. 
* Security/SSL Mode: `prefer` (the default) or `disable`.

If for some reason you are unable to connect to your AWS RDS PostgreSQL instance from
Qlik Replicate, there is a local instance of PostgreSQL running. 
You can use it to complete this portion of the Jam.

If you are using the local PostgreSQL instance, fill in the blanks as follows:

* Host: `postgresdb`
* Port: `5432`
* User: `qlik`
* Password: {% include getPassword.php %}
* Database: `qlikdb`
* Security/SSL Mode: `prefer` (the default) or `disable`.

In either case, whether you are using the RDS PostgreSQL instance or the local one, 
click on `Test Connection`. Once again, you should see a green highlight indicating
that everything is OK.

### Step 4: Create a Replication Task

Now that you have your source and target endpoints configured, you need to combine them
into a Replicate task. Simply create a new task and associate your MySQL source and
PostgreSQL target with it.

### Step 5: Choose Tables to Replicate

* You need to select the tables from the source database that you want to Replicate.
Select the **schema** `testdrive` and have Replicate list the tables in that schema.
* You will need to select all of the tables in order to answer the challenge questions.

### Step 6: Configure Transformations

In the real world, you might configure Replicate to perform transformations on the 
data as it is moved from the source to the target. We are keeping things simple 
for the Jam, so will not ask you to configure a transformation here. You can move on
to the next step.

### Step 7: Go!

Press `Save` and then `Run`. Replicate should begin loading data from the source
database into the target.


