---
title: Step 3 - Configure Your Task
section: Streaming Data to Kafka
tutorialtype: replicate
permalink: /replicate/tutorial/kafka-config-task.php
---

Now that we have configured our MySQL source and Kafka target endpoints, we need to tie 
them together in what we call a Replicate **task**. In short, a task defines the following:

* A source endpoint
* A target endpoint
* The list of tables that we want to capture
* Any transformations we want to make on the data

To get started, we need to create a task. Click on the `+ New Task` button at the top of the screen.

![Start Task 1 Image]({{ "/images/replicate/start-task-1.png" | prepend: base }}){: .center-image }

Once you do, a window like this will pop up:

![Start Task 2a Image]({{ "/images/replicate/start-task-2a.png" | prepend: base }}){: .center-image }

Give this task a meaningful name like `MySQL to Kafka`. For this task we will take the defaults:

* Name: `MySQL to Kafka`
* `Unidirectional`
* Full Load: `enabled` _(Blue highlight is enabled; click to enable / disable.)_
* Apply Changes: `enabled` _(Blue highlight is enabled; click to enable / disable.)_
* Store Changes: `disabled` _(Blue highlight is enabled; click to enable / disable.)_

When you have everything set, press `OK` to create the task. Once you have completed this step
you will see a window that looks like this:

![Kafka Task 1 Image]({{ "/images/replicate/kafka-task-1.png" | prepend: base }}){: .center-image }

Qlik Replicate is all about **ease of use**. The interface is point-and-click, drag-and-drop. To configure our
task, we need to select a source endpoint (MySQL) and a target endpoint (Kafka). You can either drag
the `MySQL Source` endpoint from the box on the left of the screen and drop it into the circle 
that says `Drop source endpoint here`, or you can click on the arrow that appears just 
to the right of the endpoint when you highlight it.

![Kafka Task 2 Image]({{ "/images/replicate/kafka-task-2.png" | prepend: base }}){: .center-image }

![Kafka Task 3 Image]({{ "/images/replicate/kafka-task-3.png" | prepend: base }}){: .center-image }

Repeat the same process for the Kafka JSON Target endpoint. Your screen should now look like this:

![Kafka Task 4 Image]({{ "/images/replicate/kafka-task-4.png" | prepend: base }}){: .center-image }

Our next step is to select the tables we want to replicate from MySQL into Kafka. 
Click on the `Table Selection...` button in the top center of your browser.

![Kafka Task 5 Image]({{ "/images/replicate/kafka-task-5.png" | prepend: base }}){: .center-image }

and from there select the `testdrive` schema.

![Start Task 6 Image]({{ "/images/replicate/start-task-6.png" | prepend: base }}){: .center-image }

Enter `%` where it says **Table:** and press the `Search` button. This will retrieve a list 
of all the tables in the _testdrive_ schema.

> Note: entering `%` is not strictly required. By default, Qlik Replicate will search for all 
tables (`%`) if you do not limit the search.

![Start Task 7 Image]({{ "/images/replicate/start-task-7.png" | prepend: base }}){: .center-image }

In the **MySQL to Postgres** task, we captured all of the tables in the schema. For this exercise, 
we will instead choose only a few tables.
* testdrive.PitchingPost
* testdrive.Player
* testdrive.SeriesPost

Select each table from the **Results** list and press the `>` button to move them into the
**Selected Tables** list. Note that multi-select is enabled. You can select the tables all at once,
or move them individually. 

![Kafka Task 6 Image]({{ "/images/replicate/kafka-task-6.png" | prepend: base }}){: .center-image }

At this point we could define transformations on the selected tables if we wanted, but we will
keep it simple for this part of the test drive and move the data as is instead ... so just push `OK` 
at the bottom of the screen.  

> Note: we did configure a transformation in the database-to-database section. You can 
refer to [Configure a Transformation]({{ base }}/replicate/tutorial/db-config-xform.php) for
more information if you skipped it.


![Kafka Task 7 Image]({{ "/images/replicate/kafka-task-7.png" | prepend: base }}){: .center-image }

That completes configuration of the task. We are now ready to save our task and run it. 
Press `Save` at the top left of the window and then press `Run`.

![Kafka Task 8 Image]({{ "/images/replicate/kafka-task-8.png" | prepend: base }}){: .center-image }

