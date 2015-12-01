/*Create a MySQL database that contains a player table with the following fields:
Player ID
Name
Credits
Lifetime Spins
Salt Value
*/
CREATE TABLE player(PlayerID VARCHAR(20) NOT NULL, 
                    Name VARCHAR(60), 
                    Credits INT, 
                    LifetimeSpins INT, 
                    SaltValue INT,
                    PRIMARY KEY(PlayerID));