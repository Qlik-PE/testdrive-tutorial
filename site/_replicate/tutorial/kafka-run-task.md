---
title: Step 4 - Run Your Task
section: Streaming Data to Kafka
tutorialtype: replicate
permalink: /replicate/tutorial/kafka-run-task.php
---

When you press `Run`, Replicate will automatically switch from **Designer** mode to **Monitor** mode. 
You will be able to watch the status of the full load as it occurs, and then switch to monitoring 
change data capture as well.

![Kafka Task 9 Image]({{ "/images/replicate/kafka-task-9.png" | prepend: base }}){: .center-image }

After **Full Load** is complete, click on the `Completed` bar to display the tables. 
There is DML activity running in the background. Click on the `Change Processing` tab to 
see it in action.

> Note: Changes to the tables occur somewhat randomly in the background. You may need to wait a
few minutes before you will see changes appear in the tables that we selected. 

![Kafka Task 10 Image]({{ "/images/replicate/kafka-task-10.png" | prepend: base }}){: .center-image }

If you would like to see some of the messages we are delivering to Kafka, click on the following link:

<div id="kafkaurl" align="center" style="font-size:30px"></div>
<script type="text/javascript">{% include getKafkaURL.js %}</script>

This link will open a tool that will allow you to browse the topics in the Kafka broker
and display messages within those topics.

![Kafkdrop Image 1]({{ "/images/replicate/kafdrop-1.png" | prepend: base }}){: .center-image }

First you will need to log in:

* User Name: `admin`
* Password: {% include getPassword.php %}

![Kafkdrop Image 2]({{ "/images/replicate/kafdrop-2.png" | prepend: base }}){: .center-image }

On this screen, you get a hint as to why we renamed our target schemas. In this environment, we
have delivered the same data from different tasks using both JSON- and Avro-formatted messages.
Knowing which topics are which will be helpful as we browse message content.

![Kafkdrop Image 3]({{ "/images/replicate/kafdrop-3.png" | prepend: base }}){: .center-image }

As an example, select the `Player` topic (JSON or avro) depending on what you have
configured and then select `View Messages`.

Depending on the message format you selected, you may need to change the configuration
settings in the message browser for the topic appropriately.

![Kafkdrop Image 4a]({{ "/images/replicate/kafdrop-4a.png" | prepend: base }}){: .center-image }

If your messages were delivered to the schema registry using Avro, then you will need to
select `Avro` for the message format. If you opted to configure the key format as
Avro as well, you will need to select the key format as Avro. Otherwise leave it as the default.

![Kafkdrop Image 4j]({{ "/images/replicate/kafdrop-4j.png" | prepend: base }}){: .center-image }

If your messages were delivered as JSON payloads, then you can take the defaults.

![Kafkdrop Image 5]({{ "/images/replicate/kafdrop-5.png" | prepend: base }}){: .center-image }

In either case, you can move around the topic by changing the offset and pressing
`View Messages`.

![Kafkdrop Image 6]({{ "/images/replicate/kafdrop-6.png" | prepend: base }}){: .center-image }

You can expand a message to make it more readable by clicking on the 
green badge beside each message.

When you have seen enough, you can declare Victory! for this part of the Test Drive. Press `Stop`
in the top left corner of the **Replicate** console to end the task. After pressing `Stop` and clicking 
`Yes` in the confirmation dialog, close the **MySQL to Kafka** tab or click 
on the `TASKS` tab to return to the main window.

![Kafka Task 11 Image]({{ "/images/replicate/kafka-task-11.png" | prepend: base }}){: .center-image }

### Summary
You just:
* Defined access and authentication into a MySQL source and a Kafka target 
* Defined the source tables from which you want to create Kafka messages
* Configured the MySQL to Kafka task
* Captured  initial data from the source without while maintaining business continuity
  (DML activity was going on in the background to simulate users working on the source database)
* Automatically created kafka messages from the initial table state
* Captured all new transactions which were happening while the initial load was running 
* Turned ll net new data into Kafka messages
* Observed change data being recorded as it is sent to and applied at the  target 

All that in 4 easy steps!

You can now move on to the next part of the Test Drive.


