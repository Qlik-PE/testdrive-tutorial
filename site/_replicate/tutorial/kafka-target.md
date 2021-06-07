---
title: Step 2 - Kafka Target Configuration
section: Streaming Data to Kafka
tutorialtype: replicate
permalink: /replicate/tutorial/kafka-target.php
---

Next we need to configure our Kafka target endpoint. The process is much the same as you saw 
with the previous endpoints, and once again you will note that the configuration process is
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
like  `Kafka-JSON` or `Kafka-Avro` depending on the message format you intend to
configure. If you are not sure at this point, a simple `Kafka Target` will do fine.
* Make sure the `Target` radio button is selected.
* Select `Kafka` from the dropdown selection box.

### Configuring Replicate to Deliver JSON-Formatted Messages

If you want to deliver messages in JSON format, follow these steps.

![Kafka Target 1j Image]({{ "/images/replicate/kafka-trg-1j.png" | prepend: base }}){: .center-image }

![Kafka Target 2j Image]({{ "/images/replicate/kafka-trg-2j.png" | prepend: base }}){: .center-image }

![Kafka Target 3j Image]({{ "/images/replicate/kafka-trg-3j.png" | prepend: base }}){: .center-image }

![Kafka Target 4j Image]({{ "/images/replicate/kafka-trg-4j.png" | prepend: base }}){: .center-image }

![Kafka Target 5j Image]({{ "/images/replicate/kafka-trg-5j.png" | prepend: base }}){: .center-image }

Fill in the blanks as indicated in the images above:
* Broker servers: `kafka:29092`
* Security/Use SSL: `NOT checked`
* Security/Authentication: `None`
* Message Properties/Format: `JSON`
* Message Properties/Compression: `None`
* Data Message Publishing: `Separate topic for each table`
* Data Message Publishing/Partition strategy: `By message key`
* Data Message Publishing/Message key: `Primary key columns`
* Metadata Message Publishing/Publish: `Do not publish metadata messages`
* Metadata Message Publishing/Wrap data...: `NOT checked`

and then click on `Test Connection`. Your screen should look like the following, indicating that
your connection succeeded.

![Kafka Target 6j Image]({{ "/images/replicate/kafka-trg-6j.png" | prepend: base }}){: .center-image }


Assuming so, click `Save` and the configuration of your Kafka target endpoint is complete.
Click `Close` to close the window.

### Configuring Replicate to Deliver Avro-Formatted Messages

If you want to deliver messages in Avro format, follow these steps.

![Kafka Target 1a Image]({{ "/images/replicate/kafka-trg-1a.png" | prepend: base }}){: .center-image }

![Kafka Target 2a Image]({{ "/images/replicate/kafka-trg-2a.png" | prepend: base }}){: .center-image }

![Kafka Target 3a Image]({{ "/images/replicate/kafka-trg-3a.png" | prepend: base }}){: .center-image }

> Note above that when you select `Avro` as the message format there are options associated with
whether or not to use an Avro feature called *Logical Data Types* and whether or not to
encode the message key in Avro format. The remainder of the tutorial assumes that you will 
leave them unchecked. However, selecting these options will not adversely impact execution, so
you may select them if you choose.

![Kafka Target 4a Image]({{ "/images/replicate/kafka-trg-4a.png" | prepend: base }}){: .center-image }

![Kafka Target 5a Image]({{ "/images/replicate/kafka-trg-5a.png" | prepend: base }}){: .center-image }

Fill in the blanks as indicated in the images above:
* Broker servers: `kafka:29092`
* Security/Use SSL: `NOT checked`
* Security/Authentication: `None`
* Message Properties/Format: `Avro`
* Message Properties/Compression: `None`
* Data Message Publishing: `Separate topic for each table`
* Data Message Publishing/Partition strategy: `By message key`
* Data Message Publishing/Message key: `Primary key columns`
* Metadata Message Publishing/Publish: `Publish data schemas to the Confluent Schema Registry`
* Schema Registry server(s): `sreghost:8081`
* Authentication: `None`
* Subject compatibility mode: `Use Schema Registry defaults`. 

> You may notice that Replicate supports the full suite of compatibility 
modes available in the Confluent Schema Registry.  The tutorial does 
not involve schema evolution tasks, so the selection here is more or less moot.

and then click on `Test Connection`. Your screen should look like the following, indicating that
your connection succeeded.

![Kafka Target 6a Image]({{ "/images/replicate/kafka-trg-6a.png" | prepend: base }}){: .center-image }


Assuming so, click `Save` and the configuration of your Kafka target endpoint is complete.
Click `Close` to close the window.

### For More Detailed Information

For more details about using Kafka as a target, please review the section 
"Using Kafka as a Target" in Chapter 9 "Adding and Managing Target Endpoints" of the
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}



