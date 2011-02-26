// $Id$


FreeTTS interface


2010 - ben lyons
--------------------

1. introduction
-------------------------------------------------------------------------------
Freetts interface allows users to access freetts functions on a local or remote computer within their drupal site. 
This also incorporates some required LAME functionality ( required for converting .wav files to mp3 format.

In additional to basic TTS functionality, the freetts system allows for MBrola support to allow for additional languages, voices and control, if MBrola has been installed.

In order for you to install freetts LAME or MBrola you need to have shell / terminal ( console) access.
This system assumes FreeTTS is running on a remote machine, it will also work locally. though both FreeTTS and LAME must be on the same system. On a remote system web access must be enabled with php functionality.
--------------------------------------------------------------------------------

2. Websites
--------------------------------------------------------------------------------
FreeTTS : http://freetts.sourceforge.net/docs/index.php
licence : BSD Style :http://freetts.sourceforge.net/license.terms

LAME : http://lame.sourceforge.net/  
Licence: LGPL : http://lame.sourceforge.net/license.txt


(optional)
MBrola: http://tcts.fpms.ac.be/synthesis/
Licence: Free for non-comercial, non-military use 
: http://tcts.fpms.ac.be/synthesis/mbrola/mbrlicen.html
-------------------------------------------------------------------------------


3.Installation
-----------------------------
1. Download + install the FreeTTS, take a note of the location of the directory of the freetts.jar file ( usually within /freetts-1.2/lib )
2. Download + install LAME
3.( optional ) download + install MBrola take a note of the MBrola directory

3. open the monster.php file. in a text-editor
4. change the following values
5. change $user_key and user_ssid , take a note of the values
6. enter the location of the freetts.jar file in $freetts_dir
7. (optional) enter the location of the MBrola directory in $mbrola_dir
   Leave this value blank if you are not using MBrola 
   
8. (optional) rename freetts_remote.php
9. upload monster.php and freetts_remote.php to the web directory of the machine with freetts installed

10. Install and configure the freetts module in drupal
11. in the admin settings page configure user key user ssid and the url for the freetts_remote.php file

12. test by either creating/editing a node with the 'create mp3 version' option enabled
    or chose an existing node and click 'create mp3 version'
