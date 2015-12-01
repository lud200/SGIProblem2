/*Create a MySQL database that contains a player table with the following fields:
Player ID
Name
Credits
Lifetime Spins
Salt Value
*/
create table player(PlayerID varchar(20) NOT NULL, 
                    Name varchar(60), 
                    Credits int, 
                    LifetimeSpins int, 
                    SaltValue int,
                    primary key(PlayerID));