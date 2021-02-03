---
title: Keeping Your ODS Up-to-Date
section: Delivering Data to Delta Lake
tutorialtype: databricks
permalink: /databricks/tutorial/compose-info.php
---

While many organizations derive immediate value from the Databricks platform, 
numerous enterprises seek to further reduce data pipeline bottlenecks and increase 
workflow productivity. Moreover, improving Databricks pipelines dramatically 
shortens the time to insights for this modern data lake platform. Qlik has a 
dedicated solution to help you in this regard.

#### Qlik Data Integration Platform for Managed Data Lakes

Once Qlik Replicate is actively streaming data from your source applications into your 
Databricks Delta Lake, then you can use Qlik Compose for Data Lakes to further 
improve workflow productivity. Compose automates the creation and loading of Delta 
Lake Operational Data Stores (ODS) without additional hand coding. It’s model-driven 
visual approach automates the time-consuming tasks of building and maintaining an 
efficient data pipeline, as well as the transformation of enterprise data within them. 

Additionally, as your Databricks environment changes over time, Compose will 
manage those changes, performing schema evolution directly into your Delta Lake. 
Furthermore, Compose also provides metadata management capabilities for data lineage 
that help enterprise users understand, utilize and trust their data as it flows into, 
and is transformed within, their data lake pipeline.

#### User Interface

Compose provides an intuitive interface for developers to provision and maintain 
their Delta Lake. It is divided into two sections: Connections and Storage Zone. 
Each section plays a critical role in the automation of your Databricks Delta Lake.

![Compose 01 Image]({{ "/images/databricks/compose-01.png" | prepend: base }}){: .center-image }

##### Connections

In the Landing and Storage Connections tab you will define the connection to your 
Databricks Delta Lake and the source systems for the warehouse. 

![Compose 02 Image]({{ "/images/databricks/compose-02.jpg" | prepend: base }}){: .center-image }

##### Model & Metadata

Tables for your Delta Lake can be generated directly from your Replicate landing, 
importing the metadata directly in the Compose GUI. 

![Compose 03 Image]({{ "/images/databricks/compose-03.jpg" | prepend: base }}){: .center-image }

![Compose 04 Image]({{ "/images/databricks/compose-04.jpg" | prepend: base }}){: .center-image }

The Compose model describes the entities clearly and eliminates defining tables 
manually. When the tables are is deployed, Compose for Data Lakes will automatically 
create the physical tables for the data in Databricks Delta, and maintain them 
with schema evolution.

![Compose 05 Image]({{ "/images/databricks/compose-05.jpg" | prepend: base }}){: .center-image }

![Compose 06 Image]({{ "/images/databricks/compose-06.jpg" | prepend: base }}){: .center-image }

And the scripts are stored and available for review.

![Compose 06a Image]({{ "/images/databricks/compose-06a.jpg" | prepend: base }}){: .center-image }


##### Storage Tasks

Compose defines initial load and change data capture storage tasks that define 
mappings of how data will be loaded and transformed as it is ingested into the 
data lake. 

![Compose 07 Image]({{ "/images/databricks/compose-07.jpg" | prepend: base }}){: .center-image }

Though most data lakes are raw data, Compose for Data Lakes enables common lookups 
and transformations to help transform the lake from a raw to ready state.

![Compose 07a Image]({{ "/images/databricks/compose-07a.jpg" | prepend: base }}){: .center-image }

For each storage task, a complete set of set-based scalar spark load routines 
are generated. Dependencies and parallel processing are handled automatically.

![Compose 08 Image]({{ "/images/databricks/compose-08.jpg" | prepend: base }}){: .center-image }


#### Operationalizing the Data Lake

These sets can be operationalized in workflow processes that fit the loading patterns 
of your organization.  

![Compose 09 Image]({{ "/images/databricks/compose-09.jpg" | prepend: base }}){: .center-image }


Qlik Enterprise Manager is the centralized control center that provides a 
“single pane of glass” to configure, execute and monitor data replication, 
data warehouse automation and data lake transformation tasks across an entire 
organization. In addition, the automated metadata management and data lineage 
capabilities help you understand the origin of the data, how it is transformed 
and how it flows through the data lake pipeline.

![Compose 10 Image]({{ "/images/databricks/compose-10.jpg" | prepend: base }}){: .center-image }

#### Next Step: Contact Us for a Demonstration

Although Qlik Compose for Data Lakes is not available for hands-on use in this test
drive we are happy to offer a personalized demonstration upon request. Use the
[Contact us](https://www.qlik.com/us/try-or-buy/buy-now?campaignid=7013z000000jSeg){:target="_blank" rel="noopener noreferrer"}
form to schedule your Compose demo, ask questions, or send feedback.
