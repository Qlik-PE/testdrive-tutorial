---
title: Step 3 - Azure Synapse Analytics Target Configuration 
section: Delivering Data into Microsoft Azure Synapse Analytics
tutorialtype: synapse
permalink: /synapse/tutorial/synapse-target.php
---

Now that we have our infrastructure ready to go
we need to configure our Azure Synapse Analytics target endpoint. The process is much 
the same as you saw with the MySQL source, and once again you will note that the 
configuration process is context-sensitive as we move along. 

As before, the first step in the configuration process is to tell Replicate that we want to 
create a new endpoint. If you are back on the main window, you will need to click on 
`Manage Endpoint Connections` button.

![Manage Endpoints Image]({{ "/images/synapse/manage-endpoints.png" | prepend: base }}){: .center-image }

and then press the `+ New Endpoint Connection` button.


![Manage Endpoints Image]({{ "/images/synapse/add-new-endpoint-2.png" | prepend: base }}){: .center-image }

and you will see a window that resembles this:

![New Endpoint Image]({{ "/images/synapse/new-endpoint-2.png" | prepend: base }}){: .center-image }

We will now create a Microsoft Azure Synapse Analytics Target endpoint:
* Replace the text **New Endpoint Connection 1** with something more descriptive
like  `Synapse-Target`,
* make sure the `Target` radio button is selected,
* and then select `Microsoft Azure Synapse Analytics` 
from the dropdown selection box.

![Synapse Azure 1 Image]({{ "/images/synapse/synapse-azure-1.png" | prepend: base }}){: .center-image }


#### Azure Synapse Analytics Access Configuration 

Before we get started, you will first need to override the ODBC driver name on the **Advanced**
tab on the configuration screen.


![Synapse Azure ODBC Config Image]({{ "/images/synapse/synapse-azure-odbc-config.png" | prepend: base }}){: .center-image }

Next we need to configure the connection to our Microsoft Azure Synapse Analytics database.

![Synapse Azure ODBC Config Image]({{ "/images/synapse/synapse-azure-server-config.png" | prepend: base }}){: .center-image }

Fill in the blanks with information pertaining to your Microsoft Azure Synapse Analytics instance.

* **Server name**: The name of the *Dedicated SQL endpoint* for your Azure Synapse Analytics instance.
Qlik Replicate does not support acessing the "Serverless SQL endpont".
* **Authentication method**: `SQL Authentication`. *Active Directory Authentication* is not 
supported from Linux-based hosts.
* **Port**: the port number that your Azure Synapse instance is listening on. The default is `1433`.
* **Username**: the user name that you want Qlik Replicate to use to access Azure Synapse. Note
that this user must have the necessary privileges as described in the 
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}.
* **Password**: the password for the user you specified.
* **Database name**: the name of a **Dedicated SQL Pool** that has been created in your
Microsoft Azure Synapse Analytics instance. As mentioned above, Qlik Replicate does not 
support accessing the Serverless SQL endpoint which obviously also includes the built-in 
Serverless SQL Pool.
* During a replication task, Microsoft Azure Synapse Analytics authenticates itself to the
external data source using an SQL Server Credential. You can either configure Replicate to
create the Credential automatically during runtime (the default) or use an existing Credential. 
In this tutorial, we are going to manually configure a credential for Qlik Replicate to use.
  - `Uncheck` *Automatically create SQL Server credential*
  - Launch the Synapse Studio from the Azure Portal
![Synapse Azure ODBC Config Image]({{ "/images/synapse/synapse-azure-launch-studio.png" | prepend: base }}){: .center-image }
  - Create a new SQL Script 
![Synapse Azure ODBC Config Image]({{ "/images/synapse/synapse-azure-sql-script.png" | prepend: base }}){: .center-image }
  - Enter and Run the following statements:
    + `CREATE MASTER KEY ENCRYPTION BY PASSWORD = 'somepassword';`
    + `CREATE DATABASE SCOPED CREDENTIAL ATTU_REP_MSI_cred WITH IDENTITY = 'Managed Service Identity';`
Be sure you connect to the correct dedicated SQL pool.
![Synapse Azure ODBC Config Image]({{ "/images/synapse/synapse-azure-sql-run.png" | prepend: base }}){: .center-image }


{% include getSynapseCreds.php %}

#### Azure Storage Configuration 

To optimize delivery into the Azure Synapse Analytics environment, Replicate delivers change data in a
continual series of microbatches that are staged for bulk ingest. You will need to configure the 
Microsoft Azure Synapse Analytics on Azure endpoint to stage the data 
files in storage provided by your Azure account.

Replicate supports delivering the data into Azure Blob Storage
as well as into Azure Data Lake Storage (ADLS) Gen2. In either case, the storage location
must be accessible from the Replicate server, and Replicate obviously must have write access as well.

![Synapse Azure Storage Options Image]({{ "/images/synapse/synapse-azure-storage-options.png" | prepend: base }}){: .center-image }

Replicate only supports writing data to Blob Storage when Replicate is running on a 
Windows Server. This tutorial is running on Linux, so
`Azure Data Lake Storage (ADLS) Gen2` is our only option. Select that.

![Synapse Azure adlsGen2 Config Image]({{ "/images/synapse/synapse-azure-adlsGen2-config.png" | prepend: base }}){: .center-image }

Fill in the blanks related to ADLS Gen2 storage with information specific to your 
Azure subscription. We worked through how to configure and obtain this information
in the previous 'Configure Azure Data Lake Gen2 Storage' section.

* **Storage account**: specify the name of your ADLS Gen2 storage account
* **File System**: the ADLS Gen2 Container containing your folders and files
* **Azure Active Directory ID**: specify your Azure Active Directory (tenant) ID 
* **Azure Active Directory application ID**: specify the Azure Active Directory application (client) ID
* **Azure Active Directory application key**: specify the Azure Active Directory application (client) key
* **Access key**: the storage account access key
* **Target folder**: the folder where we want Replicate to create the data files on ADLS
   > Note: if you specify a folder that does not exist, Replicate will create it for you. You
    may also press `Browse` to find directories in your file system that you may choose from. If 
    you created a directory as the tutorial suggested in the 'Configure Azure Data Lake Gen2 Storage'
    section, you will see that directory listed when you press browse.

![Synapse Azure adlsGen2 Config 2 Image]({{ "/images/synapse/synapse-azure-adlsGen2-config-2.png" | prepend: base }}){: .center-image }



#### Test and Save

Once you have completed configuring the Azure Synapse Analytics endpoint, click on `Test Connection`. 
Your screen should look like the following, indicating that your connection succeeded.

![Synapse Azure Success Image]({{ "/images/synapse/synapse-azure-success.png" | prepend: base }}){: .center-image }

Assuming so, click `Save` and the configuration of your Microsoft Azure Synapse Analytics 
target endpoint is complete.  Click `Close` to close the window.

For more details about using Azure Synapse Analytics as a target, please review the section 

* "Using Microsoft Azure Synapse Analytics as a Target" 

in Chapter 9 "Adding and Managing Target Endpoints" of the
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}

