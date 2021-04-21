# SIMBA V3
## Testing
Having DB information from the SQL file **SIMBA3/infrastructure/database/example-inserts.sql**, let's see some API tests:

### /{locale}/indicator/{indicatorId}/
This endpoint returns the general information of a indicator from its language and identificator.


``http://localhost:8080/en/indicator/1/`` will return:
> {"id":1,"locale":"en","name":"Earth Population","description":"Indicator of Earth Population by year","units":"milions of people","decimals":0,"note":"Number of humans","font":"worldometers.info","methodology":"-","hasArea":false,"hasYear":true,"hasMonth":false,"numIndependentVars":0}

``http://localhost:8080/ca/indicator/2/`` will return:
> {"id":2,"locale":"ca","name":"Poblaci\u00f3 provincies de Catalunya","description":"Nombre d\u0027habitants a les diferents provincies de Catalunya","units":"habitants","decimals":0,"note":"-","font":"idescat","methodology":"Registre","hasArea":true,"hasYear":true,"hasMonth":false,"numIndependentVars":0}

``http://localhost:8080/ca/indicator/3/`` will return:
> {"id":3,"locale":"ca","name":"Poblaci\u00f3 per sexe","description":"Nombre d\u0027habitants per sexe","units":"persones","decimals":0,"note":"Dades extretes del SIMBA v2","font":"Simba 2","methodology":"-","hasArea":true,"hasYear":true,"hasMonth":false,"numIndependentVars":1}

``http://localhost:8080/ca/indicator/4/`` will return:
> {"id":4,"locale":"ca","name":"Immigraci\u00f3 per sexe i edat","description":"Nombre d\u0027habitants en poblaci\u00f3 d\u0027origen estranger per sexe i edat ","units":"persones","decimals":0,"note":"Dades extretes del SIMBA v2","font":"Estad\u00edstica de Variacions Residencials.","methodology":"-","hasArea":true,"hasYear":true,"hasMonth":false,"numIndependentVars":2}

### /{locale}/indicator/{indicatorId}/values/
This endpoint returns the general information of an indicator (from its language and identificator) + its values related + dictionaries of values 

``http://localhost:8080/en/indicator/1/values/`` will return:
> [{"id":1,"locale":"en","name":"Earth Population","description":"Indicator of Earth Population by year","methodology":"-","font":"worldometers.info","units":"milions of people","decimals":0,"note":"Number of humans","hasAreaIndicator":"false","hasMonthIndicator":"false","hasYearIndicator":"true","numIndependentVariablesIndicator":0,"nameTypeIndicator":"YEAR_VALUE"},[[{"yearId":2020,"yearName":2020},{"yearId":2019,"yearName":2019},{"yearId":2017,"yearName":2017},{"yearId":2018,"yearName":2018},{"yearId":2016,"yearName":2016}]],[[1,2020,7794.798],[1,2019,7713.468],[1,2017,7547.858],[1,2018,7631.091],[1,2016,7464.022]]]

``http://localhost:8080/ca/indicator/2/values/`` will return:
> [{"id":2,"locale":"ca","name":"Poblaci\u00f3 provincies de Catalunya","description":"Nombre d\u0027habitants a les diferents provincies de Catalunya","methodology":"Registre","font":"idescat","units":"habitants","decimals":0,"note":"-","hasAreaIndicator":"true","hasMonthIndicator":"false","hasYearIndicator":"true","numIndependentVariablesIndicator":0,"nameTypeIndicator":"AREA_YEAR_VALUE"},[[{"code":34,"typeAreaName":"Provincia","areas":[{"areaId":1,"areaName":"Girona"},{"areaId":2,"areaName":"Lleida"},{"areaId":3,"areaName":"Tarragona"},{"areaId":4,"areaName":"Barcelona"}]}],[{"yearId":2020,"yearName":2020},{"yearId":2019,"yearName":2019}]],[[2,1,1,2020,765554],[2,1,1,2019,755396],[2,1,2,2020,434613],[2,1,2,2019,430255],[2,1,3,2020,818702],[2,1,3,2019,806091],[2,1,4,2020,5703334],[2,1,4,2019,5627752]]]

``http://localhost:8080/ca/indicator/3/values/`` will return:
> [{"id":3,"locale":"ca","name":"Poblaci\u00f3 per sexe","description":"Nombre d\u0027habitants per sexe","methodology":"-","font":"Simba 2","units":"persones","decimals":0,"note":"Dades extretes del SIMBA v2","hasAreaIndicator":"true","hasMonthIndicator":"false","hasYearIndicator":"true","numIndependentVariablesIndicator":1,"nameTypeIndicator":"AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE"},[[{"code":101,"typeAreaName":"Ciutat","areas":[{"areaId":5,"areaName":"Barcelona"},{"areaId":6,"areaName":"Castelldefels"}]}],[{"typeIndependentVariableId":1,"independentVariableId":1,"typeIndependentVariableName":"sexe","independentVariableName":"Home"},{"typeIndependentVariableId":1,"independentVariableId":2,"typeIndependentVariableName":"sexe","independentVariableName":"Dona"}],[{"yearId":2016,"yearName":2016},{"yearId":2015,"yearName":2015}]],[[3,2,5,1,1,2016,761487],[3,2,5,1,1,2015,759520],[3,2,6,1,1,2015,31500],[3,2,6,1,1,2016,32034],[3,2,5,1,2,2015,845035],[3,2,5,1,2,2016,847259],[3,2,6,1,2,2015,32391],[3,2,6,1,2,2016,32858]]]

