create user study with password 'study' ;
ALTER USER study WITH PASSWORD 'study';

create database symfony_study with encoding='utf8' ;


grant all privileges on database symfony_study to study ;

\connect symfony_study;
create schema extensions;
create extension hstore schema extensions;
ALTER DATABASE symfony_study SET search_path to "$user",public,extensions;
alter database symfony_study owner to study;
alter schema public owner to study;
alter schema extensions owner to study;
GRANT USAGE ON SCHEMA public to study;