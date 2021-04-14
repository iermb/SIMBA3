INSERT INTO "type_area" ("id", "code", "language", "name") VALUES
(1, 34,	'ca',	'Provincia'),
(2, 101,	'ca',	'Ciutat');

INSERT INTO "area" ("code", "type_id", "name") VALUES
(1,	1,	'Girona'),
(2,	1,	'Lleida'),
(3,	1,	'Tarragona'),
(4,	1,	'Barcelona'),
(5,	2,	'Barcelona'),
(6,	2,	'Castelldefels');

INSERT INTO "type_independent_variable" ("id", "code", "name", "language") VALUES
(1,55,  'sexe',	'ca'),
(2,66,	'Edat',	'ca');

INSERT INTO "independent_variable" ("code", "type_id", "name") VALUES
(1,	1,	'Home'),
(2,	1,	'Dona'),
(3,	2,	'Menor d''edat'),
(4,	2,	'Major d''edat');

INSERT INTO "type_indicator" ("id", "has_area", "has_year", "has_month", "num_independent_vars", "value_type") VALUES
(1,	'0',	'1',	'0',	0,	'YEAR_VALUE'),
(2,	'1',	'1',	'0',	0,	'AREA_YEAR_VALUE'),
(3,	'1',	'1',	'0',	1,	'AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE'),
(4,	'1',	'1',	'0',	2,	'AREA_INDEPENDENT_VARIABLE_2_YEAR_VALUE');

INSERT INTO "indicator" ("id", "type_id", "decimals") VALUES
(1,	1,	0),
(2,	2,	0),
(3,	3,	0),
(4,	4,	0);

INSERT INTO "indicator_translation" ("language", "indicator_id", "name", "description", "units", "note", "font", "methodology") VALUES
('en',	1,	'Earth Population',	'Indicator of Earth Population by year',	'milions of people',	'Number of humans',	'worldometers.info',	'-'),
('ca',	2,	'Població provincies de Catalunya',	'Nombre d''habitants a les diferents provincies de Catalunya',	'habitants',	'-',	'idescat',	'Registre'),
('ca',	3,	'Població per sexe',	'Nombre d''habitants per sexe',	'persones',	'Dades extretes del SIMBA v2',	'Simba 2',	'-'),
('ca',	4,	'Immigració per sexe i edat',	'Nombre d''habitants en població d''origen estranger per sexe i edat ',	'persones',	'Dades extretes del SIMBA v2',	'Estadística de Variacions Residencials.',	'-');

INSERT INTO "area_independent_variable_1_year_value" ("indicator_id", "type_area_code", "area_code", "type_independent_variable_1_code", "independent_variable_1_code", "year", "value", "is_public", "note_value") VALUES
(3,	101,	5,	55,	1,	2016,	761487.0000,	'1',	NULL),
(3,	101,	5,	55,	1,	2015,	759520.0000,	'1',	NULL),
(3,	101,	6,	55,	1,	2015,	31500.0000,	'1',	NULL),
(3,	101,	6,	55,	1,	2016,	32034.0000,	'1',	NULL),
(3,	101,	5,	55,	2,	2015,	845035.0000,	'1',	NULL),
(3,	101,	5,	55,	2,	2016,	847259.0000,	'1',	NULL),
(3,	101,	6,	55,	2,	2015,	32391.0000,	'1',	NULL),
(3,	101,	6,	55,	2,	2016,	32858.0000,	'1',	NULL);


INSERT INTO "area_independent_variable_2_year_value" ("indicator_id", "type_area_code", "area_code", "type_independent_variable_1_code", "independent_variable_1_code", "type_independent_variable_2_code", "independent_variable_2_code", "year", "value", "is_public", "note_value") VALUES
(4,	101,	5,	55,	1,	66,	3,	2017,	6244.0000,	'1',	NULL),
(4,	101,	5,	55,	1,	66,	3,	2018,	6515.0000,	'1',	NULL),
(4,	101,	5,	55,	2,	66,	3,	2017,	5582.0000,	'1',	NULL),
(4,	101,	5,	55,	2,	66,	3,	2018,	5824.0000,	'1',	NULL),
(4,	101,	6,	55,	2,	66,	3,	2017,	384.0000,	'1',	NULL),
(4,	101,	6,	55,	2,	66,	3,	2018,	462.0000,	'1',	NULL),
(4,	101,	6,	55,	1,	66,	3,	2017,	446.0000,	'1',	NULL),
(4,	101,	6,	55,	1,	66,	3,	2018,	462.0000,	'1',	NULL),
(4,	101,	5,	55,	1,	66,	4,	2017,	44831.0000,	'1',	NULL),
(4,	101,	5,	55,	1,	66,	4,	2018,	48493.0000,	'1',	NULL),
(4,	101,	6,	55,	1,	66,	4,	2017,	1976.0000,	'1',	NULL),
(4,	101,	6,	55,	1,	66,	4,	2018,	2014.0000,	'1',	NULL),
(4,	101,	5,	55,	2,	66,	4,	2017,	45901.0000,	'1',	NULL),
(4,	101,	5,	55,	2,	66,	4,	2018,	47784.0000,	'1',	NULL),
(4,	101,	6,	55,	2,	66,	4,	2017,	1936.0000,	'1',	NULL),
(4,	101,	6,	55,	2,	66,	4,	2018,	2016.0000,	'1',	NULL);


INSERT INTO "area_year_value" ("indicator_id", "type_area_code", "area_code", "year", "value", "is_public", "note_value") VALUES
(2,	34,	1,	2020,	765554.0000,	'1',	NULL),
(2,	34,	1,	2019,	755396.0000,	'1',	NULL),
(2,	34,	2,	2020,	434613.0000,	'1',	NULL),
(2,	34,	2,	2019,	430255.0000,	'1',	NULL),
(2,	34,	3,	2020,	818702.0000,	'1',	NULL),
(2,	34,	3,	2019,	806091.0000,	'1',	NULL),
(2,	34,	4,	2020,	5703334.0000,	'1',	NULL),
(2,	34,	4,	2019,	5627752.0000,	'1',	NULL);

INSERT INTO "year_value" ("indicator_id", "year", "value", "is_public", "note_value") VALUES
(1,	2020,	7794.7980,	'1',	NULL),
(1,	2019,	7713.4680,	'1',	NULL),
(1,	2017,	7547.8580,	'1',	NULL),
(1,	2018,	7631.0910,	'1',	NULL),
(1,	2016,	7464.0220,	'1',	NULL);