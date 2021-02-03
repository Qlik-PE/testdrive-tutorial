---
title: Step 2 - Kafka Target Configuration
section: Streaming Data to Kafka
tutorialtype: replicate
permalink: /replicate/tutorial/kafka-target.php
---

Next we need to configure our Kafka target endpoint. The process is much the same as you saw 
with the endpoints, and once again you will note that the configuration process is
context-sensitive as we move along.

As before, the first step in the configuration process is to tell Replicate that we want to 
create a new endpoint. If you are back on the main window, you will need to click on 
`Manage Endpoint Connections` button.

![Manage Endpoints Image]({{ "/images/replicate/manage-endpoints.png" | prepend: base }}){: .center-image }

and then press the `+ New Endpoint Connection` button.


![Manage Endpoints Image]({{ "/images/replicate/add-new-endpoint-2.png" | prepend: base }}){: .center-image }

and you will see a window that resembles this:

![New Endpoint Image]({{ "/images/replicate/new-endpoint.png" | prepend: base }}){: .center-image }

We will now create a Kafka Target endpoint:
* Replace the text **New Endpoint Connection 1** with something more descriptive
like  `Kafka JSON Target`,
* make sure the `Target` radio button is selected,
* and then select `Kafka` from the dropdown selection box.

![Kafka Target 1 Image]({{ "/images/replicate/kafka-trg-1.png" | prepend: base }}){: .center-image }

![Kafka Target 2 Image]({{ "/images/replicate/kafka-trg-2.png" | prepend: base }}){: .center-image }

![Kafka Target 3 Image]({{ "/images/replicate/kafka-trg-3.png" | prepend: base }}){: .center-image }

![Kafka Target 4 Image]({{ "/images/replicate/kafka-trg-4.png" | prepend: base }}){: .center-image }

![Kafka Target 5 Image]({{ "/images/replicate/kafka-trg-5.png" | prepend: base }}){: .center-image }

Fill in the blanks as indicated in the images above:
* Broker servers: `kafka:29092`
* Security/Use SSL: `NOT checked`
* Security/Authentication: `None`
* Message Properties/Format: `JSON`
* Message Properties/Compression: `None`
* Data Message Publishing/Specific topic: `testdrive`
* Data Message Publishing/Partition strategy: `By message key`
* Data Message Publishing/Message key: `Primary key columns`
* Metadata Message Publishing/Publish: `Do not publish metadata messages`
* Metadata Message Publishing/Wrap data...: `NOT checked`

and then click on `Test Connection`. Your screen should look like the following, indicating that
your connection succeeded.

![Kafka Target 6 Image]({{ "/images/replicate/kafka-trg-6.png" | prepend: base }}){: .center-image }


Assuming so, click `Save` and the configuration of your Kafka target endpoint is complete.
Click `Close` to close the window.

For more details about using Kafka as a target, please review the section 
"Using Kafka as a Target" in Chapter 9 "Adding and Managing Target Endpoints" of the
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}



