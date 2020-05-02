create database if not exists cinextreme;
use cinextreme;
create table movies(
name_Movie varchar(200) not null,
release_Date date not null, 
id_Tmdb varchar(300) not null,
url_Movie varchar(700) not null,
url_Trailer varchar(700) not null,
primary key (id_Tmdb)
);
create table descriptions(
    fk_id_Tmdb varchar(300) not null,
    url_Img varchar(300) default '',
    description_Movie varchar(2000) not null,
    duracion varchar(100) not null,
    vote_average float(20) not null,
    vote_count int not null,
    primary key (fk_id_Tmdb)
);

create table genders(
    id_gender varchar(20) primary key not null,
    name_gender varchar(100) not null
);

create table movies_and_genders(
    Movie_Tmdb varchar(300) not null,
    Movie_gender varchar(20) not null,
    primary key(Movie_gender, Movie_Tmdb)
);

create table codes(
    code varchar(6) primary key,
    email varchar(100),
    updated_at timestamp default now()
);

create table users(
    email varchar(500) primary key,
    active tinyint(1) default 0,
    start_Subcription_Date timestamp null,
    end_Subcription_Date timestamp null,
    id_Pago varchar(100),
    id_Transaccion varchar(100) null,
    dias_Suscripcion int(3),
    updated_at timestamp null
);

create table log_Payu(
    id_Transaccion varchar(3000),
    fecha_Creacion timestamp,
    state_Transaccion int(2)
);

alter table descriptions
add constraint fkMovieTmdb
foreign key (fk_id_Tmdb) references movies(id_Tmdb);

alter table movies_and_genders
add constraint fkMovieAndGenders
foreign key (Movie_Tmdb) references movies(id_Tmdb);

alter table movies_and_genders
add constraint fkGendersAndMovie
foreign key (Movie_gender) references genders(id_gender);

SET GLOBAL event_scheduler = ON;

CREATE EVENT Eve_tbl_Students_Validation_User
ON SCHEDULE EVERY 1 MINUTE
DO
  update users set active = if(`end_Subcription_Date` >= now(), 1, 0);
 

insert into codes(code, email)
    values ('1',''),
            ('2',''),
            ('3','');

