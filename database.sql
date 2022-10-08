CREATE DATABASE e-commerce;

create table clothes (
       id int NOY NULL AUTO_INCREMENT,
    name varchar(255),
    price varchar(255),
    description varchar(10000),
    Amount int(100),
    image varchar(100),
    PRIMARY KEY (id),
);

create table users (
       id int NOT NULL AUTO_INCREMENT,
       name varchar(255),
       email varchar (100),
       password varchar(100),
       PRIMARY KEY ('id'),
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;