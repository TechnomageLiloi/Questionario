CREATE TABLE `questionario_questions` (
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

create table questionario_suites
(
    key_suite varchar(500) not null,
    title varchar(100) not null,
    summary text not null,
    constraint questionario_suites_pk
        primary key (key_suite)
);

create table questionario_report
(
    key_report timestamp not null,
    key_suite varchar(500) not null,
    result bool not null,
    comment varchar(250) not null,
    data json not null,
    constraint questionario_report_pk
        primary key (key_report, key_suite),
    constraint questionario_report_questionario_questions_key_suite_fk
        foreign key (key_suite) references questionario_suites(key_suite)
            on update cascade on delete cascade
);

insert into questionario_suites(key_suite, title, summary) VALUES ('root', 'Root', '-');

alter table questionario_questions
    add key_suite varbinary(500) default 'rune' not null;

alter table questionario_questions
    add constraint questionario_questions_questionario_suites_key_suite_fk
        foreign key (key_suite) references questionario_suites (key_suite)
            on update cascade on delete cascade;

create table questionario_config
(
    key_config varchar(100) not null,
    data json not null,
    constraint questionario_config_pk
        primary key (key_config)
);
