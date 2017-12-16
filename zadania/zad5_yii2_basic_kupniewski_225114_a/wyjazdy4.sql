--drop table if exists wyjazdy;
drop table if exists pw;
drop table if exists cel;
drop table if exists auto;
drop table if exists pracownik;
drop table if exists cel_kopia;
drop table if exists pracownik_kopia;
drop table if exists auto_kopia;


CREATE TABLE auto (
  auto_id INTEGER primary key AUTOINCREMENT,
  marka VARCHAR(45) Not NULL,
  model VARCHAR(45) Not NULL unique
);

CREATE TABLE auto_kopia(
  auto_id INTEGER primary key,
  marka VARCHAR(45) NULL,
  model VARCHAR(45) NULL
);

Drop trigger if exists auto_kopia;
CREATE TRIGGER auto_kopia AFTER INSERT ON auto
FOR EACH ROW
BEGIN
insert into auto_kopia (auto_id,marka,model) values  (new.auto_id,new.marka,new.model);
END;


CREATE TABLE cel (
  cel_id INTEGER primary key AUTOINCREMENT,
  miasto VARCHAR(45) Not NULL Unique
);

CREATE TABLE cel_kopia (
  cel_id INTEGER primary key,
  miasto VARCHAR(45) Not NULL
);
--commit;
Drop trigger if exists cel_kopia;
CREATE TRIGGER cel_kopia AFTER INSERT ON cel
FOR EACH ROW
BEGIN
insert into cel_kopia (cel_id,miasto) values  (new.cel_id,new.miasto);
END;

CREATE TABLE pracownik (
  pracownik_id INTEGER primary key AUTOINCREMENT,
  imie VARCHAR(20) not NULL,
  nazwisko VARCHAR(45) not NULL,
  auto_id  integer null,
  FOREIGN KEY (auto_id) REFERENCES auto(auto_id)
);
CREATE TABLE pracownik_kopia (
  pracownik_id INTEGER primary key,
  imie VARCHAR(20) not NULL,
  nazwisko VARCHAR(45) not NULL,
  auto_id  integer null,
  FOREIGN KEY (auto_id) REFERENCES auto(auto_id)
);
Drop trigger if exists pracownik_kopia;
CREATE TRIGGER pracownik_kopia AFTER INSERT ON pracownik
FOR EACH ROW
BEGIN
insert into pracownik_kopia (pracownik_id,imie,nazwisko,auto_id) values  (new.pracownik_id,new.imie,new.nazwisko,new.auto_id);
END;
Drop trigger if exists pracownik_kopia_u;
CREATE TRIGGER pracownik_kopia_u AFTER update ON pracownik
FOR EACH ROW
BEGIN
update pracownik_kopia set imie = new.imie, nazwisko = new.nazwisko, auto_id=new.auto_id where pracownik_id = new.pracownik_id ;
END;


CREATE TABLE pw (
  pw_id integer not null primary key autoincrement,
  pracownik_id INTEGER NOT NULL,
  cel_id INTEGER NOT NULL,
  data datetime not null,
  FOREIGN KEY (pracownik_id) REFERENCES pracownik_kopia(pracownik_id),
  FOREIGN KEY (cel_id) REFERENCES cel_kopia(cel_id)
);


--CREATE TABLE wyjazdy (
  --id INTEGER  NOT NULL primary key AUTOINCREMENT,
  --pw_id INTEGER NOT NULL,
  --data DATETIME not NULL,
  --FOREIGN KEY (pw_id) REFERENCES pw(pw_id)
 --);

insert into auto (model,marka) values ('Mondeo','Ford');
insert into auto (model,marka) values ('Pada','Fiat');
insert into auto (model,marka) values ('C5','Citroen');

insert into pracownik (imie,nazwisko,auto_id) values ('Marek','Eggert',1);
insert into pracownik (imie,nazwisko,auto_id) values ('Jan','Kowalski',2);
insert into pracownik (imie,nazwisko,auto_id) values ('Zbigniew','Boniek',3);

insert into cel (miasto) values ('Gdansk');
insert into cel (miasto) values ('Gdynia');
insert into cel (miasto) values ('Warszawa');
insert into cel (miasto) values ('Wrocław');

insert into pw (pracownik_id,cel_id,data) values (1,2,'2017-11-02');
insert into pw (pracownik_id,cel_id,data) values (2,2,'2017-11-02');
insert into pw (pracownik_id,cel_id,data) values (1,3,'2017-11-02');
insert into pw (pracownik_id,cel_id,data) values (3,1,'2017-11-02');

--insert into wyjazdy (pw_id,data) values (1,'2017-11-02');
--insert into wyjazdy (pw_id,data) values (2,'2017-11-03');
--insert into wyjazdy (pw_id,data) values (3,'2017-11-04');
--insert into wyjazdy (pw_id,data) values (4,'2017-11-02');

--select * from wyjazdy;
select * from auto;
select * from pracownik;
select * from pw;
select * from cel;

--drop view pracownik_all;
--create view pracownik_all as select p.pracownik_id,p.imie,p.nazwisko,a.model,a.marka from pracownik p inner join auto a on p.auto_id=a.auto_id;

--select * from pracownik_all;

--drop view pw_all;
--create view pw_all as select a.marka,a.model, p.imie,p.nazwisko,c.miasto from auto_kopia a inner join pracownik_kopia p on a.auto_id = p.auto_id inner join pw on p.pracownik_id=pw.pracownik_id inner join cel_kopia c on c.cel_id = pw.cel_id;

--select * from pw_all;

--drop view zestawienie;
--create view zestawienie as select  w.id,p.imie,p.nazwisko,a.model,a.marka,w.data,c.miasto from auto_kopia a inner join pracownik_kopia p on a.auto_id = p.auto_id inner join pw on p.pracownik_id=pw.pracownik_id inner join cel_kopia c on c.cel_id = pw.cel_id inner join wyjazdy w on w.pw_id = pw.pw_id ;

--select * from zestawienie;
