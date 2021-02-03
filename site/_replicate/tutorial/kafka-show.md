---
title: Display Kafka Messages
section: Streaming Data to Kafka
tutorialtype: replicate
permalink: /replicate/tutorial/kafka-show.php
layout: no-nav-secure
---

Here are the 200 most recent messages that were delivered to Kafka displayed using 
the Kafka "Console Consumer". Messages are deserialized as raw text, but as you can 
see the data is in JSON format as we configured in the Replicate task.


<td>
   <div style="height:400px; background-color: #e9e9e9; overflow:auto; color:black; font-size:15px; font-family:'Courier New',monospace">
      {% raw %}
      <?php
         $kafkaopts="export KAFKA_OPTS='-XX:-AssumeMP'";
         $cmd="/opt/kafka*/bin/kafka-run-class.sh kafka.tools.GetOffsetShell --broker-list kafka:29092 --topic testdrive";
         $msgcount=200;
         $offset=exec("$kafkaopts; $cmd");
         $offset=substr($offset, strrpos($offset, ':')+1);
         $offset=$offset-$msgcount;

         /* Add redirection so we can get stderr. */
         $cmd="/opt/kafka*/bin/kafka-console-consumer.sh --bootstrap-server kafka:29092  --topic testdrive --offset ${offset} --max-messages ${msgcount} --partition 0 2>&1";
         $handle = popen("$kafkaopts;$cmd", 'r');

         while (!feof($handle)) {
            $output = fread($handle, 2096);
            echo(nl2br($output));
            ob_flush();
            flush();
         }
         pclose($handle);
      ?>
      {% endraw %}
   </div>
</td>
<br>

