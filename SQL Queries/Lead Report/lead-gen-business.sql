-- What query would you run to get all the sites that client=15 owns?
SELECT sites.domain_name AS website, clients.client_id
FROM sites
LEFT JOIN clients ON sites.client_id = clients.client_id
WHERE clients.client_id = 15;
-- What query would you run to get total count of domain created for June 2011?
SELECT DATE_FORMAT(created_datetime, '%M') AS month,
	COUNT(domain_name) AS total_count
FROM sites
WHERE created_datetime >= '2011-06-01' AND created_datetime < '2011-06-30';
-- What query would you run to get the total revenue for the date November 19th 2012?
SELECT DATE_FORMAT(charged_datetime, '%Y-%m-%d') AS date, SUM(billing.amount) AS revenue
FROM billing
WHERE charged_datetime > '2012-11-18' AND charged_datetime < '2012-11-20';
-- What query would you run to get total revenue earned monthly each year for the client with an id of 1?
SELECT billing.client_id,
	SUM(billing.amount) AS total_revenue,
    DATE_FORMAT(charged_datetime, '%M') AS month,
    DATE_FORMAT(charged_datetime, '%Y') AS year
FROM billing
WHERE billing.client_id = 1
GROUP BY month;
-- What query would you run to get total revenue of each client every month per year? Order it by client id.
SELECT CONCAT(first_name, ' ', last_name) AS client_name,
	SUM(billing.amount) AS total_revenue,
	DATE_FORMAT(charged_datetime, '%M') AS month_charged,
    DATE_FORMAT(charged_datetime, '%Y') AS year_charged
FROM billing
LEFT JOIN clients ON billing.client_id = clients.client_id
GROUP BY billing.billing_id
ORDER BY billing.client_id;
-- What query would you run to get which sites generated leads between March 15, 2011 to April 15, 2011? 
-- Show how many leads for each site. 
SELECT sites.domain_name AS website,
	COUNT(*) AS number_of_leads
FROM sites
LEFT JOIN leads ON sites.site_id = leads.site_id
WHERE registered_datetime BETWEEN '2011-03-15' AND '2011-04-15'
GROUP BY sites.site_id;
-- What query would you run to show all the site owners, the site name(s), 
-- and the total number of leads generated from each site for all time?
SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name,
	sites.domain_name AS website,
    COUNT(*) AS num_leads
FROM clients
LEFT JOIN sites ON clients.client_id = sites.client_id
LEFT JOIN leads ON sites.site_id = leads.site_id
GROUP BY leads.site_id;
-- What query would you run to get a list of site owners who had leads, and the total of each for the whole 2012
SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client,
    COUNT(*) AS number_of_leads	
FROM clients
LEFT JOIN sites ON clients.client_id = sites.client_id
LEFT JOIN leads ON sites.site_id = leads.site_id
WHERE registered_datetime BETWEEN '2012-01-01' AND '2012-12-31'
GROUP BY clients.client_id;
-- What query would you run to get a list of site owners and the total # of leads we've generated for each owner per month for the first half of Year 2012?
SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name,
    COUNT(*) AS num_leads,
	DATE_FORMAT(leads.registered_datetime, '%M') AS month
FROM clients
LEFT JOIN sites ON clients.client_id = sites.client_id
LEFT JOIN leads ON sites.site_id = leads.site_id
WHERE leads.registered_datetime >= '2012-01-01' AND leads.registered_datetime < '2012-07-01'
GROUP BY month, client_name
ORDER BY STR_TO_DATE(month, '%M');
-- Write a single query that retrieves all the site names that each client owns and its total count. Group the results so that each row shows a new client.
SELECT CONCAT(clients.first_name, ' ', clients.last_name) AS client_name,
	COUNT(*) AS number_of_sites,
    GROUP_CONCAT(domain_name) AS sites
FROM clients
LEFT JOIN sites ON clients.client_id = sites.client_id
GROUP BY client_name;

