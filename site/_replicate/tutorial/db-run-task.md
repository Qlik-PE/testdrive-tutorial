---
title: Step 5 - Run Your Task
section: Database-to-Database Replication
tutorialtype: replicate
permalink: /replicate/tutorial/db-run-task.php
---

After you press `Run`, Replicate will automatically switch from **Designer** mode to **Monitor** mode. 
You will be able to watch the status of the full load as it occurs, and then switch to monitoring 
change data capture as well.

![Postgres Task 5 Image]({{ "/images/replicate/postgres-task-5.png" | prepend: base }}){: .center-image }

When **Full Load** is complete, click on the `Completed` bar to display the tables. 
There is DML activity running in the background. Click on the `Change Processing` tab to 
see it in action.

![Postgres Task 6 Image]({{ "/images/replicate/postgres-task-6.png" | prepend: base }}){: .center-image }

If you would like to explore the data that we have delviered to Postgres, click on the folowing link:

<div id="pgadminurl" align="center" style="font-size:30px"></div>
<script type="text/javascript">{% include getPgadminURL.js %}</script>

This link will open PGAdmin in another window in your browser. Log in with:

* User: `pgadmin@qlik.com`
* Password: {% include getPassword.php %}

![PGAdmin 1 Image]({{ "/images/replicate/pgadmin-1.png" | prepend: base }}){: .center-image }

From there, click on `> Servers` in the navigation pane.

![PGAdmin 2 Image]({{ "/images/replicate/pgadmin-2.png" | prepend: base }}){: .center-image }

And then double-click on `Test Drive PostgresDB` which will open a window for you to enter 
the password to log into the server.  

* Enter the password: {% include getPassword.php %}

![PGAdmin 3 Image]({{ "/images/replicate/pgadmin-3.png" | prepend: base }}){: .center-image }

This will log you into the database. From there you can navigate to:

```
Databases => qlik => Schemas => testdrive => Tables
```

![PGAdmin 4 Image]({{ "/images/replicate/pgadmin-4.png" | prepend: base }}){: .center-image }

Feel free to explore the structure, etc. associated with the tables we have created. If you look
at the structure for the Player table, you will see that the additional column, **fullName** 
that we added to the table as a part of our transformation is present in the table here.

Now we will enter a couple of queries. Click on `Tools` at the top of the screen and select
`Query Tool` to open the query editor. 

![PGAdmin Query Tool Image]({{ "/images/replicate/pgadmin-query-tool.png" | prepend: base }}){: .center-image }

Now type 

`select count(*) from testdrive."Player";`

Note the quotes around **Player** and that it begins with a capital 'P'. The schemas are 
case-sensitive, so we need the quotes in order to find the table in the query. Highlight that 
line and press the lightning bolt at the top of the screen to execute. This will give you 
the count of rows the Player table. That vaule should be displayed in the **Data Output** 
area at the bottom of the screen.

Next, we will query a few rows from the Player table to examine the data. Type 

`select * from testdrive."Player" limit 5;` 

Once again, highlight that query statement and press the lightning bolt at the top
of the screen to execute it.  Five rows should be returned in the **Data Output** area 
at the bottom of the screen.

![PGAdmin 5 Image]({{ "/images/replicate/pgadmin-5.png" | prepend: base }}){: .center-image }

If you scroll all the way to the right, you will see the **fullName** column that we created
during the transformation. You will also note that the values set in that column are just
as we coded them to look in the transformation.

![PGAdmin 6 Image]({{ "/images/replicate/pgadmin-6.png" | prepend: base }}){: .center-image }

When you have seen enough, you can declare Victory! for this part of the Test Drive. Press `Stop`
in the top left corner of the **Replicate** console to end the task. After pressing `Stop` 
and clicking `Yes` in the confirmation dialog, click on the `TASKS` tab at the top of the screen. 
This will return you to the main window.

![Postgres Task 7 Image]({{ "/images/replicate/postgres-task-7.png" | prepend: base }}){: .center-image }

### Summary
You just:
* Defined access and authentication into a source and a target database
* Defined the source tables you want to create and keep in sync on the target
* Configured the MySQL to Postgres task
* Configured a transformation that added a new column to the Player table
* Captured  initial data from the source without while maintaining business continuity
  (DML activity was going on in the background to simulate users working on the source database)
* Automatically created the target tables
* Loaded the target tables
* Captured all new transactions which were happening while the initial load was running 
* Automatically began the process to apply  net new data to the target once the target was loaded
* Observed change data being recorded as it is sent to and applied at the  target 

All that in 5 easy steps!

You can now move on to the next part of the Test Drive.


