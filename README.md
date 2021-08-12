A Simple CRM Implementation

## Installation & Setup
To install and setup this application; 
1. clone the repository from git.
2. run `docker-compose up -d --build` in the root directory of this repo to create a docker container based on the dockerfile in this project. You can skip this step if you want to create your container based on another docker image.
3. cd into the src folder and run `composer install` command.
4. CREATE database 'global4crm'.
5. import the data/dump.sql to database you created. The sql file contains sample data. Alternatively, you can run the `php artisan migrate` to run the available database migrations.
6. CREATE the `.env` file in your `src` folder from the `.env.example` file. Specify the database connection credentials.
7. If you used the docker image available in this repository, you need to add the domain `global4crm.test` to your hosts file. See `configs/000-default.conf`.
## System Documentation
<p>The system was built in Laravel MVC framework and 
implements the MVC design pattern.</p> 
<p>The system allows telesales agents to; 
<ul>
<li>create customer</li>
<li>view list of customers </li>
<li> create orders with a contract while creating the order</li>
<li> view list of orders created by logged in telesales agent</li>
<li> view weekly target and current sales of logged in sales agent to confirm if they meet their target or not</li>
</ul>

<p><strong>System Usage</strong></p> 
launch the url in the browser. You can create a new telesales agent by clicking 
the register link or you can use the following test accounts;

1. john.doe@gmail.com (pwd: password1).
2. mercy@gmail.com (pwd: password1).

To create an order, agents should first create a customer. So the order creation starts by creating the customer account
after which agent proceeds to the order page. 

On the 'create order' page, agents should select the customer for the order,
select the broadband package, select the contract duration which displays
the total price to pay and the installment payments for the contract duration.

After selecting the right options on the order form, a button is displayed 
at the footer of the form which the agent must click to complete the order.
The agent is redirected to the order index page after the order is placed successfully.

I have implemented the order creation process in this way to reduce the
possibility of making mistakes and create a seamless user experience.

<Strong>Possible Payment implementation</strong>

Although the application does not collect or process payment details, this section
explains how I would have done this in a production environment.

When the order is placed,we can accept the initial deposit payment using a payment gateway
like Stripe and at the same time setup a subscription plan for the customer using Stripe.
This way Stripe handles the monthly contract payments for the order.
For every payment, if the payment gateway api returns a success response, we can store the 
payment details in an appropriate table.

