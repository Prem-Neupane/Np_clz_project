# project_1

A college laravel training project

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### To install on your pc

1. Download it on your project folder

    htdocs(in windows) or /var/www/html(in linux) or something like that
    
    
   Alternatively,
        you may do the following in linux        
        
       
            cd /var/www/html
            git clone https://github.com/Nepali-San/project_1.git project_name
   
     
2. rename the .env.example to .env inside the project
3. in .env file , you need give your username, password, database name
4. go to terminal and type

           
           cd  /var/www/html/project_name              
           php  artisan key:generate        
           
5. if it is not working,may be your composer path is in incorrect folder,In some cases, it must be in .profile file not in        .bash_profile file else skip step - 6.

6. Temporarily , you may type 

         
              composer install
         
    
    
    on terminal by going inside the project folder using cd /var/www/html/project_name or correct the path. and continue to step 4.
                   
7. then go to mysql and create a database , give name as in .env file then

       
           php artisan migrate
       
      
8. now type


         
            php artisan serve
         
 9. open the project in browser,
10. register the user
11. user must be activated by admin, but for now activate yourself, since there is now user with admin permissions

     - go to mysql and select the database
     - update users by typing
                  
         
              update users set active = 1;
         
         
14. to get access to admin panel , go to mysql and then

    - use the database                
    - update users by typing 
        
                
            update users set active = 1 , identity = '0';
        
       
15. for admin panel , go to    http://localhost:8000/admin  or http://127.0.0.1:8000/admin   and login
