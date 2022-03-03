-- How many customers are there for each country?  Have your result display the full country name and the number of customers for each country.
SELECT co.country, COUNT(c.active) AS total_number_of_customer 
FROM customer AS c 
LEFT JOIN address AS a ON c.address_id = a.address_id
LEFT JOIN city AS ci ON a.city_id = ci.city_id
LEFT JOIN country AS co ON ci.country_id = co.country_id
GROUP BY co.country
ORDER BY co.country;	
-- How many customers are there for each city?  Have your result display the full city name, the full country name, as well as the number of customers for each city.
SELECT ci.city, co.country, COUNT(c.customer_id) AS total_number_of_customer_city
FROM customer AS c 
LEFT JOIN address AS a ON c.address_id = a.address_id
LEFT JOIN city AS ci ON a.city_id = ci.city_id
LEFT JOIN country AS co ON ci.country_id = co.country_id
GROUP BY ci.city;
-- Retrieve both the average rental amount, the total rental amount, as well as the total number of transactions for each month of each year.
SELECT DATE_FORMAT(payment.payment_date, '%M-%Y') AS month_and_year, 
	SUM(amount) AS total_rental_month, 
	COUNT(payment_id) AS total_transactions,
	AVG(amount) AS average_rental_amount
FROM customer
LEFT JOIN payment ON customer.customer_id = payment.customer_id
GROUP BY month_and_year;
-- Your manager comes and asks you to pull payment report based on the hour of the day.  
-- The managers wants to know which hour the company earns the most money/payment.  
-- Have your sql query generate the top 10 hours of the day with the most sales.  
-- Have the first row of your result be the hour with the most payments received.
SELECT DATE_FORMAT(payment.payment_date, '%I %p') AS hours_of_the_day, 
	SUM(amount) AS total_payment_received
FROM customer
LEFT JOIN payment ON customer.customer_id = payment.customer_id
GROUP BY hours_of_the_day
ORDER BY total_payment_received DESC
LIMIT 10;