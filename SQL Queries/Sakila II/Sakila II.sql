-- Get all the list of customers.
SELECT * FROM customer;
-- Get all the list of customers as well as their address.
SELECT concat(first_name,' ', last_name) AS customer_name, address FROM customer LEFT JOIN address ON customer.address_id = address.address_id;
-- Get all the list of customers as well as their address and the city name.
SELECT concat(first_name,' ', last_name) AS customer_name, address, city 
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id;
-- Get all the list of customers as well as their address, city name, and the country.
SELECT concat(first_name,' ', last_name) AS customer_name, address, city, country 
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id; 
-- Get all the list of customers who live in Bolivia
SELECT concat(first_name,' ', last_name) AS customer_name, address, city, country 
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE country = 'BOLIVIA';
-- Get all the list of customers who live in Bolivia, Germany and Greece
SELECT concat(first_name,' ', last_name) AS customer_name, address, city, country 
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE country IN ('BOLIVIA', 'GERMANY', 'GREECE');
-- Get all the list of customers who live in the city of Baku.
SELECT concat(first_name,' ', last_name) AS customer_name, address, city, country 
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
WHERE city = 'BAKU';
-- Get all the list of customers who live in the city of Baku, Beira, and Bergamo.
SELECT concat(first_name,' ', last_name) AS customer_name, address, city, country 
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
WHERE city IN ('BAKU' , 'BEIRA', 'BERGAMO');
-- Get all the list of customers who live in a country where the country name's length is less than 5.  Show the customer with the longest full name first. 
SELECT CONCAT(first_name,' ', last_name) AS customer_name, country, LENGTH(country) AS country_name_length
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
WHERE LENGTH(country) < 5
ORDER BY LENGTH(CONCAT(first_name,' ', last_name)) DESC;
-- Get all the list of customers who live in a city name whose length is more than 10.  Order the result so that the customers who live in the same country are shown together
SELECT CONCAT(first_name,' ', last_name) AS customer_name, country, city, LENGTH(city) AS city_name_length
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
WHERE LENGTH(city) > 10
ORDER BY country ASC;
-- Get all the list of customers who live in a city where the city name includes the word 'ba'. For example Arratuba or Baiyin should show up in your result.
SELECT CONCAT(first_name,' ', last_name) AS customer_name, city	
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
WHERE city LIKE '%BA%';
-- Get all the list of customers where the city name includes a space.  Order the result so that customers who live in the longest city are shown first.
SELECT CONCAT(first_name,' ', last_name) AS customer_name, city	
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
WHERE city LIKE '% %'
ORDER BY LENGTH(city) DESC;
-- . Get all the customers where the country name is longer than the city name.
SELECT CONCAT(first_name,' ', last_name) AS customer_name, city, country, LENGTH(city) AS city_name_length, LENGTH(country) AS country_name_length
FROM customer 
LEFT JOIN address ON customer.address_id = address.address_id 
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
WHERE LENGTH(country) > LENGTH(city);