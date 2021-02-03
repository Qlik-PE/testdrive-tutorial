---
title: Step 5 - Run Your Task
section: Delivering Data to Snowflake
tutorialtype: snowflake
permalink: /snowflake/tutorial/run-task.php
---

After you press `Run`, Replicate will automatically switch from **Designer** mode to **Monitor** mode. 
You will be able to watch the status of the full load as it occurs, and then switch to monitoring 
change data capture as well.

![Run Task 1 Image]({{ "/images/snowflake/run-task-1.png" | prepend: base }}){: .center-image }

When **Full Load** is complete, click on the `Completed` bar to display the tables. 

![Run Task 2 Image]({{ "/images/snowflake/run-task-2.png" | prepend: base }}){: .center-image }


There is DML activity running in the background. Click on the `Change Processing` tab to 
see it in action.

![Run Task 3 Image]({{ "/images/snowflake/run-task-3.png" | prepend: base }}){: .center-image }

If you would like to explore the data that we have delviered to Snowflake, you
can view the tables in the Snowflake Console at: https://<yourcompany>.snowflakecomputing.com/console.

![Snowflake Console 1 Image]({{ "/images/snowflake/sf-console-1.png" | prepend: base }}){: .center-image }

![Snowflake Console 2 Image]({{ "/images/snowflake/sf-console-2.png" | prepend: base }}){: .center-image }

![Snowflake Console 3 Image]({{ "/images/snowflake/sf-console-3.png" | prepend: base }}){: .center-image }

Feel free to explore the structure, etc. associated with the tables we have created. If you look
at the structure for the Player table, you will see that the additional column, **fullName** 
that we added to the table as a part of our transformation is present in the table here.

Once you are done exploring the data, you can stop your task by pressing the `Stop` button at
the top of the page.

![Stop Task 1 Image]({{ "/images/snowflake/stop-task-1.png" | prepend: base }}){: .center-image }

Now that we have our change data streaming into Snowflake, you are probably wondering about
how to make that data analytics-ready. Click `Next` below to get an answer to that question.

