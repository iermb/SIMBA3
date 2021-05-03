INSERT INTO "type_area" ("id", "code", "language", "name") VALUES
(1,	34,	'ca',	'Provincia'),
(2,	101,	'ca',	'Ciutat'),
(3,	34,	'es',	'Provincia'),
(4,	101,	'es',	'Ciudad'),
(5,	34,	'en',	'Province'),
(6,	101,	'en',	'City');

INSERT INTO "area" ("code", "type_id", "name") VALUES
(1,	1,	'Girona'),
(2,	1,	'Lleida'),
(3,	1,	'Tarragona'),
(4,	1,	'Barcelona'),
(5,	2,	'Barcelona'),
(6,	2,	'Castelldefels'),
(1,	3,	'Gerona'),
(1,	5,	'Girona'),
(2,	3,	'Lerida'),
(2,	5,	'Lleida'),
(3,	3,	'Tarragona'),
(3,	5,	'Tarragona'),
(4,	3,	'Barcelona'),
(4,	5,	'Barcelona'),
(6,	4,	'Castelldefels'),
(6,	6,	'Castelldefels'),
(5,	4,	'Barcelona'),
(5,	6,	'Barcelona');

INSERT INTO "type_independent_variable" ("id", "code", "name", "language") VALUES
(1,	55,	'Sexe',	'ca'),
(2,	66,	'Edat',	'ca'),
(3,	55,	'Sexo',	'es'),
(4,	66,	'Edad',	'es'),
(5,	55,	'Sex',	'en'),
(6,	66,	'Age',	'en');

INSERT INTO "independent_variable" ("code", "type_id", "name") VALUES
(1,	1,	'Home'),
(2,	1,	'Dona'),
(3,	2,	'Menor d''edat'),
(4,	2,	'Major d''edat'),
(1,	3,	'Hombre'),
(2,	3,	'Mujer'),
(2,	5,	'Woman'),
(1,	5,	'Man'),
(3,	4,	'Menor de edad'),
(3,	6,	'Minor'),
(4,	6,	'Of Age'),
(4,	4,	'Mayor de edad');

INSERT INTO "type_indicator" ("id", "has_area", "has_year", "has_month", "num_independent_vars", "value_type", "has_term") VALUES
(2,	'1',	'1',	'0',	0,	'AREA_YEAR_VALUE',	'0'),
(1,	'0',	'1',	'0',	0,	'YEAR_VALUE',	'0'),
(4,	'1',	'1',	'0',	2,	'AREA_INDEPENDENT_VARIABLE_2_YEAR_VALUE',	'0'),
(5,	'1',	'1',	'1',	0,	'AREA_MONTH_YEAR_VALUE',	'0'),
(3,	'1',	'1',	'0',	1,	'AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE',	'0'),
(6,	'1',	'1',	'0',	0,	'AREA_TERM_YEAR_VALUE',	'1');

INSERT INTO "indicator" ("id", "type_id", "decimals") VALUES
(1,	1,	0),
(2,	2,	0),
(3,	3,	0),
(4,	4,	0),
(5,	5,	0),
(6,	6,	0);

