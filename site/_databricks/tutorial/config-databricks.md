---
title: Step 3 - Prepare Databricks for Data Delivery
section: Delivering Data to Databricks
tutorialtype: databricks
permalink: /databricks/tutorial/config-databricks.php
---

Now that we have the Azure Data Lake Storage we need configured, we need to
configure Databricks so that it can make use of that storage. We also need to do a
couple of things to prepare Databricks to accept data loaded by Replicate.

Everything we do in this section of the tutorial will be done from your Databricks workspace, 
so go ahead and log in there.

![Azure Databricks Config 1 Image]({{ "/images/databricks/azure-databricks-config-1.png" | prepend: base }}){: .center-image }


#### Create a Databricks Token

Replicate uses a Databricks "access token" to access databricks. The first thing we will 
do is create one.  This is done from the "User Settings" drop down of the workspace.

![Azure Databricks Config 2 Image]({{ "/images/databricks/azure-databricks-config-2.png" | prepend: base }}){: .center-image }

From "User Settings" select the "Access Tokens" tab and then `Generate New Token`.

![Azure Databricks Config 3 Image]({{ "/images/databricks/azure-databricks-config-3.png" | prepend: base }}){: .center-image }

Enter a comment and select `Generate`.

![Azure Databricks Config 4 Image]({{ "/images/databricks/azure-databricks-config-4.png" | prepend: base }}){: .center-image }

Be sure to save the generated token off now. You will not be able to retrieve it later.

![Azure Databricks Config 5 Image]({{ "/images/databricks/azure-databricks-config-5.png" | prepend: base }}){: .center-image }

![Azure Databricks Config 6 Image]({{ "/images/databricks/azure-databricks-config-6.png" | prepend: base }}){: .center-image }

#### Edit the Spark Configuration

The *Spark Config* section of you Databricks cluster configuration must contain the line
`spark.hadoop.hive.server2.enable.doAs false` when using ADLS Gen2 storage. We will set
that now.

First select the cluster we will be using for this test drive.

![Azure Databricks Config 7 Image]({{ "/images/databricks/azure-databricks-config-7.png" | prepend: base }}){: .center-image }

We need to make a change, so select `Edit`.

![Azure Databricks Config 8 Image]({{ "/images/databricks/azure-databricks-config-8.png" | prepend: base }}){: .center-image }

Now scroll down, 

* select `> Advanced Options` 
* select the `Spark` tab 
* enter the string `spark.hadoop.hive.server2.enable.doAs false` in the Spark Config section.

![Spark Config Image]({{ "/images/databricks/databricks-spark-config.png" | prepend: base }}){: .center-image }

and then click `Confirm and Restart` at the top of the page.

#### Mount ADLS-2 External Storage

The next step is to mount the Azure Data Lake Gen-2 Storage we created previously in Databricks
so it can be accessed. 

Open a Notebook and execute the following python command:

    %python
    configs = {"fs.azure.account.auth.type": "OAuth",
               "fs.azure.account.oauth.provider.type": "org.apache.hadoop.fs.azurebfs.oauth2.ClientCredsTokenProvider",
               "fs.azure.account.oauth2.client.id": "<application-id>",
               "fs.azure.account.oauth2.client.secret": "<client-secret>"),
               "fs.azure.account.oauth2.client.endpoint": "https://login.microsoftonline.com/<directory-id>/oauth2/token"}
    
    # Optionally, you can add <directory-name> to the source URI of your mount point.
    dbutils.fs.mount(
      source = "abfss://<file-system-name>@<storage-account-name>.dfs.core.windows.net/<directory-name>/",
      mount_point = "/mnt/<mount-name>",
      extra_configs = configs)

where:

* `<application-id>` is the Azure Active Directory Application (client) ID we made note of earlier.
* `<client-secret>` is the Azure Active Directory Application (client) Key we created.
* `<directory-id>` is the Azure Active Directory ID (tenant ID).
* *source* is the file system at target folder that will contain the data delivered by replicate.
    * `<file-system-name>` is the ADLS-2 file system we are using.
    * `<storage-account-name>` is the ADLS-2 storage account we are using.
    * `<directory-name>` is the name of the directory in the file system we will be writing to.
* `<mount-name>` is where the *source* is mounted in Databricks. This will be used later by Replicate.

![Azure Databricks Config 9 Image]({{ "/images/databricks/azure-databricks-config-9.png" | prepend: base }}){: .center-image }

> More details can be found [here](https://docs.databricks.com/data/data-sources/azure/azure-datalake-gen2.html).

    %sql
    drop database if exists <database-name>;
    create database <database-name> location '<mount-point>';

where:

* `<database-name>` is the name of the database you want to create; and
* `<mount-point>` is the mount point you created above.

The results should look something like this:


![Azure Databricks Config 10 Image]({{ "/images/databricks/azure-databricks-config-10.png" | prepend: base }}){: .center-image }

#### Collect ODBC Connection Info

Replicate uses ODBC to write table metadata to Databricks. We need to collect some information 
from Databricks that we will need in the next section of the tutorial.

Once again, select the cluster you are using for the tutorial and go to `> Advanced Options`. From 
there, select the `JDBC/ODBC` tab.

![Azure Databricks Config 11 Image]({{ "/images/databricks/azure-databricks-config-11.png" | prepend: base }}){: .center-image }

You should make note of the `Server Hostname`, `Port` (normally 443), and `HTTP Path`.

And now on to configuring the Replicate Databricks target endpoint!


