---
title: Step 2 - Snowflake Target Configuration 
section: Delivering Data to Snowflake
tutorialtype: snowflake
permalink: /snowflake/tutorial/snowflake-target.php
---

Next we need to configure our Snowflake target endpoint. The process is much the same as you saw 
with the MySQL source, and once again you will note that the configuration process is
context-sensitive as we move along. 

As before, the first step in the configuration process is to tell Replicate that we want to 
create a new endpoint. If you are back on the main window, you will need to click on 
`Manage Endpoint Connections` button.

![Manage Endpoints Image]({{ "/images/snowflake/manage-endpoints.png" | prepend: base }}){: .center-image }

and then press the `+ New Endpoint Connection` button.


![Manage Endpoints Image]({{ "/images/snowflake/add-new-endpoint-2.png" | prepend: base }}){: .center-image }

and you will see a window that resembles this:

![New Endpoint Image]({{ "/images/snowflake/new-endpoint-2.png" | prepend: base }}){: .center-image }

We will now create a Snowflake Target endpoint:
* Replace the text **New Endpoint Connection 1** with something more descriptive
like  `Snowflake-Target`,
* make sure the `Target` radio button is selected,
* and then select `Snowflake on AWS`  or `Snowflake on Azure` or
`Snowflake on Google` from the dropdown selection box.

![Snowflake AWS 1 Image]({{ "/images/snowflake/snowflake-aws-1.png" | prepend: base }}){: .center-image }

The screenshots that follow were taken from a Snowflake on AWS configuration, but the process 
is the same for Azure and Google.

![Snowflake AWS 2 Image]({{ "/images/snowflake/snowflake-aws-2.png" | prepend: base }}){: .center-image }

Fill in the blanks using the following parameters:

{% include getSnowflakeCreds.php %}

Now click on the arrow (`>`) next to "Staging": 

Your options on AWS look like this:

![Snowflake AWS 3 Image]({{ "/images/snowflake/snowflake-aws-3.png" | prepend: base }}){: .center-image }

and your options on Azure look like this:

![Snowflake Azure 3 Image]({{ "/images/snowflake/snowflake-azure-3.png" | prepend: base }}){: .center-image }

To optimize delivery into the Snowflake environment, Replicate delivers change data in a
continual series of microbatches that are staged for bulk ingest. You can configure the 
Snowflake on AWS endpoint to stage the data files on Snowflake 
(i.e. internally) or on Amazon S3. Similarly you can configure the Snowflake on Azure endpoint
to stage data on Azure Blob Storage or on Snowflake directly.

#### Configuring Replicate to Use Snowflake Internal Staging

For simplicity, we recommend that you select `Snowflake` for the staging option to make use of 
Snowflake internal stage. Note also that use of internal staging is what Snowflake recommends
as well.  See the section that follows if you want to 
try your hand at configuring Replicate to to use external staging of data, see the sections 
that follow.

To make use of Snowflake internal staging, simply select

* `o Snowflake`

and you are ready to go. 

> Note: at the present time, Replicate does not support use of external staging
when delivering data to Snowflake on Azure. If this is your target, you must configure to use
internal staging.

> Note: at the present time, Replicate does not support use of Snowflake internal
staging when delivering to Snowflake on Google. We will be supporting use of internal 
staging in an upcoming release. For the time being, you will need to configure Replicate
to use external staging when delivering to this endpoint.

#### Configuring Replicate to Use AWS S3 External Staging

If you are planning to stage the data in an AWS S3 bucket, you will first need to configure
your own bucket for Replicate to use. When you are configuring the bucket, be sure to 
note the following: 

* **Bucket access credentials:** Make a note of the bucket name, region, access key
and secret access key - you will need to provide them to Qlik Replicate.
* **Bucket access permissions:** Qlik Replicate requires read/write/delete
permissions to the Amazon S3 bucket.

Once you have configured your AWS S3 bucket and made note of the credentials, click on the

* `o AWS S3`

radio button and a context-specific form will appear.  Note that there are two 
choices for authentication: 

* an access key / secret pair; and
* IAM role-base authentication.

For the tutorial we will use an access key pair. If your organization requires use of IAM 
authentication, see the Qlik Replicate User Guide link at the bottom of this page for guidance.

![Snowflake AWS Bucket 1 Image]({{ "/images/snowflake/snowflake-aws-bucket-1.png" | prepend: base }}){: .center-image }

#### Configuring Replicate to Use Azure Blob Storage

Azure Blob Storage is currently only supported when Replicate is running on a Windows server.
As such, it cannot be configured in this tutorial since this
environment is hosted on Linux. The Replicate User Guide provides information
on configuring staging data in Azure Blob Storage should you be interested.

#### Configuring Replicate to Use Google Cloud Storage

##### Configure Your Google Cloud Storage Bucket

To use Google Cloud Storage for Snowflake external staging, you will first need to configure
your own bucket for Replicate to use. When you are configuring the bucket, be sure to
note the following:

* **Bucket access credentials:** You will need to create a GCP service account that has
read and write access to your storage bucket. Be sure to make note of and save the JSON key
that is generated when you create the service account. You will need to provide this key
to Qlik Replicate.
* **Bucket access permissions:** Qlik Replicate requires read and write
permissions on the Google Cloud Storage bucket.

##### Configure a Snowflake Storage Integration Name

Now that you have configured your Google Cloud Storage bucket and made note of the credentials, 
you will need to tell Snowflake about it. You will need to configure what is called a *Storage 
Integration Name* in Snowflake. This integration lets us avoid the need for passing explicit
cloud provider credentials such as secret keys or access tokens; instead, integration
objects reference a Google Cloud Storage service account.

For more information on creating a storage integration name, see
[Configuring an Integration for Google Cloud Storage](https://docs.snowflake.com/en/user-guide/data-load-gcs-config.html){:target="_blank"}

##### Configure Replicate

Once you have configured your Google Cloud Storage bucket and created a Storage Integration Name on 
Snowflake, click on the

* `o Google Cloud Storage`

radio button and a context-specific form will appear. There are four parameters you will need
to fill in:

* **JSON Credentials:** The JSON credentials for the service account key with read and
write access to the Google Cloud Storage bucket.
* **Bucket name:** the name of your Google Cloud Storage bucket.
* **Target Folder:** the name of a subfolder in the bucket where replicate should create
the data files.
* **Storage Integration name:** your storage integration name created in the previous section.

![Snowflake GCP Bucket 1 Image]({{ "/images/snowflake/snowflake-gcp-bucket-1.png" | prepend: base }}){: .center-image }


#### Test and Save

Once you have configured your staging area, click on `Test Connection`. Your screen should 
look like the following, indicating that your connection succeeded.

![Snowflake AWS 4 Image]({{ "/images/snowflake/snowflake-aws-4.png" | prepend: base }}){: .center-image }

Assuming so, click `Save` and the configuration of your Snowflake on AWS target endpoint is complete.
Click `Close` to close the window.

For more details about using Snowflake as a target, please review the sections

* "Using Snowflake on AWS as a Target",
* "Using Snowflake on Azure as a Target", and
* "Using Snowflake on Google as a Target"
 
in Chapter 9 "Adding and Managing Target Endpoints" of the
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}

