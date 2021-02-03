---
title: Step 6 - Configure a Transformation
section: Delivering Data to Databricks
tutorialtype: databricks
permalink: /databricks/tutorial/config-xform.php
---

Replicate is able to perform transformations on the data as it moves from source to target.
In this step we will create a transformation that will:

* Add a new column **fullName** to the **Player** target table
* Populate that column with values from other columns in the table.

To get started, `double click` on the **Player** table in the **Selected Tables** frame.

![Transform 1 Image]({{ "/images/databricks/xform-1.png" | prepend: base }}){: .center-image }

Then click on the `Transform` button.

![Transform 2 Image]({{ "/images/databricks/xform-2.png" | prepend: base }}){: .center-image }

And click on `Add Column`.

![Transform 3 Image]({{ "/images/databricks/xform-3.png" | prepend: base }}){: .center-image }

Call the new column `fullName`,

![Transform 4 Image]({{ "/images/databricks/xform-4.png" | prepend: base }}){: .center-image }

and change its default type from **STRING(50)** to `WSTRING(100)`. You can get a dropdown of 
valid types you can choose by clicking the **type** column next to **fullName**.

![Transform 5 Image]({{ "/images/databricks/xform-5.png" | prepend: base }}){: .center-image }

Note though, that the default precision of the WSTRING type is 50 ... we will need more space
than that due to the width of some of the data we will be working with, so you will need to 
type `WSTRING(100)` into the **type** column.

![Transform 5a Image]({{ "/images/databricks/xform-5a.png" | prepend: base }}){: .center-image }

Now we need to define the transformation we want to use to populate the column. Click on `fx` to
bring up the trasformation **Expression Builder**.

![Transform 6 Image]({{ "/images/databricks/xform-6.png" | prepend: base }}){: .center-image }

The expression we are going to build will involve concatenating three columns, _nameGiven_, 
_nameFirst_, and _nameLast_ into a column called _fullName_. Start by double clicking 
`nameGiven` which will put **$nameGiven** into the expression builder.

![Transform 7 Image]({{ "/images/databricks/xform-7.png" | prepend: base }}){: .center-image }

Now press the concatenation operator `||` and add the string `' ('.

![Transform 8 Image]({{ "/images/databricks/xform-8.png" | prepend: base }}){: .center-image }

and repeat those steps with `nameFirst` and `nameLast` until you have an expression that looks like

<p align="center">
<b>$nameGiven||' ('||$nameFirst||') '||$nameLast</b>
</p>

Note that you could just as easily have typed the the expression in directly, or even 
copied and pasted it from this web page.

![Transform 9 Image]({{ "/images/databricks/xform-9.png" | prepend: base }}){: .center-image }

Now click the `Parse Expression` button and enter the data:

* $nameGiven: `first middle`
* $nameFirst: `nickname`
* $nameLast: `lastname`


![Transform 10 Image]({{ "/images/databricks/xform-10.png" | prepend: base }}){: .center-image }

and press the `Test Expression` button.  This process allows us to put test values in 
the columns that make up the expression and validate that the output looks as we expect it to.

![Transform 11 Image]({{ "/images/databricks/xform-11.png" | prepend: base }}){: .center-image }

Assuming your output looks like the output indicated (**first middle (nickname) lastname**), 
your transformation is correct. Press `OK` to save the transformation and return to the
previous screen.

![Transform 12 Image]({{ "/images/databricks/xform-12.png" | prepend: base }}){: .center-image }

You will note below that we can see that there is now an expression next to the **fullName** column.
If you hover your mouse over that column you will be able to inspect the transformation without
having to click into it. Press `OK` again to return to the previous screen.

![Transform 13 Image]({{ "/images/databricks/xform-13.png" | prepend: base }}){: .center-image }

Notice the word **(Changed)** next to the _databricks.Player_ column. This indicates that
a transformation has been defined that alters the state of the data as it moves from the
source to the target.

![Transform 14 Image]({{ "/images/databricks/xform-14.png" | prepend: base }}){: .center-image }

That is it for configuration. We are now ready to save our task and run it. Press `Save` at the top
left of the window and then press `Run`.

![Transform 15 Image]({{ "/images/databricks/config-run.png" | prepend: base }}){: .center-image }

