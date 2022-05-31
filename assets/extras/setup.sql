create table users (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    name varchar(26) not null,
    email varchar(56) not null,
    uid varchar(26) not null,
    pwd varchar(26) not null,
    isAdmin boolean default false
    
    
);

create table tickets (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    subject varchar(128) not null,
    content varchar(1000) not null,
    author int(11) not null,
    assigned_to int(11) not null,
    closed_by int(20) not null,
    status varchar(20) not null,
    priority varchar(20) not null,
    post_date datetime not null,
    date_modified datetime not null
    
);