Instructions for setup - 
This website was designed using PHP. It needs a vagrant box and Virtual Box to run properly
Install Vagrant and Virtual Box before continuing. Vagrant is a tool that allows you to very quickly and
easily run pre-configured virtual machines - 'boxes'


1) Create a folder (ideally in root) with a memorable name
2) Enter this folder, run windows powershell and run command 
vagrant init csy2028/current
(Run this command exactly as typed)
3) THis will install a vagrant file in the folder. Now run command
vagrant up
This will initialise the virtual server and create the correct database files
4) Now run command- 
vagrant halt
This will export all the files and allow the merging of files from the zip folder
5)Extract the zip folder given and copy the job folder and database file into the newly created websites folder inside the root folder created in step 1 - Click Replace files if nessersary 
6) Finally, run vagrant up to boot up server and databases
7) navigate to job.v.je to browse website