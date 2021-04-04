CREATE TABLE users (
    id        bigint auto_increment,
    username  varchar(255) not null,
    password  varchar(255) not null,
    
    PRIMARY KEY(id),
    CONSTRAINT users_username_unique UNIQUE (username)
);