---
title: Step 2 - Configure Azure Data Lake Gen2 Storage
section: Delivering Data into Microsoft Azure Synapse Analytics
tutorialtype: synapse
permalink: /synapse/tutorial/config-adlsgen2.php
---

The next step from a Replicate perspective is to create an Azure Synapse Analytics target endpoint.
Replicate stages data by writing it to files in Azure storage.
Before we can configure our Replicate target endpoint, however, we must be sure that our
infrastructure on Azure is configured as needed to support this.

First we need to set up the storage Replicate will use to map data into Azure Synapse Analytics. 
For this tutorial we will use 2nd generataion Azure Data Lake Storage (ADLS-2) 
to manage the external tables.

#### Create an ADLS-2 Storage Account
If you do not already have an ADLS-2 storage account we need to create one now. Otherwise 
you can skip forward to the next section. 

From your Azure portal home page, click on `Storage Accounts`.

![Azure ADLS Config 1 Image]({{ "/images/synapse/azure-adls2-config-1.png" | prepend: base }}){: .center-image }

and click `+ Add`:

![Azure ADLS Config 2 Image]({{ "/images/synapse/azure-adls2-config-2.png" | prepend: base }}){: .center-image }

Select your subscripton and an existing resource group, or select `Create new` to create a new one.
Next choose a name for your storage account and a location. For `Account kind` be sure that it says
`StorageV2 (general purpose v2)`. The type of Replication does not matter for the tutorial, so
take the default:

![Azure ADLS Config 3 Image]({{ "/images/synapse/azure-adls2-config-3.png" | prepend: base }}){: .center-image }

and click `Next: Networking` at the bottom of the page.

For this tutorial, we want to follow the path of least resistance from a security perspective,
so choose the radio button `Public endpoint (all networks)`. 

![Azure ADLS Config 4 Image]({{ "/images/synapse/azure-adls2-config-4.png" | prepend: base }}){: .center-image }

and click `Next: Advanced` at the bottom of the page.

On the `Advanced` tab, we want to be sure that Data Lake Storage Gen2 "Hierarchical namespace" is
`Enabled`.

![Azure ADLS Config 5 Image]({{ "/images/synapse/azure-adls2-config-5.png" | prepend: base }}){: .center-image }

Configuration is complete. Press `Review + create` at the bottom of the page. Azure will validate
what you have configured.

![Azure ADLS Config 6 Image]({{ "/images/synapse/azure-adls2-config-6.png" | prepend: base }}){: .center-image }

Assuming you configuration passed the validation step, press `Create` at the bottom of the page.
It will take Azure a few minutes to create your storage account.

#### Create an Active Directory "App Registration"

Now we need to create an Azure "App Registration" with appropriate permssions that Replicate
will use when writing data to ADLS-2 storage. From the Azure portal home page, click
on `Azure Active Directory`.

![Azure ADLS Config 7 Image]({{ "/images/synapse/azure-adls2-config-7.png" | prepend: base }}){: .center-image }

and click on `App registrations` on the left side of the screen.

![Azure ADLS Config 8 Image]({{ "/images/synapse/azure-adls2-config-8.png" | prepend: base }}){: .center-image }

and from "App registrations" click `+ New registration`

![Azure ADLS Config 9 Image]({{ "/images/synapse/azure-adls2-config-9.png" | prepend: base }}){: .center-image }

Choose a name for your App and press `Register` at the bottom of the page. You do not need to enter 
anything for the "Redirect URI". It is optional and not required in this case.

![Azure ADLS Config 10 Image]({{ "/images/synapse/azure-adls2-config-10.png" | prepend: base }}){: .center-image }

Registration is almost immediate. Make note of the location of the 
"Application (client) ID" and "DIrectory (tenant) ID" fields at the top of the page. 
You will need this information later when configuring Replicate. 

Next, we need to grant this application some basic permissions. Click on 
`API permissions` on the left side of the page.

![Azure ADLS Config 11 Image]({{ "/images/synapse/azure-adls2-config-11.png" | prepend: base }}){: .center-image }

and select `+ Add a permission` followed by `Azure Data Lake` under "Microsoft APIs" on the right
side of the screen.