insert into movies (name_Movie, release_Date, id_Tmdb, url_Movie, url_Trailer) 
    values ('Terminator: destino oculto', '2019-10-23', '290859-terminator-dark-fate', 'https://drive.google.com/file/d/1mK7Yp9WJoisa_RVP_-PFdDRI8qjLTJgS/preview', 'https://www.youtube.com/embed/JK2lwQ_gEa4'),
    ('Frozen 2', '2019-11-21', '330457-frozen-2', 'https://drive.google.com/file/d/1fMucUlaygfdtOSth1iBUpFeu68NJIT95/preview', 'https://www.youtube.com/embed/R8TR3cGKees'),
    ('Zombieland 2: tiro de gracia', '2019-10-06', '338967-zombieland-double-tap', 'https://drive.google.com/file/d/1gE-Zlwm-nF9kQXtcLZYiRwgyFKV29COR/preview', 'https://www.youtube.com/embed/nqNoTzG8QE8'),
    ('Contra lo imposible', '2019-11-14', '359724-ford-v-ferrari', 'https://drive.google.com/file/d/1djiqanUP3FoJqQ3-lq1Vmt0-OiknGJRB/preview', 'https://www.youtube.com/embed/p3Qo0234y1g'),
    ('Playmobil. La película', '2019-06-10', '366668-playmobil-robbers-thieves-rebels', 'https://drive.google.com/file/d/104dsc375HsvDhlBBIdTdSTyClwzqzudP/preview', 'https://www.youtube.com/embed/hrO_YuMUSmA'),
    ('El irlandés', '2019-11-21', '398978-the-irishman', 'https://drive.google.com/file/d/1doyyDWFw4miohVP9G3SatMspo9NQJprm/preview', 'https://www.youtube.com/embed/B3cJXk9IaH0'),
    ('¿Dónde estás, Bernadette?', '2019-08-16', '405177-where-d-you-go-bernadette', 'https://drive.google.com/file/d/1oubPcnL9HcbD9i8sE8ykyl3tk0RMaYoK/preview', 'https://www.youtube.com/embed/jR3vmiGEjEM'),
    ('Ad Astra: Hacia las estrellas', '2019-09-18', '419704-ad-astra', 'https://drive.google.com/file/d/18KgVBmvJopnkw-oOR8R7o5LsiBPF6iDX/preview', 'https://www.youtube.com/embed/gFPSnH8bHIY'),
    ('Maléfica 2', '2019-10-16', '420809-maleficent-mistress-of-evil', 'https://drive.google.com/file/d/1El4_GAWqiSc9egLbPFvmbroMr0ZGCI9B/preview', 'https://www.youtube.com/embed/trQ2Ft_A478'),
    ('Un amigo abominable', '2019-09-07', '431580-abominable', 'https://drive.google.com/file/d/1DN8QM4cHpnaTMAuUETt6b1dBBXFLDcEg/preview', 'https://www.youtube.com/embed/FEZYCnmjSyg'),
    ('Proyecto Géminis', '2019-10-02', '453405-gemini-man', 'https://drive.google.com/file/d/1HUdIi6nPAVK3U_St2DA5mvF7OqFJ55AD/preview', 'https://www.youtube.com/embed/6OONW4k1izs'),
    ('Noelle', '2019-11-12', '454467-noelle', 'https://drive.google.com/file/d/1tsn57D1l3PVHg4s0uaiYCpnLbMOP_5pH/preview', 'https://www.youtube.com/embed/uljidAI-c3I'),
    ('Había una vez en Hollywood', '2019-08-15', '466272-once-upon-a-time-in-hollywood', 'https://drive.google.com/file/d/1dEqXvKsHoiAfbePmdoeuzunBaQtHQ8O-/preview', 'https://www.youtube.com/embed/bLqTt35GCA4'),
    ('Diamantes en bruto', '2019-12-25', '473033-uncut-gems', 'https://drive.google.com/file/d/19CVDCf2qk8gtfqioTy-qs1srhJZxrgL1/preview', 'https://www.youtube.com/embed/AjAoSWgB6J4'),
    ('It: Capítulo 2', '2019-08-26', '474350-it-chapter-two', 'https://drive.google.com/file/d/18u56m_7ZFFHPBiVrdo4WHE4f_ncxqhUm/preview', 'https://www.youtube.com/embed/o1sQbtZpsic'),
    ('Joker', '2019-10-03', '475557-joker', 'https://drive.google.com/file/d/1-N5BeEShNpzwQCWdLU24_4ISJJxgt5IP/preview', 'https://www.youtube.com/embed/EIyZqNbZQI8'),
    ('Hombres de negro: internacional', '2019-06-13', '479455-men-in-black-international', 'https://drive.google.com/file/d/1tvqs4DhqcsbpNsK8YFA1ZIqiIsKrU1ig/preview', 'https://www.youtube.com/embed/k-nI41bTBSk'),
    ('El arte de defenderse', '2019-03-10', '480001-the-art-of-self-defense', 'https://drive.google.com/file/d/1_kYcORAzr7g3j2cMUYJFOMhrW7NOE75p/preview', 'https://www.youtube.com/embed/xo46LZnN7ow'),
    ('Los locos addams', '2019-10-06', '481084-the-addams-family', 'https://drive.google.com/file/d/1Unwpdm-A9V_Isdi11DciGei-kSExPrrK/preview', 'https://www.youtube.com/embed/CFZXkJmjaU8'),
    ('Wild Rose: Sigue tu propia canción', '2019-04-12', '482981-country-music', 'https://drive.google.com/file/d/1DguOmsr9Ukdv65xzXO85vVNqS3UodmXv/preview', 'https://www.youtube.com/embed/Qv8OFjBvO7g'),
    ('Nosotros los animales', '2018-08-17', '490000-we-the-animals', 'https://drive.google.com/file/d/1QSYnKj3H7WghvxSM0gM4OASPeIfUCQuT/preview', 'https://www.youtube.com/embed/_AlyZN1q524'),
    ('Historia de un matrimonio', '2019-08-29', '492188-marriage-story', 'https://drive.google.com/file/d/1fCNxhNu0qhQd23lwzaYCdKlpYEyySH88/preview', 'https://www.youtube.com/embed/ccIq22GyQiM'),
    ('Primal', '2019-11-08', '500916-primal', 'https://drive.google.com/file/d/1oaGHrEOsoNv-v5VlTaMUJe_uhdsREso9/preview', 'https://www.youtube.com/embed/dQHCSqc8ocM'),
    ('Doctor sueño', '2019-10-30', '501170-doctor-sleep', 'https://drive.google.com/file/d/1IYZxuUoLCh2Hb7UPBpWq1ZXDpfhTDXhp/preview', 'https://www.youtube.com/embed/gIjWO7tWgoo'),
    ('Un buen día en el vecindario', '2020-02-06', '501907-a-beautiful-day-in-the-neighborhood', 'https://drive.google.com/file/d/1axKWWdeHbG9FNFv1fuGtPD7G2iiW2Kq7/preview', 'https://www.youtube.com/embed/MIaU5MbOZmo'),
    ('Huérfanos de Brooklyn', '2019-11-14', '504562-motherless-brooklyn', 'https://drive.google.com/file/d/1VNJU41FpSfXCLRonyK6PtsYiExTQFOKj/preview', 'https://www.youtube.com/embed/Mabny6Za38o'),
    ('Escuadrón 6', '2019-12-10', '509967-6-underground', 'https://drive.google.com/file/d/10e-EQ4QVqSX8o3qoTDM86Lyt8ffIo_eu/preview', 'https://www.youtube.com/embed/Opzeow3Gzmg'),
    ('El buen mentiroso', '2019-12-05', '511322-the-good-liar', 'https://drive.google.com/file/d/1tGRaqr7ydo4pxrmsJ9ZutcDTUzDA4iBJ/preview', 'https://www.youtube.com/embed/bgMAKUCTjL8'),
    ('Los Aeronautas', '2019-08-30', '514921-the-aeronauts', 'https://drive.google.com/file/d/1bQuXfOQKlvX7A2OGBwlB67I5H7UySunr/preview', 'https://www.youtube.com/embed/Rm4VnwCtQO8'),
    ('Bel Canto: La última función', '2019-09-13', '519255-bell-canto', 'https://drive.google.com/file/d/1XYkJo_jamOGg9iGyQcVHTXrl4WsI3FsF/preview', 'https://www.youtube.com/embed/PdOmHRDNKQk'),
    ('Pajaritos a volar', '2019-01-25', '522887-manou-the-swift', 'https://drive.google.com/file/d/1PZ2EcR4eG5-dgywJ9hz66GY5Ct2LSSQR/preview', 'https://www.youtube.com/embed/liFB4wsLqHc'),
    ('Rambo: Last Blood', '2019-09-18', '522938-rambo-last-blood', 'https://drive.google.com/file/d/106p0v29kai_2eYMLiaW6Lm3ohmliU-wK/preview', 'https://www.youtube.com/embed/3WcrgWJXCHg'),
    ('Reporte clasificado', '2019-01-26', '524348-the-report', 'https://drive.google.com/file/d/18VZQn0WNhb3QvfSnwDFUWeE8dDgZ7UEJ/preview', 'https://www.youtube.com/embed/AuMtiUo9aoo'),
    ('El pasado que nos une', '2019-08-09', '527385-after-the-wedding', 'https://drive.google.com/file/d/15z7aYpNUT4tfnWSSH15AEKQdJigetad9/preview', 'https://www.youtube.com/embed/qcU9VnXdIW8'),
    ('La invasión', '2019-12-19', '528985-replicate', 'https://drive.google.com/file/d/1z8QUu_GlP8MOAiVi2SkfClcZb362idDb/preview', 'https://www.youtube.com/embed/0mQBkEq5H3M'),
    ('Midsommar: el terror no espera la noche', '2019-06-18', '530385-midsommar', 'https://drive.google.com/file/d/1dEBWQpkA0jJia58YBET_VbCgkgb5zUCw/preview\"', 'https://www.youtube.com/embed/EZBytOPSZk8'),
    ('Crimen a contrarreloj', '2019-08-30', '539651-don-t-let-go', 'https://drive.google.com/file/d/19IRhu-XbOabQvIi_1BQF2UKAQM7SOGDK/preview', 'https://www.youtube.com/embed/xYK10IFGltA'),
    ('Estafadoras de Wall Street', '2019-09-12', '540901-hustlers', 'https://drive.google.com/file/d/19TS9A0LePb0I8Y9FkfuRAiC9PeCYsvst/preview', 'https://www.youtube.com/embed/IYyTgNME5M4'),
    ('Last Christmas: otra oportunidad para amar', '2019-11-28', '549053-last-christmas', 'https://drive.google.com/file/d/1OBU1Xau5VZArYdX8O81UzokqFuTDkeCb/preview', 'https://www.youtube.com/embed/S7cKJ6gcJbA'),
    ('Los dos papas', '2019-08-31', '551332-the-pope', 'https://drive.google.com/file/d/1MXihLOaaKeVFU02bAvdzkff73vJjzet1/preview', 'https://www.youtube.com/embed/epf-XMQ5Q8M'),
    ('Jugando con fuego', '2019-11-08', '554241-playing-with-fire', 'https://drive.google.com/file/d/1SF33gQP7qbgHjMMEfLF-sY9TtXI0aUli/preview', 'https://www.youtube.com/embed/HV99C15irf0'),
    ('Tod@s Caen', '2019-08-30', '554590-tod-s-caen', 'https://drive.google.com/file/d/1w4ZGz4UO4k8aib9-VJ8yOZNrm5vRFgrT/preview', 'https://www.youtube.com/embed/u9yKcUtas7w'),
    ('Black and Blue', '2019-09-21', '578189-black-and-blue', 'https://drive.google.com/file/d/1wCZrZQUX7FH6_JsMA_mUnxNzV97_HQlH/preview', 'https://www.youtube.com/embed/QCfSeVCr7ng'),
    ('Un príncipe de Navidad: Bebé real', '2019-12-05', '587693-a-christmas-prince-the-royal-baby', 'https://drive.google.com/file/d/1avOtjaU-TIIVDJd1tA0x0DESpPoQDUS4/preview', 'https://www.youtube.com/embed/bxBCE3KZLC8'),
    ('Cold Blood Legacy', '2019-05-15', '595985-cold-blood-legacy-la-memoire-du-sang', 'https://drive.google.com/file/d/1neBp_ET7m9UgKmJtcdovDqoJWKd715mD/preview', 'https://www.youtube.com/embed/pDyvxmeIV-4'),
    ('Hard Night Falling', '2019-10-12', '605368-hard-night-falling', 'https://drive.google.com/file/d/1YHdNzrbtkDzpJD9U0bOOCGGtCjzjHLFQ/preview', 'https://www.youtube.com/embed/O9k7cpYCycw'),
    ('Togo', '2019-12-20', '606856-togo', 'https://drive.google.com/file/d/1f_142vIppbYFb5pzlPyqSw7AhbRdVjd-/preview', 'https://www.youtube.com/embed/42ubb5bIs9o'),
    ('Inherit the Viper', '2019-09-28', '634904-inherit-the-viper', 'https://drive.google.com/file/d/1El4_GAWqiSc9egLbPFvmbroMr0ZGCI9B/preview', 'https://www.youtube.com/embed/w2nMM3po_Jk'),
    ('A Fall from Grace', '2020-01-17', '651070-a-fall-from-grace', 'https://drive.google.com/file/d/1JV8uHWrpK3M8kBMLyauXWSHyO6kX3BIe/preview', 'https://www.youtube.com/embed/9eMgG5k-FCo'),
    ('Horse Girl', '2020-02-07', '653601-horse-girl', 'https://drive.google.com/file/d/1IMnQwAOuyfSyrnVppSiaja1b2X5WpR_M/preview', 'https://www.youtube.com/embed/69lBGoHgJgU'),
    ('After: Aquí empieza todo','2019-04-11','537915-after','https://drive.google.com/file/d/1_Lh3vvh17BX0k7bvqGk33LUPybZ61be3/preview','https://www.youtube.com/embed/3zjxECCWwrU'),
    ('Aves de presa (y la fantabulosa emancipación de Harley Quinn)','2020-01-29','495764-birds-of-prey-and-the-fantabulous-emancipation-of-one-harley-quinn','https://drive.google.com/file/d/1RsZNRxQububMbDFhkK-x9zjiJA3liwGZ/preview','https://www.youtube.com/embed/TITXxNWGbyk'),
    ('Bohemian Rhapsody','2018-10-24','424694-bohemian-rhapsody','https://drive.google.com/file/d/18DlebjIx47QaMi2Q7i-7BvK7qgZVHJBx/preview','https://www.youtube.com/watch?v=LTAIlPsMOs4'),
    ('A dos metros de ti','2019-03-15','527641-five-feet-apart','https://drive.google.com/file/d/1ZJqRHnlQLlcpioAtGDVmOXNEUpYF_fVU/preview','https://www.youtube.com/embed/l-s3xpv0Q0U'),
    ('John Wick: Capítulo 3 - Parabellum','2019-05-09','458156-john-wick-chapter-3','https://drive.google.com/file/d/1gx1mCJORmvnzD-d0MpoQjsjAb3XsvjWJ/preview','https://www.youtube.com/embed/dUbOYjwIy2M'),
    ('Todos los días de mi vida','2019-12-22','72570-the-vow','https://drive.google.com/file/d/1tPnV6OujBaTyQRB-z0KMn96AmWl2MsaO/preview','https://www.youtube.com/embed/rc70kHj1wn0'),
    ('X-Men: Fénix oscura','2019-10-05','320288-dark-phoenix','https://drive.google.com/file/d/15bSO1iA88gkKQLOJ_5XT3Py2GrpssXGW/preview','https://www.youtube.com/embed/lXXPZu-yXZY'),
    ('xXx: Reactivated','2019-06-18','47971-xxx-the-return-of-xander-cage','https://drive.google.com/file/d/1HeJ9vAWZ8L1JPprisiTHbVKw6PH0Mcjb/preview','https://www.youtube.com/embed/Y_cQYKjbeDI'),
    ('Cuestión de justicia','2020-02-28','522212-just-mercy','https://drive.google.com/file/d/1fbTXaoXUAihnbctCIZ6eyqLVHdFiMGuY/preview','https://www.youtube.com/embed/epmO-wYI2bY'),
    ('Fractura','2019-09-22','568091-fracture','https://drive.google.com/file/d/1UiCwFq3GyReYdMrDXU9gOzskZ40cveI5/view','https://www.youtube.com/embed/_Q-bculaa3U'),
    ('Vida oculta','2019-12-13','403300-a-hidden-life','https://drive.google.com/file/d/13LuDzPMekeph1NVZGFsJczcaNHhRKlq4/preview','https://www.youtube.com/embed/Xsb4dLB_Epc'),
    ('Objetivo: Washington D.C.','2019-08-21','423204-angel-has-fallen','https://drive.google.com/file/d/1efREZxWjudfeGQrv0nEQy2Q_P0SP33hK/preview','https://www.youtube.com/embed/64XIvX7c8jo'),
    ('La Protectora','2019-01-26','460321-close','https://drive.google.com/file/d/1PjqNZRW4Su1_ii6uJURPdww-IIZVN2Tj/preview','https://www.youtube.com/embed/_QSE36rD00I'),
    ('Crypto','2019-07-12','567733-crypto','https://drive.google.com/file/d/1a543t2SxtaSenrNVzm6e8B8tBrDxanBZ/preview','https://www.youtube.com/embed/23V-mYIfJmA'),
    ('Aguas oscuras','2020-02-20','552178-dark-waters','https://drive.google.com/file/d/1f57qp3poqlLqvgXhOCS12DlglxoHWS7P/preview','https://www.youtube.com/embed/SNFL6S7YV7k'),
    ('Los Descendientes 3','2019-10-02','506574-descendants-3','https://drive.google.com/file/d/1T-Jby8nNDB9L8vlMZsM-aIYzCS7pmT_4/preview','https://www.youtube.com/embed/_jpODtKUzfQ'),
    ('Eli','2019-10-19','483202-eli','https://drive.google.com/file/d/16MrbZUtDi0tv8fCz9EMU8icB5ZnqY8uy/preview','https://www.youtube.com/embed/84s5cxMg7Os'),
    ('Durmiendo con el Asesino','2019-05-24','457799-extremely-wicked-shockingly-evil-and-vile','https://drive.google.com/file/d/173LdGFwhCMGFe8CMFre8UiJWcwZy_NAq/preview','https://www.youtube.com/embed/W8Yg6ibfwwY'),
    ('Peleando en familia','2019-08-27','445629-fighting-with-my-family','https://drive.google.com/file/d/175dt_Vh1ywoLjn19L2hc3fA6OsMYZoOG/preview','https://www.youtube.com/embed/NhYFsiVvxEI'),
    ('Gretel y Hansel','2020-02-30','542224-gretel-and-hansel','https://drive.google.com/file/d/1xwsQcqn8TbXqNQhjK8gPzmqpkjn9oNim/preview','https://www.youtube.com/embed/RZ5rlOw-o3w'),
    ('Guilty','2020-03-06','675592-guilty','https://drive.google.com/file/d/14-HUPDJY_e7-s1cRlkqmN-GXqHR87Vk_/preview','https://www.youtube.com/embed/6sQ85MrpOPI'),
    ('Feliz día de tu muerte 2','2019-06-16','512196-happy-death-day-2','https://drive.google.com/file/d/1DdvvEA3ZOaKSFXVYh4cqSW9Q8IUTNINl/preview','https://www.youtube.com/embed/PUfJQiFw0zU'),
    ('I Am Mother','2019-10-12','505948-i-am-mother','https://drive.google.com/file/d/1LJ0PmN3HE-x9T5xORhB_XCHD5ImxV8Py/preview','https://www.youtube.com/embed/D9o69kiSd70'),
    ('En la hierba alta','2019-10-04','523139-in-the-tall-grass','https://drive.google.com/file/d/1_npTv2NCv8NCLMvQteOyXRVbXvN4guii/preview','https://www.youtube.com/embed/bv65SkyyId8'),
    ('Intercambiadas','2019-04-04','606978-intercambiadas','https://drive.google.com/file/d/15MDG4P9dTB4nZg6sLzVnO5s4N5vhiGxx/preview','https://www.youtube.com/embed/0eKOdyOae34'),
    ('Isi & Ossi','2020-02-14','658760-isi-ossi','https://drive.google.com/file/d/1-Tl-flMLOTOC4UqNFyBi2OmreKH76YTz/preview','https://www.youtube.com/embed/_i5WFJnTllI'),
    ('El secuestro de Stella','2019-07-12','611468-kidnapping-stella','https://drive.google.com/file/d/1PZVKxIDb8YhohJq5ATwTxU1KR4NRWr39/preview','https://www.youtube.com/embed/rLf9GUWW-1k'),
    ('Batman: La LEGO película','2019-04-12','324849-the-lego-batman-movie','https://drive.google.com/file/d/1mJXpgQNHrKq5C74A9EnPRfTaK8YzdnBb/preview','https://www.youtube.com/embed/rZKGmvijSBE'),
    ('Little Women','2020-01-23','483347-little-women','https://drive.google.com/file/d/1G9Viuhkcrk93VKpaqj69TydIkICV_ELs/preview','https://www.youtube.com/embed/8p-o8tPI3_8'),
    ('Casi imposible','2019-08-16','459992-long-shot','https://drive.google.com/file/d/13UQJHfCtWaO_yjTimCdm_FjOACxxWRka/preview','https://www.youtube.com/embed/JkFZ2sX9pxw'),
    ('Amor. Boda. Azar','2020-04-10','624808-love-wedding-repeat','https://drive.google.com/file/d/10R5eglztlavdceKa4Oxj7yEjB6Oxbgzf/preview','https://www.youtube.com/embed/nZ8S59BcpEE'),
    ('Secretos de Estado','2020-02-25','393624-official-secrets','https://drive.google.com/file/d/1L1wY00bUYKmqVZL4hR_zv0BXJhHrceY_/preview','https://www.youtube.com/embed/-MHG5vYE_ps'),
    ('Onward','2020-03-05','508439-onward','https://drive.google.com/file/d/1EG7djU17SALWaJYWPS6cE0dD5hAfIfDk/preview','https://www.youtube.com/embed/OaVg6SEFcqQ'),
    ('Project Ithaca','2019-08-16','600836-project-ithaca','https://drive.google.com/file/d/1p6Rm8uLors8qV2GRO9UBagTVMFq-7YgE/preview','https://www.youtube.com/embed/TvsqwMVapt0'),
    ('Pesadilla al amanecer','2019-06-12','571430','https://drive.google.com/file/d/1_YY4CzFJIYE3ycvoF8drTewqrhketHoC/preview','https://www.youtube.com/embed/ze3TS1DV3Q4'),
    ('Noche de bodas','2019-09-26','567609-ready-or-not','https://drive.google.com/file/d/1vBrk2fsIn9am9QpiAySNo7mPhktMov2U/preview','https://www.youtube.com/embed/Jpo7xvC_jUI'),
    ('Rocketman','2019-05-16','504608-rocketman','https://drive.google.com/file/d/1KCJQNGWhBJtktdlaFogmaTYNmaOtP4E2/preview','https://www.youtube.com/embed/CihuKdQzq8c'),
    ('Historias de miedo para contar en la oscuridad','2019-08-07','417384-scary-stories-to-tell-in-the-dark','https://drive.google.com/file/d/1_Ej5kLDz8OHU9UeO9o0nL2v0lj0iuVNo/preview','https://www.youtube.com/embed/agAPWd4VdV8'),
    ('Serenity','2019-07-26','452832-serenity','https://drive.google.com/file/d/1Whe0ap4UWwKHibPPGoLzuZn9zbytOlGs/preview','https://www.youtube.com/embed/dkL8C4uNGbo'),
    ('Sonic, la película','2020-02-13','454626-sonic-the-hedgehog','https://drive.google.com/file/d/1DOohxqz2gLz0sFMserkl5TqqbCJs-0Xh/preview','https://www.youtube.com/embed/Xb3E8eWZ1mk'),
    ('La trampa de la araña','2019-08-30','513413-spider-in-the-web','https://drive.google.com/file/d/13YKuJLviVQ_xtD5DakG78ZBzk6g_-hJ6/preview','https://www.youtube.com/embed/1koWJwiTN0w'),
    ('Stargirl','2020-03-13','382748-stargirl','https://drive.google.com/file/d/1pozXFn2wuuakgMVe5HSZ8IXlLIBH6AoB/preview','https://www.youtube.com/embed/eaKgdr3Y2uE'),
    ('Stuber Express','2019-06-11','513045-stuber','https://drive.google.com/file/d/1BBNmCp32spEcBA4DFgLvkmZDvtyrzwAb/preview','https://www.youtube.com/embed/JIx2dg52Eiw'),
    ('Terra Willy: Planeta desconocido','2019-05-03','580600-terra-willy','https://drive.google.com/file/d/1EgsJ6cEnuKY0WowAfwdTwbGZ4gQjOEHY/preview','https://www.youtube.com/embed/buVkB3TnvI0'),
    ('The Beach Bum','2019-04-28','441384-the-beach-bum','https://drive.google.com/file/d/1gxzZBr73Rnwe_0OzVVPwwPzT9wY_EMj4/preview','https://www.youtube.com/embed/H9O6whgYdrk'),
    ('El gran hackeo','2019-01-26','566222-the-great-hack','https://drive.google.com/file/d/1rxFN4_PLA4IkYv9-HEvZJOGQYYCOKVeW/preview','https://www.youtube.com/embed/-bLGb_cr1i8'),
    ('La maldición','2020-01-12','465086-the-grudge','https://drive.google.com/file/d/19k_waz-gBAnAUypQCcV29TC6b4X66xl5/preview','https://www.youtube.com/embed/SxcDo12DvNY'),
    ('El Rey León','2019-07-09','420818-the-lion-king','https://drive.google.com/file/d/1vBRbxNZAtfAmk6ux-FiOCTKE2CHnTUOX/preview','https://www.youtube.com/embed/mb79ctR-E-c'),
    ('Mi primer gran combate','2020-04-10','637157-the-main-event','https://drive.google.com/file/d/1Eg8h61VuEIlUu_mHskp_MyUAM8F4Fg7A/preview','https://www.youtube.com/embed/LA9lgKv_uCc'),
    ('El ritmo de la venganza','2020-02-15','466622-the-rhythm-section','https://drive.google.com/file/d/1m4VAQn5a3wxd4nsnkZUBv4-3oGbOvUUx/preview','https://www.youtube.com/embed/AmOskKnDVQg'),
    ('The Silence','2019-04-17','527261-the-silence','https://drive.google.com/file/d/1wxj0gKQ4WQ98FeSFXAzU2hn-DTEOQO-6/preview','https://www.youtube.com/embed/HrDI5otI1Ho'),
    ('The Souvenir','2019-05-17','473019-the-souvenir-part-i','https://drive.google.com/file/d/1iAwiXj6tgLTMaYm5xdpWQJbpTO2lQN9f/preview','https://www.youtube.com/embed/mqZJEwFVQ5U'),
    ('Presencias del mal','2020-01-23','492611-the-turning','https://drive.google.com/file/d/1KX_oQouKNdcwgewckTlUAguq86jcYwVc/preview','https://www.youtube.com/embed/3GtaFQQn8nw'),
    ('Trolls 2 Gira mundial','2020-04-02','446893-trolls-2','https://drive.google.com/file/d/1Na1Ml3O60OEIvxwGl71BBbaOZiR8EMD1/preview','https://www.youtube.com/embed/AAm5rK9SDJg'),
    ('Underwater','2020-01-08','443791-underwater','https://drive.google.com/file/d/18arom1MmyCb-p_8zDEa4pfYPnhZtrp4X/preview','https://www.youtube.com/embed/70BReScP2gM'),
    ('Nosotros','2019-03-21','458723-us','https://drive.google.com/file/d/1FS7y-vSQNw-4aIEjjvc8RBPnbYQoIS7y/preview','https://www.youtube.com/embed/nzCyY_fTowA'),
    ('Heridas','2019-03-29','505423-wounds','https://drive.google.com/file/d/13NyLm0Cn4N7mRMSyW1vuG23DR04F2ku3/preview','https://www.youtube.com/embed/VffkuW7zypc');