INSERT INTO "indicator_translation" ("language", "indicator_id", "name", "description", "units", "note", "font", "methodology") VALUES
('ca',	1,	'Població de la Terra',	'Indicador de població mundial per any',	'mil·lions de persones',	'Nombre d''humans',	'worldometers.info',	'-'),
('ca',	2,	'Població provincies de Catalunya',	'Nombre d''habitants a les diferents provincies de Catalunya',	'habitants',	'-',	'idescat',	'Registre'),
('ca',	3,	'Població per sexe',	'Nombre d''habitants per sexe',	'persones',	'Dades extretes del SIMBA v2',	'Simba 2',	'-'),
('ca',	4,	'Immigració per sexe i edat',	'Nombre d''habitants en població d''origen estranger per sexe i edat ',	'persones',	'Dades extretes del SIMBA v2',	'Estadística de Variacions Residencials.',	'-'),
('es',	1,	'Población de la Tierra',	'Indicador de población mundial por año',	'millones de personas',	'Número de humanos',	'worldometers.info',	'-'),
('es',	2,	'Población provincias de Cataluña',	'Número de habitantes en las diferentes provincias de Cataluña',	'habitantes',	'-',	'idescat',	'Registro'),
('es',	4,	'Immigración per sexo y edad',	'Número de habitantes en población de origen extranjero por sexo y edad ',	'personas',	'Datos extraídos de SIMBA v2',	'Estadística de Variaciones Residenciales.',	'-'),
('en',	1,	'Earth Population',	'Indicator of Earth Population by year',	'milions of people',	'Number of humans',	'worldometers.info',	'-'),
('en',	2,	'Population of the provinces of Catalonia ',	'Number of inhabitants in the different provinces of Catalonia',	'inhabitants',	'-',	'idescat',	'Register'),
('en',	4,	'Immigration by sex and age ',	'Number of inhabitants in population of foreign origin by sex and age ',	'people',	'Data extracted from SIMBA v2',	'Residential Variation Statistics',	'-'),
('ca',	5,	'Demanda del servei Bicing',	'Nombre de viatges efectuats amb el servei Bicing (bicicletes mecàniques o elèctriques).',	'viatges',	'-',	'simba v2',	'Dades extretes del Bicing'),
('es',	5,	'Demanda del servicio Bicing',	'Número de viajes efectuados con el servicio Bicing (bicicletas mecánicas o eléctricas). ',	'viajes',	'-',	'simba v2',	'Datos extraídos de Bicing'),
('en',	5,	'Demand for the Bicing service ',	'Number of trips made with the Bicing service (mechanical or electric bicycles). ',	'trips',	'-',	'simba v2',	'Data extracted from Bicing'),
('es',	3,	'Población per sexo',	'Número de habitantes por sexo',	'persones',	'Datos extraídos del SIMBA v2',	'Simba 2',	'-'),
('en',	3,	'Population by sex',	'Number of inhabitants by sex',	'persones',	'Data extracted from SIMBA v2',	'Simba 2',	'-'),
('ca',	6,	'Treballadors afiliats de règim general ',	'Nombre de treballadors afiliats de règim general a catalunya',	'treballadors',	'-',	'Generalitat de Catalunya, Observatori d''Empresa i Ocupació.',	'Extret del SIMBA v2'),
('es',	6,	'Trabajadores afiliados de régimen general ',	'Número de trabajadores afiliados de régimen general en Cataluña ',	'trabajadores',	'-',	'Resultats de traducció Generalidad de Cataluña, Observatorio de Empresa y Empleo.',	'Extraído de SIMBA v2'),
('en',	6,	'General regime affiliated workers',	'Number of workers affiliated with the general regime in Catalonia ',	'workers',	'-',	'Generalitat de Catalunya, Business and Employment Observatory. ',	'Resultats de traducció Extracted from SIMBA v2 ');

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

INSERT INTO "area_month_year_value" ("indicator_id", "type_area_code", "area_code", "month", "year", "value", "is_public", "note_value") VALUES
(5,	101,	5,	1,	2019,	842455.0000,	'1',	NULL),
(5,	101,	5,	2,	2019,	843131.0000,	'1',	NULL),
(5,	101,	5,	3,	2019,	1011079.0000,	'1',	NULL),
(5,	101,	5,	4,	2019,	1034141.0000,	'1',	NULL),
(5,	101,	5,	5,	2019,	1219669.0000,	'1',	NULL),
(5,	101,	5,	6,	2019,	1205838.0000,	'1',	NULL),
(5,	101,	5,	7,	2019,	1273804.0000,	'1',	NULL),
(5,	101,	5,	8,	2019,	1050111.0000,	'1',	NULL),
(5,	101,	5,	9,	2019,	1207306.0000,	'1',	NULL),
(5,	101,	5,	10,	2019,	1384891.0000,	'1',	NULL),
(5,	101,	5,	11,	2019,	1159738.0000,	'1',	NULL),
(5,	101,	5,	12,	2019,	977521.0000,	'1',	NULL),
(6,	101,	5,	1,	2019,	981203.0000,	'1',	NULL),
(6,	101,	5,	2,	2019,	990276.0000,	'1',	NULL),
(6,	101,	5,	3,	2019,	971249.0000,	'1',	NULL),
(6,	101,	5,	4,	2019,	978275.0000,	'1',	NULL),
(6,	101,	6,	1,	2019,	11614.0000,	'1',	NULL),
(6,	101,	6,	2,	2019,	11844.0000,	'1',	NULL),
(6,	101,	6,	3,	2019,	11722.0000,	'1',	NULL),
(6,	101,	6,	4,	2019,	11783.0000,	'1',	NULL);

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

INSERT INTO "area_indicator" ("type_area_code", "area_code", "indicator_id") VALUES
(34,	1,	2),
(34,	2,	2),
(34,	3,	2),
(34,	4,	2);