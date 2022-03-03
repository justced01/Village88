-- Get all the list of countries that are in the continent of Europe:
SELECT * 
FROM country 
WHERE continent = 'Europe';
-- Get all the list of countries that are in the continent of North America and Africa:
SELECT *
FROM country
WHERE continent IN ('North America', 'Africa');
-- Get all the list of cities that are part of a country with population greater than 100 millions:
SELECT 
	country.code AS country_code, country.name AS country_name, continent, 
    country.population AS country_population, city.name 
FROM country
LEFT JOIN city ON country.code = city.countrycode
WHERE country.population > 100000000;	
-- Get all the list of countries (display the full country name) who speak 'Spanish' as their language:
SELECT country.name AS country, countrylanguage.language
FROM country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE countrylanguage.language = 'Spanish';
-- Get all the list of countries (display the full country name) who speak 'Spanish' as their official language:
SELECT country.name AS country, countrylanguage.language, countrylanguage.isofficial
FROM country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE countrylanguage.language = 'Spanish' AND isofficial = 'T';
-- Get all the list of countries (display the full country name) who speak either 'Spanish' or 'English' as their official language:
SELECT country.name AS country, countrylanguage.language
FROM country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE countrylanguage.language IN ('Spanish', 'English') AND isofficial = 'T';
-- Get all the list of countries (display the full country name) where 'Arabic' is spoken by more than 30% of thepopulation but where it's not the country's official language:
SELECT country.name AS country, countrylanguage.language, countrylanguage.percentage, countrylanguage.isofficial
FROM country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE countrylanguage.language = 'Arabic' AND countrylanguage.percentage > 30 AND isofficial = 'F';
-- Get all the list of countries (display the full country name) where 'French' is the official language but where less than 50% of the population in that country actually speaks that language:
SELECT country.name AS country, countrylanguage.language, countrylanguage.isofficial, countrylanguage.percentage
FROM country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE countrylanguage.language = 'French' AND countrylanguage.percentage < 50 AND isofficial = 'T';
-- Get all the list of countries (display the full country name and the full language name) and their official language. Order the result so that those with the same official language are shown together:
SELECT country.name AS country, countrylanguage.language, countrylanguage.isofficial
FROM country
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE isofficial = 'T'
ORDER BY countrylanguage.language;
-- Get the top 100 cities with the most population. Display the city's full country name also as well as their official language:
SELECT country.name AS country, city.name AS city, countrylanguage.language, countrylanguage.isofficial
FROM country
LEFT JOIN city ON country.code = city.countrycode
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE isofficial = 'T' 
ORDER BY city.population DESC
LIMIT 100;
-- . Get the top 100 cities with the most population where the life_expectancy for the country is less than 40:
SELECT country.name AS country, country.lifeexpectancy AS life_expectancy, city.name AS city, city.population
FROM country
LEFT JOIN city ON country.code = city.countrycode
WHERE country.lifeexpectancy < 40 
ORDER BY city.population DESC
LIMIT 100;
-- . Get the top 100 countries who speak English and where life expectancy is highest. Show the country with the highest life expectancy first.
SELECT country.name AS country, city.name AS city, country.lifeexpectancy AS life_expectancy
FROM country
LEFT JOIN city ON country.code = city.countrycode
LEFT JOIN countrylanguage ON country.code = countrylanguage.countrycode
WHERE countrylanguage.language = 'English'
ORDER BY country.lifeexpectancy DESC
LIMIT 100;