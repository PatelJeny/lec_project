DROP TABLE customer;
DROP TABLE products;
DROP TABLE review;

CREATE TABLE review(
		id int PRIMARY KEY AUTO_INCREMENT,
    	product_id int,
    	user_id int,
    	rating int,
    	comment varchar(56)
    	
);

CREATE TABLE products(
        id int PRIMARY KEY AUTO_INCREMENT,
        pro_name varchar (32),
        pro_price varchar(32),
        pro_category varchar(32),
        pro_image varchar(32),
        pro_discription varchar(256)
);

CREATE TABLE customer(
        id int PRIMARY KEY AUTO_INCREMENT,
        name varchar(32),
        email varchar(64),
        password varchar(16)
);

INSERT INTO customer(name,email,password)VALUES('jeny','pateljeny1509@gmail.com'),('utsavi','utsavi@gmail.com','4567'),
                                            ('dhruvi','dhruvi@gmail.com','8888'),('krisha','krisha@gmail.com','2222'),
                                            ('pal','pal@gmail.com','6666'),('manisha','manisha@gmail.com','7777')


INSERT INTO products(pro_name,pro_price,pro_category,pro_image,pro_discription)VALUES('MAC','RS.700','lipstik','1.png','gdhvch'),
                                                                                    ('zara','RS.2000','t-shirt','2.png','cbhbchs'),
                                                                                    ('lakme','RS.500','kajal','3.png','')

