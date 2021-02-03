---
title: Step 4 - Databricks Target Configuration 
section: Delivering Data to Databricks
tutorialtype: databricks
permalink: /databricks/tutorial/databricks-target.php
---

Now that we have our infrastructure ready to go
we need to configure our Databricks target endpoint. The process is much the same as you saw 
with the MySQL source, and once again you will note that the configuration process is
context-sensitive as we move along. This tutorial supports configuration
of Databricks on Azure and Databricks on Amazon AWS. 

As before, the first step in the configuration process is to tell Replicate that we want to 
create a new endpoint. If you are back on the main window, you will need to click on 
`Manage Endpoint Connections` button.

![Manage Endpoints Image]({{ "/images/databricks/manage-endpoints.png" | prepend: base }}){: .center-image }

and then press the `+ New Endpoint Connection` button.


![Manage Endpoints Image]({{ "/images/databricks/add-new-endpoint-2.png" | prepend: base }}){: .center-image }

and you will see a window that resembles this:

![New Endpoint Image]({{ "/images/databricks/new-endpoint-2.png" | prepend: base }}){: .center-image }

We will now create a Databricks Target endpoint:
* Replace the text **New Endpoint Connection 1** with something more descriptive
like  `Databricks-Target`,
* make sure the `Target` radio button is selected,
* and then select `Microsoft Azure Databricks`  or `Databricks on AWS` from 
the dropdown selection box.

![Databricks Azure 1 Image]({{ "/images/databricks/databricks-azure-1.png" | prepend: base }}){: .center-image }

Replicate creates external tables in the Databricks metadata store using ODBC, and
when running Full Load and Store Changes tasks, it writes the files to Azure storage. 
Similar to other endpoints, Replicate creates change data partitions in the Partition 
Control Table and in the metadata store.

#### Azure Storage Configuration (for Azure Databricks endpoint)

To optimize delivery into the Azure Databricks environment, Replicate delivers change data in a
continual series of microbatches that are staged for bulk ingest. You will need to configure the 
Databricks on Azure endpoint to stage the data files in storage provided by your Azure account.

Replicate supports delivering the data for the external tables into Azure Blob Storage
as well as into Azure Data Lake Storage (ADLS) Gen2. In either case, the storage location
must be accessible from the Replicate server, and Replicate obviously must have write access as well.
Further, in order for Databricks to be able to access the data, the storage that Replicate
writes to needs to be mounted on the Databricks File System (DBFS).

![Databricks Azure Storage Options Image]({{ "/images/databricks/databricks-azure-storage-options.png" | prepend: base }}){: .center-image }

Replicate only supports writing data to Blob Storage when Replicate is running on a 
Windows Server. This tutorial is running on Linux, so
`Azure Data Lake Storage (ADLS) Gen2` is our only option. Select that.

> Note: the *Spark Config* section of you Databricks cluster configuration must contain the line
"spark.hadoop.hive.server2.enable.doAs false" when using ADLS Gen2 storage. We walked through
this configuration in the previous 'Prepare Databricks for Data Delivery' section.

![Databricks Azure adlsGen2 Config Image]({{ "/images/databricks/databricks-azure-adlsGen2-config.png" | prepend: base }}){: .center-image }

Fill in the blanks related to ADLS Gen2 storage with information specific to your 
Azure subscription. We worked through how to configure and obtain this information
in the previous 'Configure Azure Data Lake Gen2 Storage' section.

* **Storage account**: specify the name of your ADLS Gen2 storage account
* **Azure Active Directory ID**: specify your Azure Active Directory (tenant) ID 
* **Azure Active Directory application ID**: specify the Azure Active Directory application (client) ID
* **Azure Active Directory application key**: specify the Azure Active Directory application (client) key
* **File System**: the ADLS Gen2 file system containing your folders and files
* **Target folder**: the folder where we want Replicate to create the data files on ADLS
   > Note: if you specify a folder that does not exist, Replicate will create it for you. You
    may also press `Browse` to find directories in your file system that you may choose from. If 
    you created a directory as the tutorial suggested in the 'Configure Azure Data Lake Gen2 Storage'
    section, you will see that directory listed when you press browse.

![Databricks Azure adlsGen2 Config 2 Image]({{ "/images/databricks/databricks-azure-adlsGen2-config-2.png" | prepend: base }}){: .center-image }

#### Amazon S3 Storage Configuration (for Databricks on AWS endpoint)

To optimize delivery into the Databricks on AWS environment, Replicate delivers change data in a
continual series of microbatches that are staged for bulk ingest. You will need to configure the 
Databricks on AWS endpoint to stage the data files in storage provided by your Amazon AWS account.

Replicate supports delivering the data for the external tables into Amazon S3 Storage.
The storage location must be accessible from the Replicate server, and 
obviously Replicate must have write access as well.
Further, in order for Databricks to be able to access the data, the storage that Replicate
writes to needs to be mounted on the Databricks File System (DBFS).

To get started, you will need to configure your own S3 bucket for Replicate to use. 
When you are configuring the bucket, be sure to note the following:

* **Bucket access credentials:** Make a note of the bucket name, region, access key
and secret access key - you will need to provide them to Qlik Replicate.
* **Bucket access permissions:** Qlik Replicate requires read/write/delete
permissions to the Amazon S3 bucket.

Once you have configured your AWS S3 bucket and made note of the credentials, use your
bucket information to populate the `Amazon S3 Storage` section of the GUI.

Note that there are two choices for authentication:

* an access key / secret pair; and
* IAM role-base authentication.

For the tutorial we will use an access key pair. If your organization requires use of IAM
authentication, see the Qlik Replicate User Guide link at the bottom of this page for guidance.

![Databricks AWS Bucket 1 Image]({{ "/images/databricks/databricks-aws-bucket-1.png" | prepend: base }}){: .center-image }


#### Databricks ODBC Access Configuration (for all Databricks endpoints)

Whether you are configured to deliver to Azure Databricks or Databricks on AWS, the next step is
to configure ODBC access. Click on the arrow (`>`) next to "Databricks ODBC Access": 

![Databricks Azure ODBC Config Image]({{ "/images/databricks/databricks-azure-odbc-config.png" | prepend: base }}){: .center-image }

Fill in the blanks with information pertaining to your Databricks subscription. We worked through
how to configure and obtain this information in the previous 'Prepare Databricks for Data Delivery'
section.

* **Host**: specify the host name of the Databricks workspace where the ADLS storage 
containers are mounted
* **Port**: specify the port to use to access the workspace (443 by default)
* **Token:** enter a valid security token for access to Databricks.
* **HTTP Path**: specify the path to the cluster being used
* **Database**: specify the name of the Databricks target database
    > Note: you can `Browse` for existing databases if needed.
* **Mount Path**: specify the mount path to the storage tables. This is the mount path
we created previously.
    > Note that the mount path cannot contain special characters or spaces.

#### Test and Save

Once you have completed configuring the Databricks endpoint, click on `Test Connection`. 
Your screen should look like the following, indicating that your connection succeeded.

![Databricks Azure Success Image]({{ "/images/databricks/databricks-azure-success.png" | prepend: base }}){: .center-image }

Assuming so, click `Save` and the configuration of your Databricks on Azure target endpoint is complete.
Click `Close` to close the window.

For more details about using Databricks as a target, please review the section 

* "Using Microsoft Azure Databricks as a Target" 
* "Using Databricks on AWS as a Target" 

in Chapter 9 "Adding and Managing Target Endpoints" of the
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}

