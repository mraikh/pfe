# PFE Project

## Refactoring Overview

I made some changes on the relationships and database structure. There was some issues and missuses with the structure of the relations between models. Also, I will implement the quiz logic to show you how it can be done.

This branch `refactor` will contain my version and implementations. I won't push it to the `main`, so there won't be any conflicts. Plus, I will not distribute your flow and process

**Note:**

The logic and routes will be just api's, I will not use view or blade!
The quiz implementation demo will be the only case with frontend, with AlpineJS. Just to demonstrate how you would implement the logic with JSON. 
---

# Update register.blade.php
I found that AlpineJS is already installed. So, I used it to manipulate the DOM and show inputs related to each role.
Using x-data={role_id: 1}, we declare a state variable inside DIV element. With x-model, we bind the value of `role_id` with the `select` input value. whenever we change the value of the input (manually), role_id changes automatically. with that been said, x-show will display the element if the condition is true. in this case, role_id = 1, will display inputs related to `formateur`.

## Process of refactoring

- [x] Refactor relationships
- [x] Refactor database tables
- [x] Name conventions of Models and Controller's functions
- [x] Formateur CRUD
- [x] Formation CRUD
- [x] Cours CRUD
- [X] Chapitre CRUD
- [ ] Quiz Logic Interface
- [ ] Apprenant CRUD
- [ ] Inscription Logic