``http://localhost:8080/ca/indicator/4/values/`` will return:
> [{"id":4,"locale":"ca","name":"Immigraci\u00f3 per sexe i edat","description":"Nombre d\u0027habitants en poblaci\u00f3 d\u0027origen estranger per sexe i edat ","methodology":"-","font":"Estad\u00edstica de Variacions Residencials.","units":"persones","decimals":0,"note":"Dades extretes del SIMBA v2","hasAreaIndicator":"true","hasMonthIndicator":"false","hasYearIndicator":"true","numIndependentVariablesIndicator":2,"nameTypeIndicator":"AREA_INDEPENDENT_VARIABLE_2_YEAR_VALUE"},[[{"code":101,"typeAreaName":"Ciutat","areas":[{"areaId":5,"areaName":"Barcelona"},{"areaId":6,"areaName":"Castelldefels"}]}],[{"typeIndependentVariableId":1,"independentVariableId":1,"typeIndependentVariableName":"sexe","independentVariableName":"Home"},{"typeIndependentVariableId":1,"independentVariableId":2,"typeIndependentVariableName":"sexe","independentVariableName":"Dona"}],[{"typeIndependentVariableId":2,"independentVariableId":3,"typeIndependentVariableName":"Edat","independentVariableName":"Menor d\u0027edat"},{"typeIndependentVariableId":2,"independentVariableId":4,"typeIndependentVariableName":"Edat","independentVariableName":"Major d\u0027edat"}],[{"yearId":2017,"yearName":2017},{"yearId":2018,"yearName":2018}]],[[4,2,5,1,1,2,3,2017,6244],[4,2,5,1,1,2,3,2018,6515],[4,2,5,1,2,2,3,2017,5582],[4,2,5,1,2,2,3,2018,5824],[4,2,6,1,2,2,3,2017,384],[4,2,6,1,2,2,3,2018,462],[4,2,6,1,1,2,3,2017,446],[4,2,6,1,1,2,3,2018,462],[4,2,5,1,1,2,4,2017,44831],[4,2,5,1,1,2,4,2018,48493],[4,2,6,1,1,2,4,2017,1976],[4,2,6,1,1,2,4,2018,2014],[4,2,5,1,2,2,4,2017,45901],[4,2,5,1,2,2,4,2018,47784],[4,2,6,1,2,2,4,2017,1936],[4,2,6,1,2,2,4,2018,2016]]]

#### Filter
This endpoint also accepts a filter to delimit results. Filter should be attached at the end of the endpoint like so:
``?filter={XXX}`` where **XXX** are variables:

- "years":[year]
- "years":[year1, year2]
  

- "areas":[[typeAreaId,areaId]]
- "areas":[[typeAreaId1,areaId1],[typeAreaId2,areaId2]]


- "independentVariable1s":[[typeIndependentVariable,independentVariable]]
- "independentVariable1s":[[typeIndependentVariable1,independentVariable1],[typeIndependentVariable2,independentVariable2]]


- "independentVariable2s":[[typeIndependentVariable,independentVariable]]
- "independentVariable2s":[[typeIndependentVariable1,independentVariable1],[typeIndependentVariable2,independentVariable2]]


### /{locale}/type-area/
This endpoint returns all type areas from a language

``http://localhost:8080/ca/type-area/`` will return:
> [{"code":34,"name":"Provincia"},{"code":101,"name":"Ciutat"}]


### /{locale}/type-area/{code}/area/
This endpoint returns all areas from a code (type area identification) and a language

``http://localhost:8080/ca/type-area/34/area`` will return:
> [{"id":1,"name":"Girona","type_name":"Provincia"},{"id":2,"name":"Lleida","type_name":"Provincia"},{"id":3,"name":"Tarragona","type_name":"Provincia"},{"id":4,"name":"Barcelona","type_name":"Provincia"}]

``http://localhost:8080/ca/type-area/101/area`` will return:
> [{"id":5,"name":"Barcelona","type_name":"Ciutat"},{"id":6,"name":"Castelldefels","type_name":"Ciutat"}]


### /{locale}/type-independent-variable/
This endpoint returns all types of independent variables from a language

``http://localhost:8080/ca/type-independent-variable/`` will return:
> [{"id":1,"name":"sexe"},{"id":2,"name":"Edat"}]


### /{locale}/type-independent-variable/{typeIndependentVariableId}/independent-variable/
This endpoint returns all independent variables from an identification (type of independent variable) and a language

``http://localhost:8080/ca/type-independent-variable/1/independent-variable/`` will return:
> [{"id":1,"name":"Home","type_name":"sexe"},{"id":2,"name":"Dona","type_name":"sexe"}]

``http://localhost:8080/ca/type-independent-variable/2/independent-variable/`` will return:
> [{"id":3,"name":"Menor d\u0027edat","type_name":"Edat"},{"id":4,"name":"Major d\u0027edat","type_name":"Edat"}]