INSERT INTO `descriptions` (`fk_id_Tmdb`, `url_Img`, `description_Movie`, `duracion`, `vote_average`, `vote_count`) 
VALUES ('606978-intercambiadas','http://www.cinextreme.co/resources/cartelera/606978-intercambiadas/0.jpg','Paola y Lupe son polos opuestos. Paola, una
ejecutiva exitosa y madre de dos hijos; Lupe, una carismática y relajada empleada del hogar, que trabaja en la casa de
Paola por años. Una noche, el deseo del pequeño Vasco a una estrella fugaz pondrá todo al revés: Paola y Lupe despiertan
en el cuerpo de la otra. ¿Paola y Lupe? ¿Lupe y Paola? Ambas vivirán situaciones hilarantes y divertidas mientras buscan
una solución a su “ligero” problema.','140',10,1);





insert into genders (id_gender, name_gender)
    values ('28','Acción'),
            ('12','Aventura'),
            ('16','Animado'),
            ('35','Comedia'),
            ('80','Crimen'),
            ('99','Documentales'),
            ('18','Drama'),
            ('10751','Familia'),
            ('14','Fantasia'),
            ('36','Historia'),
            ('27','Terror'),
            ('10402','Musical'),
            ('9648','Misterio'),
            ('10749','Romance'),
            ('878','Ciencia ficción'),
            ('10770','Tv Peliculas'),
            ('53','Novela de suspenso'),
            ('10752','Guerra'),
            ('37','Occidental');
/*
API PARA SACAR POSTER Y BACKGRAUND = https://api.themoviedb.org/3/movie/38700-bad-boys-3/images?api_key=bc1c5a186336316ef24b88612a021747

API PARA DETALLES DE LA PELICULA = https://api.themoviedb.org/3/movie/38700-bad-boys-3?language=es-ES&api_key=bc1c5a186336316ef24b88612a021747


/
