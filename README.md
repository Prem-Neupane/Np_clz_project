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
           
5. if it is not working,may be your composer path is in incorrect folder
6. Temporarily , you may type 

         
              composer install
         
    
    
    on terminal by going inside the project folder using cd /var/www/html/project_name
                   
7. then go to mysql and create a database , give name as in .env file then

       
           php artisan migrate
       
      
8. now type


         
            php artisan serve
         

9. it should work,
    
10. for permanent , follow these steps, after this you won't need to do composer install everytime after downloading the project

        
             cd
             gedit .bash_profile
             //copy the composer path
             gedit .profile
             //paste the composer path and save it.                   
       
       
    if it is not solving the problem , search the problem in google or ask others.
   
11. open the project in browser,
12. register the user
13. user must be activate by admin, but for now activate yourself since there is now user with admin permissions

     - go to mysql and select the database
     - update users by typing
                  
         
              update users set active = 1;
         
         
14. to get access to admin panel , go to mysql and then

    - use the database                
    - update users by typing 
        
                
            update users set active = 1 , identity = 'admin';
        
       
15. for admin panel , go to    http://localhost:8000/admin  or http://127.0.0.1:8000/admin   and login
