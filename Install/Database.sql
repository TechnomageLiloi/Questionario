CREATE TABLE `rune_questions` (
  `key_question` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `type` tinyint(3) unsigned NOT NULL,
  `program` json NOT NULL,
  `theory` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt` timestamp NOT NULL,
  `data` json NOT NULL,
  `power` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`key_question`)
);

create table rune_report
(
    key_report timestamp not null,
    key_question bigint unsigned not null,
    result bool not null,
    comment varchar(250) not null,
    data json not null,
    constraint rune_report_pk
        primary key (key_report, key_question),
    constraint rune_report_rune_questions_key_question_fk
        foreign key (key_question) references rune_questions (key_question)
            on update cascade on delete cascade
);

create table rune_suites
(
    key_suite varchar(500) not null,
    title varchar(100) not null,
    summary text not null,
    constraint rune_suites_pk
        primary key (key_suite)
);

insert into rune_suites(key_suite, title, summary) VALUES ('rune', 'Root', '-');

alter table rune_questions
    add key_suite varbinary(500) default 'rune' not null;

alter table rune_questions
    add constraint rune_questions_rune_suites_key_suite_fk
        foreign key (key_suite) references rune_suites (key_suite)
            on update cascade on delete cascade;

-- TARDIS

create table rune_degrees
(
    key_degree bigint unsigned auto_increment,
    uid varchar(100) not null,
    title varchar(250) null,
    program mediumtext null,
    status tinyint unsigned not null,
    constraint rune_degrees_pk
        primary key (key_degree)
);

create unique index rune_degrees_uid_uindex
    on rune_degrees (uid);

insert into rune_degrees(uid, title, program, status) values("protos", "Protos", "-", 1);

create table rune_lessons
(
    key_date date not null,
    key_position tinyint unsigned not null,
    key_degree bigint unsigned not null,
    comment text not null,
    mark tinyint unsigned default 0 not null,
    status tinyint unsigned default 1 not null,
    start time null,
    finish time null,
    data json not null,
    type tinyint unsigned default 1 not null,
    constraint rune_lessons_pk
        primary key (key_date, key_position),
    constraint rune_lessons_rune_degrees_key_degree_fk
        foreign key (key_degree) references rune_degrees (key_degree)
            on update cascade on delete cascade
);

create table rune_problems
(
    key_problem bigint unsigned auto_increment,
    key_degree bigint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    summary text not null,
    constraint rune_problems_pk
        primary key (key_problem),
    constraint rune_problems_rune_degrees_key_degree_fk
        foreign key (key_degree) references rune_degrees (key_degree)
            on update cascade on delete cascade
);

create table rune_tickets
(
    key_ticket bigint unsigned auto_increment,
    title varchar(250) not null,
    start timestamp not null,
    finish timestamp not null,
    power smallint unsigned default 1 not null,
    constraint rune_tickets_pk
        primary key (key_ticket)
);

create table rune_quests
(
    key_quest bigint unsigned auto_increment,
    title varchar(100) not null,
    summary text not null,
    start timestamp null,
    finish timestamp null,
    status tinyint unsigned default 1 not null,
    constraint rune_quests_pk
        primary key (key_quest)
);

create table rune_horcruxes
(
    key_horcrux bigint unsigned auto_increment,
    title varchar(100) not null,
    summary text not null,
    start timestamp null,
    finish timestamp null,
    status tinyint unsigned default 1 not null,
    constraint rune_horcruxes_pk
        primary key (key_horcrux)
);

create table rune_config
(
    key_config varchar(100) not null,
    data json not null,
    constraint rune_config_pk
        primary key (key_config)
);
