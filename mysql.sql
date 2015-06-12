create table login(user_ID TEXT,user_name TEXT,pass integer,use integer);
insert into login values('ID0000','',0,0);
insert into login values('ID0001','',1,0);
insert into login values('ID0002','',2,0);
insert into login values('ID0003','',3,0);
insert into login values('ID0004','',4,0);
grant all on login to apache;

create table ID0000(file_ID text,file TEXT,use integer);
insert into ID0000 values('file0000','',0);
insert into ID0000 values('file0001','',0);
insert into ID0000 values('file0002','',0);
grant all on ID0000 to apache;

create table ID0000_file0000(name text, author text, type text, category text, image text, memo text);
grant all on ID0000_file0000 to apache;
create table ID0000_file0001(name text, author text, type text, category text, image text, memo text);
grant all on ID0000_file0001 to apache;
create table ID0000_file0002(name text, author text, type text, category text, image text, memo text);
grant all on ID0000_file0002 to apache;

create table ID0001(file_ID text,file TEXT,use integer);
insert into ID0001 values('file0000','',0);
insert into ID0001 values('file0001','',0);
insert into ID0001 values('file0002','',0);
grant all on ID0001 to apache;

create table ID0001_file0000(name text, author text, type text, category text, image text, memo text);
grant all on ID0001_file0000 to apache;
create table ID0001_file0001(name text, author text, type text, category text, image text, memo text);
grant all on ID0001_file0001 to apache;
create table ID0001_file0002(name text, author text, type text, category text, image text, memo text);
grant all on ID0001_file0002 to apache;

create table ID0002(file_ID text,file TEXT,use integer);
insert into ID0002 values('file0000','',0);
insert into ID0002 values('file0001','',0);
insert into ID0002 values('file0002','',0);
grant all on ID0002 to apache;

create table ID0002_file0000(name text, author text, type text, category text, image text, memo text);
grant all on ID0002_file0000 to apache;
create table ID0002_file0001(name text, author text, type text, category text, image text, memo text);
grant all on ID0002_file0001 to apache;
create table ID0002_file0002(name text, author text, type text, category text, image text, memo text);
grant all on ID0002_file0002 to apache;


create table ID0003(file_ID text,file TEXT,use integer);
insert into ID0003 values('file0000','',0);
insert into ID0003 values('file0001','',0);
insert into ID0003 values('file0002','',0);
grant all on ID0003 to apache;

create table ID0003_file0000(name text, author text, type text, category text, image text, memo text);
grant all on ID0003_file0000 to apache;
create table ID0003_file0001(name text, author text, type text, category text, image text, memo text);
grant all on ID0003_file0001 to apache;
create table ID0003_file0002(name text, author text, type text, category text, image text, memo text);
grant all on ID0003_file0002 to apache;


create table ID0004(file_ID text,file TEXT,use integer);
insert into ID0004 values('file0000','',0);
insert into ID0004 values('file0001','',0);
insert into ID0004 values('file0002','',0);
grant all on ID0004 to apache;

create table ID0004_file0000(name text, author text, type text, category text, image text, memo text);
grant all on ID0004_file0000 to apache;
create table ID0004_file0001(name text, author text, type text, category text, image text, memo text);
grant all on ID0004_file0001 to apache;
create table ID0004_file0002(name text, author text, type text, category text, image text, memo text);
grant all on ID0004_file0002 to apache;

