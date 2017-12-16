drop table if exists Result;
drop table if exists Login;
drop table if exists Word;
drop table if exists Subject;

CREATE TABLE Login (
  id_login INTEGER Primary Key AUTOINCREMENT,
  login VARCHAR(45) NOT NULL,
  passwd VARCHAR(45) NOT NULL,
  privilege INTEGER NOT NULL default(10)
);

CREATE TABLE Subject (
    id_subject INTEGER      PRIMARY KEY AUTOINCREMENT,
    topic      VARCHAR (45) NOT NULL,
    owner                   REFERENCES Login (id_login) default(0),
    status     BOOLEAN      NOT NULL default(true) 
);



CREATE TABLE Result (
  id_result INTEGER PRIMARY KEY AUTOINCREMENT,
  score INTEGER NULL,
  privilege INTEGER NOT NULL default(10) ,
  id_login REFERENCES Login(id_login),
  id_subject REFERENCES Subject(id_subject) 
);

CREATE TABLE Word (
  id_word INTEGER PRIMARY KEY AUTOINCREMENT,
  word VARCHAR(255) NULL,
  id_subject REFERENCES subject(id_subject)
);

insert into Login(login,passwd,privilege) values ("Administrator","admin","0");
insert into Login(login,passwd,privilege) values ("Teacher1","teacher1","1");
insert into Login(login,passwd,privilege) values ("Teacher2","teacher2","1");
insert into Login(login,passwd,privilege) values ("Student1","student1","10");
insert into Login(login,passwd,privilege) values ("Student2","student2","10");

select * from Login;

insert into Subject(topic,owner) values ("Zwierzeta",2);
insert into Subject(topic,owner) values ("Cześci ciała",1);
insert into Subject(topic,owner) values ("Kolory",2);
insert into Subject(topic,owner) values ("Auto",1);
insert into Subject(topic,owner) values ("Jedzenie",1);

select * from Subject;

insert into Word(word,id_subject) values ("pies;dog",1);
insert into Word(word,id_subject) values ("kot;cat",1);
insert into Word(word,id_subject) values ("koń;horse",1);
insert into Word(word,id_subject) values ("mysz;mouse",1);
insert into Word(word,id_subject) values ("szczur;rat",1);

insert into Word(word,id_subject) values ("głowa;head",2);
insert into Word(word,id_subject) values ("szyja;neck",2);
insert into Word(word,id_subject) values ("dłoń;hand",2);
insert into Word(word,id_subject) values ("noga;leg",2);
insert into Word(word,id_subject) values ("oko;eye",2);

select * from Word;

insert into Result(score,privilege,id_login,id_subject) values (50,10,4,2);
insert into Result(score,privilege,id_login,id_subject) values (0,2,2,2);
insert into Result(score,privilege,id_login,id_subject) values (0,1,1,2);
insert into Result(score,privilege,id_login,id_subject) values (60,10,5,1);

select * from Result;