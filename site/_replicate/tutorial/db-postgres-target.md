---
title: Step 2 - Postgres Target Configuration 
section: Database-to-Database Replication
tutorialtype: replicate
permalink: /replicate/tutorial/db-postgres-target.php
---

Next we need to configure our Postgres target endpoint. The process is much the same as you saw 
with the MySQL source, and once again you will note that the configuration process is
context-sensitive as we move along.

As before, the first step in the configuration process is to tell Replicate that we want to 
create a new endpoint. If you are back on the main window, you will need to click on 
`Manage Endpoint Connections` button.

![Manage Endpoints Image]({{ "/images/replicate/manage-endpoints.png" | prepend: base }}){: .center-image }

and then press the `+ New Endpoint Connection` button.


![Manage Endpoints Image]({{ "/images/replicate/add-new-endpoint-2.png" | prepend: base }}){: .center-image }

and you will see a window that resembles this:

![New Endpoint Image]({{ "/images/replicate/new-endpoint.png" | prepend: base }}){: .center-image }

We will now create a PostgreSQL Target endpoint:
* Replace the text **New Endpoint Connection 1** with something more descriptive
like  `Postgres Target`,
* make sure the `Target` radio button is selected,
* and then select `PostgreSQL` from the dropdown selection box.

![Postgres Target 1 Image]({{ "/images/replicate/postgres-trg-1.png" | prepend: base }}){: .center-image }

![Postgres Target 2 Image]({{ "/images/replicate/postgres-trg-2.png" | prepend: base }}){: .center-image }

Fill in the blanks as indicated in the image above:
* Host: `postgresdb`
* Port: `5432`
* User: `qlik`
* Password: {% include getPassword.php %}
* Database: `qlikdb`
* Security/SSL Mode: `disable`

and then click on `Test Connection`. Your screen should look like the following, indicating that
your connection succeeded.

![Postgres Target 3 Image]({{ "/images/replicate/postgres-trg-3.png" | prepend: base }}){: .center-image }


Assuming so, click `Save` and the configuration of your Postgres target endpoint is complete.
Click `Close` to close the window.


For more details about using PostgreSQL as a target, please review the section 
"Using a PostgreSQL-Based as a Target" in Chapter 9 "Adding and Managing Target Endpoints" of the
[Qlik Replicate User Guide](/files/Qlik_Replicate_User_Guide.pdf){:target="_blank"}

