# Solution

I'd like to notice that I haven't completed the infrastructure part because I was short on time.
I mainly focused on the application and domain aspects.
I believe my approach is pretty clear and easy to understand.

I spent a lot of time on analyzing the situation. I came to a conclusion that I have too less information about the requirements.
In DDD communication with the business is key to defining service boundaries accurately.
Normally, I use Event Storming to map out business processes and contexts.
As this is just an example task I had to make some assumptions and guess the business requirements myself.
I left a few TODOs that still need to be sorted out.

I wasn't sure what the responsibility of the Approval module is. Either it's strictly related to the Invoices module
which means that they both can talk the same language (about invoices). I assume that the Approval module needs some
Invoice-related data to perform checks etc. On the other hand, it emits a general event called EntityApproved/EntityRejected
which sounds to me like a generic concept and it shouldn't be coupled to Invoices as it should be able to handle
other types of approvals (for instance Product approvals, etc.). That's why I decided to create a new module called
InvoicesApprovalModule. It's a source of truth for approving/rejecting invoices. This module also communicates with
the generic Approval module.

### Modules

#### Invoices module
Invoices module has one endpoint for showing Invoice data. I didn't notice any specific business requirements about
creating invoices so I assumed that this is a simple CRUD which allows to manage Invoice entities. It's encapsulated
within one CRUD module which could be tested in isolation now.

#### Approval module
The Approval module stayed intact. Based on the task description, I understood that I shouldn't change it.
I assumed it contains some generic logic, important to all approving processes.
I also assumed it's just an internal module, used only by other modules. 
The "Api" directory looks like a contract for other modules.

#### InvoicesApproval module
My new InvoiceApproval module delivers two endpoints for approving and rejecting invoices. 
It encapsulates the logic of the invoice approval process. 
It also prevents from concurrent approvals thanks to optimistic locking.

### How does it work?

#### Show Invoice data
The Invoices module has a read model for invoices. It contains all of the data that an invoice needs to be displayed.
Its status is updated using listeners.
They listen on InvoiceApproved and InvoiceRejected events coming from the InvoiceApproval module.
Status here is just a cache for performance reasons (faster reads).

#### Approve/Reject Invoice
The InvoiceApproval modules exposes two endpoints for approving and rejecting invoices.
This logic is completely separate from managing invoices (CRUD). 
Its purpose is making decisions on invoice approvals and store which invoice is approved and which is not.
It directly calls the generic Approval module and then waits for its response.
Whenever it gets a EntityApproved/EntityRejected event, it completes its internal process and emits a corresponding event:
InvoiceApproved or InvoiceRejected.

### Sidenote
I'm aware that my solution might not be adjusted to the task's creator idea. Maybe my new module wasn't needed
and I could code everything inside the Approval module. It depends on the context and requirements.
I'm eager to talk about my solution and perhaps come to different conclusion when I hear more about the requirements.

Let's chat more about it! :) 

# Recruitment Task 🧑‍💻👩‍💻

### Invoice module with approve and reject system as a part of a bigger enterprise system. Approval module exists and you should use it. It is Backend task, no Frontend is needed.
---
Please create your own repository and make it public or invite us to check it.


<table>
<tr>
<td>

- Invoice contains:
  - Invoice number
  - Invoice date
  - Due date
  - Company
    - Name 
    - Street Address
    - City
    - Zip code
    - Phone
  - Billed company
    - Name 
    - Street Address
    - City
    - Zip code
    - Phone
    - Email address
  - Products
    - Name
    - Quantity
    - Unit Price	
    - Total
  - Total price
</td>
<td>
Image just for visualization
<img src="https://templates.invoicehome.com/invoice-template-us-classic-white-750px.png" style="width: auto"; height:100%" />
</td>
</tr>
</table>

### TO DO:
Simple Invoice module which is approving or rejecting single invoice using information from existing approval module which tells if the given resource is approvable / rejectable. Only 3 endpoints are required:
```
  - Show Invoice data, like in the list above
  - Approve Invoice
  - Reject Invoice
```
* In this task you must save only invoices so don’t write repositories for every model/ entity.

* You should be able to approve or reject each invoice just once (if invoice is approved you cannot reject it and vice versa.

* You can assume that product quantity is integer and only currency is USD.

* Proper seeder is located in Invoice module and it’s named DatabaseSeeder

* In .env.example proper connection to database is established.

* Using proper DDD structure is mandatory (with elements like entity, value object, repository, mapper / proxy, DTO).
Unit tests in plus.

* Docker is in docker catalog and you need only do 
  ```
  ./start.sh
  ``` 
  to make everything work

  docker container is in docker folder. To connect with it just:
  ```
  docker compose exec workspace bash
  ``` 
