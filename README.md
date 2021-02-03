Qlik Data Integration Test Drive Tutorials
========
This repository contains the content used to generate the Qlik Data Integration
test drive tutorials which are used in a number of different data integration
use cases that Qlik makes available to customers and partners.

## Subdirectories

* [site](site/README.md): the `site` subdirectory contains the sources for the test drive cookbook.
Web pages are created using a markdown language called
[Liquid](https://shopify.github.io/liquid/) and the html that is hosted by the
test drive images is generated from there using [Jekyll](https://jekyllrb.com/).

* *generated*: contains the html that is generated when the markdown source files are processed.

## Generating HTML From Markdown Sources

The *Makefile* in the root directory is preconfigured to generate the html, reading from the **site** 
subdirectory and writing the output to the **generated** subdirectory.

To execute it, simply type `make` from the command line while in this directory.
