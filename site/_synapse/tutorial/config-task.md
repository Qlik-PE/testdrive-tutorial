---
title: Step 4 - Configure Your Task
section: Delivering Data into Microsoft Azure Synapse Analytics
tutorialtype: synapse
permalink: /synapse/tutorial/config-task.php
---

Now that we have configured our MySQL source and Azure Synapse Analytics target 
endpoints, we need to tie 
them together in what we call a Replicate **task**. In short, a task defines the following:

* A source endpoint
* A target endpoint
* The list of tables that we want to capture
* Any transformations we want to make on the data

To get started, we need to create a task. Click on the `+ New Task` button at the top of the screen.

![Create Task 1 Image]({{ "/images/synapse/create-task-1.png" | prepend: base }}){: .center-image }

Once you do, a window like this will pop up:

![Create Task 2 Image]({{ "/images/synapse/create-task-2.png" | prepend: base }}){: .center-image }

Give this task a meaningful name like `MySQL-to-Synapse`. 

Replicate supports two approaches to managing change data:

* _Apply Changes_, which essentially means processing DELETE and UPDATE operations directly; and
* _Store Changes_, which writes the data in a format that somewhat resembles a type-2 slowly changing
dimension and effectively allows records to be post-processed in order.

For the Azure Synapse Analytics target endpoint, the notion of processing a DELETE or UPDATE does not 
really apply because the "tables" that we are writing to are actually files, very similar
in fact to how Hadoop/Hive manage tables. Consequently, for Azure Synapse Analytics we need to disable 
`Apply Changes` and select `Store Changes` instead.

For this task we will configure as follows:

* Name: `MySQL-to-Synapse`
* `Unidirectional`
* Full Load: `enabled` _(Blue highlight is enabled; click to enable / disable.)_
* Apply Changes: `disabled` _(Blue highlight is enabled; click to enable / disable.)_
* Store Changes: `enabled` _(Blue highlight is enabled; click to enable / disable.)_

![Create Task 2a Image]({{ "/images/synapse/create-task-2a.png" | prepend: base }}){: .center-image }

Once you have everything set, press `OK` to create the task. When you have completed this step
you will see a window that looks like this:

![Create Task 3 Image]({{ "/images/synapse/create-task-3.png" | prepend: base }}){: .center-image }

Qlik Replicate is all about **ease of use**. The interface is point-and-click, drag-and-drop. 
To configure our task, we need to select a source endpoint (MySQL) and a target endpoint 
(Azure Synapse Analytics). You can either drag
the `MySQL Source` endpoint from the box on the left of the screen and drop it into the circle that 
says `Drop source endpoint here`, or you can click on the arrow that appears just to the right of the
endpoint when you highlight it.

![Create Task 4 Image]({{ "/images/synapse/create-task-4.png" | prepend: base }}){: .center-image }

![Create Task 5 Image]({{ "/images/synapse/create-task-5.png" | prepend: base }}){: .center-image }

Repeat the same process for the Azure Synapse Analytics Target endpoint. Your screen 
should now look like this:

![Create Task 6 Image]({{ "/images/synapse/create-task-6.png" | prepend: base }}){: .center-image }

Our next step is to select the tables we want to replicate from MySQL into 
Azure Synapse Analytics. Click on the `Table Selection...` button in the top center of your browser.

![Select Tables 1 Image]({{ "/images/synapse/select-tables-1.png" | prepend: base }}){: .center-image }

and from there select the `synapse` schema.

![Select Tables 2 Image]({{ "/images/synapse/select-tables-2.png" | prepend: base }}){: .center-image }

Enter `%` where it says **Table:** and press the `Search` button. This will retrieve a list of 
all the tables in the _synapse_ schema.

> Note: entering `%` is not strictly required. By default, Qlik Replicate will search for all 
tables (`%`) if you do not limit the search.

![Select Tables 3 Image]({{ "/images/synapse/select-tables-3.png" | prepend: base }}){: .center-image }

and then press the `>>` button to move all of the tables from the **Results** list into the 
**Selected Tables** list. Note that we also had the option of simply wildcarding all tables, or
selectively choosing tables from the **Results** list.

![Select Tables 4 Image]({{ "/images/synapse/select-tables-4.png" | prepend: base }}){: .center-image }

In the next step we will configure a transformation on some of the data.
