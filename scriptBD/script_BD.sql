

-- This script was generated by a beta version of the ERD tool in pgAdmin 4.
-- Please log an issue at https://redmine.postgresql.org/projects/pgadmin4/issues/new if you find any bugs, including reproduction steps.
BEGIN;

-- Database: cadlivro

-- DROP DATABASE IF EXISTS cadlivro;

CREATE DATABASE cadlivro
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;


-- SEQUENCE: public.assunto_codas_seq

-- DROP SEQUENCE IF EXISTS public.assunto_codas_seq;

CREATE SEQUENCE IF NOT EXISTS public.assunto_codas_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 2147483647
    CACHE 1
    OWNED BY assunto.codas;

ALTER SEQUENCE public.assunto_codas_seq
    OWNER TO postgres;

-- SEQUENCE: public.autor_coau_seq

-- DROP SEQUENCE IF EXISTS public.autor_coau_seq;

CREATE SEQUENCE IF NOT EXISTS public.autor_coau_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 2147483647
    CACHE 1
    OWNED BY autor.coau;

ALTER SEQUENCE public.autor_coau_seq
    OWNER TO postgres;

-- SEQUENCE: public.livro_codl_seq

-- DROP SEQUENCE IF EXISTS public.livro_codl_seq;

CREATE SEQUENCE IF NOT EXISTS public.livro_codl_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 2147483647
    CACHE 1
    OWNED BY livro.codl;

ALTER SEQUENCE public.livro_codl_seq
    OWNER TO postgres;

CREATE TABLE IF NOT EXISTS public."Livro_Assunto"
(
    "Livro_Codl" integer NOT NULL,
    "Assunto_codAs" integer NOT NULL,
    CONSTRAINT "Livro_Assunto_pkey" PRIMARY KEY ("Livro_Codl", "Assunto_codAs")
)
WITH (
    OIDS = FALSE
);

CREATE TABLE IF NOT EXISTS public."Livro_Autor"
(
    "Livro_Codl" integer NOT NULL,
    "Autor_CodAu" integer NOT NULL,
    CONSTRAINT "Livro_Autor_pkey" PRIMARY KEY ("Livro_Codl", "Autor_CodAu")
)
WITH (
    OIDS = FALSE
);

CREATE TABLE IF NOT EXISTS public.assunto
(
    codas integer NOT NULL DEFAULT nextval('assunto_codas_seq'::regclass),
    descricao character varying(20) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT assunto_pkey PRIMARY KEY (codas)
)
WITH (
    OIDS = FALSE
);

CREATE TABLE IF NOT EXISTS public.autor
(
    coau integer NOT NULL DEFAULT nextval('autor_coau_seq'::regclass),
    nome character varying(40) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT autor_pkey PRIMARY KEY (coau)
)
WITH (
    OIDS = FALSE
);

CREATE TABLE IF NOT EXISTS public.livro
(
    codl integer NOT NULL DEFAULT nextval('livro_codl_seq'::regclass),
    titulo character varying(40) COLLATE pg_catalog."default" NOT NULL,
    editora character varying(40) COLLATE pg_catalog."default",
    edicao integer,
    anopublicacao character varying(4) COLLATE pg_catalog."default",
    CONSTRAINT livro_pkey PRIMARY KEY (codl)
)
WITH (
    OIDS = FALSE
);

ALTER TABLE IF EXISTS public."Livro_Assunto"
    ADD CONSTRAINT "Livro_Assunto_FKIndex1" FOREIGN KEY ("Livro_Codl")
    REFERENCES public.livro (codl) MATCH SIMPLE
    ON UPDATE CASCADE
    ON DELETE CASCADE;


ALTER TABLE IF EXISTS public."Livro_Assunto"
    ADD CONSTRAINT "Livro_Assunto_FKIndex2" FOREIGN KEY ("Assunto_codAs")
    REFERENCES public.assunto (codas) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public."Livro_Autor"
    ADD CONSTRAINT "Livro_Autor_FKindex1" FOREIGN KEY ("Livro_Codl")
    REFERENCES public.livro (codl) MATCH SIMPLE
    ON UPDATE CASCADE
    ON DELETE CASCADE
    NOT VALID;


ALTER TABLE IF EXISTS public."Livro_Autor"
    ADD CONSTRAINT "Livro_Autor_FKindex2" FOREIGN KEY ("Autor_CodAu")
    REFERENCES public.autor (coau) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;

END;

-- View: public.vwLivro

-- DROP VIEW public."vwLivro";

CREATE OR REPLACE VIEW public."vwLivro"
 AS
 SELECT a.nome,
    l.titulo,
    l.editora,
    l.edicao,
    l.anopublicacao
   FROM autor a
     JOIN "Livro_Autor" la ON a.coau = la."Autor_CodAu"
     JOIN livro l ON la."Livro_Codl" = l.codl
  GROUP BY a.nome, l.titulo, l.editora, l.edicao, l.anopublicacao;

ALTER TABLE public."vwLivro"
    OWNER TO postgres;

