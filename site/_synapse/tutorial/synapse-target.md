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
* **Azure Active Directory ID**: specify your Azure Active Directory (tenant) ID 
* **Azure Active Directory application ID**: specify the Azure Active Directory application (client) ID
* **Azure Active Directory application key**: specify the Azure Active Directory application (client) key
* **File System**: the ADLS Gen2 file system containing your folders and files
* **Target folder**: the folder where we want Replicate to create the data files on ADLS
   > Note: if you specify a folder that does not exist, Replicate will create it for you. You
    may also press `Browse` to find directories in your file system that you may choose from. If 
    you created a directory as the tutorial suggested in the 'Configure Azure Data Lake Gen2 Storage'
    section, you will see that directory listed when you press browse.

![Synapse Azure adlsGen2 Config 2 Image]({{ "/images/synapse/synapse-azure-adlsGen2-config-2.png" | prepend: base }}){: .center-image }



#### Azure Synapse Analytics Access Configuration 

![Synapse Azure ODBC Config Image]({{ "/images/synapse/synapse-azure-odbc-config.png" | prepend: base }}){: .center-image }

Fill in the blanks with information pertaining to your Microsoft Azure Synapse Analytics Instance.

{% include getSynapseCreds.php %}


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

