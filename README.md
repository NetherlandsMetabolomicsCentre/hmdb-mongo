hmdb-mongo
==========

Create a local copy of the Human Metabolome Database using PHP and MongoDB

### Install

Install and run MongoDB (http://www.mongodb.org/)

Then download the HMDB V3 XML files from 'http://www.hmdb.ca/downloads' (Metabolites and Proteins) and put the in the same directory as the build.php script.
Note: you can put them somewhere else but then you must change the build.php $dir Array() to match the correct path to the files.

Run the build.php script, make sure it has the MongoDB driver (http://php.net/manual/en/book.mongo.php)

Test the database by running the read.php script. It holds some example queries you can use on the MongoDB


### Acknowledgement

Wishart DS, Knox C, Guo AC, et al., HMDB: a knowledgebase for the human metabolome. Nucleic Acids Res. 2009 37(Database issue):D603-610.
Wishart DS, Tzur D, Knox C, et al., HMDB: the Human Metabolome Database. Nucleic Acids Res. 2007 Jan;35(Database issue):D521-6.
Wishart DS, Knox C, Jewison T, et al., HMDB: the Human Metabolome Database in 2013. Nucleic Acids Res. 2013 Submitted


https://github.com/gaarf/XML-string-to-PHP-array made it possible to read and convert the HMDB XML into PHP HashMaps which can be injected into MongoDB
