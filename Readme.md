# SIMBA V3
## How to install?
1. Clone the repository
> git clone https://github.com/iermb/SIMBA3.git
2. Browse the dev branch
> cd SIMBA3
> 
> git checkout dev
3. Run Docker compose
> docker-compose run -d
4. Install php dependencies
> docker-compose run composer composer update
5. Create Database
> docker-compose run php php bin/console doctrine:schema:update --force
6. Insert example data

Visit ``http://localhost:8081/?pgsql=db&username=iermbdb&db=simba3&ns=public&import=`` to import sql file **SIMBA3/infrastructure/database/example-inserts.sql**
7. Check the API

For example, visit ``http://localhost:8080/en/indicator/1/`` to verify the API.

## Endpoints
Currently, there are the following endpoints:
* /locale/indicator/{indicatorId}/
* /locale/indicator/{indicatorId}/values/
  

* /locale/type-area/
* /locale/type-area/{code}/area/
  

* /locale/type-independent-variable/
* /locale/type-independent-variable/{typeIndependentVariableId}/independent-variable/