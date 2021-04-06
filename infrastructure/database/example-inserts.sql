-- Adminer 4.7.7 PostgreSQL dump

DROP TABLE IF EXISTS "area";
CREATE TABLE "public"."area" (
                                 "id" integer NOT NULL,
                                 "type_id" integer NOT NULL,
                                 "name" character varying(100) NOT NULL,
                                 "language" character varying(2) NOT NULL,
                                 CONSTRAINT "area_pkey" PRIMARY KEY ("id", "type_id"),
                                 CONSTRAINT "fk_d7943d68c54c8c93" FOREIGN KEY (type_id) REFERENCES type_area(id) NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "idx_d7943d68c54c8c93" ON "public"."area" USING btree ("type_id");

INSERT INTO "area" ("id", "type_id", "name", "language") VALUES
(1,	1,	'Girona',	'ca'),
(2,	1,	'Lleida',	'ca'),
(3,	1,	'Tarragona',	'ca'),
(4,	1,	'Barcelona',	'ca'),
(5,	2,	'Barcelona',	'ca'),
(6,	2,	'Castelldefels',	'ca');

DROP TABLE IF EXISTS "area_independent_variable_1_year_value";
CREATE TABLE "public"."area_independent_variable_1_year_value" (
                                                                   "indicator_id" integer NOT NULL,
                                                                   "type_area_id" smallint NOT NULL,
                                                                   "area_id" integer NOT NULL,
                                                                   "type_independent_variable_id" smallint NOT NULL,
                                                                   "independent_variable_id" integer NOT NULL,
                                                                   "year" smallint NOT NULL,
                                                                   "value" numeric(12,4),
                                                                   "is_public" boolean NOT NULL,
                                                                   "note_value" character varying(10),
                                                                   CONSTRAINT "area_independent_variable_1_year_value_pkey" PRIMARY KEY ("indicator_id", "type_area_id", "area_id", "type_independent_variable_id", "independent_variable_id", "year")
) WITH (oids = false);

INSERT INTO "area_independent_variable_1_year_value" ("indicator_id", "type_area_id", "area_id", "type_independent_variable_id", "independent_variable_id", "year", "value", "is_public", "note_value") VALUES
(3,	2,	5,	1,	1,	2016,	761487.0000,	'1',	NULL),
(3,	2,	5,	1,	1,	2015,	759520.0000,	'1',	NULL),
(3,	2,	6,	1,	1,	2015,	31500.0000,	'1',	NULL),
(3,	2,	6,	1,	1,	2016,	32034.0000,	'1',	NULL),
(3,	2,	5,	1,	2,	2015,	845035.0000,	'1',	NULL),
(3,	2,	5,	1,	2,	2016,	847259.0000,	'1',	NULL),
(3,	2,	6,	1,	2,	2015,	32391.0000,	'1',	NULL),
(3,	2,	6,	1,	2,	2016,	32858.0000,	'1',	NULL);

DROP TABLE IF EXISTS "area_independent_variable_2_year_value";
CREATE TABLE "public"."area_independent_variable_2_year_value" (
                                                                   "indicator_id" integer NOT NULL,
                                                                   "type_area_id" smallint NOT NULL,
                                                                   "area_id" integer NOT NULL,
                                                                   "type_independent_variable_1_id" smallint NOT NULL,
                                                                   "independent_variable_1_id" integer NOT NULL,
                                                                   "type_independent_variable_2_id" smallint NOT NULL,
                                                                   "independent_variable_2_id" integer NOT NULL,
                                                                   "year" smallint NOT NULL,
                                                                   "value" numeric(12,4),
                                                                   "is_public" boolean NOT NULL,
                                                                   "note_value" character varying(10),
                                                                   CONSTRAINT "area_independent_variable_2_year_value_pkey" PRIMARY KEY ("indicator_id", "type_area_id", "area_id", "type_independent_variable_1_id", "independent_variable_1_id", "type_independent_variable_2_id", "independent_variable_2_id", "year")
) WITH (oids = false);

INSERT INTO "area_independent_variable_2_year_value" ("indicator_id", "type_area_id", "area_id", "type_independent_variable_1_id", "independent_variable_1_id", "type_independent_variable_2_id", "independent_variable_2_id", "year", "value", "is_public", "note_value") VALUES
(4,	2,	5,	1,	1,	2,	3,	2017,	6244.0000,	'1',	NULL),
(4,	2,	5,	1,	1,	2,	3,	2018,	6515.0000,	'1',	NULL),
(4,	2,	5,	1,	2,	2,	3,	2017,	5582.0000,	'1',	NULL),
(4,	2,	5,	1,	2,	2,	3,	2018,	5824.0000,	'1',	NULL),
(4,	2,	6,	1,	2,	2,	3,	2017,	384.0000,	'1',	NULL),
(4,	2,	6,	1,	2,	2,	3,	2018,	462.0000,	'1',	NULL),
(4,	2,	6,	1,	1,	2,	3,	2017,	446.0000,	'1',	NULL),
(4,	2,	6,	1,	1,	2,	3,	2018,	462.0000,	'1',	NULL),
(4,	2,	5,	1,	1,	2,	4,	2017,	44831.0000,	'1',	NULL),
(4,	2,	5,	1,	1,	2,	4,	2018,	48493.0000,	'1',	NULL),
(4,	2,	6,	1,	1,	2,	4,	2017,	1976.0000,	'1',	NULL),
(4,	2,	6,	1,	1,	2,	4,	2018,	2014.0000,	'1',	NULL),
(4,	2,	5,	1,	2,	2,	4,	2017,	45901.0000,	'1',	NULL),
(4,	2,	5,	1,	2,	2,	4,	2018,	47784.0000,	'1',	NULL),
(4,	2,	6,	1,	2,	2,	4,	2017,	1936.0000,	'1',	NULL),
(4,	2,	6,	1,	2,	2,	4,	2018,	2016.0000,	'1',	NULL);

DROP TABLE IF EXISTS "area_year_value";
CREATE TABLE "public"."area_year_value" (
                                            "indicator_id" integer NOT NULL,
                                            "type_area_id" smallint NOT NULL,
                                            "area_id" integer NOT NULL,
                                            "year" smallint NOT NULL,
                                            "value" numeric(12,4),
                                            "is_public" boolean NOT NULL,
                                            "note_value" character varying(10),
                                            CONSTRAINT "area_year_value_pkey" PRIMARY KEY ("indicator_id", "type_area_id", "area_id", "year")
) WITH (oids = false);

INSERT INTO "area_year_value" ("indicator_id", "type_area_id", "area_id", "year", "value", "is_public", "note_value") VALUES
(2,	1,	1,	2020,	765554.0000,	'1',	NULL),
(2,	1,	1,	2019,	755396.0000,	'1',	NULL),
(2,	1,	2,	2020,	434613.0000,	'1',	NULL),
(2,	1,	2,	2019,	430255.0000,	'1',	NULL),
(2,	1,	3,	2020,	818702.0000,	'1',	NULL),
(2,	1,	3,	2019,	806091.0000,	'1',	NULL),
(2,	1,	4,	2020,	5703334.0000,	'1',	NULL),
(2,	1,	4,	2019,	5627752.0000,	'1',	NULL);

DROP TABLE IF EXISTS "independent_variable";
CREATE TABLE "public"."independent_variable" (
                                                 "id" integer NOT NULL,
                                                 "type_id" integer NOT NULL,
                                                 "name" character varying(100) NOT NULL,
                                                 "language" character varying(2) NOT NULL,
                                                 CONSTRAINT "independent_variable_pkey" PRIMARY KEY ("id", "type_id"),
                                                 CONSTRAINT "fk_2212d98dc54c8c93" FOREIGN KEY (type_id) REFERENCES type_independent_variable(id) NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "idx_2212d98dc54c8c93" ON "public"."independent_variable" USING btree ("type_id");

INSERT INTO "independent_variable" ("id", "type_id", "name", "language") VALUES
(1,	1,	'Home',	'ca'),
(2,	1,	'Dona',	'ca'),
(3,	2,	'Menor d''edat',	'ca'),
(4,	2,	'Major d''edat',	'ca');

DROP TABLE IF EXISTS "indicator";
CREATE TABLE "public"."indicator" (
                                      "id" integer NOT NULL,
                                      "type_id" integer,
                                      "name" character varying(100) NOT NULL,
                                      "description" character varying(5000),
                                      "units" character varying(100),
                                      "note" character varying(100),
                                      "font" character varying(100),
                                      "methodology" character varying(5000),
                                      "decimals" integer NOT NULL,
                                      CONSTRAINT "indicator_pkey" PRIMARY KEY ("id"),
                                      CONSTRAINT "uniq_d1349db35e237e06" UNIQUE ("name"),
                                      CONSTRAINT "fk_d1349db3c54c8c93" FOREIGN KEY (type_id) REFERENCES type_indicator(id) NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "idx_d1349db3c54c8c93" ON "public"."indicator" USING btree ("type_id");

INSERT INTO "indicator" ("id", "type_id", "name", "description", "units", "note", "font", "methodology", "decimals") VALUES
(1,	1,	'Earth Population',	'Indicator of Earth Population by year',	'milions of people',	'Number of humans',	'worldometers.info',	'-',	0),
(2,	2,	'Població provincies de Catalunya',	'Nombre d''habitants a les diferents provincies de Catalunya',	'habitants',	'-',	'idescat',	'Registre',	0),
(3,	3,	'Població per sexe',	'Nombre d''habitants per sexe',	'persones',	'Dades extretes del SIMBA v2',	'Simba 2',	'-',	0),
(4,	4,	'Immigració per sexe i edat',	'Nombre d''habitants en població d''origen estranger per sexe i edat ',	'persones',	'Dades extretes del SIMBA v2',	'Estadística de Variacions Residencials.',	'-',	0);

DROP TABLE IF EXISTS "type_area";
CREATE TABLE "public"."type_area" (
                                      "id" integer NOT NULL,
                                      "name" character varying(100) NOT NULL,
                                      "language" character varying(2) NOT NULL,
                                      CONSTRAINT "type_area_pkey" PRIMARY KEY ("id"),
                                      CONSTRAINT "uniq_9bf8605e237e06" UNIQUE ("name")
) WITH (oids = false);

INSERT INTO "type_area" ("id", "name", "language") VALUES
(1,	'Provincia',	'ca'),
(2,	'Ciutat',	'ca');

DROP TABLE IF EXISTS "type_independent_variable";
CREATE TABLE "public"."type_independent_variable" (
                                                      "id" integer NOT NULL,
                                                      "name" character varying(100) NOT NULL,
                                                      "language" character varying(2) NOT NULL,
                                                      CONSTRAINT "type_independent_variable_pkey" PRIMARY KEY ("id"),
                                                      CONSTRAINT "uniq_64fdd3475e237e06" UNIQUE ("name")
) WITH (oids = false);

INSERT INTO "type_independent_variable" ("id", "name", "language") VALUES
(1,	'sexe',	'ca'),
(2,	'Edat',	'ca');

DROP TABLE IF EXISTS "type_indicator";
CREATE TABLE "public"."type_indicator" (
                                           "id" integer NOT NULL,
                                           "has_area" boolean NOT NULL,
                                           "has_year" boolean NOT NULL,
                                           "has_month" boolean NOT NULL,
                                           "num_independent_vars" integer NOT NULL,
                                           "value_type" character varying(50) NOT NULL,
                                           CONSTRAINT "type_indicator_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "type_indicator" ("id", "has_area", "has_year", "has_month", "num_independent_vars", "value_type") VALUES
(1,	'0',	'1',	'0',	0,	'YEAR_VALUE'),
(2,	'1',	'1',	'0',	0,	'AREA_YEAR_VALUE'),
(3,	'1',	'1',	'0',	1,	'AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE'),
(4,	'1',	'1',	'0',	2,	'AREA_INDEPENDENT_VARIABLE_2_YEAR_VALUE');

DROP TABLE IF EXISTS "year_value";
CREATE TABLE "public"."year_value" (
                                       "indicator_id" integer NOT NULL,
                                       "year" smallint NOT NULL,
                                       "value" numeric(12,4),
                                       "is_public" boolean NOT NULL,
                                       "note_value" character varying(10),
                                       CONSTRAINT "year_value_pkey" PRIMARY KEY ("indicator_id", "year")
) WITH (oids = false);

INSERT INTO "year_value" ("indicator_id", "year", "value", "is_public", "note_value") VALUES
(1,	2020,	7794.7980,	'1',	NULL),
(1,	2019,	7713.4680,	'1',	NULL),
(1,	2017,	7547.8580,	'1',	NULL),
(1,	2018,	7631.0910,	'1',	NULL),
(1,	2016,	7464.0220,	'1',	NULL);

-- 2021-04-06 08:48:52.144754+00