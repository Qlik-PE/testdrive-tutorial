---
title: Step 3 - Configure Your Task
section: Delivering Data to Snowflake
tutorialtype: snowflake
permalink: /snowflake/tutorial/config-task.php
---

Now that we have configured our MySQL source and Snowflake target endpoints, we need to tie 
them together in what we call a Replicate **task**. In short, a task defines the following:

* A source endpoint
* A target endpoint
* The list of tables that we want to capture
* Any transformations we want to make on the data

To get started, we need to create a task. Click on the `+ New Task` button at the top of the screen.

![Create Task 1 Image]({{ "/images/snowflake/create-task-1.png" | prepend: base }}){: .center-image }

Once you do, a window like this will pop up:

![Create Task 2 Image]({{ "/images/snowflake/create-task-2.png" | prepend: base }}){: .center-image }

Give this task a meaningful name like `MySQL-to-Snowflake`. For this task we will take the defaults:

* Name: `MySQL-to-Snowflake`
* `Unidirectional`
* Full Load: `enabled` _(Blue highlight is enabled; click to enable / disable.)_
* Apply Changes: `enabled` _(Blue highlight is enabled; click to enable / disable.)_
* Store Changes: `disabled` _(Blue highlight is enabled; click to enable / disable.)_

Once you have everything set, press `OK` to create the task. When you have completed this step
you will see a window that looks like this:

![Create Task 3 Image]({{ "/images/snowflake/create-task-3.png" | prepend: base }}){: .center-image }

Qlik Replicate is all about **ease of use**. The interface is point-and-click, drag-and-drop. 
To configure our
task, we need to select a source endpoint (MySQL) and a target endpoint (Snowflake). You can either drag
the `MySQL Source` endpoint from the box on the left of the screen and drop it into the circle that 
says `Drop source endpoint here`, or you can click on the arrow that appears just to the right of the
endpoint when you highlight it.

![Create Task 4 Image]({{ "/images/snowflake/create-task-4.png" | prepend: base }}){: .center-image }

![Create Task 5 Image]({{ "/images/snowflake/create-task-5.png" | prepend: base }}){: .center-image }

Repeat the same process for the Snowflake Target endpoint. Your screen should now look like this:

![Create Task 6 Image]({{ "/images/snowflake/create-task-6.png" | prepend: base }}){: .center-image }

Our next step is to select the tables we want to replicate from MySQL into Snowflake. Click on 
the `Table Selection...` button in the top center of your browser.

![Select Tables 1 Image]({{ "/images/snowflake/select-tables-1.png" | prepend: base }}){: .center-image }

and from there select the `snowflake` schema.

![Select Tables 2 Image]({{ "/images/snowflake/select-tables-2.png" | prepend: base }}){: .center-image }

Enter `%` where it says **Table:** and press the `Search` button. This will retrieve a list of 
all the tables in the _snowflake_ schema.

> Note: entering `%` is not strictly required. By default, Qlik Replicate will search for all 
tables (`%`) if you do not limit the search.

![Select Tables 3 Image]({{ "/images/snowflake/select-tables-3.png" | prepend: base }}){: .center-image }

and then press the `>>` button to move all of the tables from the **Results** list into the 
**Selected Tables** list. Note that we also had the option of simply wildcarding all tables, or
selectively choosing tables from the **Results** list.

![Select Tables 4 Image]({{ "/images/snowflake/select-tables-4.png" | prepend: base }}){: .center-image }

In the next step we will configure a transformation on some of the data.
