--  How many countries in each continent, have life expectancy greater than 70?
SELECT continent, COUNT(name) AS country, lifeexpectancy 
FROM world.country
WHERE lifeexpectancy > 70
GROUP BY continent;
-- How many countries in each continent have life expectancy between 60 and 70?
SELECT continent, COUNT(name) AS country, lifeexpectancy 
FROM world.country
WHERE lifeexpectancy BETWEEN 60 AND 70
GROUP BY continent;
-- How many countries have life expectancy greater than 75?
SELECT country.name AS country, lifeexpectancy 
FROM world.country
WHERE lifeexpectancy > 75
GROUP BY country;
-- How many countries have life expectancy less than 40?
SELECT country.name AS country, lifeexpectancy 
FROM world.country
WHERE lifeexpectancy < 40
GROUP BY country;
-- How many people live in the top 10 countries with the most population?
SELECT country.name AS country, country.population AS populations
FROM world.country
GROUP BY country
ORDER BY populations DESC
LIMIT 10;
-- According to the world database, how many people are there in the world?
SELECT SUM(country.population) AS total_population
FROM world.country;
-- Show results for continents where it shows the continent name and the total population.  
-- Only show results where the total_population for the continent is more than 500,000,000.  
-- If. the continent doesn't have 500,000,000 people, do NOT show the result.
SELECT country.continent, SUM(country.population) AS total_population
FROM world.country
GROUP BY continent
HAVING SUM(country.population) > 500000000	;
-- Show results of all continents that has average life expectancy for the continent to be less than 71.  
-- Show each of these continent name, how many countries there are in each of the continent, total population 
-- for the continent, as well as the life expectancy of this continent.  For example, as Europe and North America 
-- both have continent life expectancy greater than 71, these continents shouldn't show up in your sql results.
SELECT continent, 
	COUNT(country.name) AS country, 
	SUM(country.population) AS total_population, 
    AVG(country.lifeexpectancy) AS life_expectancy
FROM world.country
GROUP BY continent
HAVING AVG(country.lifeexpectancy) < 71;
-- How many cities are there for each of the country? Show the total city count for each country where you display the full country name.
SELECT country.name AS country, 
	COUNT(city.name) AS number_of_cities
FROM world.country
LEFT JOIN city ON country.code = city.countrycode
GROUP BY country.name;
-- For each language, find out how many countries speak each language
SELECT country.name AS country, 
	countrylanguage.language,
	COUNT(countrylanguage.language) AS number_of_country
FROM world.country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
GROUP BY countrylanguage.language;
-- For each language, find out how many countries use that language as the official language
SELECT countrylanguage.language,
	COUNT(countrylanguage.language) AS total_countries,
    countrylanguage.isofficial
FROM world.country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE isofficial = 'T'
GROUP BY countrylanguage.language;
-- For each continent, find out how many cities there are (according to this database) and the average population
-- of the cities for each continent. For example, for continent A, have it state the number of cities for that
-- continent, and the average city population for that continent.
SELECT continent,
	COUNT(city.name) AS total_cities,
    AVG(city.population) AS average_cities_population
FROM world.country
LEFT JOIN city ON country.code = city.countrycode
GROUP BY continent;
-- (Advanced) Find out how many people in the world speak each language.  Make sure the total sum of. 
-- this number is comparable to the total population in the world.
SELECT countrylanguage.language,
	SUM(country.population * (countrylanguage.percentage / 100)) AS total_population
FROM world.country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
GROUP BY countrylanguage.language
ORDER BY total_population DESC;
    

