---
title: Step 6 - Run Your Task
section: Delivering Data into Microsoft Azure Synapse Analytics
tutorialtype: synapse
permalink: /synapse/tutorial/run-task.php
---

After you press `Run`, Replicate will automatically switch from **Designer** mode to **Monitor** mode. 
You will be able to watch the status of the full load as it occurs, and then switch to monitoring 
change data capture as well.

![Run Task 1 Image]({{ "/images/synapse/run-task-1.png" | prepend: base }}){: .center-image }

When **Full Load** is complete, click on the `Completed` bar to display the tables. 

![Run Task 2 Image]({{ "/images/synapse/run-task-2.png" | prepend: base }}){: .center-image }


There is DML activity running in the background. Click on the `Change Processing` tab to 
see it in action.

![Run Task 3 Image]({{ "/images/synapse/run-task-3.png" | prepend: base }}){: .center-image }

When you have seen enough, press `Stop` in the top left corner of the window to end the task. 
After pressing `Stop` and clicking `Yes` in the confirmation dialog, 
close the MySQL-to-Synapse tab or click on the TASKS tab to return to the main window.

![Run Task 4 Image]({{ "/images/synapse/run-task-4.png" | prepend: base }}){: .center-image }


If you would like to explore the data that we have delivered to Azure Synapse, you
can view the tables in the Azure Synapse Studio.

Select `Data` from the left side of the screen.

![Synapse Data 1 Image]({{ "/images/synapse/synapse-data-1.png" | prepend: base }}){: .center-image }

Select the database we are writing to:

![Synapse Data 2 Image]({{ "/images/synapse/synapse-data-2.png" | prepend: base }}){: .center-image }

and expand `Tables`.

![Synapse Data 2a Image]({{ "/images/synapse/synapse-data-2a.png" | prepend: base }}){: .center-image }

Now select the ellipsis `...` (Actions) next to the `player` table.

![Synapse Data 3 Image]({{ "/images/synapse/synapse-data-3.png" | prepend: base }}){: .center-image }

and select `New SQL script > Select TOP 100 rows`.

![Synapse Data 3a Image]({{ "/images/synapse/synapse-data-3a.png" | prepend: base }}){: .center-image }


If you scroll all the way to the right in the results window, you will see the
_fullName_ column that we created in the transformation.

![Synapse Data 4 Image]({{ "/images/synapse/synapse-data-4.png" | prepend: base }}){: .center-image }

Feel free to explore the structure, etc. associated with the tables we have created. 
Please note, though, that while change tables were created for every table, real-time changes 
only occurred on a subset of the tables. Most of the change tables will report that they are
empty.

Now that we have our change data streaming into Microsoft Azure Synapse Analytics, you are probably 
wondering about
how to make that data analytics-ready. Click `Next` below to get an answer to that question.

