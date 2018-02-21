# CsvImportPenn

Allows users to import items from a simple CSV (comma separated values) file, and then map the CSV column data to multiple elements, files, tags, and/or coordinates. Each row in the file represents metadata for a single item. 
This plugin is useful for exporting data from one database and importing that data into an Omeka site. CsvImportPenn extends the functionality of [Omeka's CsvImprot plugin](https://github.com/omeka/plugin-CsvImport) by converting traditional latitude/longitude coordinates into a format that is importable to Neatline. 

## Getting Started

### Prerequisites

Installing this plugin requires having a live Omeka Classic site to install it into.  More information on how to deploy an Omeka classic site can be found on our [github](https://github.com/upenndigitalscholarship/dsdocs/blob/master/omeka_install.md) or on the [Omeka installation guide](https://omeka.org/classic/docs/Installation/Installation/).
Both of these installation methods require an Ubuntu server with Apache, mySQL, and PHP installed. 

### Installing

Once you have an Omeka Classic site up and running, you must clone the CsvImportPenn plugin into the plugins folder.


```
cd www/var/html/plugins
git clone https://github.com/upenndigitalscholarship/CsvImportPenn.git
```

Once your have cloned the repository into your plugins folder, simply visit the admin page of your Omeka site and navigate to the plugins page, which should be in the top right navigation bar.  You should see CsvImportPenn listed on this page and can install it by pressing the install button to the right of the plugin.  

Test to ensure that CsvImportPenn is working correctly using the sample .csv file below. 

## Running the tests

After installing the plugin, it should appear in the at the bottom of the sidebar of your admin page.  Select the plugin and use a text editor save the snippet below as a .csv file on your computer.

```
title,creator,description,tags,file,coordinates
"Walden","Henry David Thoreau","A man seeks simplicity.","book, classic, New England","http://upload.wikimedia.org/wikipedia/commons/2/25/Walden_Thoreau.jpg, http://upload.wikimedia.org/wikipedia/commons/b/ba/Henry_David_Thoreau.jpg","39.9526, 75.1652"
"The Count of Monte Cristo","Alexandre Dumas","A man seeks revenge.","book, classic, France","http://upload.wikimedia.org/wikipedia/commons/c/c3/Edmond_Dant%C3%A8s.JPG","22.3964, 114.1095"
"Narrative of the Life of Frederick Douglass","Frederick Douglass","A man seeks freedom.","book, classic, Maryland","http://upload.wikimedia.org/wikipedia/commons/f/f5/Sketchofdouglass.jpg","40.7128, 74.0060"
```
Import this .csv using the plugin using the default configuration, with the exception of unchecking 'Automap Column Names to Elements' option. Continue to the next page, manually mapping the first three column names to their Dublin core elements and selecting the appropriet checkboxes for the reamining columns.  For the coordinates column, ensure that you both check the Neatline checkbox and map the column to the Dublin core element called 'coverage'.  This will cause the coordinates to be converted to a format that can be seamlessly imported into [Neatline](https://github.com/upenndigitalscholarship/NeatlinePenn).  

Import the file and confirm that the import is successful and the items have been created both on your admin page and in your database with the correct metadata. 


## Authors

* **Sasha Renninger** - *Initial work* - [Sasha](https://github.com/sashafr)
* **Haoran Shao** - *Neatline Coverage* 

See also the list of [contributors](https://github.com/upenndigitalscholarship/CsvImportPenn) who participated in this project.

