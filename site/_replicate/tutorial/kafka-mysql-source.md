---
title: Step 1 - MySQL Source Configuration
section: Streaming Data to Kafka
tutorialtype: replicate
permalink: /replicate/tutorial/kafka-mysql-source.php
---

For this use case, we will simply reuse the MySQL source endpoint that we created in the 
Database-to-Database use case. If you chose to skip the Database-to-Database use case, 
that is fine. Simply navigate to the instructions for creating the 
[MySQL Source Configuration]({{ base }}{% link _replicate/tutorial/db-mysql-source.md %}) 
in the Database-to-Database use case and then return here to continue with this Kafka use case.

![MySQL Source 5 Image]({{ "/images/replicate/mysql-src-5.png" | prepend: base }}){: .center-image }

Feel free to `Test Connection` to ensure that everything is still OK with the MySQL source connection 
if you wish. To do this, click on `Manage Endpoint Connections...` and then select the MySQL source
endpoint. From there you can `Test Connection`.


For more details about using MySQL as a source, please review the section
"Using a MyQL-Based Database as a Source" in Chapter 8 "Adding and Managing Source Endpoints" of the
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}