![Azure ADLS Config 12 Image]({{ "/images/synapse/azure-adls2-config-12.png" | prepend: base }}){: .center-image }

From there, tic `user_impersonation` under  "Delegated permissions" and then press 
`Add permissions` at the bottom of the page.

![Azure ADLS Config 13 Image]({{ "/images/synapse/azure-adls2-config-13.png" | prepend: base }}){: .center-image }

Now we need to create a "secret" (essentially a password) for this API. Click on 
`Certificates & secrets` on the left side of the screen.

![Azure ADLS Config 14 Image]({{ "/images/synapse/azure-adls2-config-14.png" | prepend: base }}){: .center-image }

and click on `+ New client secret`.

![Azure ADLS Config 15 Image]({{ "/images/synapse/azure-adls2-config-15.png" | prepend: base }}){: .center-image }

Enter a descrpition, choose an expiration, and press `Add`.

![Azure ADLS Config 16 Image]({{ "/images/synapse/azure-adls2-config-16.png" | prepend: base }}){: .center-image }

> **IMPORTANT NOTE**: you must save the value of the secret you created before you leave this
page. You will not be able to retrieve it again later.

![Azure ADLS Config 17 Image]({{ "/images/synapse/azure-adls2-config-17.png" | prepend: base }}){: .center-image }

#### Final Configuration of the ADLS-2 Storage Account

Now that we have created the App Registration, we need to return to the ADLS-2 storage
account and do a couple of additional things. Use the breadcrumbs at the top of the page
to return to the Azure Portal home page and then drill in to get back to the 
storage account we created.

First, we need to create a "file system" for us to use for the tutorial. Select `Containers`
on the left side of the storage account screen.

![Azure ADLS Config 18 Image]({{ "/images/synapse/azure-adls2-config-18.png" | prepend: base }}){: .center-image }

and then select `+ File system` at the top of the page.

![Azure ADLS Config 19 Image]({{ "/images/synapse/azure-adls2-config-19.png" | prepend: base }}){: .center-image }

Enter a name for the file system and press `OK` to save it.

![Azure ADLS Config 20 Image]({{ "/images/synapse/azure-adls2-config-20.png" | prepend: base }}){: .center-image }

As a final step, we need to grant access to the storage account to the "App" that we created / 
registered previously. Click on `Access control (IAM)` on the left side of the page.

![Azure ADLS Config 21 Image]({{ "/images/synapse/azure-adls2-config-21.png" | prepend: base }}){: .center-image }

Click on "Add a role assignment".

![Azure ADLS Config 22 Image]({{ "/images/synapse/azure-adls2-config-22.png" | prepend: base }}){: .center-image }

and on the right side of the screen select:

* *Role*: `Storage Blob Data Contributor`
* *Assign access to*: `Azure AD user, group, or service principal
* *Select*: enter the name of the App you registered previously.

and press `Save` at the bottom of the page.


![Azure ADLS Config 23 Image]({{ "/images/synapse/azure-adls2-config-23.png" | prepend: base }}){: .center-image }

#### Create a Target Directory in the File System

To complete this part of the tutorial, you will need to create a target directory where
Replicate will deliver data.

To get started, go to your ADLS-2 storage account and click on `Storage Explorer (preview)`.



![Azure ADLS Config 24 Image]({{ "/images/synapse/azure-adls2-config-24.png" | prepend: base }}){: .center-image }

From there click on `> FILE SYSTEMS` to expand it and select the file system you are
using for this tutorial.

![Azure ADLS Config 25 Image]({{ "/images/synapse/azure-adls2-config-25.png" | prepend: base }}){: .center-image }

Now click on `+ New Folder`.

![Azure ADLS Config 26 Image]({{ "/images/synapse/azure-adls2-config-26.png" | prepend: base }}){: .center-image }

and then enter a Folder Name and press `OK`.

![Azure ADLS Config 27 Image]({{ "/images/synapse/azure-adls2-config-27.png" | prepend: base }}){: .center-image }

![Azure ADLS Config 28 Image]({{ "/images/synapse/azure-adls2-config-28.png" | prepend: base }}){: .center-image }

In the next section we will configure Azure Synapse Analytics to make use of this storage 
and make it ready to ingest data delivered by Replicate.

